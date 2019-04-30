<?php

namespace backend\module\report\controllers;

use app\models\RAdmin;
use app\models\RRechargeRecord;
use app\models\RUser;
use yii\web\Controller;
use yii\data\Pagination;
use backend\services\BetService;
use backend\services\RechargeService;

class ReportController extends Controller
{

    public $pageSize= 10;

    /**
     * 会员新增记录
     */
    public function actionUserAddRecord()
    {
        $page = $request = \Yii::$app->request->get('page', 1);
        $type = $request = \Yii::$app->request->get('type', 1);

        //获取分页条件
        $offset = ($page - 1) * $this->pageSize;

        //获取时间
        $cond = $this->getCond($type);

        $query = RUser::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->offset($offset)->limit($this->pageSize)->asArray()->all();

        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        return $this->render('userAddRecord', [
            'list' => $list,
            'pagination' => $pagination,
            'type' => $type,
        ]);
    }

    /**
     * 代理新增记录
     */
    public function actionAgentAddRecord()
    {
        $page = $request = \Yii::$app->request->get('page', 1);
        $type = $request = \Yii::$app->request->get('type', 1);

        //获取分页条件
        $offset = ($page - 1) * $this->pageSize;

        //获取时间
        $cond = $this->getCond($type);

        $query = RAdmin::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }
        $count = $query->count();
        $list = $query->offset($offset)->limit($this->pageSize)->asArray()->all();

        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        return $this->render('agentAddRecord', [
            'list' => $list,
            'pagination' => $pagination,
            'type' => $type,
        ]);
    }

    /**
     * 投注记录
     */
    public function actionBetRecord()
    {
        $get = \Yii::$app->request->get();
        $data = BetService::getlist($get);

        //获取全部用户
        $user = RUser::find('id,real_name')->where(['status' => 2])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('betRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
        ]);
    }

    /**
     * 充值记录
     */
    public function actionRechargeRecord()
    {
        $get = \Yii::$app->request->get();
        $data = RechargeService::getlist($get);

        //获取全部用户
        $user = RUser::find('id,real_name')->where(['status' => 2])->asArray()->all();

        $pagination = new Pagination(['totalCount' => $data['count'],'pageSize' =>$data['pageSize'] ]);

        return $this->render('rechargeRecord', [
            'list' => $data['list'],
            'pagination' => $pagination,
            'start' => $data['start'],
            'end' => $data['end'],
            'get' => $get,
            'user' => $user,
        ]);
    }

    /**
     * 输赢记录
     */
    public function actionResultRecord()
    {
        $page = $request = \Yii::$app->request->get('page', 1);
        $type = $request = \Yii::$app->request->get('type', 1);

        //获取分页条件
        $offset = ($page - 1) * $this->pageSize;

        //获取时间
        $cond = $this->getCond($type);

        $query = RAdmin::find();
        if($cond) {
            foreach($cond as $k => $v) {
                $query->andWhere($v);
            }
        }

        $count = $query->count();
        $list = $query->offset($offset)->limit($this->pageSize)->asArray()->all();

        $pagination = new Pagination(['totalCount' => $count,'pageSize' => $this->pageSize]);

        return $this->render('betRecord', [
            'list' => $list,
            'pagination' => $pagination,
            'type' => $type,
        ]);
    }

    /**
     * 获取开始时间
     * @param $type
     * @return array
     */
    private function getCond($type)
    {
        switch ($type) {
            case 1 ://今日
                $start = strtotime(date("Y-m-d"));
                $end = strtotime(date("Y-m-d")) + 86399;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
            case 2 ://昨日
                $start = strtotime(date("Y-m-d")) - 86400;
                $end = strtotime(date("Y-m-d")) + 86399;
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
                $start = strtotime(date("Y-m-d"));
                $end = strtotime(date("Y-m-d")) + 86399;
                $cond[] = ['>', 'create_time', $start];
                $cond[] = ['<', 'create_time', $end];
                break;
        }
        return $cond;

    }
}
