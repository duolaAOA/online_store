<?php


namespace app\api\service;


use think\Cache;
use think\Request;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\ForbiddenException;

class Token
{
    public static function generateToken() {
        //32个字符组成一组随机字符串
        $randChar = getRandChar(32);
        //用三组字符串进行md5加密
        $itmestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 盐
        $salt = config('secure.token_salt');
        return md5($randChar.$itmestamp.$salt);
    }
    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if (!$vars) {
            throw new TokenException();
        } else {
            if (!is_array($vars)) {
                $vars = json_decode($vars, true);
            }
        }
        if (array_key_exists($key, $vars)) {
            return $vars[$key];
        } else {
            throw new Exception("尝试获取的Token变量不存在！");

        }
    }
    public static function getCurrentUid()
    {
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
    public static function needExclusiveScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if (!$scope) {
            throw new TokenException();
        }
        if ($scope = ScopeEnum::User) {
            return true;
        }
        throw new ForbiddenException();
    }
    public static function needPrimaryScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if (!$scope) {
            throw new TokenException();
        }
        if ($scope >= ScopeEnum::User) {
            return true;
        }
        throw new ForbiddenException();
    }
}