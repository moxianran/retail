<?php

namespace backend\module\user\controllers;

use app\models\RUser;
use backend\module\BaseController;
use backend\services\AgentService;
use backend\services\UserService;
use yii\data\Pagination;

class UserController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "会员管理";
    public $adminInfo = [];

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
        $agentList = AgentService::getAgentList();

        return $this->render('create',[
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList' => $agentList,
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
        $agentList = AgentService::getAgentList();

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList' => $agentList,
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
