<?php
namespace backend\services;
use app\models\RRechargeRecord;

class RechargeService
{

    public static function getList($params)
    {

        $pageSize= 10;

        if(isset($prams['page']) && !empty($prams['page'])) {
            $page = (int) $prams['page'];
        } else {
            $page = 1;
        }

        //删选数组
        $cond = [];

        //投注时间
        if(!empty($params['start']) && !empty($params['end'])) {
            $start = strtotime($params['start']);
            $end = strtotime($params['end']);
        } else {
            $start = strtotime(date("Y-m-d H:i:s",strtotime("-1 month")));
            $end = strtotime(date("Y-m-d H:i:s"));
        }

        $cond[] = ['>', 'create_time', $start];
        $cond[] = ['<', 'create_time', $end];

        $startDate = date("m/d/Y",$start);
        $endDate = date("m/d/Y",$end);

        //台号
//        if(!empty($params['platform_id'])) {
//            $cond[] = ['=', 'platform_id', $params['platform_id']];
//        }
//        //靴号
//        if(!empty($params['series_id'])) {
//            $cond[] = ['=', 'series_id', $params['series_id']];
//        }
//        //局号
//        if(!empty($params['game_id'])) {
//            $cond[] = ['=', 'game_id', $params['game_id']];
//        }
//        //会员
//        if(!empty($params['user_id'])) {
//            $cond[] = ['=', 'user_id', $params['user_id']];
//        }

        $offset = ($page - 1) * $pageSize;

        $query = RRechargeRecord::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->offset($offset)->limit($pageSize)->asArray()->all();


        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
            'start' => $startDate,
            'end' => $endDate,
        ];




    }


}