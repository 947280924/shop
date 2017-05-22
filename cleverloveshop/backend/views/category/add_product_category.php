
<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="?r=category/index" class="actionBtn">分类列表</a></h3>
    <form action="?r=category/cat_add"  method="post">
<input type="hidden" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">

      <tr>
       <td align="right">上级分类</td>
       <td>
        <select name="parent_id">
         <option value="0">添加顶级分类</option>
         <?php foreach($data as $key=>$v){ ?>
          <option value="<?= $v['cat_id']; ?>,<?= $v['path']; ?>"><?php echo str_repeat('--',substr_count($v['path'],'-')); ?> <?= $v['cat_name']; ?></option>
         <?php } ?>
    </select>
       </td>
      </tr>

      <tr>
       <td width="80" align="right">分类名称</td>
       <td>
        <input type="text" name="cat_name" value="" size="40" class="inpMain" />
       </td>
      </tr>

      <tr>
       <td align="right">排序</td>
       <td>
        <input type="text" name="sort" value="50" size="5" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input name="submit" class="btn" type="submit" value="提交" />
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