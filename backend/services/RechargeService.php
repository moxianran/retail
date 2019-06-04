<?php
namespace backend\services;
use app\models\RAdmin;
use app\models\RGame;
use app\models\RRechargeRecord;
use app\models\RUser;

class RechargeService
{
    public static function getList($params)
    {
        $game = RGame::find()->asArray()->all();
        $game = array_column($game,'name','id');

        $settlementTypeArr = [
            '1' => '游戏上分',
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
            $start = strtotime(date("Y-m-d H:i:s", strtotime("-1 years")));
            $end = strtotime(date("Y-m-d H:i:s"));
        }

        if (isset($params['game_id']) && $params['game_id'] > 0) {
            $cond[] = ['=', 'game_id', $params['game_id']];
        }
        if (isset($params['type']) && $params['type'] > 0) {
            $cond[] = ['=', 'type', $params['type']];
        }

        if (isset($params['user_id']) && $params['user_id'] > 0) {
            $cond[] = ['=', 'user_id', $params['user_id']];
        }
        if (isset($params['agent_id']) && $params['agent_id'] > 0) {

            $u = RUser::find()->where(['agent_id' =>$params['agent_id'] ])->asArray()->all();
            $uid = array_column($u,'id');
            $cond[] = ['in', 'user_id', $uid];
        }

//        print_r($cond);die;
        $cond[] = ['>', 'create_time', $start];
        $cond[] = ['<', 'create_time', $end];

        $startDate = date("m/d/Y",$start);
        $endDate = date("m/d/Y",$end);

        $offset = ($page - 1) * $pageSize;

        $query = RRechargeRecord::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();
        if ($list) {

            $user = RUser::find()->where([])->asArray()->all();
            $userAccount = array_column($user,'account','id');

            $upAgentIds = array_column($user,'agent_id','id');

            $admin = RAdmin::find()->where([])->asArray()->all();
            $adminAccount = array_column($admin,'account','id');

            foreach ($list as $k => $v) {
                $list[$k]['userAccount'] = $userAccount[$v['user_id']] ?? '暂无';
                $list[$k]['gameName'] = $game[$v['game_id']] ?? '暂无';
                $list[$k]['settlement_type'] = $settlementTypeArr[$v['type']] ?? '暂无';
                $list[$k]['agentAccount'] = $adminAccount[1] ?? '暂无';
                $list[$k]['operator_id'] = $adminAccount[$v['operator_id']] ?? '暂无';
            }
        }

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
            'start' => $startDate,
            'end' => $endDate,
            'game' => $game,
            'settlementTypeArr' => $settlementTypeArr
        ];

    }

}