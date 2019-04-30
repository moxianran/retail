<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_bet".
 *
 * @property int $id
 * @property string $game_title 游戏名称
 * @property int $series_id 靴号
 * @property int $platform_id 台号
 * @property int $game_id 局号
 * @property int $user_id 会员id
 * @property string $bet_desc 投注信息
 * @property int $bet_time 投注时间
 * @property int $bet_money 投注金额
 * @property int $bet_result 投注结果
 * @property int $code_clear_num 洗码量
 * @property int $settlement_time 结算时间
 * @property int $settlement_money 结算金额
 * @property int $account_money 账号余额
 * @property string $area 区域
 * @property string $other 其他
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 */
class RBet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_bet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['series_id', 'platform_id', 'game_id', 'user_id', 'bet_time', 'bet_money', 'bet_result', 'code_clear_num', 'settlement_time', 'settlement_money', 'account_money', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
            [['game_title', 'bet_desc', 'area', 'other'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_title' => 'Game Title',
            'series_id' => 'Series ID',
            'platform_id' => 'Platform ID',
            'game_id' => 'Game ID',
            'user_id' => 'User ID',
            'bet_desc' => 'Bet Desc',
            'bet_time' => 'Bet Time',
            'bet_money' => 'Bet Money',
            'bet_result' => 'Bet Result',
            'code_clear_num' => 'Code Clear Num',
            'settlement_time' => 'Settlement Time',
            'settlement_money' => 'Settlement Money',
            'account_money' => 'Account Money',
            'area' => 'Area',
            'other' => 'Other',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
