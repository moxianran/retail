<?php

namespace backend\module\super\controllers;

use backend\module\BaseController;
use backend\services\CommonService;


class ExportController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "超级管理";
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
     * 列表
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 导出会员
     */
    public function actionExportUser()
    {
        CommonService::exportUser(['status' => 2]);
    }

    /**
     * 导出代理
     */
    public function actionExportAgent()
    {
        CommonService::exportAgent(['position_id' => 3]);
    }

    /**
     * 导出客服
     */
    public function actionExportCustomer()
    {
        CommonService::exportCustomer(['position_id' => 4]);
    }

    /**
     * 导出主管
     */
    public function actionExportDirector()
    {
        CommonService::exportDirector(['position_id' => 5]);
    }

    /**
     * 导出投注记录
     */
    public function actionExportBet()
    {
        CommonService::exportBet();
    }

    /**
     * 导出充值记录
     */
    public function actionExportRecharge()
    {
        CommonService::exportRecharge();
    }

    /**
     * 导出输赢记录
     */
    public function actionExportResult()
    {
        CommonService::exportResult();
    }

}