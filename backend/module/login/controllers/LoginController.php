<?php

namespace backend\module\login\controllers;

use yii\web\Controller;
use backend\services\LoginService;

class LoginController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout=false;


    public function init()
    {
        parent::init();
    }

    /**
     * 登录
     */
    public function actionLogin()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $account = $post['account'];
            $pwd = $post['password'];

            //获取ip
            $ip = $this->getRealIp();

            //登录操作
            $res = LoginService::login($account,$pwd,$ip);
            if($res['type'] == 'success') {
                $json = [
                    'result' => 'success',
                    'info' => '操作成功'
                ];
            } else {
                $json = [
                    'result' => 'fail',
                    'info' => $res['msg']
                ];
            }
            return $this->asJson($json);
        }

        return $this->render('login');
    }

    /**
     * 退出登录
     */
    public function actionLouout()
    {
        $session = \Yii::$app->session;
        $session->remove('adminInfo');
        return $this->redirect(['/login/login/login']);
    }

    /**
     * 获取ip
     */
    private function getRealIp(){
        $ip=false;
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
            if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
            for ($i=0; $i < count($ips); $i++){
                if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
                    $ip=$ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}
