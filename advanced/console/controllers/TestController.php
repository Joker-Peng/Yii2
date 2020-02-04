<?php
/**
 * Created by Joker.
 * Date: 2020/2/4
 * Time: 16:48
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;

/**
 * Test Console Application
 */
class TestController extends Controller
{

    public function actionIndex ()
    {
        echo exec('/usr/local/mysql/bin/mysqldump -ujoker11 -p yii2advanced | gzip > /var/www/Yii2/advanced/yii2advanced.sql.gz');
    }

}