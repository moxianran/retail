<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_power".
 *
 * @property int $id
 * @property string $module 模块
 * @property string $controller 控制器
 * @property string $action 方法
 */
class RPower extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_power';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module', 'controller', 'action'], 'required'],
            [['module', 'controller', 'action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
        ];
    }
}
