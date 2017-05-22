<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha; 
$this->title = 'Go Shop后台管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>欢迎管理员登录:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'action' => '?r=site/login'

            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'style'=>'width:200px;'])->label('用户名') ?>

                <?= $form->field($model, 'password')->passwordInput(['style'=>'width:200px;'])->label('密码') ?>
                
                <?= $form->field($model, 'rememberMe')->checkbox()->label('勿忘我') ?>
                <div class="form-group">
                    <?= Html::submitButton('立即登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
