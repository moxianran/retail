<?php

namespace backend\module\user\controllers;

use app\models\RUser;
use backend\module\BaseController;
use backend\services\AgentService;
use backend\services\UserService;
use yii\data\Pagination;

class OnlineController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "会员管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 会员在线列表???
     * @return string
     */
    public function actionOnline()
    {
        $title = '会员在线列表';

        $get = \Yii::$app->request->get();

        $data = UserService::getOnlineList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('online', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'get' => $get
        ]);
    }

    /**
     * 踢出登录
     */
    public function actionKickOut()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $session = \Yii::$app->session;
            $adminInfo = $session->get('adminInfo');

            $id = $post['id'];

            $update_data = [
                'expire_time' => 0,
                'update_time' => time(),
                'update_person' => $adminInfo['id'],
            ];
            $res = RUser::updateAll($update_data,'id = '.$id);
            if($res) {
                $json = [
                    'result' => 'success',
                    'info' => '操作成功'
                ];
            } else {
                $json = [
                    'result' => 'fail',
                    'info' => '操作失败'
                ];
            }
            return $this->asJson($json);
        }
    }




}