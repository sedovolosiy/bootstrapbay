<?php
use \kartik\datecontrol\Module;
use developeruz\db_rbac\behaviors\AccessBehavior;
use yii\web\ForbiddenHttpException;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'modules' => [
        'permit' => [
            'class' => 'developeruz\db_rbac\Yii2DbRbac',
            'params' => [
                'userClass' => 'common\models\User'
            ]
        ],
        'api_v1' => [
            'class' => 'backend\modules\api_v1\Module',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/store',
            //path to origin images
            'imagesCachePath' => 'upload/cache',
            //path to resized copies
            'graphicsLibrary' => 'GD',
            //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/upload/placeHolder.png',
            // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            // format settings for displaying each date attribute (ICU format example)
            'displaySettings' => [
                Module::FORMAT_DATE => 'dd-MM-yyyy',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'dd-MM-yyyy hh:mm:ss a',
            ],
            // format settings for saving each date attribute (PHP format example)
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:c', // saves as unix timestamp
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],
            // set your display timezone
//            'displayTimezone' => 'Asia/Kolkata',

            // set your timezone for date saved to db
//            'saveTimezone' => 'UTC',

            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
                Module::FORMAT_DATETIME => [], // setup if needed
                Module::FORMAT_TIME => [], // setup if needed
            ],
            // custom widget settings that will be used to render the date input instead of kartik\widgets,
            // this will be used when autoWidget is set to false at module or widget level.
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker', // example
                    'options' => [
                        'dateFormat' => 'php:d-M-Y',
                        'options' => ['class' => 'form-control'],
                    ]
                ]
            ]
            // other settings
        ],

    ],
    'components' => [

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['login']
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
            'errorAction' => 'login/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'works',
                    'except' => ['delete'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'skills',
                    'except' => ['delete'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'profile',
                    'except' => ['delete'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'personal-info',
                    'except' => ['delete'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'experience',
                    'except' => ['delete'],

                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'education',
                    'except' => ['delete'],

                ],
                '/' => 'site/index',
                'login' => '/login/login',
                'logout' => '/login/logout',
                'info' => '/personal-info/index',
                'profile' => '/profile/index',
                'works' => '/works/index',
                'experience' => '/experience/index',
                'education' => '/education/index',
                'skills' => '/skills/index',
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
            ],

        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'booleanFormat' => [
                '<span class="glyphicon glyphicon-remove"></span>',
                '<span class="glyphicon glyphicon-ok"></span>'
            ],
        ],
//        'request' => [
//            'parsers' => [
//                'application/json' => 'yii\web\JsonParser',
//            ]
//        ]
    ],
    'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        'rules' =>
            [
                'login' =>
                    [
                        [
                            'actions' => ['login', 'index', 'error', 'logout'],
                            'allow' => true,
                        ],
                    ],
                'site' =>
                    [
                        [
                            'actions' => ['index', 'error', 'logout'],
                            'allow' => true,
                        ],
                    ],
            ],


    ],
    'params' => $params,
];
