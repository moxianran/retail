<?php

namespace backend\module\super\controllers;

use backend\module\BaseController;
use backend\services\UserExecRecordService;
use yii\data\Pagination;


class UserController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "超级管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 会员操作记录
     */
    public function actionList()
    {
        $title = "操作记录";

        $get = \Yii::$app->request->get();
        $data = UserExecRecordService::getExecList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('list', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

}