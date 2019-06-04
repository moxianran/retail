<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user_exec_record".
 *
 * @property int $id
 * @property int $user_id 会员id
 * @property string $content 内容
 * @property string $ip
 * @property int $create_time
 * @property int $type 1管理 2会员
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
            [['user_id', 'create_time', 'type'], 'integer'],
            [['content'], 'required'],
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
            'user_id' => 'User ID',
            'content' => 'Content',
            'ip' => 'Ip',
            'create_time' => 'Create Time',
            'type' => 'Type',
        ];
    }
}
