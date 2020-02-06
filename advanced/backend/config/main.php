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
        'admin' => [
            'class' => 'mdm\admin\Module',
        ],
        //......
    ],
    'aliases' => [
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        // 后台用户认证
        'user' => [
            'identityClass' => 'backend\models\UserBackendForm',
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
                    'class' => 'yii\log\FileTarget',// 日志的类型
//                    'class' => 'yii\log\DbTarget',// 数据库存储日志
// 运行命令 php yii migrate --migrationPath=@yii/log/migrations/ 创建日志表
                    'levels' => ['error', 'warning','info'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        //authManager有PhpManager和DbManager两种方式,
        //PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        "authManager" => [
            "class" => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        // 后台 ui 框架
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                    /* 可用的配置
                    "skin-blue",
                    "skin-black",
                    "skin-red",
                    "skin-yellow",
                    "skin-purple",
                    "skin-green",
                    "skin-blue-light",
                    "skin-black-light",
                    "skin-red-light",
                    "skin-yellow-light",
                    "skin-purple-light",
                    "skin-green-light"
                    */
                ],
            ],
            'appendTimestamp' => true,// 资源文件发生改变时不读缓存,重新获取
        ],

        // 模板主题替换,静态替换
        'view' => [
            'theme' => [
                // 'basePath' => '@app/themes/spring', // 资源的目录
                // 'baseUrl' => '@web/themes/spring', // 资源的url进行配置
                'pathMap' => [
                    '@app/views' => [
                        '@app/themes/christmas', // 前面的优先级比后面高
                        '@app/themes/spring',// 如果前面的模版找不到才会用下面的spring主题模版
                    ]
                ],
            ],
        ],
    ],
    // 权限控制
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action，不受权限控制
            //controller/action
           'site/*'// 基础登录控制器
        ]
    ],

    // 模板主题替换,动态替换
    'as theme' => [
        'class' => 'backend\components\ThemeControl',
    ],
    'params' => $params,
];
