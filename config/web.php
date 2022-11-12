<?php

// ini_set('session.save_path', '/home/vishnu/Documents/sessions');
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    /* 'layoutPath'=>'@app/views/layouts2',
    'layout'=>'main2', */
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ], 
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Userindex',
        ],
    ],
   'on beforeAction'=> function($event){
       //echo $event->action->id;
       //echo $event->action->controller->id; 
     /*   if($event->action->controller->id =='site'){
            \Yii::$app->response->redirect(['report']);
       }  */
       // echo "before action ";
     },
     'on beforeRequest'=>function(){
       // echo "yess";
     },
    /*  'as myBehavour'=>[
        'class'=>'\app\components\MyBehavior',
        'prop1'=>'Code',
        'prop2'=>'Improve'
    ],  */
    'components' => [   
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // DB connection component or its config 
            'tableName' => '{{%queue}}', // Table name
            'channel' => 'default', // Queue channel key
            'mutex' => \yii\mutex\MysqlMutex::class, // Mutex used to sync queries
        ],
        'view'=>[
            'theme'=>[
                'basePath'=>'@webroot/themes/new',
                'baseUrl'=>'@web/themes/new',
                'pathMap'=>[
                    //'@app/views'=>'@webroot/themes/new/views'
                    '@app/views'=>['@webroot/themes/new/views','@webroot/themes/old/views']
                ]
            ]
        ] ,
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ], 
                ],
                'seo*'=>[
                    'class'=>'yii\i18n\GettextMessageSource',
                    'catalog'=>'seo',
                    'useMoFile'=>false,
                    'basePath' => '@app/messages', 
                ],
           /*      'faq*'=>[
                    'class'=>'yii\i18n\GettextMessageSource',
                    'catalog'=>'faq',
                    'useMoFile'=>false,
                    'basePath' => '@app/messages', 
                ] */
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'codeImprove',
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
        'db' => $db ,
       // 'dbOld'=> $db['db2'],
    
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'about'=>'first/about',
                'home'=>'first/home',
                [
                    'pattern'=>'firsts/<other>',
                    'route'=>'first/info',
                    'defaults'=>[
                        'category'=>'demo category','key'=>'1212',
                        'param'=>'type'
                    ]
                ],
                [
                    'pattern'=>'second/demo/<other>',
                    'route'=>'first/demo',
                    'defaults'=>[
                        'category'=>'second demo category','key'=>'2121',
                        'param'=>'type 2'
                    ]
                ]

            ],
        ], 
        'urlManagerMySite'=>[
            'class'=>\yii\web\UrlManager::className(),
            'enablePrettyUrl'=>true,
            'enableStrictParsing'=>true,
            'showScriptName'=>false,
            'baseUrl'=>false,
            'rules'=>[
                '/item/listing'=>'site/product',
                '/product/category/<phone>'=>'site/category',
                '/<phone>-<modelNo>/detail'=>'phone/detail'
            ]

        ],
        'common'=>[
            'class'=>'app\components\CommonComponent', 
        ]
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
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
