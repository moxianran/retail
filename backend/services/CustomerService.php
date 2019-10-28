<?php
namespace backend\services;
use app\models\RAdmin;

class CustomerService
{
    /**
     * 客服列表
     * @param $params
     * @return array
     */
    public static function getList($params)
    {
        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //删选数组
        $cond = [];

        //姓名
        if(!empty($params['account'])) {
            $cond[] = ['like', 'account', $params['account']];
        }
        //姓名
        if(!empty($params['real_name'])) {
            $cond[] = ['like', 'real_name', $params['real_name']];
        }
        //域名
        if(!empty($params['domain'])) {
            $cond[] = ['like', 'domain', $params['domain']];
        }
        //手机
        if(!empty($params['phone'])) {
            $cond[] = ['=', 'phone', $params['phone']];
        }

        $offset = ($page - 1) * $pageSize;

        $where = [
            'position_id'=> 4, //客服
            'is_delete' => 2,   //未删除
        ];
        $query = RAdmin::find()->where($where);
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();


        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
        ];
    }

    /**
     * 创建客服
     * @param $params
     * @return array
     * @throws
     */
    public static function createCustomer($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $admin = new RAdmin();
        $admin->account = $params['account'];
        $admin->pwd = base64_encode($params['pwd']);
        $admin->real_name = $params['real_name'];
        $admin->phone = $params['phone'];
        $admin->email = $params['email'];
        $admin->qq = $params['qq'];
        $admin->wechat = $params['wechat'];
        $admin->create_ip = $params['create_ip'];
        $admin->create_time = time();
        $admin->examine_status = 2;
        $admin->position_id = 4;
        $admin->create_person = $adminInfo['id'];
        $res = $admin->insert();
        if($res) {
            $content = '创建了序号为'.$admin->id."的客服";
            LogService::writeLog($content);

            return ['type'=>'success','msg' => '操作成功'];
        } else {
            return ['type'=>'fail','msg' => '操作失败'];
        }
    }

    /**
     * 编辑客服
     * @param $params
     * @return array
     */
    public static function editCustomer($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $stop_login_start = strtotime($params['stop_login_start']);
        $stop_login_end = strtotime($params['stop_login_end']);
        if($stop_login_start <= 0 ){
            $stop_login_start = 0;
        }
        if($stop_login_end <= 0 ){
            $stop_login_end = 0;
        }

        $customerInfo = RAdmin::findOne($params['id']);

        $update_data = [
            'account' => $params['account'],
            'pwd' => base64_encode($params['pwd']),
            'real_name' => $params['real_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'qq' => $params['qq'],
            'wechat' => $params['wechat'],
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
            'stop_login_start' => $stop_login_start,
            'stop_login_end' => $stop_login_end,
        ];
        $res = RAdmin::updateAll($update_data, 'id = ' . $params['id']);
        if ($res) {


            $content = '编辑了序号为' . $params['id'] . "的客服:";

            $updateText = [
                'account' => '客服账号',
                'pwd' => '登录密码',
                'real_name' => '真实姓名',
                'phone' => '手机号码',
                'email' => '电子邮箱',
                'qq' => 'QQ',
                'wechat' => '微信',
                'stop_login_start' => '限制登录开始时间',
                'stop_login_end' => '限制登录结束时间',
            ];

            $editContent = '';
            foreach ($updateText as $k => $v) {
                if($customerInfo[$k] != $update_data[$k]) {
                    if($k == 'pwd') {
//                        $editContent.= $v.'修改为'.base64_decode($update_data[$k]).",";
                    } else if ($k == 'stop_login_start' || $k == 'stop_login_end'){
                        $editContent.= $v.'修改为'.date('Y-m-d',$update_data[$k]).",";
                    } else {
                        $editContent.= $v.'修改为'.$update_data[$k].",";
                    }
                }
            }

            LogService::writeLog($content.$editContent);

            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }

    /**
     * 获取单条记录
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function getOne($id)
    {
        $data = RAdmin::find()->where(['id' => $id,])->asArray()->one();
        $data['pwd'] = base64_decode($data['pwd']);
        return $data;
    }

    /**
     * 禁用和恢复正常
     * @param $params
     * @return array
     */
    public static function changeStatus($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'status' => $status,
            'update_time' => time(),
            'update_person' => $adminInfo['id']
        ];
        $res = RAdmin::updateAll($update_data, 'id = ' . $id);
        if ($res) {
            $status = $status == 1 ? '正常' : '停用';
            $content = '修改了序号为' . $params['id'] . "的客服:状态修改为".$status;
            LogService::writeLog($content);
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }
}