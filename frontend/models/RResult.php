<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_result".
 *
 * @property int $id
 * @property int $game_id 游戏类型
 * @property int $game_area_id 游戏厅id
 * @property int $user_id 用户id
 * @property int $money 余额
 * @property int $bet_times 投注次数
 * @property int $bet_money 投注金额
 * @property int $success_money 有效金额
 * @property int $all_clear_code_num 总洗码量
 * @property int $success_clear_code_num 有效洗码
 * @property int $clear_code_type 洗码类型
 * @property int $clear_code_money 洗码金额
 * @property int $clear_code_lv 洗码率
 * @property int $person_money 个人上水金额
 * @property int $company_money 公司上水金额
 * @property int $success_times 有效次数
 * @property int $create_time
 * @property int $update_time
 * @property int $create_person
 * @property int $update_person
 */
class RResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'r_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_id', 'game_area_id', 'user_id', 'money', 'bet_times', 'bet_money', 'success_money', 'all_clear_code_num', 'success_clear_code_num', 'clear_code_type', 'clear_code_money', 'clear_code_lv', 'person_money', 'company_money', 'success_times', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
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
            'game_area_id' => 'Game Area ID',
            'user_id' => 'User ID',
            'money' => 'Money',
            'bet_times' => 'Bet Times',
            'bet_money' => 'Bet Money',
            'success_money' => 'Success Money',
            'all_clear_code_num' => 'All Clear Code Num',
            'success_clear_code_num' => 'Success Clear Code Num',
            'clear_code_type' => 'Clear Code Type',
            'clear_code_money' => 'Clear Code Money',
            'clear_code_lv' => 'Clear Code Lv',
            'person_money' => 'Person Money',
            'company_money' => 'Company Money',
            'success_times' => 'Success Times',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
