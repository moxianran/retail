<?php

namespace backend\module\super\controllers;

use backend\module\BaseController;
use backend\services\PowerService;
use yii\data\Pagination;

class PowerController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "超级管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
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
     * 职位权限
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

        return $this->render('positionPower', [
            'list' => $list,
            'data' => $data,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'position_id' => $position_id
        ]);
    }

    /**
     * 保存权限
     * @return \yii\web\Response
     */
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