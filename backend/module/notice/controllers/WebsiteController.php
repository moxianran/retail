<?php

namespace backend\module\notice\controllers;

use yii\web\Controller;
use app\models\RNoticeWebsite;

class WebsiteController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * 网站公告列表
     * @return string
     */
    public function actionList()
    {
        $list = RNoticeWebsite::find()->where([
            'status'=> [1,2],
        ])->asArray()->all();

        return $this->render('list', [
            'list' => $list,
        ]);
    }

    /**
     * 新增
     * @return string|\yii\web\Response
     * @throws \Throwable
     */
    public function actionCreate()
    {
        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $notice = new RNoticeWebsite();
            $notice->title = $post['title'];
            $notice->content = $post['content'];
            $notice->create_time = time();
            $notice->create_person = 1;
            $notice->update_time = time();
            $notice->update_person = 1;
            $notice->status = $post['status'];
            $res =  $notice->insert();

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

        return $this->render('create');
    }

    /**
     * 编辑
     * @return string|\yii\web\Response
     */
    public function actionEdit()
    {
        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $update_data = [
                'title' => $post['title'],
                'content' => $post['content'],
                'status' => $post['status'],
                'update_time' => time(),
                'update_person' => 1,
            ];
            $res = RNoticeWebsite::updateAll($update_data,'id = '.$post['id']);
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
        $id = $request = \Yii::$app->request->get('id');

        $data = RNoticeWebsite::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();


        return $this->render('edit', [
            'data' => $data,
        ]);
    }

    public function actionStop()
    {
        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $update_data = [
                'status' => 2,
                'update_time' => time(),
                'update_person' => 1,
            ];
            $res = RNoticeWebsite::updateAll($update_data,'id = '.$post['id']);
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

    public function actionDelete()
    {
        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $update_data = [
                'status' => 3,
                'update_time' => time(),
                'update_person' => 1,
            ];
            $res = RNoticeWebsite::updateAll($update_data,'id = '.$post['id']);
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
