<?php
use yii\widgets\LinkPager;
?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品属性</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="?r=attr/attr_add" class="actionBtn add">新增属性</a>商品属性</h3>

		<div class="page">
			<!-- 页面样式 -->
			<div class="vip">
					<form>
							<input name="keyword" class="inpMain addUser" value="" placeholder="输入属性规格"  size="20" type="text">
							<input  class="btnGray button" value="搜索" type="button">
					</form>

				<!-- vip 表格 显示 -->
				<div class="conShow">
					 <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
						<tr>
							<td width="120px" class="tdColor tdC">序号</td>
							<td width="250px" class="tdColor">属性名称</td>
							<td width="300px" class="tdColor">所属分类</td>
							<td width="235px" class="tdColor">规格属性</td>
							<td width="235px" class="tdColor">属性值</td>
							<td width="150px" class="tdColor">操作</td>
						</tr>
						<tbody id="tbody">
						<?php foreach ($attr as $key => $val) : ?>
						<tr>
							<td><?=$val['attr_id']?></td>
							<td><?=$val['attr_name']?></td>
							<td><?=$val['goods_type']?></td>
							<td>
								<?php if($val['attr_index']){?>
								商品规格
								<?php }else{?>
								商品属性
								<?php }?>
							</td>
							<td><?=$val['attr_values']?></td>
							<td><a href="javascript:void(0)"><img class="operation"
									src="img/update.png"></a> <img class="operation delban"
								src="img/delete.png"></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
					</table>
					<div class="paging"><?= LinkPager::widget(['pagination' => $pages]); ?></div>
				</div>
				<!-- vip 表格 显示 end-->
			</div>
			<!-- vip页面样式end -->
		</div>

	</div>

	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end

</script>


