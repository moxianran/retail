<?php

namespace backend\module\report\controllers;

use backend\module\BaseController;
use backend\services\UserService;
use yii\data\Pagination;

class UserController extends BaseController
{

    public $pageSize = 10;
    public $enableCsrfValidation = false;
    public $moduleTitle = "通知管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 会员新增记录
     */
    public function actionUserAddRecord()
    {
        $title = "会员新增记录";
        $get = \Yii::$app->request->get();
        $data = UserService::getUserAddRecord($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('userAddRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'type' => $data['type']
        ]);
    }

}
