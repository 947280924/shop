<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * User controller
 * 用户中心
 */
class UserController extends BaseController
{
	/*
	 * 用户主页
	 */
	public function actionUser()
	{
		return $this->render('user');
	}

	/*
	 * 收货地址
	 */
	public function actionUser_address()
	{
		return $this->render('user_address');
	}

	/*
	 * 修改密码
	 */
	public function actionUser_changepwd()
	{
		return $this->render('user_changepwd');
	}

	/*
	 * 收藏中心
	 */
	public function actionUser_collect()
	{
		return $this->render('user_collect');
	}

	/*
	 * 优惠券
	 */
	public function actionUser_conpon()
	{
		return $this->render('user_conpon');
	}

	/*
	 * 资金管理
	 */
	public function actionUser_funds()
	{
		return $this->render('user_funds');
	}

	/*
	 * 用户订单
	 */
	public function actionUser_order()
	{
		return $this->render('user_order');
	}

	/*
	 * 用户个人资料
	 */
	public function actionUser_material()
	{
		return $this->render('user_material');
	}

}