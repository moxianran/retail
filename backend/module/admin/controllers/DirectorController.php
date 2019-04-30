<?php

namespace backend\module\admin\controllers;

use yii\web\Controller;
use app\models\RAdmin;

/**
 * Default controller for the `admin` module
 */
class DirectorController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * 主管列表
     * @return string
     */
    public function actionList()
    {
        $list = RAdmin::find()->where([
            'position_id'=> 5, //代理
            'is_delete' => 2,   //未删除
        ])->asArray()->all();

        return $this->render('list', [
            'list' => $list,
        ]);
        return $this->render('list');
    }

    /**
     * 禁用和恢复正常
     * @return \yii\web\Response
     */
    public function actionChangeStatus()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $id = $post['id'];
            $status = $post['status'];

            $update_data = [
                'status' => $status,
                'update_time' => time(),
                'update_person' => 1,
            ];
            $res = RAdmin::updateAll($update_data,'id = '.$id);
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
     * 新增
     */
    public function actionCreate()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $admin = new RAdmin();
            $admin->account = $post['account'];
            $admin->pwd = $post['pwd'];
            $admin->real_name = $post['real_name'];
            $admin->phone = $post['phone'];
            $admin->email = $post['email'];
            $admin->qq = $post['qq'];
            $admin->wechat = $post['wechat'];
            $admin->register_ip = $post['register_ip'];
            $admin->register_time = time();
            $admin->create_time = time();
            $admin->position_id = 5;
            $res = $admin->insert();
            if ($res) {
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
     */
    public function actionEdit()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();


            $update_data = [
                'account' => $post['account'],
                'pwd' => $post['pwd'],
                'real_name' => $post['real_name'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'qq' => $post['qq'],
                'wechat' => $post['wechat'],
                'register_ip' => $post['register_ip'],
                'update_time' => time(),
            ];
            $res = RAdmin::updateAll($update_data,'id = '.$post['id']);
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
        $data = RAdmin::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
        ]);
    }

}
