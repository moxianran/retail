<?php

namespace backend\module\super\controllers;

use app\models\RAdmin;
use app\models\RBet;
use app\models\RRechargeRecord;
use app\models\RResult;
use app\models\RUser;
use backend\module\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportController extends BaseController
{
    public $enableCsrfValidation = false;
    public $moduleTitle = "超级管理";
    public $adminInfo = [];

    public function init()
    {
        parent::init();
        //判断是否登录
        $session = \Yii::$app->session;
        $this->adminInfo = $session->get('adminInfo');
        if (!$this->adminInfo) {
            return $this->redirect(['/login/login/login']);
        }
    }

    /**
     * 列表
     */
    public function actionList()
    {
        return $this->render('list');
    }

    private function export($fileName,$data,$title)
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

    /**
     * 导出会员
     */
    public function actionExportUser()
    {
        $field = 'id,account,game_account,money,real_name,phone,email,qq,wechat,bank_id,agent_id,domain,status,is_stop';
        $data = RUser::find()->where(['status' => 2])->select($field)->asArray()->all();


        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agent = array_column($agent,'real_name','id');

        if($data) {
            foreach ($data as $k => $v) {
                $data[$k]['agent_id'] = $agent[$v['agent_id']] ?? '暂无';

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
                '编号', '账号', '游戏账号', '余额', '真实姓名', '手机', '邮箱', 'QQ', '微信',
                '银行账号', '上级代理', '域名', '状态', '是否停用'
            ],
        ];

        $this->export('会员',$data,$title);
    }

    /**
     * 导出代理
     */
    public function actionExportAgent()
    {
        $field = 'id,account,real_name,phone,email,qq,wechat,up_agent_id,domain,create_time,create_ip';
        $data = RAdmin::find()->select($field)->where(['position_id'=>3])->asArray()->all();
        $title = [
            [
                '序号', '代理帐号', '真实姓名', '手机号码', '电子邮箱', '邮箱', 'QQ', '微信',
                '上级代理', '注册域名', '注册时间', '区域ip'
            ],
        ];
        $this->export('代理',$data,$title);
    }

    /**
     * 导出客服
     */
    public function actionExportCustomer()
    {
        $field = 'id,account,real_name,phone,email,qq,wechat';
        $data = RAdmin::find()->select($field)->where(['position_id' => 4])->asArray()->all();
        $title = [
            [
                '序号', '客服帐号', '真实姓名', '手机号码', '电子邮箱', '邮箱', 'QQ', '微信'
            ],
        ];
        $this->export('客服', $data, $title);
    }

    /**
     * 导出主管
     */
    public function actionExportDirector()
    {
        $field = 'id,account,real_name,phone,email,qq,wechat';
        $data = RAdmin::find()->select($field)->where(['position_id' => 5])->asArray()->all();
        $title = [
            [
                '序号', '客服帐号', '真实姓名', '手机号码', '电子邮箱', '邮箱', 'QQ', '微信'
            ],
        ];
        $this->export('主管', $data, $title);
    }

    /**
     * 导出投注记录
     */
    public function actionExportBet()
    {

        $field = 'id,game_title,platform_id,series_id,game_id,user_id,bet_desc,bet_time,bet_money,bet_result,code_clear_num,settlement_time,';
        $field .='settlement_money,account_money,area,other';
        $data = RBet::find()->select($field)->asArray()->all();
        $title = [
            [
                '序号','游戏','台号','靴号','局好','会员','投注信息','投注时间','投注金额',
                '投注结果','洗码量','结算时间','结算金额','账号余额','区域','其他'
            ],
        ];
        $this->export('投注记录', $data, $title);
    }


    /**
     * 导出充值记录
     */
    public function actionExportRecharge()
    {
        $field = 'id,game_type,settlement_type,user_id,agent_id,operator_id,create_time';
        $data = RRechargeRecord::find()->select($field)->asArray()->all();
        $title = [
            [
                '序号','游戏类型','结算类型','用户名称','代理名称','操作员','充值时间'
            ],
        ];
        $this->export('充值记录', $data, $title);
    }

    /**
     * 导出输赢记录
     */
    public function actionExportResult()
    {
        $field = 'id,type,user_id,money,bet_times,success_times,bet_money,success_money,all_clear_code_num,success_clear_code_num,';
        $field .= 'clear_code_type,clear_code_money,clear_code_lv,person_money,company_money';
        $data = RResult::find()->select($field)->asArray()->all();
        $title = [
            [
                '序号','类型','账号','姓名','当前余额','投注次数','有效次数',
                '投注金额','有效金额','总洗码量','有效码量','洗码类型','洗码比率','洗码佣金',
                '个人上水金额','公司上水金额',

            ],
        ];
        $this->export('输赢记录', $data, $title);
    }

}