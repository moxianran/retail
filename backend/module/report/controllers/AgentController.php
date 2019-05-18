<?php

namespace backend\module\report\controllers;

use backend\module\BaseController;
use backend\services\AgentService;
use yii\data\Pagination;

class AgentController extends BaseController
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
     * 代理新增记录
     */
    public function actionAgentAddRecord()
    {
        $title = "代理新增记录";
        $get = \Yii::$app->request->get();
        $data = AgentService::getAgentAddRecord($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('agentAddRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }


}
