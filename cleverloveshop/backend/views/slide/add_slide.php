<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['enctype' => 'multipart/form-data'],
    'action' => '?r=slide/addslide',
    'method' => 'post'
])



?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加轮播图</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
   
            <h3><a href="?r=slide" class="actionBtn">轮播图列表</a>轮播图</h3>



     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right">轮播图名称</td>
       <td>
     <?= $form->field($model, 'slide_name')->textInput(['size'=>'40','class'=>'inpMain'])?>
       </td>
      </tr>
      <tr>
       <td align="right">轮播图图片</td>
       <td>
       <?= $form->field($model, 'slide_path')->fileInput(['class'=>'inpMain'])?>
       </td>
      </tr>
      <tr>
       <td align="right">跳转路径</td>
       <td>
 <?= $form->field($model, 'slide_url')->textInput(['size'=>'40','class'=>'inpMain'])?>
       </td>
      </tr>
      <tr>
       <td align="right">排序</td>
       <td>
      <?= $form->field($model, 'slide_sort')->textInput(['size'=>'40','class'=>'inpMain'])?>
       </td>
      </tr>

      <tr>
       <td></td>
       <td>
                    <?= Html::submitButton('添加', ['class' => 'btn btn_yes']) ?>
                    <?= Html::resetButton('取消', ['class' => 'btn btn_no']) ?>
       </td>
      </tr>
     </table>
<?php ActiveForm::end() ?>
       </div>
 </div>
 <div class="clear"></div>
<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
</html>