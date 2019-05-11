<?php

namespace backend\module\center\controllers;

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


}
