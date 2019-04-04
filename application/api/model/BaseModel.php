<?php


namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    public function prefixImgUrl($value){
        if ($this->from==1) {
            return config('settings.img_prefix').$value;
        }
        return $value;
    }
}