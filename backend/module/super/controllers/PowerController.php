<?php

namespace backend\module\super\controllers;

use backend\services\PowerService;
use yii\data\Pagination;
use yii\web\Controller;


class PowerController extends Controller
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "超级管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
        //判断是否登录
        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        if (!$this->adminInfo) {
            return $this->redirect(['/login/login/login']);
        }
    }

    /**
     * 权限列表
     */
    public function actionPowerList()
    {
        $title = "权限列表";

        $get = \Yii::$app->request->get();
        $data = PowerService::getPositionList($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('powerList', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
        ]);
    }

    /**
     * 权限
     */
    public function actionPositionPower()
    {

        $position_id = $request = \Yii::$app->request->get('position_id');

        $positionInfo = PowerService::getPositionName($position_id);
        $title = $positionInfo['name']."权限";
        
        //获取职位权限
        $data = PowerService::getPositionPower($position_id);
        $data = array_column($data,'power_id');

        //获取权限列表
        $list = PowerService::getPowerList();

//        foreach ($list as $k => $v) {
//            if ($v['pid'] == 0) {
//              //  echo "<br />".$v['name'] . "<br />";
//                for ($i = 0; $i < count($list); $i++) {
//                    if($v['id'] == $list[$i]['pid']) {
//                        //echo  "<br />".$list[$i]['name']. "-<br />";
//                        for ($ii = 0; $ii < count($list); $ii++) {
//                            if($list[$i]['id'] == $list[$ii]['pid']) {
//                            //    echo $list[$i]['id']."=".$list[$ii]['name']."<br />";
//                            }
//
//                        }
//                    }
//                }
//            }
//        }

        return $this->render('positionPower', [
            'list' => $list,
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'position_id' => $position_id
        ]);
    }

    public function actionSavePower()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $res = PowerService::savePower($post);
            $json = ['result' => $res['type'], 'info' => $res['msg']];
            return $this->asJson($json);
        }
    }


}