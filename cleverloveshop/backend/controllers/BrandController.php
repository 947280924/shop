<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use backend\models\Brand;
use yii\web\UploadedFile;

/**
 * Brand controller
 * 商品品牌
 */
class BrandController extends Controller
{
	public $layout = 'layout';
	public $table = 'brand'; //表名

	/*
	* 商品品牌列表
	*/
	public function actionBrand_list()
	{
		$query = Brand::find()
			->orderBy('brand_id')
			->asArray();

		$count = $query->count();

		$pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 5 ]);

		$brand = $query->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();

       	return $this->render('brand_list',[
             'brand' => $brand,
             'pages' => $pagination,
       	]);
       
	}

	/*
	* 商品品牌搜索
	*/
	public function actionBrand_search()
	{
		$word = yii::$app->request->post('word');

		$query = Brand::find()
			->where(['like','brand_name',$word])
			->orderBy('brand_id')
			->asArray();

		$count = $query->count();

		$pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 5 ]);

		$brand = $query->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();

		$info['brand'] = $brand;
		$info['pages'] = $pagination;
		echo json_encode($info);
       
	}

	/*
	* 商品品牌添加
	*/
	public function actionBrand_add()
	{
		if(Yii::$app->request->isPost)
		{
			$model = new Brand;
			$arr = yii::$app->request->post('Brand');
			unset($arr['img']);
            $model->img = UploadedFile::getInstance($model, 'img');
            $arr['brand_logo'] = $model->upload();
            // print_r($arr);die;
            yii::$app->db->createCommand()->insert('brand', $arr)->execute();
			return $this->redirect('?r=brand/brand_list');
		}else
		{
			$model = new Brand;
			return $this->render('brand_add',['model'=>$model]);
		}
       
	}
}
