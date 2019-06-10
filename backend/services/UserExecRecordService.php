<?php
namespace backend\services;

use app\models\RAdmin;
use app\models\RUser;
use app\models\RUserExecRecord;

class UserExecRecordService {

    /**
     * 会员操作记录
     * @param $params
     * @return array
     */
    public static function getExecList($params)
    {
        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //删选数组
        $cond = [];

        //姓名
        if(!empty($params['real_name'])) {
            $cond[] = ['like', 'real_name', $params['real_name']];
        }

        $offset = ($page - 1) * $pageSize;

        $query = RUserExecRecord::find()->where([]);
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();

        foreach ($list as $k => $v) {
            if($v['type'] == 2) {
                $user = RUser::find()->where(['id' => $v['user_id']])->asArray()->one();
            } else {
                $user = RAdmin::find()->where(['id' => $v['user_id']])->asArray()->one();
            }
            $list[$k]['account'] = $user['account'];
        }

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
        ];
    }
}