<?php
namespace common\helps;

/*
 * 自定义全局公共方法
 */
class heads{
    public static function head()
    {
    	$ip=$_SERVER["REMOTE_ADDR"]; 
        return false;
        $weather = json_decode(@file_get_contents('http://api.k780.com/?app=weather.future&weaid='.$ip.'&appkey=23219&sign=6c6b735d5a841e5d45b13b664aaaa764&format=json'));
        if(!$weather){
            return false;
        }
        if($weather->success == 1)
        {
        	$data['address'] = $weather->result[0]->citynm;
         	$data['week'] = $weather->result[0]->week;
         	$data['weather'] = $weather->result[0]->weather;
         	$data['temp'] = $weather->result[0]->temperature;
         	$data['wind'] = $weather->result[0]->wind;
        }else
        {
        	$data['error'] = '未知错误';
        }
        // print_r($data);
        return $data;
    }
}