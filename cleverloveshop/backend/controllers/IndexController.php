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

/**
 * Site controller
 */
class IndexController extends Controller
{
    public $layout = 'layout';

      public function init()
    {
        if (Yii::$app->user->isGuest) 
        {
            // 没有登录,登录,登录后,返回
            Yii::$app->user->setReturnUrl(Yii::$app->request->getUrl());  // 设置返回的url,登录后原路返回
            Yii::$app->user->loginRequired();
            Yii::$app->end();
        } 
    }

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionProduct(){
        return $this->render('product');

    }

    public function actionAdd_product(){
        return $this->render('addproduct');

    } 
    public function actionManager(){
        return $this->render('manager');

    } 
    public function actionAddmanager(){
        return $this->render('addmanager');

    }     
}




?>