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

    /**
     * 获取ip
     */
    private function getRealIp()
    {
        $ip = false;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) {
                array_unshift($ips, $ip);
                $ip = FALSE;
            }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi('^(10│172.16│192.168).', $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}
