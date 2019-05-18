<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user".
 *
 * @property int $id
 * @property string $account 账号
 * @property string $pwd 密码
 * @property string $money_pwd 取款密码
 * @property int $money 余额
 * @property string $real_name 真实姓名
 * @property string $phone 手机
 * @property string $email 邮箱
 * @property string $qq qq
 * @property string $bank_id 银行账号
 * @property int $agent_id 上级代理
 * @property string $create_ip 注册ip
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 * @property string $domain 域名
 * @property int $status 状态 1 待审核 2通过 3拒绝
 * @property int $is_stop 是否停用 1是 2否
 * @property int $is_delete 是否删除 1是2否
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
            [['money', 'agent_id', 'create_time', 'update_time', 'create_person', 'update_person', 'status', 'is_stop', 'is_delete'], 'integer'],
            [['account', 'pwd', 'money_pwd', 'real_name', 'phone', 'email', 'qq', 'bank_id', 'create_ip', 'domain'], 'string', 'max' => 255],
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
            'money' => 'Money',
            'real_name' => 'Real Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'qq' => 'Qq',
            'bank_id' => 'Bank ID',
            'agent_id' => 'Agent ID',
            'create_ip' => 'Create Ip',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
            'domain' => 'Domain',
            'status' => 'Status',
            'is_stop' => 'Is Stop',
            'is_delete' => 'Is Delete',
        ];
    }
}
