<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.min.css',
//        'css/plugins/dataTables/datatables.min.css',
//        'css/css/font-awesome.css',
//        'css/animate.css',
//        'css/style.css',
    ];
    public $js = [

//        'js/jquery-3.1.1.min.js',
//        'js/popper.min.js',
//        'js/bootstrap.js',
//        'js/plugins/metisMenu/jquery.metisMenu.js',
//        'js/plugins/slimscroll/jquery.slimscroll.min.js',
//        'js/plugins/dataTables/datatables.min.js',
//        'js/plugins/dataTables/dataTables.bootstrap4.min.js',
//        'js/inspinia.js',
//        'js/plugins/pace/pace.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
    }
    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
    }

}
