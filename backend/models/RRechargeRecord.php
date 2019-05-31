<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_recharge_record".
 *
 * @property int $id
 * @property int $game_type 游戏类型
 * @property int $user_id 用户id
 * @property int $type 充值类型
 * @property int $money 充值金额
 * @property int $balance 余额
 * @property int $operator_id 操作员
 * @property string $ip ip
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 */
class RRechargeRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_recharge_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_type', 'user_id', 'type', 'money', 'balance', 'operator_id', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
            [['ip'], 'required'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_type' => 'Game Type',
            'user_id' => 'User ID',
            'type' => 'Type',
            'money' => 'Money',
            'balance' => 'Balance',
            'operator_id' => 'Operator ID',
            'ip' => 'Ip',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
