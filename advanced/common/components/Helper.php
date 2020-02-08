<?php
/**
 * Created by: Joker
 * Date: 2019/12/30
 * Time: 16:26
 */
namespace common\components;
class Helper
{
    public static function checkedMobile($mobile)
    {
        return $mobile;
    }

    public static function pr($data = ""){
        echo "<pre>";
        var_dump($data);
    }
}