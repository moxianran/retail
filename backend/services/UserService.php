<?php
namespace backend\services;

use app\models\RAdmin;
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
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();
        if ($list) {
            foreach ($list as $k => $v) {
                $agentName = RAdmin::find()->where(['id' => $v['agent_id']])->asArray()->one();
                $list[$k]['agentName'] = $agentName['real_name'];
            }
        }

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
        ];
    }

    /**
     * 会员审核列表
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
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();


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
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();


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
        $user->pwd = base64_encode($params['pwd']);
        $user->game_pwd = base64_encode($params['game_pwd']);
        $user->money_pwd = base64_encode($params['money_pwd']);
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
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $update_data = [
            'account' => $params['account'],
            'game_account' => $params['game_account'],
            'pwd' => base64_encode($params['pwd']),
            'game_pwd' => base64_encode($params['game_pwd']),
            'money_pwd' => base64_encode($params['money_pwd']),
            'real_name' => $params['real_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'qq' => $params['qq'],
            'wechat' => $params['wechat'],
            'bank_id' => $params['bank_id'],
            'domain' => $params['domain'],
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
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
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'status' => $status,
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
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
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $id = $params['id'];
        $isStop = $params['isStop'];

        $update_data = [
            'is_stop' => $isStop,
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
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
        $data = RUser::find()->where(['id'=> $id,])->asArray()->one();
        $data['pwd'] = base64_decode($data['pwd']);
        $data['game_pwd'] = base64_decode($data['game_pwd']);
        $data['money_pwd'] = base64_decode($data['money_pwd']);
        return $data;
    }


    /**
     * 会员新增记录
     * @param $params
     * @return array
     */
    public static function getUserAddRecord($params)
    {
        if(isset($params['type']) && !empty($params['type'])) {
            $type = (int) $params['type'];
        } else {
            $type = 0;
        }
        $cond = [];

        switch ($type) {
            case 1 ://今日
                $start = strtotime(date("Y-m-d"));
                $end = strtotime(date("Y-m-d")) + 86399;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 2 ://昨日
                $start = strtotime(date("Y-m-d")) - 86400;
                $end = strtotime(date("Y-m-d"));
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 3 ://本周
                $startDate =  date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600));
                $start = strtotime($startDate);
                $endDate = date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600));
                $end = strtotime($endDate) + 86399;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 4 ://上周
                $startDate =  date('Y-m-d', strtotime('-1 monday', time()));
                $start = strtotime($startDate);
                $endDate = date('Y-m-d', strtotime('-1 sunday', time()));
                $end = strtotime($endDate) + 86399;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 5 ://本月
                $start = strtotime(date("Y-m-01"));
                $end = strtotime(date("Y-m-01",strtotime('+1 month'))) - 1;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 6 ://上月
                $start = strtotime(date("Y-m-01",strtotime('-1 month')));
                $end = strtotime(date("Y-m-01")) - 1;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 7 ://本季度
                $season = ceil((date('n'))/3);//当月是第几季度
                $startDate = date('Y-m-d H:i:s', mktime(0, 0, 0,$season*3-3+1,1,date('Y')));
                $start = strtotime($startDate);
                $endDate =  date('Y-m-d H:i:s', mktime(23,59,59,$season*3,date('t',mktime(0, 0 , 0,$season*3,1,date("Y"))),date('Y')));
                $end = strtotime($endDate);
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 8 ://上季度
                $season = ceil((date('n'))/3)-1;
                $startDate = date('Y-m-d H:i:s', mktime(0, 0, 0,$season*3-3+1,1,date('Y')));
                $start = strtotime($startDate);
                $endDate =  date('Y-m-d H:i:s', mktime(23,59,59,$season*3,date('t',mktime(0, 0 , 0,$season*3,1,date("Y"))),date('Y')));
                $end = strtotime($endDate);
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            default:
                break;
        }


        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //删选数组

        $offset = ($page - 1) * $pageSize;

        $where = [];
        $query = RUser::find()->where($where);
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
            'type' => $type,
        ];
    }


}