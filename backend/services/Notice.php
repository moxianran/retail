<?php

namespace backend\services;

use app\models\RNotice;

class Notice
{

    /**
     * 获取列表
     * @param $type
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($type)
    {
        $result = RNotice::find()
            ->where([
                'status'=> [1,2],
                'type' => $type
            ])->asArray()->all();

        return $result;
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
