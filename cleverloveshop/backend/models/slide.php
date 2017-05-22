<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class slide extends ActiveRecord
{
    public $slide_name;
    public $slide_path;
    public $slide_url;	
    public $slide_sort;

	public function rules()
    {
    	return[
    		[['slide_name','slide_path','slide_url','slide_sort'],'required'],
    		[['slide_path'], 'file', 
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
    	$path = dirname(Yii::$app->BasePath).'\common\uploads\slide\\'.$y.'\\'.$m.'\\'.$d.'\\';
    	$date = $y.'/'.$m.'/'.$d;
		if(!is_dir($path)){
			mkdir($path, 0, true);
		}else
        {
        	$img_name = time().rand(0000,9999) . '.' . $this->slide_path->extension;
            $this->slide_path->saveAs($path.$img_name );
            $path_name = $date.'/'.$img_name;
            return $path_name;
        } 
    }
    public function attributeLabels()
    {
    	return [
           'slide_name' => '',
           'slide_path' => '',
           'slide_url' => '',
           'slide_sort' => '',
        ];
    }

}
function p($data)
{
	echo '<pre>';
	print_r($data);
	die;
}