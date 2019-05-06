<?php
namespace backend\services;
use app\models\RAdmin;

class AgentService {

    /**
     * 代理列表
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
            'position_id'=> 3, //代理
            'examine_status' => 2,//审核通过
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
     * 代理审核列表
     * @param $params
     * @return array
     */
    public static function getExamineList($params)
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
            'position_id'=> 3, //代理
            'examine_status' => 1,//审核通过
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
     * 新增代理
     * @param $params
     * @return array
     * @throws
     */
    public static function createAgent($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $admin = new RAdmin();
        $admin->account = $params['account'];
        $admin->pwd = $params['pwd'];
        $admin->real_name = $params['real_name'];
        $admin->phone = $params['phone'];
        $admin->email = $params['email'];
        $admin->qq = $params['qq'];
        $admin->wechat = $params['wechat'];
        $admin->bank_id = $params['bank_id'];
        $admin->up_agent_id = $params['up_agent_id'];
        $admin->create_ip = $params['create_ip'];
        $admin->create_time = time();
        $admin->position_id = 3;
        $admin->create_person = $adminInfo['id'];

        $res = $admin->insert();
        if($res) {
            return ['type'=>'success','msg' => '操作成功'];
        } else {
            return ['type'=>'fail','msg' => '操作失败'];
        }
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

    /**
     * 编辑代理
     * @param $params
     * @return array
     */
    public static function editAgent($params)
    {
        $update_data = [
            'account' => $params['account'],
            'pwd' => $params['pwd'],
            'real_name' => $params['real_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'qq' => $params['qq'],
            'wechat' => $params['wechat'],
            'bank_id' => $params['bank_id'],
            'up_agent_id' => $params['up_agent_id'],
            'domain' => $params['domain'],
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
     * 审核代理
     * @param $params
     * @return array
     */
    public static function examineAgent($params)
    {
        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'examine_status' => $status,
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

    /**
     * 获取代理列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAgentList()
    {
        $list = RAdmin::find()->where(['position_id'=>3,'is_delete'=>2])->asArray()->all();
        return $list;
    }

    /**
     * 代理新增记录
     * @param $params
     * @return array
     */
    public static function getAgentAddRecord($params)
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
//        if(!empty($params['real_name'])) {
//            $cond[] = ['like', 'real_name', $params['real_name']];
//        }
//        //域名
//        if(!empty($params['domain'])) {
//            $cond[] = ['like', 'domain', $params['domain']];
//        }
//        //手机
//        if(!empty($params['phone'])) {
//            $cond[] = ['=', 'phone', $params['phone']];
//        }

        $offset = ($page - 1) * $pageSize;

        $where = [
            'position_id' => 3 //代理
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
}


