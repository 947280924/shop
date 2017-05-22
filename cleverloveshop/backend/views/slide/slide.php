
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>轮播图</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="?r=slide/addslide" class="actionBtn add">添加轮播图</a>列表</h3>
    <div class="filter">

    <span>
        </span>
    </div>
        <div id="list">
    <form name="action" method="post" action="article.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="40" align="center">编号</th>
      <th align="left">轮播图名称</th>
      <th width="150" align="center">轮播图图片</th>
      <th width="80" align="center">跳转路径</th>
      <th width="40" align="center">排序</th>
      <th width="80" align="center">操作</th>
     </tr>
     <?php foreach ($query as $key => $v) { ?>
      .
   
          <tr>
      <td align="center"><?= $v['slide_id']; ?></td>
      <td align="center"><?= $v['slide_name']; ?></td>
      <td><a href="article.php?rec=edit&id=10"><img src="../../common/uploads/slide/<?= $v['slide_path']; ?>" width="80" alt="<?= $v['slide_name']; ?>"></a></td>
      <td align="center"><?= $v['slide_url']; ?></td>
      <td align="center"><?= $v['slide_sort']; ?></td>
      <td align="center">
              <a href="javascript:void(0);">编辑</a> | <a href="javascript:void(0);">删除</a>
             </td>
     </tr>
 <?php } ?>
         </table>
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0">请选择...</option>
      <option value="del_all">删除</option>
      <option value="category_move">移动分类至</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0">未分类</option>
                  <option value="1"> 公司动态</option>
                        <option value="2"> 行业新闻</option>
                 </select>
     <input name="submit" class="btn" type="submit" value="执行" />
    </div>
    </form>
    </div>
    <div class="clear"></div>
    <div class="pager">总计 10 个记录，共 1 页，当前第 1 页 | <a href="article.php?page=1">第一页</a> 上一页 下一页 <a href="article.php?page=1">最末页</a></div>           </div>
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