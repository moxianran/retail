<?php

namespace backend\module\center\controllers;

use app\models\RNotice;
use backend\module\BaseController;
use backend\services\CenterService;
use yii\data\Pagination;


class NoticeController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "个人中心";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    public function actionList()
    {
        $title = "消息中心";

        $get = \Yii::$app->request->get();
        $data = CenterService::getList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('list', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    public function actionNewNotice()
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $where = [
            'admin_id' => $adminInfo['id'],
            'is_read' => 2
        ];
        $notice = RNotice::find()->where($where)->asArray()->one();

        if ($notice) {
            $update_data = [
                'is_read' => 1,
                'update_time' => time(),
            ];
            RNotice::updateAll($update_data, 'id = ' . $notice['id']);

            $json =  ['result' => 'success', 'info' => $notice['content']];
        } else {
            $json =  ['result' => 'fail', 'info' => '操作失败'];
        }
        return $this->asJson($json);



    }


}
