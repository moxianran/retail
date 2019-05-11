<?php

namespace backend\module\agent\controllers;

use backend\module\BaseController;
use backend\services\AgentService;
use yii\data\Pagination;

class ExamineController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "代理管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 审核
     */
    public function actionExamine()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = AgentService::examineAgent($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }

        $title = '代理审核';
        $get = \Yii::$app->request->get();

        $data = AgentService::getExamineList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('examine', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'get' => $get
        ]);
    }
}
