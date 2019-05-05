<?php

namespace backend\services;

use app\models\RNoticeAgent;

class NoticeAgentService
{

    /**
     * 获取列表
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

        $query = RNoticeAgent::find()->where(['status' => [1,2]]);

        //获取总数
        $count = $query->count();

        //获取分页数据
        $offset = ($page - 1) * $pageSize;
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
        ];
    }

    /**
     * 创建
     * @param $params
     * @return array
     * @throws
     */
    public static function createNotice($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $notice = new RNoticeAgent();
        $notice->title = $params['title'];
        $notice->content = $params['content'];
        $notice->create_time = time();
        $notice->update_time = time();
        $notice->create_person = $adminInfo['id'];
        $notice->update_person = $adminInfo['id'];
        $notice->status = $params['status'];
        $res = $notice->insert();
        if ($res) {
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }

    /**
     * 编辑
     * @param $params
     * @return array
     */
    public static function editNotice($params)
    {
        $session = \Yii::$app->session;
        $adminInfo = $session->get('adminInfo');

        $update_data = [
            'title' => $params['title'],
            'content' => $params['content'],
            'status' => $params['status'],
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
        ];
        $res = RNoticeAgent::updateAll($update_data, 'id = ' . $params['id']);

        if ($res) {
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }


    /**
     * 获取单条信息
     * @param $id
     * @return array|bool|\yii\db\ActiveRecord|null
     */
    public static function getOne($id)
    {
        $res = RNoticeAgent::find()->where(['id'=> $id])->asArray()->one();
        return $res;
    }

    /**
     * 修改状态
     * @param $params
     * @return array
     */
    public static function changeStatus($params)
    {
        $update_data = [
            'status' => $params['status'],
            'update_time' => time(),
            'update_person' => 1,
        ];
        $res = RNoticeAgent::updateAll($update_data,'id = '.$params['id']);
        if ($res) {
            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }






}
