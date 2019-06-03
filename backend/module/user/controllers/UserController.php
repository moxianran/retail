<?php

namespace backend\module\user\controllers;

use app\models\RGame;
use app\models\RUserGame;
use backend\module\BaseController;
use backend\services\AgentService;
use backend\services\CommonService;
use backend\services\UserService;
use yii\data\Pagination;

class UserController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "会员管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 会员列表
     * @return string
     */
    public function actionList()
    {
        $title = '会员列表';
        $get = \Yii::$app->request->get();

        $data = UserService::getList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('list', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'get' => $get
        ]);
    }

    /**
     * 新增
     */
    public function actionCreate()
    {
        $title = '新增会员';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $post['create_ip'] = $this->getRealIp();
            $res = UserService::createUser($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        //代理列表
        $agentList1 = AgentService::getAgentList(1);
        $agentList2 = AgentService::getAgentList(2);
        $agentList3 = AgentService::getAgentList(3);

        return $this->render('create',[
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList1' => $agentList1,
            'agentList2' => $agentList2,
            'agentList3' => $agentList3,
        ]);
    }

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $title = '编辑会员';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = UserService::editUser($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        //获取会员信息
        $id = $request = \Yii::$app->request->get('id');
        $data = UserService::getOne($id);

        //获取代理列表
        $agentList1 = AgentService::getAgentList(1);
        $agentList2 = AgentService::getAgentList(2);
        $agentList3 = AgentService::getAgentList(3);

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList1' => $agentList1,
            'agentList2' => $agentList2,
            'agentList3' => $agentList3,
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
            $res = UserService::changeStop($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }
    }

    /**
     * 导出会员列表
     */
    public function actionExportUser()
    {
        CommonService::exportUser(['status' => 2]);
    }

    /**
     * 删除
     */
    public function actionDel()
    {
        if (\Yii::$app->request->isPost) {
        $post = \Yii::$app->request->post();
        $res = UserService::del($post);
        $json = ['result' => $res['type'],'info'=>$res['msg']];
        return $this->asJson($json);
        }
    }

    /**
     * 添加游戏账号
     */
    public function actionAddGameAccount()
    {
        $title = '添加游戏账号';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $session = \Yii::$app->session;
            $adminInfo = $session->get('adminInfo');

            $id = $post['id'];
            foreach ($post as $k => $v) {
                if($k != 'id') {

                    $where = [
                        'user_id' => $id,
                        'game_id' => $k
                    ];
                    $userGame = RUserGame::find()->where($where)->asArray()->one();

                    if($userGame) {

                        $update_data = [
                            'game_account' => $v,
                            'update_time' => time(),
                            'update_person' => $adminInfo['id'],
                        ];
                        RUserGame::updateAll($update_data,'id = '.$userGame['id']);

                    } else {
                        $user = new RUserGame();
                        $user->user_id = $id;
                        $user->game_id = $k;
                        $user->game_account = $v;
                        $user->create_time = time();
                        $user->create_person = $adminInfo['id'];
                        $user->insert();
                    }
                }
            }

            $json = ['result' => 'success','info'=>'添加成功'];
            return $this->asJson($json);
        }

        $allGame = RGame::find()->where([])->asArray()->all();

        $id = $request = \Yii::$app->request->get('id');
        $data = RUserGame::find()->where(['user_id' => $id])->asArray()->all();
        $data = array_column($data,'game_account','game_id');

        return $this->render('addGameAccount', [
            'allGame' => $allGame,
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'id' => $id
        ]);

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
