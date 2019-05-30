<?php
namespace backend\module;

use app\models\RNoticeAgent;
use app\models\RPower;
use yii\web\Controller;
use backend\services\PowerService;
use app\models\RPositionPower;

class BaseController extends Controller
{
    public $adminInfo = [];

    public function init()
    {
        parent::init();

        $view = \YII::$app->view;

        //判断是否登录
        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        if($this->adminInfo && $this->adminInfo['expire_time'] > time()) {
        } else {
            $session->remove('adminInfo');
            header("location:/");
        }
        $adminInfo = \Yii::$app->session->get('adminInfo');
        $position_id = $adminInfo['position_id'];
        $view->params['position_id'] = $position_id;
        $view->params['agent_level'] = $adminInfo['agent_level'];

        $positionPower = RPositionPower::find()->select('power_id')->where(['position_id' => $position_id])->asArray()->all();
        $power_id = array_column($positionPower,'power_id');
        $view->params['power_id'] = $power_id;

        $positionPowerList = PowerService::getPowerList();
        $view->params['menu'] = $positionPowerList;

        //代理后台消息
        $noticeAgent = RNoticeAgent::find()->where(['status'=>1])->orderBy('id desc')->asArray()->one();
        $view->params['noticeAgent'] = $noticeAgent;

        //判断是否有权限操作
//        echo $this->module->id;
//        echo $this->id;
//        print_r($this->action->id) ;
//        die;
    }


}