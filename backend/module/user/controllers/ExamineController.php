<?php

namespace backend\module\user\controllers;

use app\models\RUser;
use backend\module\BaseController;
use backend\services\AgentService;
use backend\services\UserService;
use yii\data\Pagination;

class ExamineController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "会员管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 会员审核
     */
    public function actionExamine()
    {
        $title = '会员审核';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = UserService::examineUser($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }


        $get = \Yii::$app->request->get();

        $data = UserService::getExamineList($get);
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