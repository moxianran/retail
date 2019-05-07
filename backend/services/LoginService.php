<?php
namespace backend\services;
use app\models\RAdmin;
use app\models\RPosition;


class LoginService
{

    /**
     * 登录
     * @param $account
     * @param $pwd
     * @return array
     */
    public static function login($account,$pwd,$ip)
    {
        $admin = RAdmin::find()->where(['account' => $account,'is_delete' => 2])->asArray()->one();
        //判断账号是否存在
        if(!$admin) {
            return ['type' => 'fail','msg' => '该账号不存在'];
        }

        //判断账号是否被禁用
        if($admin['status'] == '2') {
            return['type' => 'fail','msg' => '该账号已停用'];
        }

        //判断账号是否被审核
        if($admin['examine_status'] == '1') {
            return['type' => 'fail','msg' => '该账号仍在审核中'];
        }
        if($admin['examine_status'] == '3') {
            return['type' => 'fail','msg' => '该账号审核失败'];
        }
        if($admin['examine_status'] != '2') {
            return['type' => 'fail','msg' => '该账号仍在审核中'];
        }

        //密码错误
        if($admin['pwd'] != base64_encode($pwd)) {
            return ['type' => 'fail','msg' => '密码错误'];
        }

        //获取职位列表
        $positionData = RPosition::find()->asArray()->all();
        $positionData = array_column($positionData,'name','id');

        //设置最后登录时间和ip
        $update_data = [
            'login_ip' => $ip,
            'login_time' => time(),
            'update_time' => time(),
        ];
        RAdmin::updateAll($update_data,'id = '.$admin['id']);

        //设置session
        $session = \Yii::$app->session;
        $adminInfo = [
            'id' => $admin['id'],
            'real_name' => $admin['real_name'],
            'position_id' => $admin['position_id'],
            'positionName' => $positionData[$admin['position_id']] ?? '暂无',
        ];

        $session->set('adminInfo' ,$adminInfo);

        return ['type' => 'success','msg' => '操作成功'];
    }




}