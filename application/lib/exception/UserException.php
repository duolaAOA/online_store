<?php


namespace app\lib\exception;


class UserException extends BaseException
{
    //HTTP 状态码 404，200
    protected $code = 404;
    // 具体错误信息
    protected $message= '用户不存在';
    //自定义错误代码
    protected $errorCode = 60000;
}