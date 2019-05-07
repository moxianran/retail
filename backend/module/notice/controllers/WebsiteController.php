<?php

namespace backend\module\notice\controllers;

use backend\module\BaseController;
use backend\services\NoticeWebsiteService;
use yii\data\Pagination;
use yii\web\Controller;

class WebsiteController extends BaseController
{
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
     * 列表
     */
    public function actionList()
    {
        $title = "网站公告";

        $get = \Yii::$app->request->get();
        $data = NoticeWebsiteService::getList($get);
        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('list', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 新增
     */
    public function actionCreate()
    {
        $title = "新增消息";

        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $res = NoticeWebsiteService::createNotice($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        return $this->render('create',[
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $title = "编辑公告";

        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $res = NoticeWebsiteService::editNotice($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        $id = $request = \Yii::$app->request->get('id');
        $data = NoticeWebsiteService::getOne($id);

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 修改状态
     */
    public function actionChangeStatus()
    {
        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $res = NoticeWebsiteService::changeStatus($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }
    }
}
