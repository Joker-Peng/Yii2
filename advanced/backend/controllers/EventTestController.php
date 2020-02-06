<?php
/**
 * Created by Joker.
 * Date: 2020/2/5
 * Time: 23:46
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\components\event\MailEvent;

/**
 * 事件测试
 */
class EventTestController extends Controller
{
    const EVENT_TEST = 'event_test';
    const SEND_MAIL = 'send_mail';

    public function init ()
    {
        parent::init();
        $this->on(self::EVENT_TEST, function () {
            echo "I`m a test event.";
        });
        $this->on(self::SEND_MAIL, ['backend\components\event\MailEvent', 'sendMail']);

        // 调用当前类的onEventTest方法
        // $this->on(self::EVENT_TEST, [$this, 'onEventTest']);

        // 调用backend\components\event\Event类的test方法
        // $this->on(self::EVENT_TEST, ['backend\components\event\Event', 'test']);
    }

    public function actionIndex ()
    {
        $this->trigger(self::EVENT_TEST);
//        $this->trigger(self::SEND_MAIL);
    }

    public function actionSend ()
    {
        // 触发邮件事件
        $event = new MailEvent;
        $event->email = 'joker@plovehj.com';
        $event->subject = '事件邮件测试';
        $event->content = '邮件测试内容';

        $this->trigger(self::SEND_MAIL, $event);
    }
}