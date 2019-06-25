<?php

namespace backend\module\agent\controllers;

use app\models\RAdmin;
use backend\module\BaseController;
use backend\services\AgentService;
use backend\services\CommonService;
use yii\data\Pagination;

class AgentController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "代理管理";

    public function init()
    {
        parent::init();
    }

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
            'get' => $get,
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
            $res = AgentService::changeStatus($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }
    }

    /**
     * 删除
     */
    public function actionDel()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = AgentService::del($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
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
            $post['create_ip'] = $this->getRealIp();
            $res = AgentService::createAgent($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        //代理列表
        $agentList1 = AgentService::getAgentList(1);

        return $this->render('create',[
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList1' => $agentList1,
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
            $res = AgentService::editAgent($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }

        //代理列表
        $agentList1 = AgentService::getAgentList(1);

        $id = $request = \Yii::$app->request->get('id');
        $data = AgentService::getOne($id);

        $up_agent_info = RAdmin::find()->where(['id'=>$data['up_agent_id']])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'agentList1' => $agentList1,
            'up_agent_info' => $up_agent_info,
        ]);
    }

    /**
     * 导出代理
     */
    public function actionExportAgent()
    {
        CommonService::exportAgent(['position_id' => 3]);
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

    public function actionAgentSelect()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $id = $post['id'];
            $agent_level = $post['agent_level'];
            if(count($id) != 1) {
                $json = ['result' => 'fail','info'=>'操作失败'];
                return $this->asJson($json);
            }

            $where = [
                'up_agent_id' => $id['0'],
                'agent_level' => $agent_level,
            ];

            $agent = RAdmin::find()->where($where)->asArray()->all();
            $json = ['result' => 'success','info'=>$agent];
            return $this->asJson($json);
        }
    }


}
