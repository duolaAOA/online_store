<?php


namespace app\lib\exception;


class SuccessMessage
{
    //HTTP 状态码 404，200
    public $code = 201;
    // 具体错误信息
    public $message= 'ok';
    //自定义错误代码
    public $errorCode = 0;
}