<?php
use yii\widgets\LinkPager;
?>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品品牌</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="?r=brand/brand_add" class="actionBtn add">新增品牌</a>商品品牌</h3>


		<div class="page">
			<!-- 页面样式 -->
			<div class="vip">
				<div class="conform">
					<form>
						<div class="cfD">
							<input name="keyword" class="inpMain addUser" value=""   size="20" type="text">
							<input  class="btnGray button" value="搜索" type="button">
							<!-- <button class="button">搜索</button> -->
						</div>
					</form>
				</div>
				<!-- vip 表格 显示 -->
				<div class="conShow">
					<table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
						<tr>
							<td width="120px" class="tdColor tdC">序号</td>
							<td width="250px" class="tdColor">Logo</td>
							<td width="300px" class="tdColor">名称</td>
							<td width="235px" class="tdColor">是否展示</td>
							<td width="150px" class="tdColor">操作</td>
						</tr>
						<tbody id="tbody">
						<?php foreach ($brand as $key => $val) : ?>
						<tr>
							<td><?=$val['brand_id']?></td>
							<td><div class="onsImg onsImgv">
									<img src="<?='../../common/uploads/'.$val['brand_logo']?>" width="50">
								</div></td>
							<td><?=$val['brand_name']?></td>
							<td>
								<?php if($val['is_show']){?>
								<font color="green">是</font>
								<?php }else{?>
								<font color="red">否</font>
								<?php }?>
							</td>
							<td><a href="connoisseuradd.html"><img class="operation"
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
<?php $this->beginBlock('abc') ?>
$('.button').on('click',function(){
	var word = $('.addUser').val();
	$.ajax({
	   	type: "POST",
	   	url: "?r=brand/brand_search",
	   	data: {word:word},
	   	dataType: 'json',
	   	success: function(msg){
	   		var str = '';
	     	$.each(msg.brand,function(k,v){
				str += '<tr><td>'+v.brand_id+'</td>'
				str += '<td><div class="onsImg onsImgv"><img src="img/banimg.png"></div></td>'
				str += '<td>'+v.brand_name+'</td><td>'
					if(v.is_show == 1){
						str += '<font color="green">是</font>'
					}else{
						str += '<font color="red">否</font>'
					}
				str += '</td><td><a href="connoisseuradd.html"><img class="operation" src="img/update.png"></a><img class="operation delban" src="img/delete.png"></td></tr>';
     		})
     		$('#tbody').html(str);
     		<!-- $('.paging').html('\<\?= LinkPager::widget([\'pagination\' => '+msg.pages+']); \?\>') -->
	   	}
	});
})
<?php $this->endBlock() ?>  
<?php $this->registerJs($this->blocks['abc']); ?> 