<?php

namespace backend\services;

use app\models\RAdmin;
use app\models\RBet;
use app\models\RRechargeRecord;
use app\models\RResult;
use app\models\RUser;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class CommonService
{

    /**
     * 导出会员
     * @param $where
     */
    public static function exportUser($where)
    {
        $field = 'id,account,money,real_name,phone,email,qq,bank_id,agent_id,domain,status,is_stop';
        $data = RUser::find()->where($where)->select($field)->asArray()->all();


        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agent = array_column($agent,'real_name','id');

        if($data) {
            foreach ($data as $k => $v) {
                $data[$k]['agent_id'] = $agent[$v['agent_id']] ?? '暂无';

                $data[$k]['money'] = $v['money'] / 100;


                if($v['status'] == 1) {
                    $data[$k]['status'] = '待审核';
                } else if($v['status'] == 2) {
                    $data[$k]['status'] = '通过';
                } else if($v['status'] == 3) {
                    $data[$k]['status'] = '拒绝';
                }

                if($v['is_stop'] == 1) {
                    $data[$k]['is_stop'] = '是';
                } else {
                    $data[$k]['is_stop'] = '否';
                }

            }
        }

        $title = [
            [
                '编号', '账号', '余额', '真实姓名', '手机', '邮箱', 'QQ/微信',
                '银行账号', '上级代理', '域名', '状态', '是否停用'
            ],
        ];

        CommonService::export('会员列表',$data,$title);
    }


    /**
     * 导出代理
     * @param $where
     */
    public static function exportAgent($where)
    {
        $field = 'id,account,real_name,phone,email,qq,wechat,up_agent_id,domain,create_time,create_ip';
        $data = RAdmin::find()->select($field)->where($where)->asArray()->all();

        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agent = array_column($agent,'real_name','id');

        if($data) {
            foreach ($data as $k => $v) {
                $data[$k]['up_agent_id'] = $agent[$v['up_agent_id']] ?? '暂无';
                $data[$k]['create_time'] = date("Y-m-d H:i:s",$v['create_time']);
            }
        }

        $title = [
            [
                '序号', '代理帐号', '真实姓名', '手机号码', '电子邮箱', 'QQ', '微信',
                '上级代理', '注册域名', '注册时间', '区域ip'
            ],
        ];
        CommonService::export('代理列表',$data,$title);
    }

    /**
     * 导出客服
     * @param $where
     */
    public static function exportCustomer($where)
    {
        $field = 'id,account,real_name,phone,email,qq,wechat';
        $data = RAdmin::find()->select($field)->where($where)->asArray()->all();
        $title = [
            [
                '序号', '客服帐号', '真实姓名', '手机号码', '电子邮箱', 'QQ', '微信'
            ],
        ];
        CommonService::export('客服列表', $data, $title);
    }

    /**
     * 导出主管
     * @param $where
     */
    public static function exportDirector($where)
    {
        $field = 'id,account,real_name,phone,email,qq,wechat';
        $data = RAdmin::find()->select($field)->where($where)->asArray()->all();
        $title = [
            [
                '序号', '客服帐号', '真实姓名', '手机号码', '电子邮箱', 'QQ', '微信'
            ],
        ];
        CommonService::export('主管列表', $data, $title);
    }


    /**
     * 投注记录
     */
    public static function exportBet()
    {
        $field = 'id,game_title,platform_id,series_id,game_id,user_id,bet_desc,bet_time,bet_money,bet_result,code_clear_num,settlement_time,';
        $field .= 'settlement_money,account_money,area,other';
        $data = RBet::find()->select($field)->asArray()->all();

        $user = RUser::find()->asArray()->one();
        $real_name = array_column($user, 'real_name', 'id');

        if ($data) {
            foreach ($data as $k => $v) {
                $data[$k]['user_id'] = $real_name[$v['user_id']] ?? '暂无';
            }
        }
        $title = [
            [
                '序号', '游戏', '台号', '靴号', '局好', '会员', '投注信息', '投注时间', '投注金额',
                '投注结果', '洗码量', '结算时间', '结算金额', '账号余额', '区域', '其他'
            ],
        ];
        CommonService::export('投注记录', $data, $title);
    }

    /**
     * 充值记录
     */
    public static function exportRecharge()
    {

        $gameTypeArr = [
            '1' => '牌',
            '2' => '彩票'
        ];
        $settlementTypeArr = [
            '1' => '微信',
            '2' => '支付宝'
        ];

        $user = RUser::find()->where([])->asArray()->all();
        $user = array_column($user, 'real_name', 'id');

        $admin = RAdmin::find()->where([])->asArray()->all();
        $admin = array_column($admin, 'real_name', 'id');

        $field = 'id,game_type,settlement_type,user_id,agent_id,operator_id,create_time';
        $data = RRechargeRecord::find()->select($field)->asArray()->all();

        if ($data) {
            foreach ($data as $k => $v) {
                $data[$k]['game_type'] = $gameTypeArr[$v['game_type']] ?? '暂无';
                $data[$k]['settlement_type'] = $settlementTypeArr[$v['settlement_type']] ?? '暂无';
                $data[$k]['user_id'] = $user[$v['user_id']] ?? '暂无';
                $data[$k]['agent_id'] = $admin[$v['agent_id']] ?? '暂无';
                $data[$k]['operator_id'] = $admin[$v['operator_id']] ?? '暂无';
                $data[$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
            }
        }
        $title = [
            [
                '序号', '游戏类型', '结算类型', '用户名称', '代理名称', '操作员', '充值时间'
            ],
        ];
        CommonService::export('充值记录', $data, $title);
    }

    /**
     * 导出输赢列表
     */
    public static function exportResult()
    {
        $gameTypeArr = [
            '1' => '牌',
            '2' => '彩票'
        ];

        $field = 'id,game_type,user_id,money,bet_times,success_times,bet_money,success_money,all_clear_code_num,success_clear_code_num,';
        $field .= 'clear_code_type,clear_code_money,clear_code_lv,person_money,company_money';
        $data = RResult::find()->select($field)->asArray()->all();

        $user = RUser::find()->where([])->asArray()->all();
        $user = array_column($user, 'account', 'id');
        if ($data) {
            foreach ($data as $k => $v) {
                $data[$k]['game_type'] = $gameTypeArr[$v['game_type']] ?? '暂无';
                $data[$k]['user_id'] = $user[$v['user_id']] ?? '暂无';
            }
        }

        $title = [
            [
                '序号', '类型', '账号', '当前余额', '投注次数', '有效次数',
                '投注金额', '有效金额', '总洗码量', '有效码量', '洗码类型', '洗码比率', '洗码佣金',
                '个人上水金额', '公司上水金额',
            ],
        ];
        CommonService::export('输赢记录', $data, $title);
    }



    public static function export($fileName, $data, $title)
    {
        set_time_limit(0);
        $arrData = array_merge($title, $data);
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray($arrData);
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');//告诉浏览器输出浏览器名称
        header('Cache-Control: max-age=0');//禁止缓存
        $writer->save('php://output');
    }

}