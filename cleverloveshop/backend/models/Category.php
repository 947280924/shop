<?php 
namespace backend\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class Category extends ActiveRecord{

    public static function tableName()
    {
        return 'Category';
    }

}