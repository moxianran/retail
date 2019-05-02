<?php

namespace backend\module\notice\controllers;

use yii\web\Controller;
use app\models\RNoticeWebsite;
use backend\services\NoticeService;
use yii\data\Pagination;

class WebsiteController extends Controller
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
        $data = NoticeService::getList($get,1);
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
        $title = "新增公告";

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

        return $this->render('create',[
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 编辑
     * @return string|\yii\web\Response
     */
    public function actionEdit()
    {
        $title = "编辑公告";

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
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 禁用
     * @return \yii\web\Response
     */
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

    /**
     * 恢复正常
     * @return \yii\web\Response
     */
    public function actionRecovery()
    {
        if(\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $update_data = [
                'status' => 1,
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

    /**
     * 删除
     * @return \yii\web\Response
     */
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
