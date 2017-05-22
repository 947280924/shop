<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Cart controller
 * 购物车
 */
class CartController extends BaseController
{
	public function actionCart()
	{
		return $this->render('cart');
	}
}