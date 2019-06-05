<?php

namespace backend\components;

use yii\db\ActiveRecord;

class Logs
{
    public static function write($event)
    {
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
        $ip = $ip ? $ip : $_SERVER['REMOTE_ADDR'];

        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        if ($event->name == ActiveRecord::EVENT_AFTER_INSERT) {
            $description = "%s新增了表%s %s:%s的%s";
        } else if ($event->name == ActiveRecord::EVENT_AFTER_UPDATE) {
            $description = "%s修改了表%s %s:%s的%s";
        } else {
            $description = "%s删除了表%s %s:%s%s";
        }

        if (!empty($event->changedAttributes)) {
            $desc = '';

            foreach ($event->changedAttributes as $name => $value) {
                $desc .= $name . ' : ' . $value . '=>' . $event->sender->getAttribute($name) . ',';
            }
            $desc = substr($desc, 0, -1);
        } else {
            $desc = '';
        }

        if (isset($adminInfo) && !empty($adminInfo)) {

            $tableName = $event->sender->tableSchema->name;
            $description = sprintf($description, '', $tableName, $event->sender->primaryKey()[0], $event->sender->getPrimaryKey(), $desc);

            $data = [
                'type' => 1,
                'ip' => $ip,
                'content' => $description,
                'create_time' => time(),
                'user_id' => $adminInfo['id'],
            ];
            $model = new \app\models\RUserExecRecord();
            $model->setAttributes($data);
            $model->save();

        }
    }
}