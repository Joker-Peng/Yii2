<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'helper' => [
            'class' => 'common\components\Helper',
            'property' => '123',
        ],
        'urlManager' => [
            // 是否开启美化效果
            'enablePrettyUrl' => true,
            // 是否或略脚本名index.php
            'showScriptName' => false,
            // 是否开启严格解析路由
            'enableStrictParsing' => false,
            // url后缀
            'suffix' => '',
            'rules' => [
                /*'/blogs' => '/blog/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',// 所有的controller/id映射到controller/view界面 /blog/2 => /blog/view?id=2
                '/blogs/<id:\d+>' => '/blog/view',// /blog/view?id=1
                "<controller:\w+>/<action:\w+>"=>"<controller>/<action>",// controller和action匹配所有满足的路由*/
            ],
        ],
        //authManager有PhpManager和DbManager两种方式,
        //PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        "authManager" => [
            "class" => 'yii\rbac\DbManager',
        ],
    ],
    // 配置语言
    'language'=>'zh-CN',
    // 配置时区
    'timeZone'=>'Asia/Chongqing',
];
