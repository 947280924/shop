<script type="text/javascript" charset="UTF-8">
<!--
 //点击效果start
 function infonav_more_down(index)
 {
  var inHeight = ($("div[class='p_f_name infonav_hidden']").eq(index).find('p').length)*30;//先设置了P的高度，然后计算所有P的高度
  if(inHeight > 60){
   $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:inHeight});
   $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"><a class="more"  onclick="infonav_more_up('+index+');return false;" href="javascript:">收起<em class="pulldown"></em></a></p>');
  }else{
   return false;
  }
 }
 function infonav_more_up(index)
 {
  var infonav_height = 85;
  $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
  $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
 }
   
 function onclick(event) {
  info_more_down();
 return false;
 }
 //点击效果end  
//-->
</script>
	<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
     <!-- <a href="#" class="link_bg"><img src="images/link_bg_03.png" /></a>-->
<!--产品列表样式-->
<div class="Inside_pages clearfix">
 <!--位置-->
  <div class="Location_link">
  <em></em> 
  <a href="javascript:void(0)" style="text-decoration: none;color:#222222;">首页</a>
<?php foreach($cate_parent_arr as $key=>$v){ ?>

	<?=  '<a href="javascript:void(0)" style="text-decoration: none;color:#222222;">'.$v.'</a>'; ?>  &lt; 


<?php } ?>



  
 </div>
    <!--筛选样式-->
   <div id="Filter_style">
     <!--推荐-->

    <script type="text/javascript">
		jQuery(".page_recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,trigger:"click"});
		</script>
   <!--条件筛选样式-->
     <div class="Filter">
  <div class="Filter_list clearfix">
   <div class="Filter_title"><span>品牌：</span></div>
   <div class="Filter_Entire"><a href="?r=product/product_list">全部</a></div>
   <div class="p_f_name ">
   <p>
	<?php  foreach($brand_list as $key=>$v){ ?>

    <a href="?r=product/product_list&b=<?= $v['brand_id']; ?>" title="莱家/Loacker"><?= $v['brand_name']; ?>/<img src="../../common/uploads/<?= $v['brand_logo'] ?>" width="20"> </a>  

	<?php } ?>
	</p>
   </div>
   <p class="infonav_more"><a href="#" class="more" onclick="infonav_more_down(0);return false;">更多<em class="pullup"></em></a></p>
  </div>
  <div class="Filter_list clearfix">
  <div class="Filter_title"><span>价格：</span></div>
  <div class="Filter_Entire"><a href="?r=product/product_list">全部</a></div>
  <div class="p_f_name">
    <a href="?r=product/product_list&m=1">0-50</a><a href="?r=product/product_list&m=2">50-150</a><a href="?r=product/product_list&m=3">150-500</a><a href="?r=product/product_list&m=4">500-1000</a><a href="?r=product/product_list&m=5">1000以上</a>
  </div>
  </div>
 </div>
 </div>
 <!--样式-->
   <div  class="scrollsidebar side_green clearfix" id="scrollsidebar"> 
     <div class="show_btn" id="rightArrow"><span></span></div>
     <!--左侧样式-->
   <div class="page_left_style side_content"  >
  <!--浏览记录-->
   <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
   <div class=" side_list">
   <div class="Record">
     <div class="title_name">浏览记录</div>
	 <ul>
	  <li>
	   <a href="#">
	   <p><img src="products/p_32.jpg"></p>
	   <p class="p_name">商品名称</p>
	   </a>
	   <p><span class="p_Price left">价格:<b>￥5.30</b></span><span class="p_Sales right">销量：2345件</span></p>
	  </li>
	  <li>
	   <a href="#">
	   <p><img src="products/p_33.jpg"></p>
	   <p class="p_name">【麻麻派】东北特产野生开口松子 孕妇休闲零食坚果 原味坚果特产东</p>
	   </a>
	   <p><span class="p_Price left">价格:<b>￥5.30</b></span><span class="p_Sales right">销量：2345件</span></p>
	  </li>
	  <li>
	   <a href="#">
	   <p><img src="products/p_34.jpg"></p>
	   <p class="p_name">商品名称</p>
	   </a>
	   <p><span class="p_Price left">价格:<b>￥5.30</b></span><span class="p_Sales right">销量：2345件</span></p>
	  </li>
       <li>
	   <a href="#">
	   <p><img src="products/p_36.jpg"></p>
	   <p class="p_name">商品名称</p>
	   </a>
	   <p><span class="p_Price left">价格:<b>￥5.30</b></span><span class="p_Sales right">销量：2345件</span></p>
	  </li>
	 </ul>
   </div>
   <!--销售排行-->
    <div class="pro_ranking">
    <div class="title_name"><em></em>销量排行</div>
    <div class="ranking_list">
     <ul id="tabRank">
      <li class="t_p on">
      <em class="icon_ranking">1</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
      <li class="t_p">
      <em class="icon_ranking">2</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">3</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">4</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">5</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">6</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">7</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">8</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">9</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
       <li class="t_p">
      <em class="icon_ranking">10</em>
      <dt><h3><a href="#">韩束墨菊深度补水八件套（补水保湿 深层）</a></h3></dt>
      <dd class="clearfix">
      <a href="#"><img src="products/p_29.jpg" width="90" height="90" /></a>
      <span class="Price">￥23.00</span>
      </dd>     
      </li>
     </ul>
    </div>
    </div>
    <script type="text/javascript">
	jQuery("#tabRank li").hover(function(){ jQuery(this).addClass("on").siblings().removeClass("on")},function(){ });
    jQuery("#tabRank").slide({ titCell:"dt h3",autoPlay:false,effect:"left",delayTime:300 });
    </script>
    </div>
 </div>
  <script type="text/javascript"> 
$(function() { 
	$("#scrollsidebar").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime : 600
	});
});
</script>
 <!--列表样式属性-->
  <div class="page_right_style">
    <div id="Sorted" >
 <div class="Sorted">
  <div class="Sorted_style">
   <a href="#" class="on">综合<i class="iconfont icon-fold"></i></a>
   <a href="#">销量<i class="iconfont icon-fold"></i></a>
   <a href="#">价格<i class="iconfont icon-fold"></i></a>
   <a href="#">新品<i class="iconfont icon-fold"></i></a>
   </div>
   <!--产品搜索-->
   <div class="products_search">
    <input name="" type="text" class="search_text" value="请输入你要搜索的产品" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}"><input name="" type="submit" value="" class="search_btn">
   </div>
   <!--页数-->
   <div class="s_Paging">
   <span> 1/12</span>
   <a href="#" class="on">&lt;</a>
   <a href="#">&gt;</a>
   </div>
   </div>
   </div>
   <!--产品列表样式-->
 <div class="p_list  clearfix">
   <ul>
   <?php foreach($cate_goods as $key=>$v){ ?>
    <li class="gl-item">
    <em class="icon_special tejia"></em>
	<div class="Borders">
	 <div class="img"><a href="?r=product/product_show&goods_id=<?= $v['goods_id']; ?>"><img src="../../common/uploads/goods/<?= $v['goods_thumb']; ?>" style="width:220px;height:220px"></a></div>
	 <div class="Price"><b>¥<?= $v['goods_price']; ?></b></div>
	 <div class="name"><a href="Product_Detailed"><?= $v['goods_name']; ?> <?= $v['goods_desc']; ?></a></div>
	 <div class="Review">已有<a href="#">2345</a>购买</div>
	 <div class="p-operate">
	  <a href="#" class="p-o-btn Collect"><em></em>收藏</a>
	  <a href="#" class="p-o-btn shop_cart"><em></em>加入购物车</a>
	 </div>
	 </div>
	</li>
   <?php } ?>
   </ul>
   <div class="Paging">
    <div class="Pagination">
    <a href="#">首页</a>
     <a href="#" class="pn-prev disabled">&lt;上一页</a>
	 <a href="#" class="on">1</a>
	 <a href="#">2</a>
	 <a href="#">3</a>
	 <a href="#">4</a>
	 <a href="#">下一页&gt;</a>
	 <a href="#">尾页</a>	
     </div>
    </div>
   </div>
  </div>
 </div>
</div>