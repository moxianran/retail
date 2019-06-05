<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user_exec_record".
 *
 * @property int $id
 * @property int $type 1管理 2会员
 * @property int $user_id 会员/管理id
 * @property string $content 内容
 * @property string $ip
 * @property int $create_time
 */
class RUserExecRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_user_exec_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'user_id', 'create_time'], 'integer'],
            [['content', 'ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'user_id' => 'User ID',
            'content' => 'Content',
            'ip' => 'Ip',
            'create_time' => 'Create Time',
        ];
    }
}
