<?php

namespace backend\module\user\controllers;

use app\models\RUser;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * 会员列表
     * @return string
     */
    public function actionList()
    {
        $list = RUser::find()->where([
            'status'=> 2,
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
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $user = new RUser();
            $user->account = $post['account'];
            $user->game_account = $post['game_account'];
            $user->pwd = $post['pwd'];
            $user->game_pwd = $post['game_pwd'];
            $user->money_pwd = $post['money_pwd'];
            $user->real_name = $post['real_name'];
            $user->phone = $post['phone'];
            $user->email = $post['email'];
            $user->qq = $post['qq'];
            $user->wechat = $post['wechat'];
            $user->bank_id = $post['bank_id'];
            $user->register_domain = $post['register_domain'];
            $user->register_ip = $post['register_ip'];
            $user->register_time = time();
            $user->create_time = time();
            $res = $user->insert();

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
     * 编辑会员
     * @return string|\yii\web\Response
     */
    public function actionEdit()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $update_data = [
                'account' => $post['account'],
                'game_account' => $post['game_account'],
                'pwd' => $post['pwd'],
                'game_pwd' => $post['game_pwd'],
                'money_pwd' => $post['money_pwd'],
                'real_name' => $post['real_name'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'qq' => $post['qq'],
                'wechat' => $post['wechat'],
                'bank_id' => $post['bank_id'],
                'register_domain' => $post['register_domain'],
                'register_ip' => 1,
                'update_time' => time(),
            ];
            $res = RUser::updateAll($update_data,'id = '.$post['id']);
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
        $data = RUser::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
        ]);
    }

    /**
     * 会员审核
     */
    public function actionExamine()
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

        $list = RUser::find()->where([
            'status'=> 1,
        ])->asArray()->all();

        return $this->render('examine', [
            'list' => $list,
        ]);
    }

    /**
     * 禁用和恢复正常
     * @return \yii\web\Response
     */
    public function actionChangeStop()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $id = $post['id'];
            $isStop = $post['isStop'];

            $update_data = [
                'is_stop' => $isStop,
                'update_time' => time(),
                'update_person' => 1,
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


    /**
     * 会员在线列表
     * @return string
     */
    public function actionOnline()
    {
        $list = RUser::find()->where([
            'is_login'=> 1,
        ])->asArray()->all();

        return $this->render('online', [
            'list' => $list,
        ]);
    }

    /**
     * 踢出登录
     */
    public function actionKickOut()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $id = $post['id'];

            $update_data = [
                'is_login' => 2,
                'update_time' => time(),
                'update_person' => 1,
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
