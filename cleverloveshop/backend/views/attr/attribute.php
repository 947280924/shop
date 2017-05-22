<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => '?r=attr/attr_add',
    'method' => 'post'
]) ?>

<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加属性</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="?r=attr/index" class="actionBtn">属性列表</a></h3>
      <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">      
    <tr><?= $form->field($model, 'attr_name')->textInput(['style'=>'width:200px','class'=>'inpMain'])?></tr>
    <tr><?= $form->field($model, 'goods_type_id')->dropDownList($type, ['prompt'=>'--请选择--','style'=>'width:120px'])?></tr>
    <tr><?= $form->field($model, 'attr_index')->radioList(['1'=>'可选规格','0'=>'属性']) ?></tr>
    <tr><?= $form->field($model, 'attr_values')->textarea(['rows'=>3, 'style'=>'width:200px;','disabled'=>'disabled'])->hint('多条请用" "隔开')?></tr>
    </table>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('添加', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    </div>
    </div>

<?php ActiveForm::end() ?>
<?php $this->beginBlock('a') ?>

<?php $this->endBlock() ?>  
<?php $this->registerJs($this->blocks['a']); ?> 

<script type="text/javascript">


$("input[type='radio']").click(function(){

 var index = $(this).val();
 if(index == 1)
 {
     $('textarea').removeAttr('disabled');
 }else
 {
     $('textarea').attr('disabled',true);
 }
})
</script>
