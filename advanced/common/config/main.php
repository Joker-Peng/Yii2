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
            // 是否改写路由
            'enablePrettyUrl' => true,
            // 是否展示入口文件 index.php, 这个配置对于实际没有什么影响,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    // 配置语言
    'language'=>'zh-CN',
    // 配置时区
    'timeZone'=>'Asia/Chongqing',
];
