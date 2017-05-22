<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Order controller
 * 订单
 */
class OrderController extends BaseController
{
	public function actionOrder()
	{
		return $this->render('order');
	}
}