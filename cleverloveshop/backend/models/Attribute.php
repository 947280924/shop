<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\base\Model;
use Yii;

class Attribute extends ActiveRecord
{
    public $attr_name;
    public $attr_index;
    public $attr_values;	
    public $goods_type_id;

	public function rules()
    {
    	return[
    		[['attr_name','attr_index','goods_type_id'],'required'],
    	];
    }
    public function attributeLabels()
    {
    	return [
           'attr_name' => '属性名称',
           'attr_index' => '规格属性',
           'attr_values' => '可选值',
           'goods_type_id' => '商品分类',
        ];
    }
    static public function droplist($arr)
	{
		$data = array();
		foreach ($arr as $key => $val) {
			$data[$val['goods_type_id']] = $val['type_name'];
		}
		return $data;
	}
	public function getType()
    {
        return $this->hasMany(goods_type::className(), ['goods_type_id' => 'goods_type_id']);
    }

}