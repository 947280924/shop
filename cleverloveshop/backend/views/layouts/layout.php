
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Go Shop 管理中心</title>
<meta name="Copyright" content="Douco Design." />
<link href="./assets/css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./assets/js/jquery.min.js"></script>
<script type="text/javascript" src="./assets/js/global.js"></script>
</head>
<body>
<div id="dcWrap"> <div id="dcHead">
 <div id="head">
  <div class="logo"><a href="index.html"><img src="./assets/images/logo.gif" height="24" alt="logo"></a></div>
  <div class="nav">
   <ul>
    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
     <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
    </li>
    <li><a href="../index.php" target="_blank">查看站点</a></li>
    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
    <li class="noRight"><a href="module.html">DouPHP+</a></li>
   </ul>
   <ul class="navRight">
    <li class="M noLeft"><a href="JavaScript:void(0);"><?php echo Yii::$app->user->identity->username; ?></a>
     <div class="drop mUser">
      <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
      <a href="manager.php?rec=cloud_account">设置云账户</a>
     </div>
    </li>
    <li class="noRight"><a href="?r=site/logout">退出</a></li>
   </ul>
  </div>
 </div>
</div>
<!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
 <ul class="top">
  <li><a href="index.html"><i class="home"></i><em>管理首页</em></a></li>
 </ul>
 <ul>
  <li><a href="system.html"><i class="system"></i><em>系统设置</em></a></li>
  <li><a href="?r=nev"><i class="nav"></i><em>自定义导航栏</em></a></li>
  <li><a href="?r=slide"><i class="show"></i><em>首页幻灯广告</em></a></li>
 </ul>
   <ul>
  <li><a href="?r=category"><i class="productCat"></i><em>商品分类</em></a></li>
  <li><a href="?r=index/product"><i class="product"></i><em>商品列表</em></a></li>
 </ul>
  <ul>
  <li><a href="?r=brand/brand_list"><i class="articleCat"></i><em>商品品牌</em></a></li>
  <li><a href="?r=attr"><i class="article"></i><em>商品属性</em></a></li>
 </ul>
   <ul class="bot">
  <li><a href="?r=goods/index"><i class="backup"></i><em>商品管理</em></a></li>
  <li><a href="mobile.html"><i class="mobile"></i><em>手机版</em></a></li>
  <li><a href="theme.html"><i class="theme"></i><em>设置模板</em></a></li>
  <li><a href="?r=userbackend"><i class="manager"></i><em>网站管理员</em></a></li>
  <li><a href="manager.php?rec=manager_log"><i class="managerLog"></i><em>操作记录</em></a></li>
 </ul>
</div></div>

<?php echo $content; ?>