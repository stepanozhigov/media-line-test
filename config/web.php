<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'media-line-test',
    'name'=>'Новостной Каталог',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute'=>'category/',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zyaO0ctTIgLzzz4jNN0WTLx0kMUxUlU2',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //article create
                [
                    'pattern' => 'news/<action:(create)>',
                    'route' => 'article/<action>'
                ],
                //article edit update delete
                [
                    'pattern' => 'news/<action:(update|delete)>/<slug>',
                    'route' => 'article/<action>'
                ],
                //article view
                [
                    'pattern' => 'news/<slug>',
                    'route' => 'article/view'
                ],
                //article index
                [
                    'pattern' => 'news',
                    'route' => 'article/index'
                ],
                //article view
                'article/<slug>'=>'article/view',

                //category index
                [
                    'pattern' => 'rubriki',
                    'route' => 'category/index'
                ],
                //category update delete
                [
                    'pattern' => 'rubrika/<action:(update|delete)>/<slug>',
                    'route' => 'category/<action>'
                ],
                //category create
                [
                    'pattern' => 'rubrika/<action:(create)>',
                    'route' => 'category/<action>'
                ],
                //category view
                [
                    'pattern' => 'rubrika/<slug>',
                    'route' => 'category/view'
                ],
            ],
        ]

    ],
    'modules'=> [
        'api'=>[
            'class'=> \app\modules\api\Module::class
            ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
