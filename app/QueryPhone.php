<?php
namespace app;
use libs\ImHttpRequest;
/**
 * Created by PhpStorm.
 * Author kylin
 * Date: 2016/6/30
 * Time: 13:54
 */
class QueryPhone
{
    const TAOBAO_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.html';

    public static function query($phone) {

        if (self::verifyPhone('15363469159')) {
            ImHttpRequest::request(self::TAOBAO_API,['tel' => $phone]);
        };

    }

    /*
     * 校验手机号码是否
     *  @param $phone
     *  @return boolean
     * */

    public static function verifyPhone($phone = null) {
     
        $ret = false;
        if ($phone) {
            if (preg_match('/^1[34578]{1}\d{9}/',$phone)) {
                $ret = true;
            }
        }
        return $ret;

    }

}
