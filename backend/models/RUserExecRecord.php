<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user_exec_record".
 *
 * @property int $id
 * @property int $user_id 会员id
 * @property string $content 内容
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
            [['user_id', 'create_time'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string', 'max' => 255],
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
            'create_time' => 'Create Time',
        ];
    }
}
