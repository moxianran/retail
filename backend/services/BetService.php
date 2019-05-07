<?php
namespace backend\services;
use app\models\RBet;
use app\models\RUser;

class BetService {


    /**
     * 获取投注记录
     * @param $params
     * @return array
     */
    public static function getList($params)
    {
        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
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
            $start = strtotime(date("Y-m-d H:i:s",strtotime("-1 year")));
            $end = strtotime(date("Y-m-d H:i:s"));
        }

        $cond[] = ['>', 'bet_time', $start];
        $cond[] = ['<', 'bet_time', $end];

        $startDate = date("m/d/Y",$start);
        $endDate = date("m/d/Y",$end);

        //台号
        if(!empty($params['platform_id'])) {
            $cond[] = ['=', 'platform_id', $params['platform_id']];
        }
        //靴号
        if(!empty($params['series_id'])) {
            $cond[] = ['=', 'series_id', $params['series_id']];
        }
        //局号
        if(!empty($params['game_id'])) {
            $cond[] = ['=', 'game_id', $params['game_id']];
        }
        //会员
        if(!empty($params['user_id'])) {
            $cond[] = ['=', 'user_id', $params['user_id']];
        }

        $offset = ($page - 1) * $pageSize;

        $query = RBet::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->offset($offset)->limit($pageSize)->asArray()->all();


        if($list) {

            $userIds = array_column($list,'user_id');
            $user = RUser::find('id,real_name')->where(['id' => $userIds])->asArray()->all();
            $user = array_column($user,'real_name','id');

            foreach ($list as $k=>$v) {
                $list[$k]['userName'] = $user[$v['user_id']] ?? '暂无';
                if($v['bet_result'] == '0') {
                    $list[$k]['bet_result'] = '平';
                } else if($v['bet_result'] == '1'){
                    $list[$k]['bet_result'] = '胜';
                } else if($v['bet_result'] == '2'){
                    $list[$k]['bet_result'] = '负';
                }
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