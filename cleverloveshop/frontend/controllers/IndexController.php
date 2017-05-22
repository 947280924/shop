<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Category;
use db;
/**
 * Index controller
 * 商城主页
 */
class IndexController extends Controller
{

	public function actionIndex()
	{
		//分类树
		$cate_tree = $this->Category();
		//导航栏
		$nev = $this->Nev();
		//轮播图
		$slide = $this->Slide();
		//热销
		$hotgoods = $this->Hotgoods();

		return $this->renderPartial('index',['cate_tree'=>$cate_tree,'nev'=>$nev,'slide'=>$slide,'hotgoods'=>$hotgoods]);
	}
	/**
	 * 商品分类
	 */
	public function Category(){

		$cate = new Category;

		$cate_data = $cate->get_Category();

		$cate_tree = $cate->get_cate_tree($cate_data);

		return $cate_tree;

	}
	/**
	 * 首页导航
	 */
	public function Nev(){

		$sql = 'SELECT * FROM nev order by nev_sort limit 10';

		$nev = yii::$app->db->createCommand($sql)->queryAll();

		return $nev;

	}
	/**
	 * 首页轮播图
	 */
	public function Slide(){

		$sql = 'SELECT * FROM slide order by slide_sort limit 5 ';

		$slide = yii::$app->db->createCommand($sql)->queryAll();

		return $slide;

	}

	/**
	 * 热销
	 */
	public function  Hotgoods(){

		$sql = 'SELECT * FROM goods order by sort desc limit 8 ';

		$hotgoods = yii::$app->db->createCommand($sql)->queryAll();

		return $hotgoods; 


	}
}