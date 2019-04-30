<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_recharge_record".
 *
 * @property int $id
 * @property int $game_type 游戏类型
 * @property int $settlement_type 结算类型
 * @property int $user_id 用户id
 * @property int $agent_id 代理id
 * @property int $operator_id 操作员
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
            [['game_type', 'settlement_type', 'user_id', 'agent_id', 'operator_id', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
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
            'settlement_type' => 'Settlement Type',
            'user_id' => 'User ID',
            'agent_id' => 'Agent ID',
            'operator_id' => 'Operator ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
