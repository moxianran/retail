<?php
namespace frontend\controllers;

use yii\web\Controller;


class SiteController extends Controller
{


    /**
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCasino()
    {
        return $this->render('casino');
    }

    public function actionSports()
    {
        return $this->render('sports');
    }

    public function actionGame()
    {
        return $this->render('game');
    }

    public function actionLottery()
    {
        return $this->render('lottery');
    }

    public function actionPromotions()
    {
        return $this->render('promotions');
    }

    public function actionJoin()
    {
        return $this->render('join');
    }
    public function actionGuide()
    {
        return $this->render('guide');
    }
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHelp()
    {
        return $this->render('help');
    }

    public function actionMember()
    {
        return $this->render('member');
    }

    public function actionRegister()
    {
        return $this->render('register');
    }

}
