<?php
/**
 * @author Mr.ZhiFeng
 * @QQ 947280924℡
 * @Email 18401448261@163.com
 * @copyright Copyright(c) 2017 
 * @sign 'Do not forget the beginning of the heart, the party must always!'
 * @file CateGory
 * @brief 商品分类
 * @date 2017-05-12 10:03:43 
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Category;
use db;
use backend\models\Curd;
class CategoryController extends Controller
{
	public $layout = 'layout';
	public function actionIndex(){
		
		//分类排序
		$data = $this->sel();
		return $this->render('product_category',['data'=>$data]);
	}
	public function actionAdd_product_category(){
		$data = $this->sel(); 
		return $this->render('add_product_category',['data'=>$data]);
	} 
	public function actionCat_add(){
		$cat_data = yii::$app->request->post();
		foreach ($cat_data as $key => $value) {
			if($value==null){
				exit('请完善分类信息');
			}
		}
		if($cat_data['parent_id']==0){
			$arr = [
					'cat_name'=>$cat_data['cat_name'],
					'parent_id'=>0,
					'sort'=>$cat_data['sort'],
					'path'=>0
			];			
		}else{
			$parent_path = explode(',', $cat_data['parent_id']); 
			$arr = [
					'cat_name'=>$cat_data['cat_name'],
					'parent_id'=>$parent_path[0],
					'sort'=>$cat_data['sort'],
					'path'=>$parent_path[1].'-'.$parent_path[0]
			];
			
		}
		$cat_add = (new Curd())
					->insert('category',$arr);
		if($cat_add){
			return $this->redirect('?r=category');
		}
		
	} 
	public function Sel(){
		$data = yii::$app->db->createCommand('SELECT *,CONCAT(path,"-",cat_id) as depath  from category order by depath  ;')->queryAll();
		return $data;
	}

}



?>