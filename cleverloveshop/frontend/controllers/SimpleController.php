<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Cimple controller
 * 注册登录
 */
class SimpleController extends BaseController
{
	/*
	 * 登录
	 */
	public function actionLogin()
	{
		return $this->renderPartial('login');
	}

	/*
	 * 注册
	 */
	public function actionRegion()
	{
		return $this->renderPartial('region');
	}
}