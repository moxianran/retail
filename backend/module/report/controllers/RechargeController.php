<?php

namespace backend\module\report\controllers;

use app\models\RAdmin;
use app\models\RUser;
use backend\module\BaseController;
use backend\services\RechargeService;
use yii\data\Pagination;

class RechargeController extends BaseController
{

    public $enableCsrfValidation = false;
    public $moduleTitle = "报表管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 充值记录
     */
    public function actionRechargeRecord()
    {
        $title = "充值记录";

        $get = \Yii::$app->request->get();
        $data = RechargeService::getlist($get);

        //全部用户
        $user = RUser::find()->where(['status' => 2])->asArray()->all();

        //全部代理
        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('rechargeRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
            'agent' => $agent,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'game' => $data['game'],
            'settlementTypeArr' => $data['settlementTypeArr'],
        ]);
    }

}
