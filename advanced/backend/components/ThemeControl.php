<?php
/**
 * Created by Joker.
 * Date: 2020/2/5
 * Time: 19:52
 */

namespace backend\components;

use Yii;

class ThemeControl extends \yii\base\ActionFilter
{
    public function init ()
    {
        $switch = intval(Yii::$app->request->get('switch'));
        $theme = $switch ? 'spring' : 'christmas';

        Yii::$app->view->theme = Yii::createObject([
            'class' => 'yii\base\Theme',
            'pathMap' => [
                '@app/views' => [
                    "@app/themes/{$theme}",
                ]
            ],
        ]);
    }
}