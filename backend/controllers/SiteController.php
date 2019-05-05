<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


class SiteController extends Controller
{
    public $layout=false;
    /**
     * 登录
     */
    public function actionLogin()
    {
        return $this->redirect(['/login/login/login']);
    }

}
