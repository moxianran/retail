<?php

namespace backend\services;

use app\models\RNoticeAgent;
use app\models\RNoticeWebsite;
use app\models\RNoticeGame;
use app\models\RNoticeSystem;

class NoticeService
{

    /**
     * 获取列表
     * @param $params
     * @param $type
     * @return array
     */
    public static function getList($params,$type)
    {
        $pageSize= 2;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //获取model
        switch($type){
            case 1:
                $query = RNoticeWebsite::find()->where(['status' => [1,2]]);
                break;
            case 2:
                $query = RNoticeSystem::find()->where(['status' => [1,2]]);
                break;
            case 3:
                $query = RNoticeGame::find()->where(['status' => [1,2]]);
                break;
            case 4:
                $query = RNoticeAgent::find()->where(['status' => [1,2]]);
                break;
            default:
                break;
        }

        if(!isset($query)) {
            return [
                'list' => [],
                'count' => 0,
                'pageSize' => $pageSize,
            ];
        }

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
     * @param $post
     * @return bool
     * @throws \Throwable
     */
    public static function create($post)
    {
        $notice = new RNotice();
        $notice->title = $post['title'];
        $notice->content = $post['content'];
        $notice->type = $post['type'];
        $notice->create_time = time();
        $notice->create_person = 1;
        $notice->update_time = time();
        $notice->update_person = 1;
        $notice->status = $post['status'];
        return $notice->insert();
    }

    /**
     * 获取单个
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function getOne($id)
    {
        $result = RNotice::find()
            ->where([
                'id'=> $id,
            ])->asArray()->one();

        return $result;
    }

    /**
     * 编辑
     * @param $post
     * @return int
     */
    public static function edit($post)
    {
        $update_data = [
            'title' => $post['title'],
            'content' => $post['content'],
            'status' => $post['status'],
            'update_time' => time(),
            'update_person' => 1,
        ];
        $result = RNotice::updateAll($update_data,'id = '.$post['id']);
        return $result;

    }

}
