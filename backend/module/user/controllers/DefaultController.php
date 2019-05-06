<?php

namespace backend\module\user\controllers;

use app\models\RUser;
use backend\services\AgentService;
use backend\services\UserService;
use yii\data\Pagination;
use yii\web\Controller;

class DefaultController extends Controller
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
     * 会员审核
     */
    public function actionExamine()
    {
        $title = '会员审核';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = UserService::examineUser($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }


        $get = \Yii::$app->request->get();

        $data = UserService::getExamineList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('examine', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'get' => $get
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
     * 会员在线列表???
     * @return string
     */
    public function actionOnline()
    {
        $title = '会员在线列表';

//        $adminInfo = \Yii::$app->session->get('adminInfo');

        $get = \Yii::$app->request->get();

        $data = UserService::getOnlineList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('online', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'get' => $get
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
//                'is_login' => 2,
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
