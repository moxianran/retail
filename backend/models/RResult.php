<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "r_result".
 *
 * @property int $id
 * @property int $type
 * @property int $user_id
 * @property int $money
 * @property int $bet_times
 * @property int $bet_money
 * @property int $success_money
 * @property int $all_clear_code_num
 * @property int $success_clear_code_num
 * @property int $clear_code_type
 * @property int $clear_code_money
 * @property int $person_money
 * @property int $company_money
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
            [['type', 'user_id', 'money', 'bet_times', 'bet_money', 'success_money', 'all_clear_code_num', 'success_clear_code_num', 'clear_code_type', 'clear_code_money', 'person_money', 'company_money', 'create_time', 'update_time', 'create_person', 'update_person'], 'integer'],
            [['success_clear_code_num'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'user_id' => 'User ID',
            'money' => 'Money',
            'bet_times' => 'Bet Times',
            'bet_money' => 'Bet Money',
            'success_money' => 'Success Money',
            'all_clear_code_num' => 'All Clear Code Num',
            'success_clear_code_num' => 'Success Clear Code Num',
            'clear_code_type' => 'Clear Code Type',
            'clear_code_money' => 'Clear Code Money',
            'person_money' => 'Person Money',
            'company_money' => 'Company Money',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_person' => 'Create Person',
            'update_person' => 'Update Person',
        ];
    }
}
