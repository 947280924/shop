<?php
use yii\widgets\ActiveForm;
?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加商品</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="?r=goods/index" class="actionBtn">商品列表</a>添加商品</h3>
    <?php $form = ActiveForm::begin(['action' => ['goods/add_pro'],'method'=>'post','options' => ['enctype' => 'multipart/form-data']]); ?>
      <input type="hidden" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" >
      <tr>
       <td width="90" align="right">商品名称</td>
       <td>
        <input type="text" name="goods[goods_name]" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">唯一货号</td>
       <td>
        <input type="text" name="goods[goods_sn]" size="40" class="inpFlie" />
        <img src="./assets/images/icon_no.png"></td>
      </tr>
      <tr>
       <td align="right">商品分类</td>
       <td>
        <select name="goods[cat_id]">
         <option value="0">未分类</option>
                          <?php foreach ($cat_data as $k => $v): ?>
                            <option value="<?php echo $v['cat_id']?>"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($v['path'],'-'));echo $v['cat_name']; ?></option>
                          <?php endforeach ?>
      </tr>
      <tr>
       <td align="right">商品品牌</td>
       <td>
        <select name="goods[brand_id]">
        <?php foreach ($brand_data as $k => $v): ?>
          <option value="<?php echo $v['brand_id']?>"><?php echo $v['brand_name']?></option>
        <?php endforeach ?>
            
         </select>
       </td>
      </tr>
      <tr>
       <td align="right">商品价格</td>
       <td>
        <input type="text" name="goods[goods_price]" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">商品排序</td>
       <td>
        <input type="text" name="goods[sort]" value="0" size="40" class="inpMain" />
       </td>
      </tr>
         
      <tr>
       <td align="right">缩略图</td>
       <td>
        <?= $form->field($model, 'goods_thumb')->fileInput()?>
        <img src="./assets/images/icon_no.png"></td>
      </tr>
         
      <tr>
       <td align="right">商品库存</td>
       <td>
        <input type="text" name="goods[goods_number]" size="40" class="inpFlie" />
      </tr>
         
      
         
      
      <tr>
       <td align="right">简单描述</td>
       <td>
        <input type="text" name="goods[goods_desc]" value="" size="50" class="inpMain" />
       </td>
      </tr>
      <!-- 添加商品属性start -->
      <tr>
       <td align="right">选择商品类型添加属性和规格</td>
       <td>
        <select name="goods_type_id" id="goods_type_id">
         <option value="0">未分类</option>
            <?php foreach ($type_data as $k => $v): ?>
                <option value="<?php echo $v['goods_type_id']?>"><?php echo $v['type_name']?></option>
            <?php endforeach ?>
        </select>
       </td>
      </tr>
      <table class="tableBasic" id="tab">
        
      </table>
      <script>
        $(function(){
          $('#goods_type_id').change(function(){
            var goods_type_id = $(this).val();

            if (goods_type_id==0) { 
              $('#tab').html('');
              return;
            }
            $.ajax({
               url: "?r=goods/get_attr",
               data: {
                goods_type_id:goods_type_id,
               },
               dataType:'json',
               success: function(obj){

                if (obj.status==1) {
                          var str = '';
                          $.each(obj.list,function(i,v){

                            if (v.attr_input_type==0) 
                            {
                              str+='<tr>\
                  <td align="right">'+v.attr_name+'</td>';
                            str+='<td><input type="text" name="attr_value['+v.attr_id+']" /></td>';
                            str+='</tr>';
                            } 
                            else if(v.attr_input_type==1)
                            {
                              var attr_arr = v.attr_values.split(',')
                              str+='<tr>\
                  <td align="right">'+v.attr_name+'</td>';
                            str+='<td>';
                              for (var i = 0; i < attr_arr.length; i++) 
                              {
                                
                                str+='<input type="radio" name="attr_value['+v.attr_id+']" value="'+attr_arr[i]+'" />'+attr_arr[i]+'&nbsp;&nbsp;&nbsp;';
                                
                              }
                              str+='</td>';
                              str+='</tr>';
                            }
                            else
                            {
                              var attr_arr = v.attr_values.split(',')
                              str+='<tr>\
                  <td align="right">'+v.attr_name+'</td>';
                            str+='<td>';
                              for (var i = 0; i < attr_arr.length; i++) 
                              {
                                
                                str+='<input type="checkbox" name="attr_value['+v.attr_id+'][]" value="'+attr_arr[i]+'" />'+attr_arr[i]+'&nbsp;&nbsp;&nbsp;';
                                
                              }
                              str+='</td>';
                              str+='</tr>';
                            }
                          })
                          $('#tab').html(str);
                }
               }
            });
          })
        })
      </script>
      <!-- 添加商品属性end -->


      <tr>
       <td></td>
       <td>
        <input  class="btn" type="submit" value="提交" />

      <?php ActiveForm::end() ?>
       </td>
      </tr>
     </table>
    </form>
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
