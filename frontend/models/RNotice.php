<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_notice".
 *
 * @property int $id
 * @property int $admin_id 管理员id
 * @property string $content 内容
 * @property int $is_read 是否阅读 1是 2否
 * @property int $create_time
 * @property int $update_time
 */
class RNotice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'is_read', 'create_time', 'update_time'], 'integer'],
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
            'admin_id' => 'Admin ID',
            'content' => 'Content',
            'is_read' => 'Is Read',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
