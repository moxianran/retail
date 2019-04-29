<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user".
 *
 * @property int $id
 * @property string $account 账号
 * @property string $pwd 密码
 * @property string $game_account 游戏账号
 * @property string $game_pwd 游戏密码
 * @property string $money_pwd 取款密码
 * @property string $real_name 真实姓名
 * @property string $phone 手机
 * @property string $email 邮箱
 * @property string $qq qq
 * @property string $wechat 微信
 * @property string $bank_id 银行账号
 * @property int $agent_id 上级代理
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 * @property string $login_ip
 * @property int $login_time
 * @property string $register_ip
 * @property int $register_time
 * @property string $register_domain
 * @property int $status 状态 1 待审核 2通过 3拒绝
 * @property int $is_stop 是否停用 1是 2否
 * @property int $is_login 是否登录 1是 2否
 */
class RUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'bank_id'], 'required'],
            [['agent_id', 'create_time', 'update_time', 'create_person', 'update_person', 'login_time', 'register_time', 'status', 'is_stop', 'is_login'], 'integer'],
            [['account', 'pwd', 'game_account', 'game_pwd', 'money_pwd', 'real_name', 'phone', 'email', 'qq', 'wechat', 'bank_id', 'login_ip', 'register_ip', 'register_domain'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => 'Account',
            'pwd' => 'Pwd',
            'game_account' => 'Game Account',
            'game_pwd' => 'Game Pwd',
            'money_pwd' => 'Money Pwd',
            'real_name' => 'Real Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'qq' => 'Qq',
            'wechat' => 'Wechat',
            'bank_id' => 'Bank ID',
            'agent_id' => 'Agent ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
            'login_ip' => 'Login Ip',
            'login_time' => 'Login Time',
            'register_ip' => 'Register Ip',
            'register_time' => 'Register Time',
            'register_domain' => 'Register Domain',
            'status' => 'Status',
            'is_stop' => 'Is Stop',
            'is_login' => 'Is Login',
        ];
    }
}
