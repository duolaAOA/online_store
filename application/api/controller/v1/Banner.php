<?php


namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * @param $id
     * id banner
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id){
        (new IDMustBePositiveInt())->gocheck();
        $banner = BannerModel::getBannerById($id);
        if($banner) {
            throw new BannerMissException();
        }
        return json($banner);

//        $data = [
//            'name'  => 'thinkphp',
//            'email' => 'thinkphp@qq.com'
//        ];
//        $validate = new Validate([
//            'name'  => 'require|max:25',
//            'email' => 'email'
//        ]);
//        $result = $validate->check($data);
//        echo $result;

//        $data = [
//            'id' => $id
//        ];
//        $validate = new IDMustBePositiveInt();
//        $result = $validate->batch()->check($data);
//        if($result){
//            echo 'yes';
//        }
//        else{
//            echo 'No';
//        }



    }
}