<?php

namespace backend\services;

use app\models\RAdmin;
use app\models\RBet;
use app\models\RRechargeRecord;
use app\models\RResult;
use app\models\RUser;
use app\models\RGame;
use app\models\RGameRecord;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class CommonService
{

    public static function getRealIp(){
        $ip=false;
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
            if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
            for ($i=0; $i < count($ips); $i++){
                if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
                    $ip=$ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }



    /**
     * 导出会员
     * @param $where
     */
    public static function exportUser($where)
    {
        $where['is_delete'] = 2;
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
        $where['is_delete'] = 2;
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
        $list = RBet::find()->asArray()->all();

        $user = RUser::find()->asArray()->all();
        $real_name = array_column($user, 'real_name', 'id');
        $newList = [];
        if ($list) {

            //游戏名称
            $game = RGame::find()->asArray()->all();
            $game = array_column($game, 'name', 'id');

            foreach ($list as $k => $v) {

                $newList[$k]['id'] = $v['id'];

                $gameRecord = RGameRecord::find()->where(['id' => $v['game_record_id']])->asArray()->one();
                $newList[$k]['gameTitle'] = $game[$gameRecord['game_id']] ?? '--';

                $newList[$k]['series_id'] = $gameRecord['series_id'];
                $newList[$k]['platform_id'] = $gameRecord['platform_id'];
                $newList[$k]['inning_id'] = $gameRecord['inning_id'];
                $newList[$k]['user_id'] = $real_name[$v['user_id']] ?? '暂无';

                $betDesc = '投注了';
                if ($v['bet_door'] == 1) {
                    $betDesc .= "庄";
                } else if ($v['bet_door'] == 2) {
                    $betDesc .= "闲";
                } else if ($v['bet_door'] == 3) {
                    $betDesc .= "平";
                } else if ($v['bet_door'] == 4) {
                    $betDesc .= "庄对";
                } else if ($v['bet_door'] == 5) {
                    $betDesc .= "闲对";
                }
                $betDesc .= $v['bet_money'] / 100 . "元";
                $newList[$k]['bet_desc'] = $betDesc;
                $newList[$k]['bet_time'] = date("Y-m-d H:i:s",$v['bet_time']);
                $newList[$k]['bet_money'] = $v['bet_money'];

                $bet_result = '';
                if ($v['bet_result'] == 1) {
                    $bet_result = "庄";
                } else if ($v['bet_result'] == 2) {
                    $bet_result = "闲";
                } else if ($v['bet_result'] == 3) {
                    $bet_result = "平";
                } else if ($v['bet_result'] == 4) {
                    $bet_result = "庄对";
                } else if ($v['bet_result'] == 5) {
                    $bet_result = "闲对";
                }
                $newList[$k]['bet_result'] = $bet_result;
                $newList[$k]['code_clear_num'] = $v['code_clear_num'];

                if($v['bet_result'] == '0') {
                    $newList[$k]['bet_result'] = '平';
                } else if($v['bet_result'] == '1'){
                    $newList[$k]['bet_result'] = '胜';
                } else if($v['bet_result'] == '2'){
                    $newList[$k]['bet_result'] = '负';
                }

                $newList[$k]['settlement_time'] = date("Y-m-d H:i:s",$v['settlement_time']);
                $newList[$k]['settlement_money'] = $v['settlement_money'] / 100;
                $newList[$k]['account_money'] = $v['account_money'] / 100;
                $newList[$k]['ip'] = $v['ip'];
            }
        }
        $title = [
            [
                '序号', '游戏', '桌好', '场', '次', '会员', '投注信息', '投注时间', '投注金额',
                '投注结果', '洗码量', '结算时间', '结算金额', '账号余额', '区域ip'
            ],
        ];

        CommonService::export('投注记录', $newList, $title);
    }

    /**
     * 充值记录
     */
    public static function exportRecharge()
    {
        $settlementTypeArr = [
            '1' => '微信',
            '2' => '支付宝'
        ];

        $game = RGame::find()->asArray()->all();
        $game = array_column($game,'name','id');

        $data = RRechargeRecord::find()->asArray()->all();

        $user = RUser::find()->where([])->asArray()->all();
        $userName = array_column($user,'real_name','id');

        $upAgentIds = array_column($user,'agent_id','id');

        $agent = RAdmin::find()->where([])->asArray()->all();
        $agent = array_column($agent,'real_name','id');


        if ($data) {
            $returnList = [];
            foreach ($data as $k => $v) {
                $returnList[$k]['id'] = $v['id'];
                $returnList[$k]['game'] = $game[$v['game_id']] ?? '暂无';
                $returnList[$k]['settlement_type'] = $settlementTypeArr[$v['type']] ?? '暂无';
                $returnList[$k]['userName'] = $userName[$v['user_id']] ?? '暂无';
                $returnList[$k]['agentName'] = $agent[$upAgentIds[$v['user_id']]] ?? '暂无';
                $returnList[$k]['operator_id'] = $agent[$v['operator_id']] ?? '暂无';
                $returnList[$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
            }
        }
        $title = [
            [
                '序号', '游戏', '结算类型', '用户名称', '代理名称', '操作员', '充值时间'
            ],
        ];

        CommonService::export('充值记录', $returnList, $title);
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

        $field = 'id,game_id,user_id,money,bet_times,success_times,bet_money,success_money,all_clear_code_num,success_clear_code_num,';
        $field .= 'clear_code_type,clear_code_money,clear_code_lv,person_money,company_money';
        $data = RResult::find()->select($field)->asArray()->all();

        $user = RUser::find()->where([])->asArray()->all();
        $user = array_column($user, 'account', 'id');
        if ($data) {
            foreach ($data as $k => $v) {
                $data[$k]['game_id'] = $gameTypeArr[$v['game_id']] ?? '暂无';
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