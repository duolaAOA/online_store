<?php


namespace app\api\controller\v1;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    protected function checkExclusiceScope($value='')
    {
        TokenService::needExclusiveScope();
    }
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }
}