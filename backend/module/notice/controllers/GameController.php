<?php

namespace backend\module\notice\controllers;

use backend\services\NoticeGameService;
use yii\data\Pagination;
use yii\web\Controller;

class GameController extends Controller
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
        $title = "游戏大厅";

        $get = \Yii::$app->request->get();
        $data = NoticeGameService::getList($get);
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

            $res = NoticeGameService::createNotice($post);
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
        $title = "编辑消息";

        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $res = NoticeGameService::editNotice($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        $id = $request = \Yii::$app->request->get('id');
        $data = NoticeGameService::getOne($id);

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

            $res = NoticeGameService::changeStatus($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }
    }
}
