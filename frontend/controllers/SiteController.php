<?php
namespace frontend\controllers;

use app\models\RAdmin;
use app\models\RNotice;
use app\models\RNoticeGame;
use app\models\RNoticeWebsite;
use app\models\RUser;
use app\models\RUserLoginRecord;
use yii\web\Controller;
use frontend\services\codeService;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;

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

    /**
     * 新手指南
     */
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

    /**
     * 获取游戏通知
     * @return mixed|string
     */
    private function getGameNotice()
    {
        $gameNotice = RNoticeWebsite::find()->where(['status' => 1])->orderBy('id desc')->asArray()->one();
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
            $user->create_ip = $this->getRealIp();
            $res = $user->insert();

            if($res) {

                //发送消息
                $where = [
                    'is_delete' => 2,
                    'status' => 1,
                ];
                $admin = RAdmin::find()->where($where)->asArray()->all();
                if($admin) {
                    foreach ($admin as $k => $v) {
                        $content = "新用户".trim($post['account'])."注册了";
                        $notice = new RNotice();
                        $notice->admin_id = $v['id'];
                        $notice->content = $content;
                        $notice->is_read = 2;
                        $notice->create_time = time();
                        $notice->insert();
                    }
                }

                $json = ['result'=>'success','info' => '操作成功'];
            } else {
                $json = ['result'=>'fail','info' => '操作失败'];
            }
            return $this->asJson($json);
        }

        return $this->render('register',[
            'gameNotice' => $gameNotice,
        ]);
    }

    /**
     * 登录
     */
    public function actionLogin()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $account = trim($post['account']);
            if (empty($account)) {
                $res = ['result' => 'fail', 'info' => '请输入账号'];
                return $this->asJson($res);
            }
            if (!preg_match('/^[A-Za-z0-9_]+$/', $post['account'])) {
                $res = ['result' => 'fail', 'info' => '账号必须数字或字母或下划线组成'];
                return $this->asJson($res);
            }

            //密码
            $pwd = trim($post['pwd']);
            if (empty($pwd)) {
                $res = ['result' => 'fail', 'info' => '请输入密码'];
                return $this->asJson($res);
            }
            if(strlen($pwd) < 6) {
                $res = ['result' => 'fail', 'info' => '密码6位或6位以上'];
                return $this->asJson($res);
            }

            $where = [
                'account' => $account,
                'pwd' => base64_encode($pwd),
                'is_delete' => 2
            ];
            $user = RUser::find()->where($where)->asArray()->one();
            if(!$user) {
                $res = ['result' => 'fail', 'info' => '账号或密码错误'];
                return $this->asJson($res);
            }
            if($user['status'] == 1) {
                $res = ['result' => 'fail', 'info' => '账号审核中，请联系客服开通'];
                return $this->asJson($res);
            }
            if($user['status'] == 3) {
                $res = ['result' => 'fail', 'info' => '账号审核失败，请联系客服'];
                return $this->asJson($res);
            }
            if($user['is_stop'] == 1) {
                $res = ['result' => 'fail', 'info' => '账号已被锁定，请联系客服'];
                return $this->asJson($res);
            }

            $expireTime = time()+3600;

            //设置session
            $session = \Yii::$app->session;
            $adminInfo = [
                'id' => $user['id'],
                'real_name' => $user['real_name'],
                'expire_time' => $expireTime
            ];
            $session->set('userInfo',$adminInfo);

            //修改用户信息
            $update_data = [
                'expire_time' => $expireTime,
                'update_time' => time(),
            ];
            RUser::updateAll($update_data,'id = '.$user['id']);

            //设置最后登录时间和ip
            $userLoginRecord = new RUserLoginRecord();
            $userLoginRecord->login_ip = $this->getRealIp();
            $userLoginRecord->login_time = time();
            $userLoginRecord->user_id = $user['id'];
            $userLoginRecord->insert();

            return $this->asJson(['result'=>'success','info'=>'登录成功']);
        }
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
            return ['result' => 'fail', 'info' => '请同意合约!'];
        }

        //账号
        $account = trim($post['account']);
        if(strlen($post['account']) < 4) {
            $json = ['result'=>'success','info' => '账号太短啦，请再多输入几个字吧!'];
        }

        RUser::find()->where(['account' => $account, 'is_delete' => 0])->asArray()->one();

        if (empty($account)) {
            return ['result' => 'fail', 'info' => '请输入账号'];
        }
        if (!preg_match('/^[A-Za-z0-9_]+$/', $post['account'])) {
            return ['result' => 'fail', 'info' => '账号必须数字或字母或下划线组成'];
        }

        //密码
        $pwd = trim($post['pwd']);
        if (empty($pwd)) {
            return ['result' => 'fail', 'info' => '请输入密码'];
        }
        if(strlen($pwd) < 6) {
            return ['result' => 'fail', 'info' => '密码6位或6位以上'];
        }
        $pwd_again = trim($post['pwd_again']);
        if (empty($pwd_again)) {
            return ['result' => 'fail', 'info' => '请输入再次密码'];
        }
        if ($pwd != $pwd_again) {
            return ['result' => 'fail', 'info' => '两次密码输入不一致'];
        }

        //取款密码
        $money_pwd = trim($post['money_pwd']);
        if (empty($money_pwd)) {
            return ['result' => 'fail', 'info' => '请输入取款密码'];
        }
        if(strlen($money_pwd) < 6) {
            return ['result' => 'fail', 'info' => '取款密码6位或6位以上'];
        }

        //手机
        $phone = trim($post['phone']);
        if (empty($phone)) {
            return ['result' => 'fail', 'info' => '请输入手机号码'];
        }
        if(strlen($phone) != 11) {
            return ['result' => 'fail', 'info' => '手机号码格式错误'];
        }


        if(!isset($post['code']) || !$post['code']) {
            return ['result' => 'fail', 'info' => '请输入验证码'];

        }
        $session = \Yii::$app->session;
        $code = $session->get('code');
        if($code != $post['code']) {
            return ['result' => 'fail', 'info' => '验证码错误'];
        }
        return $res;
    }

    /**
     * 验证码
     */
    public function actionCode()
    {
        $session = \Yii::$app->session;
        if (isset($session['code'])) {
            unset($session['code']);
        }

        $codeService = new codeService();
        $code = $codeService->getCode();
        $session->set('code',$code);
        $aa = $codeService->outImage();
        print_r($aa);
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
