
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b></b><strong>添加货品</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="?r=goods/add_goods" class="actionBtn add">添加商品</a>添加货品</h3>
 
        <div id="list">
    <form name="action" method="post" action="?r=goods/add_product_pro">
      <input type="hidden" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>">

        <input type="text" name="goods_id" value="<?=$data['goods_id']?>">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th align="left">货品参数</th>
        <th align="left">货品数量</th>
        <th align="left">货品价格</th>
        <th align="left">货品文本</th>
      </tr>
        <?php foreach ($data['list'] as $k => $v): ?>
                  <tr>
              <td align="center">
              	<input type="text" name="attr_list[<?=$k?>]" value="<?=implode(',', array_keys($v));?>">
              	<?php foreach ($v as $key => $val): ?>
              	<?=$val[1]?>:<font color="red"><?=$val[0]?></font>
              	<?php endforeach ?>
              </td>
              <td align="center"><input type="text" name="sku[<?=$k?>]"></td>
                 </td>
              <td align="center"><input type="text" name="product_price[<?=$k?>]"></td>
                 </td>
              <td align="center"><input type="text" name="attr_text[<?=$k?>]" value="<?=implode(',', array_column($v, 0))?>"></td>
                 </td>
            </tr>
        <?php endforeach ?>
           
          </table>
    	<input  class="btn" type="submit" value="执行" />
    </form>
    </div>
    <div class="clear"></div>
    <div class="pager">总计 15 个记录，共 1 页，当前第 1 页 | <a href="product.php?page=1">第一页</a> 上一页 下一页 <a href="product.php?page=1">最末页</a></div>               </div>
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
<script type="text/javascript">

onload = function()
{
 document.forms['action'].reset();
}

function douAction()
{
 var frm = document.forms['action'];
 frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
}

</script>
</body>
</html>
