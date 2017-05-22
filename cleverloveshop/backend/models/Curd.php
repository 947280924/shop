<?php 
namespace backend\models;
use yii\base\Model;
use yii\db\Query;
use yii;
use db;
class Curd extends Model{
	public $table;
	//查询
	public function select($table,$where){
		if($where==false){
			$where = '';
		}else{
			$where = ' where '.$where;
		}
		$sql = 'select * from '.$table.$where;
		$data = yii::$app->db->createCommand($sql)->queryAll();
		return $data; 
	}

	//删除	
	public function delete($table,$where){
		$info = yii::$app->db->createCommand()->delete($table,$where)->execute();
		return $info; 
	}
	//添加	
	public function insert($table,$data){
		$info = yii::$app->db->createCommand()->insert($table,$data)->execute();
		return $info; 
	}	
	//修改
	public function update($table,$action,$where){
		$info = yii::$app->db->createCommand()->update($table,$action,$where)->execute();
		return $info; 
	}
}



?>