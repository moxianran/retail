<?php

namespace backend\module\report\controllers;

use backend\module\BaseController;
use backend\services\BetService;
use yii\data\Pagination;

class BetController extends BaseController
{

    public $pageSize = 10;
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
     * 投注记录
     */
    public function actionBetRecord()
    {
        $title = "投注记录";

        $get = \Yii::$app->request->get();
        $data = BetService::getlist($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

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

}
