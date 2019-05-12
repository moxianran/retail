<?php
namespace frontend\controllers;

use app\models\RAdmin;
use app\models\RUser;
use yii\web\Controller;


class SiteController extends Controller
{

    public $enableCsrfValidation = false;

    /**
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCasino()
    {
        return $this->render('casino');
    }

    public function actionSports()
    {
        return $this->render('sports');
    }

    public function actionGame()
    {
        return $this->render('game');
    }

    public function actionLottery()
    {
        return $this->render('lottery');
    }

    public function actionPromotions()
    {
        return $this->render('promotions');
    }

    public function actionJoin()
    {
        return $this->render('join');
    }
    public function actionGuide()
    {
        return $this->render('guide');
    }
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHelp()
    {
        return $this->render('help');
    }

    public function actionMember()
    {
        return $this->render('member');
    }

    /**
     * 注册
     */
    public function actionRegister()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            //判断是否正确
            $res = $this->checkRegister($post);
            if ($res['result'] == 'fail') {
                return $this->asJson($res);
            }

            $user = new RUser();
            $user->account = trim($post['account']);
            $user->pwd = base64_encode(trim($post['pwd']));
            $user->money_pwd = base64_encode(trim($post['money_pwd']));
            $user->real_name = trim($post['real_name']);
            $user->phone = trim($post['phone']);
            $user->qq = trim($post['qq']);
            $user->create_time = time();
            $res = $user->insert();
            if($res) {
                $json = ['result'=>'success','info' => '操作成功'];
            } else {
                $json = ['result'=>'fail','info' => '操作失败'];
            }
            return $this->asJson($json);
        }

        return $this->render('register');
    }

    private function checkRegister($post)
    {
        $res = ['result' => 'success'];

        if (!isset($post['agree'])) {
            $res = ['result' => 'fail', 'info' => '请同意合约!'];
        }

        //账号
        $account = trim($post['account']);
        if (empty($account)) {
            $res = ['result' => 'fail', 'info' => '请输入账号'];
        }
        if (!preg_match('/^[A-Za-z0-9_]+$/', $post['account'])) {
            $res = ['result' => 'fail', 'info' => '账号必须数字或字母或下划线组成'];
        }

        //密码
        $pwd = trim($post['pwd']);
        if (empty($pwd)) {
            $res = ['result' => 'fail', 'info' => '请输入密码'];
        }
        if(strlen($pwd) < 6) {
            $res = ['result' => 'fail', 'info' => '密码6位或6位以上'];
        }
        $pwd_again = trim($post['pwd_again']);
        if (empty($pwd_again)) {
            $res = ['result' => 'fail', 'info' => '请输入再次密码'];
        }
        if ($pwd != $pwd_again) {
            $res = ['result' => 'fail', 'info' => '两次密码输入不一致'];
        }

        //取款密码
        $money_pwd = trim($post['money_pwd']);
        if (empty($money_pwd)) {
            $res = ['result' => 'fail', 'info' => '请输入取款密码'];
        }
        if(strlen($money_pwd) < 6) {
            $res = ['result' => 'fail', 'info' => '取款密码6位或6位以上'];
        }

        //手机
        $phone = trim($post['phone']);
        if (empty($phone)) {
            $res = ['result' => 'fail', 'info' => '请输入手机号码'];
        }
        if(strlen($phone) != 11) {
            $res = ['result' => 'fail', 'info' => '手机号码格式错误'];
        }
        return $res;
    }


}
