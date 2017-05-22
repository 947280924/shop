<?php
namespace frontend\controllers;

use Yii;
use db;
use yii\caching\Cache;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Goods;

/**
 * Product controller
 * 商品展示
 */
class ProductController extends Controller
{

	/*
	 * 商品列表
	 */
	public function actionProduct_list()
	{
		$cat_id = yii::$app->request->get('cat_id');
		$query = Goods::find()
			->where(['cat_id' => $cat_id])
			->orderBy('goods_id')
			->asArray();

		$count = $query->count();

		$pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 16 ]);

		$goods_list = $query->offset($pagination->offset)
		    ->limit($pagination->limit)
		    ->all();
		$nav = $this->now_here($cat_id);


		$browse = Yii::$app->cache->get('browse');
		$browse = array_unique($browse); 
		// print_r($browse);die;
		foreach ($browse as $key => $val) 
		{
			$browze[] = Goods::find()
				->where(['goods_id' => $val])
				->limit(5)
				->asArray()
    			->one();
		}

		return $this->render('product_list',['goods_list' => $goods_list, 'pages' => $pagination, 'nav' => $nav, 'browse' => $browze]);
	}

	/*
	 * 商品详情
	 */
	public function actionProduct_show()
	{
		$g_id = yii::$app->request->get('g_id');
		$array = Goods::find()
				->where(['goods_id' => 1])
				->asArray()
    			->one();
    	$nav = $this->now_here($array['cat_id']);

    	//记录浏览记录
		$cache = Yii::$app->cache;
		// $cache->delete('browse');
		$info = $cache->get('browse');
		if($info)
		{
			if(array_search($g_id, $info))
			{
				$arr = array();
				$arr[] = $g_id;
				$cache->set('browse',array_merge($info,$arr));
			}else
			{
				$arr = array();
				$arr[] = $g_id;
				$cache->set('browse',array_merge($info,$arr));
			}

		}else
		{
			$cache->set('browse',array($g_id=>1));
		}

		$browse = $cache->get('browse');
		$browse = array_unique($browse); 
		// print_r($browse);die;
		foreach ($browse as $key => $val) 
		{
			$browze[] = Goods::find()
				->where(['goods_id' => $val])
				->limit(5)
				->asArray()
    			->one();
		}

		return $this->render('product_show', ['arr' => $array, 'nav' => $nav, 'browse' => $browze]);

	}

	/* 面包屑 */
	protected function now_here($catid,$ext='')
	{
		$here = '<a href="#">首页</a>';
		$uplevels = Yii::$app->db->createCommand("SELECT cat_id,cat_name,parent_id FROM category WHERE cat_id = $catid")
            ->queryOne();
		if($uplevels['parent_id'] != 0)
		{
			$here .= $this->get_up_levels($uplevels['parent_id']);
			$here .= ' > <a href="?r=product/product_list&cat_id='.$uplevels['cat_id'].'">'.$uplevels['cat_name']."</a>";
		}else
		{
			$here .= ' > <a href="?r=product/product_list&cat_id='.$uplevels['cat_id'].'">'.$uplevels['cat_name']."</a>";
		}
		if($ext != '')
		{
			$here .= ' > '.$ext;
		} 
		return $here;
	}
	protected function get_up_levels($id)
	{
		$here = '';
		$uplevels = Yii::$app->db->createCommand("SELECT cat_id,cat_name,parent_id FROM category WHERE cat_id = $id")
			->queryOne();
		$here .= ' > <a href="?r=product/product_list&cat_id='.$uplevels['cat_id'].'">'.$uplevels['cat_name']."</a>";
		if($uplevels['parent_id'] != 0)
		{
		  	$here = $this->get_up_levels($uplevels['parent_id']).$here;
		}
		return $here;
	}
}