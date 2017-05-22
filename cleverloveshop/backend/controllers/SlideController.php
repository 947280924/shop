<?php
/**
 * @author Mr.ZhiFeng
 * @QQ 947280924℡
 * @Email 18401448261@163.com
 * @copyright Copyright(c) 2017 
 * @sign 'Do not forget the beginning of the heart, the party must always!'
 * @file slide
 * @brief 轮播图
 * @date 2017-05-13 14:18:01
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use db;
use backend\models\Slide;
use yii\web\UploadedFile;
class SlideController extends Controller{

	public $layout = 'layout';
	/**
	 * 轮播图管理
	 */
	public function actionIndex(){
		$query = Slide::find()
			->orderBy('slide_sort')
			->asArray()
			->all();	
		return $this->render('slide',['query'=>$query]);
	}

	public function actionAddslide(){
		if(yii::$app->request->isPost){
			$model = new Slide;
			$arr = yii::$app->request->post('slide');
			// print_r($arr);die;
            $model->slide_path = UploadedFile::getInstance($model, 'slide_path');
            $arr['slide_path'] = $model->upload();
            yii::$app->db->createCommand()->insert('slide', $arr)->execute();
			return $this->redirect('?r=slide');			
		}else{
			$model = new Slide;
			return $this->render('add_slide',['model'=>$model]);
		}
		
	}
}


