<?php


namespace app\api\controller\v1;


use app\api\model\Category as CategoryModel;

class Category
{
    public function getAll() {
        $categories = CategoryModel::all([], 'img');
        return $categories;
    }
}