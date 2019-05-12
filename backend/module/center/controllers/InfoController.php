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

        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        $id = $this->adminInfo['id'];

        $info = RAdmin::find()->where(['id' => $id])->asArray()->one();

        return $this->render('info', [
            'info' => $info,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'adminInfo' => $this->adminInfo,
        ]);
    }


    /**
     * 编辑信息
     */
    public function actionEdit()
    {
        $title = '编辑信息';

        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $update_data = [
                'phone' => $post['phone'],
                'email' => $post['email'],
                'qq' => $post['qq'],
                'wechat' => $post['wechat'],
                'update_time' => time(),
                'update_person' => $adminInfo['id'],
            ];
            $res = RAdmin::updateAll($update_data, 'id = ' . $post['id']);

            if ($res) {
                $json =  ['result' => 'success', 'info' => '操作成功'];
            } else {
                $json =  ['result' => 'fail', 'info' => '操作失败'];
            }
            return $this->asJson($json);
        }

        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        $id = $this->adminInfo['id'];

        $data =RAdmin::find()->where(['id'=>$id])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }




}