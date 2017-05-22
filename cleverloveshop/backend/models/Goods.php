<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class Goods extends ActiveRecord
{
    public $goods_thumb;    

    public function rules()
    {
        return[
            [['goods_thumb'], 'file', 
                'skipOnEmpty' => false, 
                'extensions' => 'png, jpg, jpeg, gif',
                'maxSize' => 1 * 1024 * 1024,
                'minSize' => 1,
                'message' => '上传失败',],
        ];
    }
    public function upload()
    {
        $y = date('Y');
        $m = date('m');
        $d = date('d');
        // echo __FILE__;DIE;
        $path = dirname(Yii::$app->BasePath).'\common\uploads\goods\\'.$y.'\\'.$m.'\\'.$d.'\\';
        $date = $y.'/'.$m.'/'.$d;
        if(!is_dir($path)){
            mkdir($path, 0, true);
        }else
        {
            $img_name = time().rand(0000,9999) . '.' . $this->goods_thumb->extension;
            $this->goods_thumb->saveAs($path.$img_name );
            $path_name = $date.'/'.$img_name;
            return $path_name;
        } 
    }

}
function p($data)
{
    echo '<pre>';
    print_r($data);
    die;
}