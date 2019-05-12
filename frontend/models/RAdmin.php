<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_admin".
 *
 * @property int $id
 * @property string $account 账号
 * @property string $pwd 密码
 * @property string $money_pwd 取款密码
 * @property string $real_name 真实姓名
 * @property string $phone 手机号码
 * @property string $email 邮箱
 * @property string $qq qq
 * @property string $wechat 微信
 * @property string $login_ip 登录ip
 * @property int $login_time 登录时间
 * @property int $position_id 职位id
 * @property int $status 状态 1正常 2 停用
 * @property int $examine_status 审核状态 1未审核 2通过 3不通过
 * @property int $is_delete 是否删除 1是2否
 * @property int $create_time 创建时间
 * @property int $update_time 修改时间
 * @property int $create_person 创建人
 * @property int $update_person 修改人
 * @property int $up_agent_id 上级代理
 * @property int $down_agent_id 下级代理
 * @property string $domain 域名
 * @property string $create_ip 注册ip
 * @property string $bank_id 银行卡号
 * @property int $agent_level 代理级别
 * @property int $stop_login_start 禁止登陆时间开始
 * @property int $stop_login_end 禁止登陆时间结束
 */
class RAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login_time', 'position_id', 'status', 'examine_status', 'is_delete', 'create_time', 'update_time', 'create_person', 'update_person', 'up_agent_id', 'down_agent_id', 'agent_level', 'stop_login_start', 'stop_login_end'], 'integer'],
            [['account', 'pwd', 'money_pwd', 'real_name', 'phone', 'email', 'qq', 'wechat', 'login_ip', 'domain', 'create_ip', 'bank_id'], 'string', 'max' => 255],
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
            'money_pwd' => 'Money Pwd',
            'real_name' => 'Real Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'qq' => 'Qq',
            'wechat' => 'Wechat',
            'login_ip' => 'Login Ip',
            'login_time' => 'Login Time',
            'position_id' => 'Position ID',
            'status' => 'Status',
            'examine_status' => 'Examine Status',
            'is_delete' => 'Is Delete',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
            'up_agent_id' => 'Up Agent ID',
            'down_agent_id' => 'Down Agent ID',
            'domain' => 'Domain',
            'create_ip' => 'Create Ip',
            'bank_id' => 'Bank ID',
            'agent_level' => 'Agent Level',
            'stop_login_start' => 'Stop Login Start',
            'stop_login_end' => 'Stop Login End',
        ];
    }
}
