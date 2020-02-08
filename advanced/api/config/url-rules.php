<?php
/**
 * Created by Joker.
 * Date: 2020/2/6
 * Time: 23:42
 */
$urlRuleConfigs = [
    [
        'controller' => ['v1/users'],
        'extraPatterns' => [
            'POST login' => 'login',
            'GET signup-test' => 'signup-test',
        ],
    ],
];
/**
 * 基本的url规则配置
 */
function baseUrlRules($unit)
{
    $config = [
        'class' => 'yii\rest\UrlRule',
    ];
    return array_merge($config, $unit);
}
return array_map('baseUrlRules', $urlRuleConfigs);
