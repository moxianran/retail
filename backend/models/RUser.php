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
 * @property int $money 余额
 * @property string $real_name 真实姓名
 * @property string $phone 手机
 * @property string $email 邮箱
 * @property string $qq qq
 * @property string $wechat 微信
 * @property string $bank_id 银行账号
 * @property int $agent_id 上级代理
 * @property string $create_ip 注册ip
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 * @property string $login_ip 登录ip
 * @property int $login_time 最后登录时间
 * @property string $domain 域名
 * @property int $status 状态 1 待审核 2通过 3拒绝
 * @property int $is_stop 是否停用 1是 2否
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
            [['account'], 'required'],
            [['money', 'agent_id', 'create_time', 'update_time', 'create_person', 'update_person', 'login_time', 'status', 'is_stop'], 'integer'],
            [['account', 'pwd', 'game_account', 'game_pwd', 'money_pwd', 'real_name', 'phone', 'email', 'qq', 'wechat', 'bank_id', 'create_ip', 'login_ip', 'domain'], 'string', 'max' => 255],
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
            'money' => 'Money',
            'real_name' => 'Real Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'qq' => 'Qq',
            'wechat' => 'Wechat',
            'bank_id' => 'Bank ID',
            'agent_id' => 'Agent ID',
            'create_ip' => 'Create Ip',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
            'login_ip' => 'Login Ip',
            'login_time' => 'Login Time',
            'domain' => 'Domain',
            'status' => 'Status',
            'is_stop' => 'Is Stop',
        ];
    }
}
