<?php
/**
 * @author Mr.ZhiFeng
 * @QQ 947280924℡
 * @Email 18401448261@163.com
 * @copyright Copyright(c) 2017 
 * @sign 'Do not forget the beginning of the heart, the party must always!'
 * @file 
 * @brief 
 * @date 2017-05-10 14:33:13
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use db;

/**
 * Site controller
 */
class NevController extends Controller
{
    public $layout = 'layout';
    public function actionIndex(){
         //实例化表
        $nev =  yii::$app->db->createCommand('select * from nev')->queryAll();
        return $this->render('index',['nev'=>$nev]);
    }
    public function actionNev_add(){
        $data = yii::$app->request->post();
        print_r($data);die;
        $count = count($data['nev_id']);
        $all_count = count($data['nev_name']);
        for($i=0;$i<$count;$i++){
            $arr = [
                'nev_name'=>$data['nev_name'][$i],
                'nev_url'=>$data['nev_url'][$i],
                'nev_sort'=>$data['nev_sort'][$i],
            ];
             @$info = yii::$app->db->createCommand()->update('nev',$arr,['nev_id'=>$data['nev_id'][$i]])->execute();
        }

        for($j=$count;$j<=$all_count;$j++){

            $add_arr = [
                'nev_name'=>$data['nev_name'][$j-1],
                'nev_url'=>$data['nev_url'][$j-1],
                'nev_sort'=>$data['nev_sort'][$j-1],
            ];
            @$info = yii::$app->db->createCommand()->insert('nev',$add_arr)->execute();      

        }
        

        return $this->redirect('?r=nev/index');

    } 
    public function actionNev_del(){
        $nev_id = yii::$app->request->get('nev_id');
        $info = yii::$app->db->createCommand()->delete('nev',['nev_id'=>$nev_id])->execute();   
        if($info){
        echo 1;
        }else{
        echo 0;
        }

    }
}




?>