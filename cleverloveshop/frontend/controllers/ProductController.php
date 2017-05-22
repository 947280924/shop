<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Category;
use yii\caching\MemCache;
/**
 * Product controller
 * 商品展示
 */
class ProductController extends BaseController
{

	/*
	 * 商品列表
	 */
	public function actionProduct_list()
	{
		
		$cate_parent_arr = $this->actionCate();

		$brand_list = $this->Brand();

		$cate_goods = $this->cate_goods();

		return $this->render('product_list',['cate_parent_arr'=>$cate_parent_arr,'brand_list'=>$brand_list,'cate_goods'=>$cate_goods]);
	}

	/*
	 * 商品详情
	 */
	public function actionProduct_show()
	{

		$goods_id = yii::$app->request->get('goods_id')?yii::$app->request->get('goods_id'):1;

		$sql = 'SELECT * FROM goods WHERE goods_id =  '.$goods_id;

		$goods_row = yii::$app->db->createCommand($sql)->queryOne();	

		$attr_sql = 'SELECT * FROM goods_attr AS g INNER JOIN attribute AS a ON a.attr_id = g.attr_id where g.goods_id = '.$goods_id;

		$goods_attr = yii::$app->db->createCommand($attr_sql)->queryAll();


		$attr = [];

		foreach($goods_attr as $k=>$v){

			$attr[$v['attr_index']][$v['attr_name']][$v['goods_attr_id']] = $v['attr_value'];

		}

		$cate_parent_arr = $this->actionCate();


		

		return $this->render('product_show',['goods_row'=>$goods_row,'attr'=>$attr,'goods_id'=>$goods_id,'cate_parent_arr'=>$cate_parent_arr]);
	}

	/**
	 *	面包屑导航
	 */
	
	public function actionCate(){

		$id = yii::$app->request->get('id')?intval(yii::$app->request->get('id')):intval(yii::$app->request->get('goods_id'));
		if($id){

		$cate = new Category();

		$cate_data = $cate->get_Category();
		
		$cate_parent = $cate->get_cate_parent($id,$cate_data);

		$cate_parent_arr = array_reverse($cate_parent);

		return $cate_parent_arr;
		}else{


			return array();
		}
	}

	/**
	 *	商品（分类，品牌，价格搜索条件）
	 */
	
	public function cate_goods(){
		//开启memcache
		$mem = Yii::$app->cache->getMemCache(); 
		$cat_id = intval(yii::$app->request->get('c'));
		$price = intval(yii::$app->request->get('m'));
		$brand_id = intval(yii::$app->request->get('b'));
		$where = [];

		if(!empty($brand_id)){

			$mem->set('b',' and brand_id='.$brand_id,false,60*60);

		}
		if(!empty($cat_id)){
			
			$mem->set('c',' and cat_id='.$cat_id,false,60*60);
		}
		if(!empty($price)){
			switch($price){
				case '1' : $mem->set('m',' and goods_price>0 AND goods_price<=50',false,60*60);break;
				case '2' : $mem->set('m',' and goods_price>50 AND goods_price<=150',false,60*60);break;
				case '3' : $mem->set('m',' and goods_price>150 AND goods_price<=500',false,60*60);break;
				case '4' : $mem->set('m',' and goods_price>500 AND goods_price<=1000',false,60*60);break;
				case '5' : $mem->set('m',' and goods_price>1000 ',false,60*60);break;
				default: $mem->set('m','');
			}
		}
		if(empty($brand_id)&&empty($price)&&empty($price)){
			$mem->delete('c');
			$mem->delete('b');
			$mem->delete('m');
		}
		$sql = 'SELECT * FROM goods where 1=1 '.$mem->get('b').$mem->get('c').$mem->get('m');

		$goods = yii::$app->db->createCommand($sql)->queryAll();

		return $goods;
	}
	/**
	 *	品牌
	 */
	
	public function Brand(){

		$sql = 'SELECT * FROM brand WHERE is_show = 1 ';

		$brand = yii::$app->db->createCommand($sql)->queryAll();

		return $brand;		


	}


	public function actionProduct_ishave(){

		$goods_id = yii::$app->request->post('goods_id');

		$sql = 'SELECT attr_list FROM product WHERE goods_id = '.$goods_id;

		$product = yii::$app->db->createCommand($sql)->queryAll();

		$product = array_column($product,'attr_list');
		
		return json_encode($product);
	}





}


function p($data){
	echo '<pre>';
	print_r($data);
	die;
}	
