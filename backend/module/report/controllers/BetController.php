<?php

namespace backend\module\report\controllers;

use app\models\RUser;
use backend\module\BaseController;
use backend\services\BetService;
use yii\data\Pagination;

class BetController extends BaseController
{

    public $pageSize = 10;
    public $moduleTitle = "通知管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
    }

    /**
     * 投注记录
     */
    public function actionBetRecord()
    {
        $title = "投注记录";

        $get = \Yii::$app->request->get();
        $data = BetService::getlist($get);
        $pagination = new Pagination(['totalCount' => $data['count'], 'pageSize' => $data['pageSize']]);

        //用户下拉列表
        $user = RUser::find()->where([])->asArray()->all();

        return $this->render('betRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'user' => $user,
        ]);
    }

}
