<?php
namespace backend\controllers;

use Yii;
use yii\db;
use yii\web\Controller;
use yii\web\UploadedFile;
use backend\models\Goods;

/**
 * Site controller
 */
class GoodsController extends Controller
{
	public $layout = 'layout';
	/**
	 * 查询商品列表
	 * @return [type] [description]
	 */
	public function actionIndex()
	{
		//查询商品列表 并关联货品查看是否生成货品
		$sql = 'SELECT g.goods_id,g.goods_name,c.cat_name,p.product_id from goods as g left join product as p ON g.goods_id = p.goods_id left join category as c ON g.cat_id = c.cat_id group by goods_id';
		$goods_data = Yii::$app->db->createCommand($sql)
            ->queryAll();
		// p($goods_data);
		return $this->render('product',['goods_data'=>$goods_data]);
	}
	/**
	 * 添加商品页面
	 * @return [type] [description]
	 */
	public function actionAdd_goods()
	{
		//查询品牌
		$brand_data = (new \yii\db\Query())
		    ->select(['brand_id', 'brand_name'])
		    ->from('brand')
		    ->all();
		//查询分类
		$cat_data = yii::$app->db->createCommand('SELECT *,CONCAT(path,"-",cat_id) as depath  from category order by depath  ;')->queryAll();
		//查询类型
		$type_data = (new \yii\db\Query())
		    ->select(['goods_type_id', 'type_name'])
		    ->from('goods_type')
		    ->all();
		$model = new Goods;
		// p($type_data);
		return $this->render('addproduct',['type_data'=>$type_data,'model'=>$model,'cat_data'=>$cat_data,'brand_data'=>$brand_data]);
	}
	/**
	 * 执行添加商品的后台
	 * @return [type] [description]
	 */
	public function actionAdd_pro()
	{

		$goods_data = Yii::$app->request->post('goods');
		$attr_value = Yii::$app->request->post('attr_value');
		//对商品属性 进行处理
		$attr_arr = [];
		foreach ($attr_value as $key => $val) {
			if (is_array($val)) {
				foreach ($val as $k => $v) {
					$attr_arr[] = [$key,$v];
				}
			} else {
				$attr_arr[] = [$key,$val];
			}
			
		}
		// p($attr_arr);
		$arr = array(
			'add_time'=>time(),
			);
		$model = new Goods;
		$goods_data = array_merge($goods_data,$arr);
		// p($goods_data);
		// 上传图片
		$model->goods_thumb = UploadedFile::getInstance($model, 'goods_thumb');
        $goods_data['goods_thumb'] = $model->upload();
		$info = Yii::$app->db->createCommand()->insert('goods', $goods_data)->execute();
		// p($info);
		if ($info) {
			//获取最后一条ID
			$goods_id = yii::$app->db->getLastInsertId();
			//添加goods_id
			array_walk($attr_arr, function(&$v, $k, $p) { $v = array_merge($v, $p); }, array($goods_id));
			$re = Yii::$app->db->createCommand()->batchInsert('goods_attr', ['attr_id', 'attr_value', 'goods_id'], $attr_arr)->execute();
			// p($attr_arr);
			if ($re) {
				return $this->redirect('?r=goods/index');
			} else {
				echo '添加失败';
			}
			
		}else{
			//失败
		}
	
	}
	public function actionGet_product()
	{
		$goods_id = yii::$app->request->get('goods_id');
		//根据商品ID 查看货品
		$sql = 'SELECT * from product left join ';
		$goods_attr = yii::$app->db->createCommand($sql)->queryAll();
	}
	/**
	 * 获取对应类型下的属性
	 * @return [type] [description]
	 */
	public function actionGet_attr()
	{

		$goods_type_id = yii::$app->request->get('goods_type_id');

		//通过类型ID 查询该类型下的可选规格
		$attr_list = (new \yii\db\Query())
		    ->select(['attr_id', 'attr_name','attr_index','goods_type_id', 'attr_values', 'attr_input_type'])
		    ->from('attribute')
		    ->where(['goods_type_id' => $goods_type_id])
		    ->all();
		if ($attr_list) {
			$data['list'] = $attr_list; 
			$data['status'] = 1; 
		} else {
			$data['status'] = 0; 
		}
		
		return json_encode($data);
	}
	/**
	 * 添加货品
	 * @return [type] [description]
	 */
	public function actionAdd_product()
	{
		//接收商品ID
		$goods_id = yii::$app->request->get('goods_id');
		//根据商品的属性 生成货品
		$sql = 'SELECT * from attribute as a left join goods_attr as g ON a.attr_id = g.attr_id where goods_id ='. $goods_id .' and attr_index = 1' ;
		$goods_attr = yii::$app->db->createCommand($sql)->queryAll();
		// p($cat_data);
	
		// p($goods_attr);
		$arr = [];
		foreach ($goods_attr as $k => $v) {
			$arr[$v['attr_id']][$v['goods_attr_id']][] = $v['attr_value'];
			$arr[$v['attr_id']][$v['goods_attr_id']][] = $v['attr_name'];
		}

		
		// p($arr);
		$dika_data['list'] = $this->dika($arr);
		
		$dika_data['goods_id'] = $goods_id;
		// p($dika_data);
		return $this->render('product_add',['data'=>$dika_data]);
		
	}
	public function actionAdd_product_pro()
	{
		$data = yii::$app->request->post();

		$goods_id = $data['goods_id'];
		unset($data['_csrf-backend']);

		$data_key = array_keys($data);
		$data_key[] = 'product_sn';
		unset($data['goods_id']);
		// array_merge_recursive($data);
		// p($data);
		$data_value = [];

		for($i=0;$i<count($data['attr_list']);$i++){

			foreach ($data as $k => $v) {
				$data_value[$i][] = $v[$i];
				
			}
			$data_value[$i][] = uniqid().$i.'_'.rand(111,999);
		}

		//添加goods_id
		array_walk($data_value, function(&$v, $k, $p) { $v = array_merge($p, $v); }, array($goods_id));
		
		
		$info = Yii::$app->db->createCommand()->batchInsert('product', $data_key, $data_value)->execute();
		if ($info) {
			return $this->redirect('?r=goods/index');
		} else {
			echo '添加失败';
		}
		
		// p($data_value);
	}
	/**
	 * 笛卡尔乘积
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	function dika($data)
	{
		$result = [];
		foreach (array_shift($data) as $key => $value) {
			$result[][$key] = $value;
		}
		// return $result;
		foreach ($data as $key => $value) {
			$re = array();
			foreach ($result as $k1 => $v1) {
				foreach ($value as $k2 => $v2) {
					$temp = $v1;
					$temp[$k2] = $v2;
					$re[] = $temp;
				}
			}
			$result = $re; 
		}
		return $result;
	}
}

function p($data)
{
	echo '<pre>';
	print_r($data);
	die;
}