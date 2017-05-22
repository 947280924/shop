<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use backend\models\Attribute;
use yii\web\UploadedFile;

/**
 * Attr controller
 * 商品属性
 */
class AttrController extends Controller
{
	public $layout = 'layout';
	public function actionIndex()
	{
		$query = Attribute::find()
			->joinWith('type')
			->orderBy('attr_id')
			->asArray();

		$count = $query->count();

		$pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 5 ]);

		$attr = $query->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();
	    foreach ($attr as $key => $val) 
	    {
	    	$attr[$key]['goods_type'] = $val['type'][0]['type_name'];
	    }
       	return $this->render('attr_list',[
             'attr' => $attr,
             'pages' => $pagination,
       	]);
	}

	/* 属性添加  */
	public function actionAttr_add()
	{
		if(Yii::$app->request->isPost)
		{
			$arr = yii::$app->request->post('Attribute');
			// print_r($arr);die;
            yii::$app->db->createCommand()->insert('attribute', $arr)->execute();
			return $this->redirect('?r=attr');
		}else
		{
			$model = new Attribute;
			$goods_type = Yii::$app->db->createCommand('SELECT * FROM goods_type')
	            ->queryAll();
	        $type = Attribute::droplist($goods_type);
	        return $this->render('attribute',['model' => $model, 'type' => $type]);
	    }
	}
}