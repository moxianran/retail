<?php

namespace backend\module\admin\controllers;


use backend\services\DirectorService;
use yii\web\Controller;
use app\models\RAdmin;
use yii\data\Pagination;

/**
 * Default controller for the `admin` module
 */
class DirectorController extends Controller
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "主管管理";
    public $adminInfo = [];

    /**
     * 主管列表
     * @return string
     */
    public function actionList()
    {

        $title = '主管列表';
        $get = \Yii::$app->request->get();

        $data = DirectorService::getList($get);
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
        $title = '新增主管';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $post['create_ip'] = $this->getRealIp();
            $res = DirectorService::createDirector($post);
            $json = ['result' => $res['type'],'info'=>$res['msg']];
            return $this->asJson($json);
        }

        return $this->render('create',[
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 编辑
     */
    public function actionEdit()
    {
        $title = '编辑主管';

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

        $id = $request = \Yii::$app->request->get('id');
        $data = RAdmin::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
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
