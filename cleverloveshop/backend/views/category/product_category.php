
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="?r=category/add_product_category" class="actionBtn add">添加分类</a>商品分类</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="120" align="left">分类编号</th>
        <th align="left">分类名称</th>
        <th align="left">是否展示</th>
       <th width="60" align="center">排序</th>
        <th width="80" align="center">操作</th>
     </tr>
     <?php foreach($data as $key=>$v){ ?>
     

            <tr>
        <td align="left"> <a href="product.php?cat_id=1"><?php echo $v['cat_id']; ?></a></td>
        <td><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',substr_count($v['path'],'-'));echo $v['cat_name']; ?></td>
        <td><?php echo $v['is_show']; ?></td>
        <td align="center"><?php echo $v['sort']; ?></td>
        <td align="center"><a href="connoisseuradd.html"><img class="operation"
                  src="img/update.png"></a> <img class="operation delban"
                src="img/delete.png"></td>
     </tr>
      <?php } ?>
     
          </table>
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