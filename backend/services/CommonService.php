<?php

namespace backend\services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use app\models\RAdmin;
use app\models\RUser;
use app\models\RResult;
use app\models\RRechargeRecord;
use app\models\RBet;

class CommonService
{

    /**
     * 导出会员
     * @param $where
     */
    public static function exportUser($where)
    {
        $field = 'id,account,game_account,money,real_name,phone,email,qq,wechat,bank_id,agent_id,domain,status,is_stop';
        $data = RUser::find()->where($where)->select($field)->asArray()->all();


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