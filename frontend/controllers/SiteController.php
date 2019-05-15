<?php
namespace frontend\controllers;

use app\models\RAdmin;
use app\models\RNoticeGame;
use app\models\RUser;
use yii\web\Controller;


class SiteController extends Controller
{

    public $enableCsrfValidation = false;
    public $gameNotice = '';

    /**
     * 首页
     */
    public function actionIndex()
    {
        $gameNotice = $this->getGameNotice();
        return $this->render('index',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 真人视讯
     */
    public function actionCasino()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('casino',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 体育赛事
     */
    public function actionSports()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('sports',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 电子游艺
     */
    public function actionGame()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('game',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 彩票游戏
     */
    public function actionLottery()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('lottery',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 优惠活动
     */
    public function actionPromotions()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('promotions',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 合作加盟
     */
    public function actionJoin()
    {
        $gameNotice = $this->getGameNotice();

        //添加代理
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            //判断是否正确
            $res = $this->checkRegister($post);
            if ($res['result'] == 'fail') {
                return $this->asJson($res);
            }

            $admin = new RAdmin();
            $admin->account = trim($post['account']);
            $admin->pwd = base64_encode(trim($post['pwd']));
            $admin->money_pwd = base64_encode(trim($post['money_pwd']));
            $admin->real_name = trim($post['real_name']);
            $admin->phone = trim($post['phone']);
            $admin->qq = trim($post['qq']);
            $admin->create_time = time();
            $admin->position_id = 3;
            $admin->agent_level = 1;
            $admin->create_ip = $this->getRealIp();
            $res = $admin->insert();


            if($res) {
                $json = ['result'=>'success','info' => '操作成功'];
            } else {
                $json = ['result'=>'fail','info' => '操作失败'];
            }
            return $this->asJson($json);
        }

        return $this->render('join',[
            'gameNotice' => $gameNotice,
        ]);
    }
    public function actionGuide()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('guide',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 关于我们
     */
    public function actionAbout()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('about',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 常见问题
     */
    public function actionHelp()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('help',[
            'gameNotice' => $gameNotice,
        ]);
    }

    public function actionMember()
    {
        $gameNotice = $this->getGameNotice();

        return $this->render('member',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 获取游戏通知
     * @return mixed|string
     */
    private function getGameNotice()
    {
        $gameNotice = RNoticeGame::find()->where(['status' => 1])->orderBy('id desc')->asArray()->one();
        if($gameNotice) {
            return $gameNotice['content'];
        } else {
            return '';
        }
    }

    /**
     * 注册
     */
    public function actionRegister()
    {
        $gameNotice = $this->getGameNotice();

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

    /**
     * 注册验证数据
     * @param $post
     * @return array
     */
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
