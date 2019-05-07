<?php

namespace backend\module\report\controllers;

use app\models\RAdmin;
use app\models\RUser;
use backend\services\AgentService;
use yii\web\Controller;
use yii\data\Pagination;
use backend\services\BetService;
use backend\services\RechargeService;
use backend\services\ResultService;
use backend\services\UserService;

class ReportController extends Controller
{

    public $pageSize= 10;
    public $enableCsrfValidation = false;
    public $moduleTitle = "通知管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
        //判断是否登录
        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        if(!$this->adminInfo) {
            return $this->redirect(['/login/login/login']);
        }
    }

    /**
     * 会员新增记录
     */
    public function actionUserAddRecord()
    {
        $title = "会员新增记录";
        $get = \Yii::$app->request->get();
        $data = UserService::getUserAddRecord($get);
        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('userAddRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'type' => $data['type']
        ]);
    }

    /**
     * 代理新增记录
     */
    public function actionAgentAddRecord()
    {
        $title = "代理新增记录";
        $get = \Yii::$app->request->get();
        $data = AgentService::getAgentAddRecord($get);
        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('agentAddRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 投注记录
     */
    public function actionBetRecord()
    {
        $title = "投注记录";

        $get = \Yii::$app->request->get();
        $data = BetService::getlist($get);
        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('betRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 充值记录
     */
    public function actionRechargeRecord()
    {
        $get = \Yii::$app->request->get();
        $data = RechargeService::getlist($get);

        //获取全部用户
        $user = RUser::find('id,real_name')->where(['status' => 2])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('rechargeRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
        ]);
    }

    /**
     * 输赢记录
     */
    public function actionResultRecord()
    {
        $get = \Yii::$app->request->get();
        $data = ResultService::getlist($get);

        //获取全部用户
        $user = RUser::find('id,real_name')->where(['status' => 2])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('resultRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
        ]);
    }
}
