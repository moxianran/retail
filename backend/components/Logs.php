<?php

namespace backend\components;

use Yii;
use yii\helpers\Url;

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

        // 具体要记录什么东西，自己来优化$description
        if (!empty($event->changedAttributes)) {
            $desc = '';
            foreach ($event->changedAttributes as $name => $value) {
                $desc .= $name . ' : ' . $value . '=>' . $event->sender->getAttribute($name) . ',';
            }
            $desc = substr($desc, 0, -1);

            if(isset($adminInfo) && !empty($adminInfo)) {
                $description = $adminInfo['real_name'] . '修改了' . $event->sender->className() . 'id:' . $event->sender->primaryKey()[0] . '的' . $desc;
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
}