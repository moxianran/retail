<?php

namespace backend\module\admin\controllers;

use yii\web\Controller;
use app\models\RAdmin;
use yii\data\Pagination;
use backend\services\AgentService;

/**
 * Default controller for the `admin` module
 */
class AgentController extends Controller
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "代理管理";
    public $adminInfo = [];

    /**
     * 代理列表
     * @return string
     */
    public function actionList()
    {

        $title = '代理列表';
        $get = \Yii::$app->request->get();

        $data = AgentService::getList($get);
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
     * 禁用和恢复正常
     * @return \yii\web\Response
     */
    public function actionChangeStatus()
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
            $res = RAdmin::updateAll($update_data,'id = '.$id);
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
     * 新增
     */
    public function actionCreate()
    {

        $title = '新增代理';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $post = \Yii::$app->request->post();
            $post['create_ip'] = $this->getRealIp();
            $res = AgentService::createAgent($post);
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
        $title = '编辑代理';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();


            $update_data = [
                'account' => $post['account'],
                'pwd' => $post['pwd'],
                'real_name' => $post['real_name'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'qq' => $post['qq'],
                'wechat' => $post['wechat'],
                'bank_id' => $post['bank_id'],
                'up_agent_id' => $post['up_agent_id'],
                'domain' => $post['domain'],
                'update_time' => time(),
            ];
            $res = RAdmin::updateAll($update_data,'id = '.$post['id']);
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

        //代理列表
        $agentList = AgentService::getAgentList();

        $id = $request = \Yii::$app->request->get('id');
        $data = RAdmin::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList' => $agentList,
        ]);
    }


    /**
     * 审核
     */
    public function actionExamine()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $id = $post['id'];
            $status = $post['status'];

            $update_data = [
                'examine_status' => $status,
                'update_time' => time(),
                'update_person' => 1,
            ];
            $res = RAdmin::updateAll($update_data,'id = '.$id);
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

        $title = '代理审核';
        $get = \Yii::$app->request->get();

        $data = AgentService::getExamineList($get);
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
