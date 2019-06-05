<?php

namespace backend\services;

use app\models\RNoticeWebsite;
use app\models\RUserExecRecord;
use backend\services\LogService;

class NoticeWebsiteService
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

        $query = RNoticeWebsite::find()->where(['status' => [1,2]]);

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

        $notice = new RNoticeWebsite();
        $notice->title = $params['title'];
        $notice->content = $params['content'];
        $notice->create_time = time();
        $notice->update_time = time();
        $notice->create_person = $adminInfo['id'];
        $notice->update_person = $adminInfo['id'];
        $notice->status = $params['status'];
        $res = $notice->insert();
        if ($res) {

            $content = '创建了序号为'.$notice->id."的网站公告";
            LogService::writeLog($content);

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

        $model = RNoticeWebsite::findOne($params['id']);
        $model->title = 'fff';
        $model->save();

        $update_data = [
            'title' => $params['title'],
            'content' => $params['content'],
            'status' => $params['status'],
            'update_time' => time(),
            'update_person' => $adminInfo['id'],
        ];
        $res = RNoticeWebsite::updateAll($update_data, 'id = ' . $params['id']);
        if ($res) {

            $status = $params['status'] == 1 ? '正常' : '禁用';
            $content = '编辑了序号为'.$params['id']."的网站公告:标题修改为".$params['title'].",内容修改为:".$params['content'];
            $content.=',状态修改为'.$status;
            LogService::writeLog($content);

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
        $res = RNoticeWebsite::find()->where(['id'=> $id])->asArray()->one();
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
        $res = RNoticeWebsite::updateAll($update_data,'id = '.$params['id']);
        if ($res) {

            if($params['status'] == 1) {
                $status = '正常';
            } else if($params['status'] == 2) {
                $status = '禁用';
            } else if($params['status'] == 3) {
                $status = '删除';
            }
            $content = '编辑了序号为'.$params['id']."的网站公告:";
            $content.='状态修改为'.$status;
            LogService::writeLog($content);

            return ['type' => 'success', 'msg' => '操作成功'];
        } else {
            return ['type' => 'fail', 'msg' => '操作失败'];
        }
    }






}
