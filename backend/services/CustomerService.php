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
        $list = $query->offset($offset)->limit($pageSize)->asArray()->all();


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
        $admin = new RAdmin();
        $admin->account = $params['account'];
        $admin->pwd = $params['pwd'];
        $admin->real_name = $params['real_name'];
        $admin->phone = $params['phone'];
        $admin->email = $params['email'];
        $admin->qq = $params['qq'];
        $admin->wechat = $params['wechat'];
        $admin->create_ip = $params['create_ip'];
        $admin->create_time = time();
        $admin->position_id = 4;
        $res = $admin->insert();
        if($res) {
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
        $update_data = [
            'account' => $params['account'],
            'pwd' => $params['pwd'],
            'real_name' => $params['real_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'qq' => $params['qq'],
            'wechat' => $params['wechat'],
            'update_time' => time(),
        ];
        $res = RAdmin::updateAll($update_data, 'id = ' . $params['id']);
        if ($res) {
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
        return $data;
    }

    /**
     * 禁用和恢复正常
     * @param $params
     * @return array
     */
    public static function changeStatus($params)
    {
        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'status' => $status,
            'update_time' => time(),
            'update_person' => 1,
        ];
        $res = RAdmin::updateAll($update_data, 'id = ' . $id);
        if ($res) {
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }
}