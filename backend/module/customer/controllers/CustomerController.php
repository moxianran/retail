<?php

namespace backend\module\customer\controllers;

use backend\module\BaseController;
use backend\services\CommonService;
use backend\services\CustomerService;
use yii\data\Pagination;

class CustomerController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "客服管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 客服列表
     * @return string
     */
    public function actionList()
    {
        $title = '客服列表';
        $get = \Yii::$app->request->get();

        $data = CustomerService::getList($get);
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
            $res = CustomerService::changeStatus($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }
    }

    /**
     * 新增
     */
    public function actionCreate()
    {
        $title = '新增客服';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $post['create_ip'] = $this->getRealIp();
            $res = CustomerService::createCustomer($post);
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
        $title = '编辑客服';

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $res = CustomerService::editCustomer($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }

        $id = $request = \Yii::$app->request->get('id');
        $data = CustomerService::getOne($id);

        return $this->render('edit', [
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 导出客服
     */
    public function actionExportCustomer()
    {
        CommonService::exportCustomer(['position_id' => 4]);
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
