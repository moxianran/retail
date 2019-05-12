<?php

namespace backend\module\center\controllers;

use backend\module\BaseController;
use backend\services\CenterService;
use backend\services\AgentService;
use app\models\RAdmin;

class InfoController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "个人中心";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 我的资料
     */
    public function actionInfo()
    {
        $title = "我的资料";

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = AgentService::editAgent($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }

        //代理列表
        $agentList = AgentService::getAgentList();

        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        $id = $this->adminInfo['id'];

        $info = RAdmin::find()->where(['id' => $id])->asArray()->one();




        return $this->render('info', [
            'info' => $info,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList' => $agentList,
            'adminInfo' => $this->adminInfo,
        ]);

    }




}