<?php

namespace api\modules\v1\controllers;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use common\models\User;
use Yii;
use api\models\LoginForm;

class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'class' => HttpBearerAuth::className(),
                // optional处填写要忽略校验的action，如果不写，而我们恰巧又没有token可以传递，那么服务端默认会响应如下信息给客户端
                'optional' => [
                    'login',
                    'signup-test'
                ],
            ]
        ] );
    }

    /**
     * Desc: 创建测试用户
     * Created by Joker
     * Date: 2020/2/7
     * Time: 14:29
     * @return bool
     */
    public function actionSignupTest ()
    {
        $user = new User();
        $user->generateAuthKey();
        $user->setPassword('777');
        $user->username = '7776';
        $user->email = '777@555.com';

        return $user->save(false);
    }

    /**
     * Desc: 登录
     * Created by Joker
     * Date: 2020/2/7
     * Time: 14:29
     * @return array
     */
    public function actionLogin ()
    {
        $model = new LoginForm;
        $model->setAttributes(Yii::$app->request->post());
        if (($user = $model->login())) {
            return [
                'code' => 0,
                'data' => [
                    'token' => $user->api_token
                ],
            ];
        } else {
            $errors = $model->errors;
            $firstError = current($errors);
            return [
                'code' => 10001,
                'msg' => $firstError[0]
            ];
        }
    }
}
