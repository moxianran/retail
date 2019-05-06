<?php
namespace backend\services;
use app\models\RUser;

class UserService {

    /**
     * 会员列表
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

        $query = RUser::find()->where(['status'=>2]);
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
     * 会员列表
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

        $query = RUser::find()->where(['status'=>1]);
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
     * 会员在线列表
     * @param $params
     * @return array
     */
    public static function getOnlineList($params)
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

        $query = RUser::find()->where(['status'=>1]);
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
     * 新增会员
     * @param $params
     * @return array
     * @throws
     */
    public static function createUser($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $user = new RUser();
        $user->account = $params['account'];
        $user->game_account = $params['game_account'];
        $user->pwd = $params['pwd'];
        $user->game_pwd = $params['game_pwd'];
        $user->money_pwd = $params['money_pwd'];
        $user->real_name = $params['real_name'];
        $user->phone = $params['phone'];
        $user->email = $params['email'];
        $user->qq = $params['qq'];
        $user->wechat = $params['wechat'];
        $user->bank_id = $params['bank_id'];
        $user->agent_id = $params['agent_id'];
        $user->domain = $params['domain'];
        $user->create_ip = $params['create_ip'];
        $user->create_time = time();
        $user->update_time = time();
        $user->create_person = $adminInfo['id'];
        $user->update_person = $adminInfo['id'];
        $user->login_ip = 0;
        $user->login_time = 0;
        $user->status = 1;
        $user->is_stop = 2;
        $res = $user->insert();
        if($res) {
            return ['type'=>'success','msg' => '操作成功'];
        } else {
            return ['type'=>'fail','msg' => '操作失败'];
        }
    }

    /**
     * 编辑会员
     * @param $params
     * @return array
     */
    public static function editUser($params)
    {
        $update_data = [
            'account' => $params['account'],
            'game_account' => $params['game_account'],
            'pwd' => $params['pwd'],
            'game_pwd' => $params['game_pwd'],
            'money_pwd' => $params['money_pwd'],
            'real_name' => $params['real_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'qq' => $params['qq'],
            'wechat' => $params['wechat'],
            'bank_id' => $params['bank_id'],
            'domain' => $params['domain'],
            'update_time' => time(),
        ];
        $res = RUser::updateAll($update_data,'id = '.$params['id']);
        if($res) {
            return ['type'=>'success','msg' => '操作成功'];
        } else {
            return ['type'=>'fail','msg' => '操作失败'];
        }
    }

    /**
     * 审核会员
     * @param $params
     * @return array
     */
    public static function examineUser($params)
    {
        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'status' => $status,
            'update_time' => time(),
            'update_person' => 1,
        ];
        $res = RUser::updateAll($update_data,'id = '.$id);
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
    public static function changeStop($params)
    {
        $id = $params['id'];
        $isStop = $params['isStop'];
        
        $update_data = [
            'is_stop' => $isStop,
            'update_time' => time(),
            'update_person' => 1,
        ];
        $res = RUser::updateAll($update_data,'id = '.$id);
        if($res) {
            return ['type'=>'success','msg' => '操作成功'];
        } else {
            return ['type'=>'fail','msg' => '操作失败'];
        }
    }

    /**
     * 获取单条数据
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function getOne($id)
    {
        $data = RUser::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();
        return $data;
    }


    /**
     * 会员新增记录
     * @param $params
     * @return array
     */
    public static function getUserAddRecord($params)
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

        $where = [];
        $query = RUser::find()->where($where);
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