<?php

namespace backend\module\report\controllers;

use app\models\RGame;
use app\models\RUser;
use backend\module\BaseController;
use backend\services\BetService;
use yii\data\Pagination;

class BetController extends BaseController
{

    public $pageSize = 10;
    public $moduleTitle = "报表管理";
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

        //游戏列表
        $game = RGame::find()->asArray()->all();
        $game = array_column($game,'name','id');

        //游戏厅列表
        $gameArea = [
            '1' => '腾龙厅',
            '2' => '百胜厅',
        ];


        return $this->render('betRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'title' => $title,
            'moduleTitle' => $this->moduleTitle,
            'user' => $user,
            'game' => $game,
            'gameArea' => $gameArea,
        ]);
    }

}
