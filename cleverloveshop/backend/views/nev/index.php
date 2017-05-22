<div id="urHere">DouPHP 管理中心<b>></b><strong>添加导航</strong> </div>  
 <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3></h3>
<div class="filter">

<div id="box">
<form action="?r=nev/nev_add" method="post" style="width:80%">
  <table width="80%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
<?php foreach($nev as $key=>$v){ ?>
<tr>
	<td><input type="text"  size="2" value="<?= $v['nev_id']; ?>" name="nev_id[]" readonly=true /> </td>
	<td><input type="text" value="<?= $v['nev_name']; ?>" name="nev_name[]"  placeholder="标签"/></td>
	<td>指定页面：<input type="text" value="<?= $v['nev_url']; ?>" name="nev_url[]" id="" /></td>
	<td>导航排序：<input type="input" size="5" name="nev_sort[]" value="<?= $v['nev_sort']; ?>" id="" /><br /></td>
	
	<td><input type="button" value="-" opt="<?= $v['nev_id']; ?>" class="down" /></td>
	</tr>
<?php } ?>
<tr>
<td><input type="button" value="+" id="btn" /></td>


</tr>
</table>

<input type="hidden" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>">


<input type="submit"  class="btn" value="保存" />
</form>
</div>
</div>
</div>

<script src="./js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

$(function(){
	$('#box').delegate('#btn','click',function(){
		$(this).parent().parent().before('<tr><td><input type="text" size="2" disabled=true class="nation" /></td><td><input type="text" name="nev_name[]"  placeholder="标签"/></td><td>指定页面：<input type="text" name="nev_url[]"  placeholder="跳转地址"/></td><td>导航排序：<input type="input" size="5" name="nev_sort[]" id="" /><br /></td><td>  <input type="button" value="-" class="down" /></td><tr>')
	})
})
$(".nation").attr("disabled",true); 
$(function(){
$('#box').delegate('.down','click',function(){
	var nev_id = $(this).attr('opt')
	var _this = $(this)
	$.ajax({
		data:{nev_id:nev_id},
		url:'?r=nev/nev_del',
		success:function(msg){
			if(msg == 1){
				_this.parent().parent().remove()
			}else{
				alert('Fail')
			}
		}
	})


	
})
})
</script>
