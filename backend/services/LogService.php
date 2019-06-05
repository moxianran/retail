<?php

namespace backend\services;

use app\models\RUserExecRecord;


class LogService
{

    public static function writeLog($content)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $model = new RUserExecRecord();
        $model->user_id = $adminInfo['id'];
        $model->type = 1;
        $model->content = $content;
        $model->ip = CommonService::getRealIp();
        $model->create_time = time();
        $model->insert();
    }

}