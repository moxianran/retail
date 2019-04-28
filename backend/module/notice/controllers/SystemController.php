<?php

namespace backend\module\notice\controllers;

use yii\web\Controller;
use backend\services\Notice;

/**
 * Default controller for the `notice` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    public $allTitle = [
        '1' => '网站公告',
        '2' => '会员后台',
        '3' => '游戏大厅',
        '4' => '代理后台',
    ];

    /**
     * 通知板块
     * @return string
     */
    public function actionIndex()
    {
        $type = $request = \Yii::$app->request->get('type', 1);
        $list = Notice::getList($type);


        $title = $this->allTitle[$type];
        return $this->render('index', [
            'list' => $list,
            'type' => $type,
            'title' => $title
        ]);
    }

    public function actionCreate()
    {
        if(\Yii::$app->request->isPost) {

            $post = \Yii::$app->request->post();
            $res = Notice::create($post);
            if($res) {
                return $this->asJson([
                    'result' => 'success',
                    'info' => '操作成功'
                ]);
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '操作失败'
                ]);
            }
        }

        $type = $request = \Yii::$app->request->get('type');
        $title = $this->allTitle[$type];
        return $this->render('create', [
            'type' => $type,
            'title' => $title
        ]);
    }

    public function actionEdit()
    {

        if(\Yii::$app->request->isPost) {

            $post = \Yii::$app->request->post();
            $res = Notice::edit($post);
            if($res) {
                return $this->asJson([
                    'result' => 'success',
                    'info' => '操作成功'
                ]);
            } else {
                return $this->asJson([
                    'result' => 'fail',
                    'info' => '操作失败'
                ]);
            }
        }
        $type = $request = \Yii::$app->request->get('type', 1);
        $data = Notice::getOne($type);

        $title = $this->allTitle[$type];

        return $this->render('edit', [
            'data' => $data,
            'type' => $type,
            'title' => $title
        ]);
    }


    public function actionDelete()
    {
        return $this->asJson([
            'result' => 'success',
            'info' => '添加成功'
        ]);
    }



}
