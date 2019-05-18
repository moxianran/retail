<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_user_game".
 *
 * @property int $id
 * @property int $user_id 会员ID
 * @property int $game_id 游戏id
 * @property string $game_account 游戏账号
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 */
class RUserGame extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_user_game';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'game_id', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
            [['game_account'], 'string', 'max' => 255],
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
            'game_id' => 'Game ID',
            'game_account' => 'Game Account',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
