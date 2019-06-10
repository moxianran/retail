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
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();
        if ($list) {
            foreach ($list as $k => $v) {
                $agentName = RAdmin::find()->where(['id' => $v['up_agent_id']])->asArray()->one();
                $list[$k]['agentName'] = $agentName['real_name'] ?? '无';
            }
        }

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
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();
        if ($list) {
            foreach ($list as $k => $v) {
                $agentName = RAdmin::find()->where(['id' => $v['up_agent_id']])->asArray()->one();
                $list[$k]['agentName'] = $agentName['real_name'] ?? '无';
            }
        }
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

        $agent_id = 0;
        if($params['up_agent_id1'] != 0 && $params['up_agent_id2'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }

        if($params['up_agent_id1'] == 0 && $params['up_agent_id2'] == 0) {
            $agent_id = 0;
        } else {
            if($params['up_agent_id1'] != 0) {
                $agent_id = $params['up_agent_id1'];
            } else if($params['up_agent_id2'] != 0) {
                $agent_id = $params['up_agent_id2'];
            }
        }

        if($agent_id > 0) {
            $upAgent = RAdmin::find()->where(['id'=>$agent_id])->asArray()->one();
            $agent_level = $upAgent['agent_level'] + 1;
        } else {
            $agent_level = 1;
        }

        $admin = new RAdmin();
        $admin->account = $params['account'];
        $admin->pwd = base64_encode($params['pwd']);
        $admin->real_name = $params['real_name'];
        $admin->phone = $params['phone'];
        $admin->email = $params['email'];
        $admin->qq = $params['qq'];
        $admin->wechat = $params['wechat'];
        $admin->bank_id = $params['bank_id'];
        $admin->up_agent_id = $agent_id;
        $admin->create_ip = $params['create_ip'];
        $admin->create_time = time();
        $admin->position_id = 3;
        $admin->agent_level = $agent_level;
        $admin->create_person = $adminInfo['id'];
        $admin->domain = $params['domain'];

        $res = $admin->insert();
        if($res) {
            $content = '创建了序号为' . $admin->id . "的代理";
            LogService::writeLog($content);

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
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'status' => $status,
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
        ];
        $res = RAdmin::updateAll($update_data, 'id = ' . $id);
        if ($res) {

            $status = $status == 1 ? '正常' : '停用';
            $content = '修改了序号为' . $params['id'] . "的代理:状态修改为".$status;
            LogService::writeLog($content);

            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }

    /**
     * 删除
     * @param $params
     * @return array
     */
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
        $res = RAdmin::updateAll($update_data, 'id = ' . $id);
        if ($res) {
            $content = '删除了序号为' . $params['id'] . "的代理";
            LogService::writeLog($content);
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
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $agent_id = 0;

        if($params['up_agent_id1'] != 0 && $params['up_agent_id2'] != 0) {
            return ['type'=>'fail','msg' => '上级代理只能选一个'];
        }

        if($params['up_agent_id1'] == 0 && $params['up_agent_id2'] == 0) {
            $agent_id = 0;
        } else {
            if($params['up_agent_id1'] != 0) {
                $agent_id = $params['up_agent_id1'];
            } else if($params['up_agent_id2'] != 0) {
                $agent_id = $params['up_agent_id2'];
            }
        }

        $agentInfo = RAdmin::findOne($params['id']);


        $update_data = [
            'account' => $params['account'],
            'pwd' => base64_encode($params['pwd']),
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

        $update_data['up_agent_id'] = $agent_id;

        $res = RAdmin::updateAll($update_data, 'id = ' . $params['id']);
        if ($res) {

            $content = '编辑了序号为' . $params['id'] . "的代理:";


            $updateText = [
                'account' => '代理账号',
                'pwd' => '登录密码',
                'real_name' => '真实姓名',
                'phone' => '手机号码',
                'email' => '电子邮箱',
                'qq' => 'QQ',
                'wechat' => '微信',
                'bank_id' => '银行卡号',
                'domain' => '注册域名',
                'up_agent_id' => '上级代理',
            ];

            $editContent = '';
            foreach ($updateText as $k => $v) {
                if($agentInfo[$k] != $update_data[$k]) {
                    if($k == 'pwd') {
                        $editContent.= $v.'修改为'.base64_decode($update_data[$k]).",";
                    } else if ($k == 'up_agent_id'){
                        $agent_accout = RAdmin::find()->where(['id'=>$update_data[$k]])->asArray()->one();

                        $editContent.= $v.'修改为'.$agent_accout['account'].",";
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
     * 审核代理
     * @param $params
     * @return array
     */
    public static function examineAgent($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');
        $id = $params['id'];
        $status = $params['status'];

        $update_data = [
            'examine_status' => $status,
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
        ];
        $res = RAdmin::updateAll($update_data, 'id = ' . $id);
        if ($res) {
            $status = $status == 2 ? '通过' : '不通过';
            $content = '审核了序号为' . $params['id'] . "的代理:审核状态修改为".$status;
            LogService::writeLog($content);
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }

    /**
     * 获取代理列表
     * @param int $agent_level
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAgentList($agent_level = 0)
    {
        $where = [
            'position_id'=>3,
            'is_delete'=>2,
            'examine_status'=>2
        ];
        if($agent_level != 0) {
            $where['agent_level'] = $agent_level;
        }

        $list = RAdmin::find()->where($where)->asArray()->all();
        return $list;
    }


    /**
     * 代理新增记录
     * @param $params
     * @return array
     */
    public static function getAgentAddRecord($params)
    {

        $agent = RAdmin::find()->where(['position_id' => 3])->asArray()->all();
        $agentNames = array_column($agent, 'real_name', 'id');
        $agentLevels = array_column($agent, 'agent_level', 'id');

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

        $where = ['position_id' => 3];
        $query = RAdmin::find()->where($where);
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();
        foreach ($list as $k => $v) {
            if(isset($agentNames[$v['up_agent_id']]) && !empty($agentNames[$v['up_agent_id']])) {
                $agentName = $agentNames[$v['up_agent_id']];

                if($agentLevels[$v['up_agent_id']] == 1) {
                    $agendLevel = '(一级)';
                } else if($agentLevels[$v['up_agent_id']] == 2) {
                    $agendLevel = '(二级)';
                } else if($agentLevels[$v['up_agent_id']] == 3) {
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


