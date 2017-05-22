<?php
/**
 * @author Mr.ZhiFeng
 * @QQ 947280924℡
 * @Email 18401448261@163.com
 * @copyright Copyright(c) 2017 
 * @sign 'Do not forget the beginning of the heart, the party must always!'
 * @file Catehory
 * @brief 无限级分类
 * @date 2017-05-15 16:08:20
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
use db;



class Category extends Model{

	public $table = 'category';

	public function get_Category(){

		$sql = 'SELECT * FROM '.$this->table;

		$cate_data = yii::$app->db->createCommand($sql)->queryAll();

		return $cate_data;
	}

	/**
	 * 分类树
	 */
	public function get_cate_tree($cate_data , $parend_id = 0){

		$cate_tree = array();

		foreach($cate_data as $k=>$v){
			if($v['parent_id'] == $parend_id){
				$cate_tree[$k] = $v;
				$cate_tree[$k]['children'] = $this->get_cate_tree($cate_data,$v['cat_id']);
			}
			
		}
		return $cate_tree;
	}


	/**
	 * 面包屑
	 */
	
	public function get_cate_parent($id, $cate_data){
		if(empty($id)){
			return null;
		}
		static $cate_parent;
		foreach($cate_data as $k=>$v){
			if($v['cat_id']==$id){
				$cate_parent[] = $v['cat_name'];
			    $this->get_cate_parent($v['parent_id'], $cate_data);
			}
			
		}


		return $cate_parent;
	}



}