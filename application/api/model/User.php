<?php


namespace app\api\model;


class User extends BaseModel
{
    public function address()
    {
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }
    public static function getByOpenId($openId) {
        $user = self::where('openid', $openId)
            ->find();
        return $user;
    }
}