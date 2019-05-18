<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_game_record".
 *
 * @property int $id
 * @property int $game_id 游戏类型id
 * @property int $series_id 卓号
 * @property int $platform_id 场号
 * @property int $inning_id 次号
 * @property string $banker 庄家
 * @property string $player 闲家
 * @property int $create_time
 */
class RGameRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_game_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_id', 'series_id', 'platform_id', 'inning_id', 'create_time'], 'integer'],
            [['banker', 'player'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'series_id' => 'Series ID',
            'platform_id' => 'Platform ID',
            'inning_id' => 'Inning ID',
            'banker' => 'Banker',
            'player' => 'Player',
            'create_time' => 'Create Time',
        ];
    }
}
