<?php
namespace backend\services;
use app\models\RAdmin;

class AgentService {

    public static function getAgentList()
    {
        $list = RAdmin::find()->where(['position_id'=>3,'is_delete'=>2])->asArray()->all();
        return $list;
    }




}


