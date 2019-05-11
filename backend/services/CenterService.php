<?php
namespace backend\services;
use app\models\RNotice;

class CenterService {

    public static function getList()
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $update_data = [
            'is_read' => 1,
            'update_time' => time(),
        ];

        RNotice::updateAll($update_data, 'admin_id = ' . $adminInfo['id']);

        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        $query = RNotice::find()->where(['admin_id' =>$adminInfo['id'] ]);

        //获取总数
        $count = $query->count();

        //获取分页数据
        $offset = ($page - 1) * $pageSize;
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
        ];

    }



}