<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\helps\heads;
AppAsset::register($this);

 

?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="fonts/iconfont.css"  rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/Orders.css" rel="stylesheet" type="text/css" />
<link href="css/show.css" rel="stylesheet" type="text/css" />
<link href="css/sumoselect.css" rel="stylesheet" type="text/css" />
<link href="css/purebox-metro.css" rel="stylesheet" id="skin">
<script src="js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="js/jquery.reveal.js" type="text/javascript"></script>
<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="js/common_js.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script src="js/jqzoom.js" type="text/javascript"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">下午好，欢迎光临锦宏颜！<em></em><a href="#">收藏我们</a></div>
  <div class="hd_top_manu clearfix">
    <ul class="clearfix">
     <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">我的订单</a></li> 
     <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">购物车</a> </li>
     <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">今日天气</a>
      <div class="hd_menu_list">
       <ul>
       <?php    $data = heads::head() ?  heads::head() : array( 0=>'网络异常' );  foreach($data as $key=>$v){ ?>
       <li><a href="#"><?= $v; ?></a></li>
       <?php } ?>
       </ul>
    </div>     
     </li>
       <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
      <div class="hd_menu_list erweima">
       <ul>
            <img src="images/erweima.jpg"  width="100px" height="100"/>
       </ul>
    </div>     
     </li>
    </ul>
  </div>
    </div>
  </div>
  <!--顶部样式1-->
  <div id="header"  class="header page_style">
  <div class="logo"><a href="index.html"><img src="images/logo.png" /></a></div>
  <!--结束图层-->
  <div class="Search">
    <p><input name="" type="text"  class="text"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>
  <p class="Words"><a href="#">苹果</a><a href="#">香蕉</a><a href="#">菠萝</a><a href="#">西红柿</a><a href="#">橙子</a><a href="#">苹果</a></p>
</div>
 <!--购物车样式-->
 <div class="hd_Shopping_list" id="Shopping_list">
   <div class="s_cart"><em class="iconfont icon-cart2"></em><a href="#">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
   <div class="dorpdown-layer">
    <div class="spacer"></div>
   <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
   <ul class="p_s_list">     
    <li>
        <div class="img"><img src="products/p_7.jpg"></div>
        <div class="content"><p><a href="#">产品名称</a></p><p>颜色分类:紫花8255尺码:XL</p></div>
      <div class="Operations">
      <p class="Price">￥55.00</p>
      <p><a href="#">删除</a></p></div>
      </li>
    </ul>   
   <div class="Shopping_style">
   <div class="p-total">共<b>1</b>件商品　共计<strong>￥ 515.00</strong></div>
    <a href="Shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
   </div>  
   </div>
 </div>
</div>
<!--菜单导航样式-->
<div id="Menu" class="clearfix">
<div class="index_style clearfix">
  <div id="allSortOuterbox" class="display">
    <div class="t_menu_img"></div>
    <div class="Category"><a href="#"><em></em>所有产品分类</a></div>
    <div class="hd_allsort_out_box_new">
   <!--左侧栏目开始-->
   <ul class="Menu_list"> 



   <?php foreach($this->params['layoutData'] as $key=>$v){ ?>
      
      <li class="name">
    <div class="Menu_name"><a href="javascript:void(0);" ><?= $v['cat_name']; ?></a> <span>&lt;</span></div>
     <div class="link_name">
      <p>
   <?php foreach($v['children'] as $k=>$l){ ?>
      <a href="?r=product/product_list&c=<?= $l['cat_id']; ?>"><?= $l['cat_name']; ?></a> 
<?php } ?>
      </p>
    </div>
    <div class="menv_Detail">
     <div class="cat_pannel clearfix">
      
       <div class="hd_sort_list">
       <?php foreach($v['children'] as $x=>$y){ ?>
        <dl class="clearfix" data-tpc="1">
        
       <dt><a href="?r=product/product_list&c=<?= $y['cat_id']; ?>"><?= $y['cat_name']; ?><i>></i></a></dt>
       <dd>
  <?php foreach($y['children'] as $m=>$n){ ?>

  
       <a href="?r=product/product_list&c=<?= $n['cat_id']; ?>"><?= $n['cat_name']; ?></a>
  
  <?php } ?>
       </dd> 
      </dl>
         <?php } ?> 
       </div>
      <div class="Brands">
           
      </div>
      <!--品牌-->     
    </div>     
    </li>
      <?php } ?>  
  </ul> 
  </div>    
  </div>
  <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",  });</script>
  <!--菜单栏-->
  <div class="Navigation" id="Navigation">
     <ul class="Navigation_name">
     <?php foreach($this->params['nav'] as $key=>$v){ ?>
  
      <li><a href="<?= $v['nev_url']; ?>"><?= $v['nev_name']; ?></a></li>

     <?php } ?>

     </ul>       
    </div>
  <script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>
     <!-- <a href="#" class="link_bg"><img src="images/link_bg_03.png" /></a>-->    
  </div>
</div>
</div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<!--Footer-->
 <div class="slogen">
  <div class="index_style">
    <ul class="wrap">
     <li>
      <a href="#"><img src="images/slogen_34.png" data-bd-imgshare-binded="1"></a>
      <b>安全保证</b>
      <span>多重保障机制 认证商城</span>
     </li>
     <li><a href="#"><img src="images/slogen_28.png" data-bd-imgshare-binded="2"></a>
      <b>正品保证</b>
      <span>正品行货 放心选购</span>
     </li>
     <li>
      <a href="#"><img src="images/slogen_30.png" data-bd-imgshare-binded="3"></a>
      <b>七天无理由退换</b>
      <span>七天无理由保障消费权益</span>
     </li>
      <li>
      <a href="#"><img src="images/slogen_31.png" data-bd-imgshare-binded="4"></a>
      <b>天天低价</b>
      <span>价格更低，质量更可靠</span>
     </li>
    </ul>
  </div>
 </div>
<div class="phone_style">
 <div class="index_style">
   <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
 </div>
</div>
<div class="footerbox clearfix">
  <div class="clearfix">
   <div class="">
   
   </div>
  </div>
 <div class="text_link">
   <p>
  <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
     <p>京ICP备11017033号 Copyright ©2017 北京吊吊生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
  </div>
  </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
