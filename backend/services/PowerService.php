<?php
namespace backend\services;
use app\models\RPositionPower;
use app\models\RPosition;
use app\models\RPower;

class PowerService {

    /**
     * 职位列表
     * @param $params
     * @return array
     */
    public static function getPositionList($params)
    {
        $pageSize= 10;

        if(isset($params['page']) && !empty($params['page'])) {
            $page = (int) $params['page'];
        } else {
            $page = 1;
        }

        //删选数组
        $offset = ($page - 1) * $pageSize;
        $where = [];
        $query = RPosition::find()->where($where);
        $count = $query->count();
        $list = $query->orderBy('id desc')->offset($offset)->limit($pageSize)->asArray()->all();

        return [
            'list' => $list,
            'count' => $count,
            'pageSize' => $pageSize,
        ];
    }


    /**
     * 获取权限列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPowerList()
    {
        $list = RPower::find()->asArray()->all();
        return $list;
    }

    /**
     * 获取职位权限
     * @param $position_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPositionPower($position_id)
    {
        $data = RPositionPower::find('power_id')->where(['position_id' => $position_id])->asArray()->all();
        return $data;
    }

    /**
     * 保存权限
     * @param $params
     */
    public static function savePower($params)
    {
        $position_id = $params['position_id'];
        $power_ids = $params['power_ids'];

        $model = new RPositionPower();
        $model->deleteAll(['position_id'=>$position_id]);

        foreach($power_ids as $k=>$v) {
            $model = new RPositionPower();
            $model->position_id = $position_id;
            $model->power_id = $v;
            $model->save();
        }
    }

}


