<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Brand controller
 * 商品品牌
 */
class BrandController extends BaseController
{
	public function actionBrand()
	{
		return $this->render('brand');
	}
}