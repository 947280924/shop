<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Order controller
 * 订单
 */
class LoginterController extends BaseController
{

	protected $user_name;
    protected $user_password;
    protected $user_email;
	protected $appid;
	protected $token;
	protected $callback;
	public $layout = false;

	public function init(){

		$this->user_name = isset($_GET['user_name'])?$_GET['user_name']:null;
		$this->user_password = isset($_GET['user_password'])?$_GET['user_password']:null;
		$this->user_email = isset($_GET['user_email'])?$_GET['user_email']:null;
		$this->appid = isset($_GET['appid'])?$_GET['appid']:null;
		$this->token = isset($_GET['token'])?$_GET['token']:null;
		$this->callback = isset($_GET['callback'])?$_GET['callback']:null;

	}
	/**
	 * 注册接口
	 * @return [type] [description]
	 */
	public function actionRegister(){
		$row = yii::$app->db->createCommand("SELECT * FROM user_frontend WHERE user_name = '$this->user_name'")->queryAll();
		$token =  yii::$app->db->createCommand("SELECT * FROM user_frontend WHERE appid='$this->appid' AND token = '$this->token'")->queryAll();
		if($row){
			$arr = [
				'code'=>'2',
				'message'=>'User name already exists!'
			];
			return json_encode($arr);
		}else if($token){
			$appid = uniqid().chr(97, 122);
			$token = md5(time().rand(1000,9999).$this->email);
			$arr = [
				'user_name'=>$this->user_name,
				'user_password'=>$this->user_password,
				'user_email'=>$this->user_email,
				':appid'=>$appid,
				'token'=>$token,
				];
			$add = yii::$app->db->createCommand()->insert('user_frontend',$arr)->execute();
			// file_put_contents('dile.txt', $appid.$token);
			if($add){
				$arr = [
					'code'=>'1',
					'message'=>'register success',
					'appid'=>$appid,
					'token'=>$token
				];
			}else{
				$arr = [
					'code'=>'4',
					'message'=>'register Fail',
				];				

			}
			return $this->callback.'('.json_encode($arr).')';
		}else{
			$arr = [
				'code'=>'3',
				'message'=>'Illegal request!'
			];
			return $this->callback.'('.json_encode($arr).')';
		}


		
		
	}

	public function actionLogin(){
		if(empty($this->token))
		{
			$arr = [
					'code'=>'3',
					'error'=>0,
					'message'=>'token not null',
				];
			return $this->callback.'('.json_encode($arr).')';
		}

		$row = yii::$app->db->createCommand("SELECT * FROM user_frontend  WHERE user_name = '$this->user_name'  AND user_password = '$this->user_password'")->queryAll();

		$token = '1725a4bc0d51b16a4cf1ded10755ef9c';

		if(str_replace('v', 'c', $this->token) == $token){
			if($row){
				$arr = [
						'code'=>'1',
						'error'=>0,
						'message'=>'login success',
						'data'=>['username'=>$row[0]['user_name'],
								 'email'=>$row[0]['user_email']
						]
						
					];
				return $this->callback.'('.json_encode($arr).')';

			}else{
					$arr = [
						'code'=>'0',
						'error'=>1,
						'message'=>'login Fail',
					];
				return $this->callback.'('.json_encode($arr).')';	
			}

		}else{
				$arr = [
						'code'=>'2',
						'error'=>1,
						'message'=>'login Fail!!',
						'erroeInfo'=>'token is illegal'
					];
				return $this->callback.'('.json_encode($arr).')';			

		}
	}

}