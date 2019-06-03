<?php
namespace backend\services;

use app\models\RAdmin;
use app\models\RUser;
use app\models\RUserLoginRecord;

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

        //账号
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

        $where = ['status' => 2, 'is_delete' => 2];

        //代理只能看到自己的会员信息
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');
        if($adminInfo['position_id'] == 3) {
            $where['agent_id'] = $adminInfo['id'];
        }

        $query = RUser::find()->where($where);
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
                $list[$k]['agentName'] = $agentName['real_name'] ?? '暂无';
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
        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agentNames = array_column($agent,'real_name','id');
        $agentLevels = array_column($agent,'agent_level','id');

        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //删选数组
        $cond = [];

        //账号
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

        $query = RUser::find()->where(['status'=>1]);
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();
        foreach ($list as $k => $v) {

            if(isset($agentNames[$v['agent_id']]) && !empty($agentNames[$v['agent_id']])) {
                $agentName = $agentNames[$v['agent_id']];

                if($agentLevels[$v['agent_id']] == 1) {
                    $agendLevel = '(一级)';
                } else if($agentLevels[$v['agent_id']] == 2) {
                    $agendLevel = '(二级)';
                } else if($agentLevels[$v['agent_id']] == 3) {
                    $agendLevel = '(三级)';
                } else {
                    $agendLevel = '';
                }
                $agentName.= $agendLevel;
            } else {
                $agentName = '暂无';
            }
            $list[$k]['agentName'] = $agentName;
        }

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
        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agentNames = array_column($agent,'real_name','id');
        $agentLevels = array_column($agent,'agent_level','id');

        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //删选数组
        $cond = [];
        $cond[] = ['>', 'expire_time', time()];

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

        $query = RUser::find()->where([]);
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();

        if ($list) {
            foreach ($list as $k => $v) {
                $login_record = RUserLoginRecord::find()->where(['user_id' => $v['id']])->orderBy('id desc')->asArray()->one();
                $list[$k]['login_time'] = $login_record['login_time'];
                $list[$k]['login_ip'] = $login_record['login_ip'];

                if(isset($agentNames[$v['agent_id']]) && !empty($agentNames[$v['agent_id']])) {
                    $agentName = $agentNames[$v['agent_id']];

                    if($agentLevels[$v['agent_id']] == 1) {
                        $agendLevel = '(一级)';
                    } else if($agentLevels[$v['agent_id']] == 2) {
                        $agendLevel = '(二级)';
                    } else if($agentLevels[$v['agent_id']] == 3) {
                        $agendLevel = '(三级)';
                    } else {
                        $agendLevel = '';
                    }
                    $agentName.= $agendLevel;
                } else {
                    $agentName = '暂无';
                }
                $list[$k]['agentName'] = $agentName;

            }
        }

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

        $agent_id = 0;

        if($params['agent_id1'] != 0 && $params['agent_id2'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }
        if($params['agent_id2'] != 0 && $params['agent_id3'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }
        if($params['agent_id1'] != 0 && $params['agent_id3'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }

        if($params['agent_id1'] == 0 && $params['agent_id2'] == 0 && $params['agent_id3'] == 0) {
            $agent_id = 0;
        } else {
            if($params['agent_id1'] != 0) {
                $agent_id = $params['agent_id1'];
            } else if($params['agent_id2'] != 0) {
                $agent_id = $params['agent_id2'];
            } else if($params['agent_id3'] != 0) {
                $agent_id = $params['agent_id3'];
            }
        }


        $user = new RUser();
        $user->account = $params['account'];
        $user->pwd = base64_encode($params['pwd']);
        $user->money_pwd = base64_encode($params['money_pwd']);
        $user->real_name = $params['real_name'];
        $user->phone = $params['phone'];
        $user->email = $params['email'];
        $user->qq = $params['qq'];
        $user->bank_id = $params['bank_id'];
        $user->agent_id = $agent_id;
        $user->domain = $params['domain'];
        $user->create_ip = $params['create_ip'];
        $user->create_time = time();
        $user->update_time = time();
        $user->create_person = $adminInfo['id'];
        $user->update_person = $adminInfo['id'];
        $user->status = 1;
        $user->is_stop = $params['is_stop'];
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
            'pwd' => base64_encode($params['pwd']),
            'money_pwd' => base64_encode($params['money_pwd']),
            'real_name' => $params['real_name'],
            'phone' => $params['phone'],
            'email' => $params['email'],
            'qq' => $params['qq'],
            'bank_id' => $params['bank_id'],
            'domain' => $params['domain'],
            'is_stop' => $params['is_stop'],
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
        ];


        $agent_id = 0;

        if($params['agent_id1'] != 0 && $params['agent_id2'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }
        if($params['agent_id2'] != 0 && $params['agent_id3'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }
        if($params['agent_id1'] != 0 && $params['agent_id3'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }

        if($params['agent_id1'] == 0 && $params['agent_id2'] == 0 && $params['agent_id3'] == 0) {
            $agent_id = 0;
        } else {
            if($params['agent_id1'] != 0) {
                $agent_id = $params['agent_id1'];
            } else if($params['agent_id2'] != 0) {
                $agent_id = $params['agent_id2'];
            } else if($params['agent_id3'] != 0) {
                $agent_id = $params['agent_id3'];
            }
        }
        $update_data['agent_id'] = $agent_id;

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

    public static function del($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');
        $id = $params['id'];

        $update_data = [
            'is_delete' => 1,
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
        ];
        $res = RUser::updateAll($update_data, 'id = ' . $id);
        if ($res) {
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
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

        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agentNames = array_column($agent,'real_name','id');
        $agentLevels = array_column($agent,'agent_level','id');

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

        foreach ($list as $k => $v) {
            if(isset($agentNames[$v['agent_id']]) && !empty($agentNames[$v['agent_id']])) {
                $agentName = $agentNames[$v['agent_id']];

                if($agentLevels[$v['agent_id']] == 1) {
                    $agendLevel = '(一级)';
                } else if($agentLevels[$v['agent_id']] == 2) {
                    $agendLevel = '(二级)';
                } else if($agentLevels[$v['agent_id']] == 3) {
                    $agendLevel = '(三级)';
                } else {
                    $agendLevel = '';
                }
                $agentName.= $agendLevel;
            } else {
                $agentName = '暂无';
            }
            $list[$k]['agentName'] = $agentName;

        }

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
            'type' => $type,
        ];
    }


}