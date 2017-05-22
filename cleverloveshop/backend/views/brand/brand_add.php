<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加品牌</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="?r=brand/brand_list" class="actionBtn">品牌展示</a></h3>

		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">


				<?php

				$form = ActiveForm::begin([
				    'id' => 'login-form',
				    'options' => ['enctype' => 'multipart/form-data'],
				    'action' => '?r=brand/brand_add',
				    'method' => 'post'
				]) ?>
				<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic"> 
				    <?= $form->field($model, 'brand_name')->textInput(['style'=>'width:200px','class'=>'inpMain'])?>
				    <?= $form->field($model, 'img')->fileInput()?>
				    <?= $form->field($model, 'is_show')->radioList(['1'=>'是','0'=>'否'])  ?> 
				    </table>
				    <div class="form-group">
				        <div class="col-lg-offset-1 col-lg-11">
				            <?= Html::submitButton('添加', ['class' => 'btn btn_yes']) ?>
				            <?= Html::resetButton('取消', ['class' => 'btn btn_no']) ?>
				        </div>
				    </div>
				<?php ActiveForm::end() ?>
				
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>