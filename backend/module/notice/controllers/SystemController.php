<?php

namespace backend\module\notice\controllers;

use backend\module\BaseController;
use backend\services\NoticeSystemService;
use yii\data\Pagination;
use yii\web\Controller;

class SystemController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "通知管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 列表
     */
    public function actionList()
    {
        $title = "会员后台";

        $get = \Yii::$app->request->get();
        $data = NoticeSystemService::getList($get);
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

            $res = NoticeSystemService::createNotice($post);
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

            $res = NoticeSystemService::editNotice($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        $id = $request = \Yii::$app->request->get('id');
        $data = NoticeSystemService::getOne($id);

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

            $res = NoticeSystemService::changeStatus($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }
    }
}
