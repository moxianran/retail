<?php
namespace backend\services;
use app\models\RResult;
use app\models\RUser;

class ResultService
{

    public static function getList($params)
    {

        $gameTypeArr = [
            '1' => '牌',
            '2' => '彩票'
        ];
        $settlementTypeArr = [
            '1' => '微信',
            '2' => '支付宝'
        ];

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
            $start = strtotime(date("Y-m-d H:i:s",strtotime("-1 years")));
            $end = strtotime(date("Y-m-d H:i:s"));
        }

        $cond[] = ['>', 'create_time', $start];
        $cond[] = ['<', 'create_time', $end];

        if (isset($params['game_type']) && $params['game_type'] > 0) {
            $cond[] = ['=', 'game_type', $params['game_type']];
        }
        if (isset($params['user_id']) && $params['user_id'] > 0) {
            $cond[] = ['=', 'user_id', $params['user_id']];
        }

        $startDate = date("m/d/Y",$start);
        $endDate = date("m/d/Y",$end);

        $offset = ($page - 1) * $pageSize;

        $query = RResult::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->offset($offset)->limit($pageSize)->asArray()->all();
        if($list) {
            $user = RUser::find()->asArray()->all();
            $account = array_column($user,'account','id');
            $real_name = array_column($user,'real_name','id');
            foreach ($list as $k => $v) {
                $list[$k]['account'] = $account[$v['user_id']] ?? '暂无';
                $list[$k]['real_name'] = $real_name[$v['user_id']] ?? '暂无';
                $list[$k]['game_type'] = $gameTypeArr[$v['game_type']] ?? '暂无';
            }
        }

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
            'start' => $startDate,
            'end' => $endDate,
            'game_type' => $gameTypeArr,
            'settlement_type' => $settlementTypeArr
        ];

    }


}