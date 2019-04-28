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
//            'status'=> [1,2],
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
     * 会员审核
     */
    public function actionExamine()
    {

        $list = RUser::find()->where([
            'status'=> 1,
        ])->asArray()->all();

        return $this->render('examine', [
            'list' => $list,
        ]);
    }
}
