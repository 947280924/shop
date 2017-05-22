	<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
     <!-- <a href="#" class="link_bg"><img src="images/link_bg_03.png" /></a>-->
<!--产品详细页样式-->
<div class="clearfix Inside_pages">
<div class="Location_link">
  <em></em>
  <a href="javascript:void(0)" style="text-decoration: none;color:#222222;">首页</a>
<?php foreach($cate_parent_arr as $key=>$v){ ?>

	<?=  '<a href="javascript:void(0)" style="text-decoration: none;color:#222222;">'.$v.'</a>'; ?>  &lt; 


<?php } ?>
  <a href="javascript:void(0)" style="text-decoration: none;color:#222222;"><?= $goods_row['goods_name']; ?></a>


 </div>
 <!--产品详细介绍样式-->
 <div class="clearfix" id="goodsInfo">
 <!--产品图片放大-->
   <div class="mod_picfold clearfix">
    <div class="clearfix" id="detail_main_img">
	 <div class="layout_wrap preview">
     <div id="vertical" class="bigImg">
		<img src="../../common/uploads/goods/<?= $goods_row['goods_thumb']; ?>" width="" height="" alt="" id="midimg" />
		<div id="winSelector"></div>
	</div>
     <div class="smallImg">
		<div class="scrollbutton smallImgUp disabled">&lt;</div>
		<div id="imageMenu">
			<ul>
				<li><img src="small/01.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/02.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/03.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/04.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/05.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/06.jpg" width="68" height="68" alt="洋妞"/></li>
                <li><img src="small/07.jpg" width="68" height="68" alt="洋妞"/></li>
			</ul>
		</div>
		<div class="scrollbutton smallImgDown">&gt;</div>
	</div><!--smallImg end-->	
	<div id="bigView" style="display:none;"><div><img width="800" height="800" alt="" src="" /></div></div>
	 </div>
	</div>
		 <div class="Sharing">
	 <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1441079683326"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
  <!--收藏-->
	  <div class="Collect"><a href="javascript:collect(92)"><em class="ico1"></em>收藏商品( 2345 )</a></div>
	 </div>
   </div>
    <!--产品信息-->
    <div class="property">
     <form action="javascript:addToCart(97)" name="ECS_FORMBUY" id="ECS_FORMBUY">
       <h2><?= $goods_row['goods_desc']; ?></h2>
       <div class="goods_info"><?= $goods_row['goods_name']; ?></div>
       <div class="ProductD clearfix">
       <div class="productDL">
       
                     
        <dl><dt>售&nbsp;&nbsp;&nbsp;&nbsp;价：</dt><dd><span id="ECS_SHOPPRICE"><i>￥</i><?= $goods_row['goods_price']; ?></span><del>市场价：￥220.01</del></dd> </dl>
        <?php error_reporting(1); foreach($attr[0] as $key=>$v){ ?>
        <dl><dt><?= $key; ?>：</dt><dd>
        	<?php  foreach($v as $m=>$n){ 
        		echo $n;
        	}
      ?>
        </dd> </dl>
        <?php } ?>
        <?php  foreach($attr[1] as $key=>$v){ ?>
        <dl class="attr_ids">
          <dt><?= $key; ?>：</dt>
          <dd id="ids">
          <?php foreach($v as $x=>$n){ ?>
           <div class="item" opt="<?= $x; ?>" ><b></b><a href="javascript:;" title="<?= $n; ?>"><?= $n; ?></a></div> 
 		<?php } ?>
          </dd>
        </dl>
        
        <?php } ?>
        <script type="text/javascript">
        $(document).on('click','.item',function(){
        	$(this).addClass('selected').siblings().removeClass('selected')
        	var ids = $(this).attr('opt')
        	var ids_arr = []
			var goods_id = "<?=$goods_id?>"

	        var attr_list = "";
             //循环获取商品属性ID
            $('#ids>div').each(function(k,v){
                if($(this).hasClass('selected'))
                {
                   attr_list += ','+ $(this).attr('opt')
                }
            })
            attr_list = attr_list.substr(1)
			if($('.attr_ids').length == attr_list.split(',').length)
			{
	      		$.ajax({
	      			type:'post',
	      			data:{goods_id:goods_id},
	      			url:'?r=product/product_ishave',
	      			dataType:'json',
	      			success:function(msg){
	      				var spec_list = []
	      				$(msg).each(function(k,v){
	      					spec_list.push(v) 
	      				})
	      				if(!($.inArray(attr_list,spec_list<0))){
	      					alert('没有该组合')
	      				}else{
	      					alert('可以购买')
	      				}	
	      			}
	      		})
	      	}

        })

        </script>
        <dl><dt>上架时间：</dt><dd><?= date('Y-m-d',$goods_row['add_time']); ?></dd></dl>
        <div class="Appraisal"><p>销售评价</p><a>1234</a> </div>
       </div>
      </div>
      <div class="buyinfo" id="detail_buyinfo">
		<dl>
        <dt>数量</dt>
        <dd>
		  <div class="choose-amount left">
			<a class="btn-reduce" href="javascript:;" onclick="setAmount.reduce('#buy-num')">-</a>
			<a class="btn-add" href="javascript:;" onclick="setAmount.add('#buy-num')">+</a>
			<input class="text" id="buy-num" value="1" onkeyup="setAmount.modify('#buy-num');">		
		 </div>
		 <div class="P_Quantity">剩余：<?= $goods_row['goods_number']; ?>件</div>        
        </dd>
	  <dd>
	    <div class="wrap_btn"> <a href="javascript:addToCart_bak(92)" class="wrap_btn1" title="加入购物车"></a> 
		  <a href="javascript:addToCart(92)" class="wrap_btn2" title="立即购买"></a> </div>
		  </dd>
	  </dl>
	  </div>
      <div class="Guarantee clearfix">
	   <dl><dt>支付方式</dt><dd><em></em>货到付款（部分地区）</dd><dd><em></em>在线支付</dd> 
	   <dd> <div class="payment" id="payment"> 
       <a href="javascript:void(0);" class="paybtn">支付方式<span class="iconDetail"></span></a><ul><li>货到付款</li><li>礼品卡支付</li><li>网上支付</li><li>银行转账</li></ul>
       </div>
	  </dd>
      </dl>
     </div>
     </form>
    </div>
    <!--推荐-->
    <div class="p_right_info">
    <div class="Brands">
     <a href="#"><img src="products/logo/logo.jpg"  width="120" height="60"/></a>
     <h5>红尊</h5>
    </div>
    <div class="Recommend">
      <div class="title_name">同类产品推荐</div>
	  <div class="Recommend_list">
	    <ul>
		 <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/p_3.jpg" data-bd-imgshare-binded="1"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		  <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/p_17.jpg" data-bd-imgshare-binded="1"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		  <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/p_24.jpg" data-bd-imgshare-binded="1"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		</ul>
	  </div>
   </div>
  </div>
 </div>
 <!--样式-->
  <div class="clearfix">
   <div class="left_style">
    <div class="user_Records">
     <div class="title_name">用户浏览记录</div>
	 <ul>
	  <li>
	   <a href="#">
	   <p><img src="Products/p_4.jpg" data-bd-imgshare-binded="1"></p>
	   <p class="p_name">SanmiuSunflower新苗向日葵 乳酪夹心饼干 270g 菲律宾进口</p>
	   </a>
	   <p><span class="p_Price"><i>￥</i>5.30</span><b>10.4</b></p>
	  </li>
	  <li>
	   <a href="#">
	   <p><img src="Products/p_5.jpg" data-bd-imgshare-binded="1"></p>
	   <p class="p_name">商品名称</p>
	   </a>
	   <p><span class="p_Price"><i>￥</i>5.30</span><b>10.4</b></p>
	  </li>
	  <li>
	   <a href="#">
	   <p><img src="Products/p_3.jpg" data-bd-imgshare-binded="1"></p>
	   <p class="p_name">商品名称</p>
	   </a>
	   <p><span class="p_Price"><i>￥</i>5.30</span><b>10.4</b></p>
	  </li>
	 </ul>
   </div>
   </div>
   <!--介绍信息样式--> 
   <div class="right_style">	  
		<div class="inDetail_boxOut ">
	 <div class="inDetail_box">
	  <div class="fixed_out ">
	   <ul class="inLeft_btn fixed_bar">
                  <li class="active"><a id="property-id" href="#shangpsx" class="current">规格与包装</a></li>
                  <li><a id="detail-id" href="#shangpjs">商品属性</a></li>
                  <li><a id="shot-id" href="#miqsp">售后服务</a></li>
                  <li><a id="coms1-id" href="#status2">买家评论(12)</a></li>
                </ul>
               <div class="subbuy">
          <span class="extra currentPrice"> ¥129.90</span>
          <a href="#" class="extra  notice J_BuyButtonSub">立即购买</a></div>
	  </div>
	 </div>	  
	</div> 
    <div id="shangpjs" class="info_style" style="text-align:center"><img src="products/cp.jpg" /></div>
    <div class="productContent" id="status2">
      <div class="iComment clearfix">
        <div class="rate"><strong id="goodRate">100<span>%</span></strong><br>
          <span>好评度</span></div>
        <div class="percent" id="percentRate">
          <dl>
            <dt>好评<span>(100%)</span></dt>
            <dd>
              <div style="width:100px;"></div>
            </dd>
          </dl>
          <dl>
            <dt>中评<span>(0%)</span></dt>
            <dd class="d1">
              <div style="width:0;"> </div>
            </dd>
          </dl>
          <dl>
            <dt>差评<span>(0%)</span></dt>
            <dd class="d1">
              <div style="width:0;"> </div>
            </dd>
          </dl>
        </div>
        <div class="actor">
          <dl>
            <dt>发表评价即可获得10积分，精华评论更有 <font color="red">额外奖励</font> 积分；<br>
              还有7个多倍积分名额哦，赶紧抢占吧！<br>
              只有购买过该商品的用户才能进行评价。</dt>
            <dd>
              <input type="submit" class="Publication_btn" title="" onclick="send_cooment()" value="发表评论">
            </dd>
          </dl>
        </div>
      </div>
	  <div class="commentBox" style="display:none;">
		<form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
		  <h3>商品评分</h3>
		  <div id="star">
			<ul>
			  <li><span onclick="dorank(1)"></span>
				<p>1分</p>
				<p>非常不满意</p>
			  </li>
			  <li><span onclick="dorank(2)"></span>
				<p>2分</p>
				<p>不满意</p>
			  </li>
			  <li><span onclick="dorank(3)"></span>
				<p>3分</p>
				<p>一般</p>
			  </li>
			  <li><span onclick="dorank(4)"></span>
				<p>4分</p>
				<p>满意</p>
			  </li>
			  <li><span onclick="dorank(5)"></span>
				<p>5分</p>
				<p>非常满意</p>
			  </li>
			</ul>
			<input type="hidden" name="rank" id="rank" value="1">
			<input type="hidden" name="cmt_type" value="">
			<input type="hidden" name="id" value="78">
			<input type="hidden" name="email" id="email" value="null@mial.com">
		  </div>
		  <h4>评论内容</h4>
		  <div class="bd">
			<textarea name="content" id="content" class="textarea_long" onkeyup="checkLength(this);"></textarea>
			<p class="g">
			  <label>&nbsp; </label>
			  <input type="submit" value="发表" class="btn_common">
			  <span t="word_calc" class="word"><b id="sy">0</b>/1000</span> </p>
		  </div>
		</form>
		</div>
		<div id="ECS_COMMENT"> <div class="Comment">
<div class="CommentTab">
  <ul>
	<li class="active" onclick="javascript:gotoPage(1,78,0,0);">全部评论(0)</li>
	<li onclick="javascript:gotoPage(1,78,0,3);">好评(0)</li>
	<li onclick="javascript:gotoPage(1,78,0,2);">中评(0)</li>
	<li onclick="javascript:gotoPage(1,78,0,1);">差评(0)</li>
  </ul>
</div>
<div class="CommentText" id="goodsdetail_comments_list" style="display:block">
  <ul class="clearfix">
	  </ul>
  <div class="comment_page clearfix">
	<div class="comment_Number"> <span class="f_l f6" style="margin-right:10px;">共 <b>0</b> 条评论</span>
	  <div id="comment_Pager_Number" class="comment_Pager_Number"> 
	  <a href="javascript:gotoPage(1,78,0,0)">首页</a>          
      <a class="prev" href="javascript:;">上一页</a>                    
      <a class="next" href="javascript:;">下一页</a>         
      <a class="last" href="javascript:;">尾页</a>	   
      </div>
	</div>
  </div>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
var cmt_empty_username = "请输入您的用户名称";
var cmt_empty_email = "请输入您的电子邮件地址";
var cmt_error_email = "电子邮件地址格式不正确";
var cmt_empty_content = "您没有输入评论的内容";
var captcha_not_null = "验证码不能为空!";
var cmt_invalid_comments = "无效的评论内容!";

/**
 * 提交评论信息
*/
function submitComment(frm)
{
  var cmt = new Object;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = frm.elements['rank'].value;
  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }

   Ajax.call('comment.php', 'cmt=' + cmt.toJSONString(), commentResponse, 'POST', 'JSON');
   frm.elements['content'].value = '';
   return false;
}

/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
      }
    }
  }

//]]>
</script>
</div>
      	<script type="text/javascript">
		$('.CommentTab ul').find('li').click(function(){
		  $('.CommentTab ul').find('li').removeClass('active');
		  $('.CommentText').css({display:'none'});
		  $(this).addClass('active');
		  $('.CommentText').eq($(this).index()).css({display:'block'});
		});
		</script>
    </div>
   </div>
  </div>
</div>
<script language="javascript">
function updatenum(type){
	var qty = parseInt(document.forms['ECS_FORMBUY'].elements['number'].value);
	if(type == 'del'){
		if(qty > 1){
			document.forms['ECS_FORMBUY'].elements['number'].value = (qty - 1);
		}
	}else{
		document.forms['ECS_FORMBUY'].elements['number'].value = (qty + 1);
	}
	//changePrice();
}
function dorank(rank_id){
    var rank_id;
	$("#rank").val(rank_id);
}
function send_cooment(){
    $(".commentBox").toggle();
}
function checkLength(which) {
	var maxChars = 1000; //
	if(which.value.length > maxChars){
		alert("您出入的字数超多限制!");
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
}
</script>