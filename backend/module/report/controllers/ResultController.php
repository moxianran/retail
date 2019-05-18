<?php

namespace backend\module\report\controllers;

use app\models\RUser;
use backend\module\BaseController;
use backend\services\ResultService;
use yii\data\Pagination;

class ResultController extends BaseController
{

    public $pageSize = 10;
    public $enableCsrfValidation = false;
    public $moduleTitle = "通知管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 输赢记录
     */
    public function actionResultRecord()
    {
        $title = "输赢记录";

        $get = \Yii::$app->request->get();
        $data = ResultService::getlist($get);

        //获取全部用户
        $user = RUser::find('id,real_name')->where(['status' => 2])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        return $this->render('resultRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'game_type' => $data['game_type'],
            'settlement_type' => $data['settlement_type'],
        ]);
    }
}
