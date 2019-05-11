<?php
namespace backend\services;
use app\models\RAdmin;
use app\models\RRechargeRecord;
use app\models\RUser;

class RechargeService
{

    public static function getList($params)
    {

        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //投注时间
        if(!empty($params['start']) && !empty($params['end'])) {
            $start = strtotime($params['start']);
            $end = strtotime($params['end']);
        } else {
            $start = strtotime(date("Y-m-d H:i:s", strtotime("-1 years")));
            $end = strtotime(date("Y-m-d H:i:s"));
        }

        $cond[] = ['>', 'create_time', $start];
        $cond[] = ['<', 'create_time', $end];

        $startDate = date("m/d/Y",$start);
        $endDate = date("m/d/Y",$end);

        $offset = ($page - 1) * $pageSize;


        $gameTypeArr = [
            '1' => '牌',
            '2' => '彩票'
        ];
        $settlementTypeArr = [
            '1' => '微信',
            '2' => '支付宝'
        ];

        $query = RRechargeRecord::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->offset($offset)->limit($pageSize)->asArray()->all();
        if ($list) {

            $user = RUser::find()->where([])->asArray()->all();
            $user = array_column($user,'real_name','id');

            $agent = RAdmin::find()->where([])->asArray()->all();
            $agent = array_column($agent,'real_name','id');

            foreach ($list as $k => $v) {
                $list[$k]['game_type'] = $gameTypeArr[$v['game_type']] ?? '暂无';
                $list[$k]['settlement_type'] = $settlementTypeArr[$v['settlement_type']] ?? '暂无';
                $list[$k]['user_id'] = $user[$v['user_id']] ?? '暂无';
                $list[$k]['agent_id'] = $agent[$v['agent_id']] ?? '暂无';
                $list[$k]['operator_id'] = $agent[$v['operator_id']] ?? '暂无';
            }
        }


        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
            'start' => $startDate,
            'end' => $endDate,
        ];




    }


}