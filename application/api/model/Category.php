<?php


namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time', 'topic_img_id'];
    public function img() {
        return $this->hasOne('Image', 'id', 'topic_img_id');
    }
}