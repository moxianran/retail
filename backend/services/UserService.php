<?php
namespace backend\services;
use app\models\RUser;

class UserService {


    /**
     * 获取投注记录
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
            return ['type'=>'success'];
        } else {
            return ['type'=>'fail'];
        }
    }








}