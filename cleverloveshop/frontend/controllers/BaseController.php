<?php
/**
 * @author Mr.ZhiFeng
 * @QQ 947280924℡
 * @Email 18401448261@163.com
 * @copyright Copyright(c) 2017 
 * @sign 'Do not forget the beginning of the heart, the party must always!'
 * @file base
 * @brief 根控制器
 * @date 2017-05-17 09:15:25
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Category;
use db;
class BaseController extends Controller{

	public function init(){
		parent::init();
		//分类树
		$cate_tree = $this->actionCategory();

		//导航栏
		$nev = $this->actionNev();
		//layout 文件发送数据
		$view = Yii::$app->view;
		$view->params['layoutData'] = $cate_tree;
		$view->params['nav'] = $nev;

	}
	/**
	 * 商品分类
	 */
	public function actionCategory(){

		$cate = new Category;

		$cate_data = $cate->get_Category();

		$cate_tree = $cate->get_cate_tree($cate_data);

		return $cate_tree;

	}

	/**
	 * 导航
	 */
	public function actionNev(){

		$sql = 'SELECT * FROM nev order by nev_sort limit 10';

		$nev = yii::$app->db->createCommand($sql)->queryAll();

		return $nev;

	}

}



