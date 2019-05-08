<?php

namespace backend\module\report\controllers;

use app\models\RUser;
use backend\module\BaseController;
use backend\services\RechargeService;
use yii\data\Pagination;

class RechargeController extends BaseController
{

    public $pageSize = 10;
    public $enableCsrfValidation = false;
    public $moduleTitle = "通知管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
        //判断是否登录
        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        if (!$this->adminInfo) {
            return $this->redirect(['/login/login/login']);
        }
    }

    /**
     * 充值记录
     */
    public function actionRechargeRecord()
    {
        $title = "充值记录";

        $get = \Yii::$app->request->get();
        $data = RechargeService::getlist($get);

        //获取全部用户
        $user = RUser::find('id,real_name')->where(['status' => 2])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('rechargeRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

}
