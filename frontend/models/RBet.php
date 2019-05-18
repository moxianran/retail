<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_bet".
 *
 * @property int $id
 * @property int $game_record_id 游戏记录类型
 * @property int $user_id 会员id
 * @property int $bet_time 投注时间
 * @property int $bet_door 投注 1 庄 2 闲 3和 4庄对 5闲对
 * @property int $bet_money 投注金额
 * @property int $bet_result 投注结果 1 庄 2 闲 3和 4庄对 5闲对
 * @property int $result_money 输赢金额
 * @property int $code_clear_num 洗码量
 * @property int $settlement_time 结算时间
 * @property int $settlement_money 结算金额
 * @property int $account_money 账号余额
 * @property string $ip 区域ip
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
            [['game_record_id', 'user_id', 'bet_time', 'bet_door', 'bet_money', 'bet_result', 'result_money', 'code_clear_num', 'settlement_time', 'settlement_money', 'account_money', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
            [['ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_record_id' => 'Game Record ID',
            'user_id' => 'User ID',
            'bet_time' => 'Bet Time',
            'bet_door' => 'Bet Door',
            'bet_money' => 'Bet Money',
            'bet_result' => 'Bet Result',
            'result_money' => 'Result Money',
            'code_clear_num' => 'Code Clear Num',
            'settlement_time' => 'Settlement Time',
            'settlement_money' => 'Settlement Money',
            'account_money' => 'Account Money',
            'ip' => 'Ip',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
