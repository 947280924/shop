<script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });
    </script>
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
<!--用户中心收货地址-->
 <div class="user_style clearfix">
    <div class="user_center">
    
    <!--左侧菜单栏-->
  <div class="left_style">
    <div class="menu_style">
     <div class="user_title">用户中心</div>
     <div class="user_Head">
     <div class="user_portrait">
      <a href="#" title="修改头像" class="btn_link"></a> <img src="images/people.png">
      <div class="background_img"></div>
      </div>
      <div class="user_name">
       <p><span class="name">化海天堂</span><a href="#">[修改密码]</a></p>
       <p>访问时间：2016-1-21 10:23</p>
       </div>           
     </div>
     <div class="sideMen">
     <!--菜单列表图层-->
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_1"></em>订单中心</dt>
      <dd>
        <ul>
          <li> <a href="User_Orderform.html"> 我的订单</a></li>
          <li> <a href="User_address.html">收货地址</a></li>
          <li> <a href="user.php?act=booking_list"> 缺货登记</a></li>
        </ul>
      </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_2"></em>会员中心</dt>
        <dd>
      <ul>
        <li> <a href="user.php?act=profile"> 用户信息</a></li>
        <li> <a href="user.php?act=collection_list"> 我的收藏</a></li>
        <li> <a href="user.php?act=message_list"> 我的留言</a></li>
        <li> <a href="user.php?act=tag_list">我的标签</a></li>
        <li> <a href="user.php?act=affiliate"> 我的推荐</a></li>
        <li><a href="user.php?act=comment_list"> 我的评论</a></li>
      </ul>
    </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_3"></em>账户中心</dt>
      <dd>
       <ul>
      <li> <a href="user.php?act=bonus">我的红包</a></li>
      <li><a href="user.php?act=group_buy">我的团购</a></li>
       <li> <a href="user.php?act=track_packages"> 跟踪包裹</a></li>
       <li> <a href="user.php?act=account_log"> 资金管理</a></li>
      </ul>
     </dd>
    </dl>
     <dl class="accountSideOption1">
      <dt class="transaction_manage"><em class="icon_4"></em>分销中心</dt>
      <dd>
        <ul>
          <li> <a href="user.php?act=myshop">店铺管理</a></li>
          <li> <a href="user.php?act=myguide">我的盟友</a></li>
          <li> <a href="user.php?act=myaccount"> 我的佣金</a></li>
          <li> <a href="user.php?act=account_raply">申请提现</a></li>
        </ul>
      </dd>
    </dl>
    </div>
      <script>jQuery(".sideMen").slide({titCell:"dt", targetCell:"dd",trigger:"click",defaultIndex:0,effect:"slideDown",delayTime:300,returnDefault:true});</script>
   </div>  
  </div>
  <!--右侧样式-->
   <div class="right_style">
     <div class="info_content">
     <!--地址管理样式-->
      <div class="adderss_style">
        <div class="title_Section"><span>收货地址管理</span></div>
        <div class="adderss_list">
          <!--地址列表-->
      <div class="Address_List clearfix"> 
        <!--地址类表-->
           <ul class="Address_info">
            <div class="address_title">
            <a href="#" class="modify iconfont icon-fankui btn btn-primary" title="修改信息" data-toggle="modal" id="purebox"></a>
            地址信息 
            <a href="javascript:over('0')" class="delete "><i class="iconfont icon-close2"></i></a></div>
            <li>张婷婷</li>
            <li>四川成都武侯区簇景横街210号3栋1单元307号。</li>
            <li>182938596861</li>
            <li>610000</li>
           </ul>
           <ul class="Address_info">
            <div class="address_title">
            <a href="#" class="modify iconfont icon-fankui btn btn-primary" title="修改信息" data-toggle="modal" id="purebox2"></a>
            地址信息 <a href="javascript:over('0')" class="delete "><i class="iconfont icon-close2"></i></a></div>
            <li>张婷婷</li>
            <li>四川成都武侯区簇景横街210号3栋1单元307号。</li>
            <li>182938596861</li>
            <li>610000</li> 
           </ul>
           <ul class="Address_info">
            <div class="address_title">
            <a href="#" class="modify iconfont icon-fankui btn btn-primary" title="修改信息 " data-toggle="modal" id="purebox3"></a>
            地址信息 <a href="javascript:over('0')" class="delete "><i class="iconfont icon-close2"></i></a></div>
            <li>张婷婷</li>
            <li>四川成都武侯区簇景横街210号3栋1单元307号。</li>
            <li>182938596861</li>
            <li>610000</li>
           </ul>
           <ul class="Address_info">
            <div class="address_title">
            <a href="#" class="modify iconfont icon-fankui btn btn-primary" data-toggle="modal" id="purebox4" title="修改信息"></a>
            地址信息 <a href="javascript:over('0')" class="delete "><i class="iconfont icon-close2"></i></a></div>
            <li>张婷婷</li>
            <li>四川成都武侯区簇景横街210号3栋1单元307号。</li>
            <li>182938596861</li>
            <li>610000</li>
           </ul>           
         </div>
        </div>
        <form>
        <div class="Add_Addresss">
             <div class="title_name"><i></i>添加地址</div>
             <table>
              <tbody><tr>
               <td class="label_name">收货区域</td>
               <td colspan="3" class="select">
               <label> 国家/地区 </label><select class="kitjs-form-suggestselect "></select> 
                <label> 省份 </label><select class="kitjs-form-suggestselect "></select>
                <label> 市/县 </label><select class="kitjs-form-suggestselect "></select>
                <label> 区/县 </label><select class="kitjs-form-suggestselect"></select>
               </td>
               </tr>
               <tr><td class="label_name">详细地址</td><td><input name="" type="text" class="Add-text"><i>（必填）</i></td>
              <td class="label_name">送货时间</td><td><input name="" type="text" class="Add-text"><i>（选填）</i></td></tr>
              <tr>
              <td class="label_name">收件人姓名</td><td><input name="" type="text" class="Add-text"><i>（必填）</i></td>
              <td class="label_name">电子邮箱</td><td><input name="" type="text" class="Add-text"><i>（选填）</i></td>
              </tr>
              <tr>
              <td class="label_name">邮&nbsp;&nbsp;编</td><td><input name="" type="text" class="Add-text"><i>（必填）</i></td>
              <td class="label_name">手&nbsp;&nbsp;机</td><td><input name="" type="text" class="Add-text"><i>（必填）</i></td>           
              </tr>
              <tr>
              <td class="label_name">固定电话</td><td><input name="" type="text" class="Add-text"><i>（选填）</i></td></tr>
              <tr><td class="label_name"></td><td></td><td class="label_name"></td><td></td>
              </tr>             
             </tbody></table>
             <div class="address_Note"><span>注：</span>只能添加5个收货地址信息。请乎用假名填写地址，如造成损失由收货人自己承担。</div>
             <div class="btn"><input name="1" type="submit" value="添加地址" class="Add_btn"></div>
             
         </div>
       </form>
      </div>
     </div> 
   </div>
  </div>
 </div>
 	<script src="purebox/bootstrap-transition.js"></script>
	<script src="purebox/application.js"></script>	
	<script src="purebox/bootstrap-alert.js"></script>
	<script src="purebox/bootstrap-modal.js"></script>
	<script src="purebox/bootstrap-dropdown.js"></script>
	<script src="purebox/bootstrap-scrollspy.js"></script>
	<script src="purebox/bootstrap-tab.js"></script>
	<script src="purebox/bootstrap-tooltip.js"></script>
	<script src="purebox/bootstrap-popover.js"></script>
	<script src="purebox/bootstrap-button.js"></script>
	<script src="purebox/bootstrap-collapse.js"></script>
	<script src="purebox/bootstrap-carousel.js"></script>
	<script src="purebox/bootstrap-typeahead.js"></script>
	<script src="purebox/bootstrap-affix.js"></script>
	<script src="purebox/holder/holder.js"></script>
	<script src="purebox/google-code-prettify/prettify.js"></script>	
	<script src="purebox/jquery.purebox.js"></script>
	<script src="purebox/jquery.resizable.js"></script>         	