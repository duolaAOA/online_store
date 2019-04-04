<?php


namespace app\api\validate;


class CountValidate extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
    protected $message = [
        'count' => '传入数量在1到15之间'
    ];
}