<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_notice_system".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $content 内容
 * @property int $status 状态 1 正常 2禁用 3 删除
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 */
class RNoticeSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_notice_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'status', 'create_time', 'update_time', 'create_person', 'update_person'], 'required'],
            [['status', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
