<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_position_power".
 *
 * @property int $id
 * @property int $position_id 职位id
 * @property int $power_id 权限id
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 */
class RPositionPower extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_position_power';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_id', 'power_id'], 'required'],
            [['position_id', 'power_id', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position_id' => 'Position ID',
            'power_id' => 'Power ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
