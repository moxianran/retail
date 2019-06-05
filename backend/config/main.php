<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'notice' => [
            'class' => 'backend\module\notice\notice',
        ],
        'user' => [
            'class' => 'backend\module\user\user',
        ],
        'agent' => [
            'class' => 'backend\module\agent\agent',
        ],
        'customer' => [
            'class' => 'backend\module\customer\customer',
        ],
        'director' => [
            'class' => 'backend\module\director\director',
        ],
        'report' => [
            'class' => 'backend\module\report\report',
        ],
        'login' => [
            'class' => 'backend\module\login\login',
        ],
        'super' => [
            'class' => 'backend\module\super\super',
        ],
        'center' => [
            'class' => 'backend\module\center\center',
        ],

    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
    'defaultRoute' => '/login/login/login',
//    'on beforeRequest' => function($event) {
//        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(), \yii\db\BaseActiveRecord::EVENT_AFTER_INSERT, ['backend\components\Logs', 'write']);
//        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(), \yii\db\BaseActiveRecord::EVENT_AFTER_UPDATE, ['backend\components\Logs', 'write']);
//        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(), \yii\db\BaseActiveRecord::EVENT_AFTER_DELETE, ['backend\components\Logs', 'write']);
//    },
];
