<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class Brand extends ActiveRecord
{
    public $brand_name;
    public $brand_logo;
    public $img;	
    public $is_show;

	public function rules()
    {
    	return[
    		[['brand_name','brand_logo','is_show'],'required'],
    		[['img'], 'file', 
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
    	$path = dirname(Yii::$app->BasePath).'\common\uploads\\'.$y.'\\'.$m.'\\'.$d.'\\';
    	$date = $y.'/'.$m.'/'.$d;
		if(!is_dir($path)){
			mkdir($path, 0, true);
		}else
        {
        	$img_name = time().rand(0000,9999) . '.' . $this->img->extension;
            $this->img->saveAs($path.$img_name );
            $path_name = $date.'/'.$img_name;
            return $path_name;
        } 
    }
    public function attributeLabels()
    {
    	return [
           'brand_name' => '品牌名称',
           'img' => 'Logo',
           'is_show' => '是否展示',
        ];
    }

}
function p($data)
{
	echo '<pre>';
	print_r($data);
	die;
}