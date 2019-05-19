<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user_login_record".
 *
 * @property int $id
 * @property int $user_id 会员id
 * @property int $login_time 登录时间
 * @property string $login_ip 登录ip
 */
class RUserLoginRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_user_login_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'login_time'], 'integer'],
            [['login_time', 'login_ip'], 'required'],
            [['login_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'login_time' => 'Login Time',
            'login_ip' => 'Login Ip',
        ];
    }
}
