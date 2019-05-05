<?php

namespace backend\module\user\controllers;

use backend\services\UserService;
use backend\services\AgentService;
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
            $json = ['result' => $res['type'],'info'=>$res['mag']];
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
     * 编辑会员
     */
    public function actionEdit()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $update_data = [
                'account' => $post['account'],
                'game_account' => $post['game_account'],
                'pwd' => $post['pwd'],
                'game_pwd' => $post['game_pwd'],
                'money_pwd' => $post['money_pwd'],
                'real_name' => $post['real_name'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'qq' => $post['qq'],
                'wechat' => $post['wechat'],
                'bank_id' => $post['bank_id'],
                'register_domain' => $post['register_domain'],
                'register_ip' => 1,
                'update_time' => time(),
            ];
            $res = RUser::updateAll($update_data,'id = '.$post['id']);
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


        $id = $request = \Yii::$app->request->get('id');
        $data = RUser::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
        ]);
    }

    /**
     * 会员审核
     */
    public function actionExamine()
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

        $list = RUser::find()->where([
            'status'=> 1,
        ])->asArray()->all();

        return $this->render('examine', [
            'list' => $list,
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

            $id = $post['id'];
            $isStop = $post['isStop'];

            $update_data = [
                'is_stop' => $isStop,
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
     * 会员在线列表
     * @return string
     */
    public function actionOnline()
    {
        $list = RUser::find()->where([
            'is_login'=> 1,
        ])->asArray()->all();

        return $this->render('online', [
            'list' => $list,
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
                'is_login' => 2,
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
