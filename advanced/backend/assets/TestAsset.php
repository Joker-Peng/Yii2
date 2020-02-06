<?php
/**
 * Created by Joker.
 * Date: 2020/2/6
 * Time: 21:41
 * Desc: 资源包管理
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Test asset bundle.
 */
class TestAsset extends AssetBundle
{
    // public $sourcePath = '@common/widgets/upload';//资源位于common/widgets/upload目录，如common/widgets/upload/css/site.css，这个时候我们就需要设置sourcePath属性了
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site_test.css',
    ];
    public $js = [
    ];

    public $depends = [
        'backend\assets\Test2Asset'
    ];
}