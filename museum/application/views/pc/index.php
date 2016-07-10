<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<link rel="stylesheet" href="<?php echo base_url('assets/pc/css/style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">

<style>
.btn_black{
    background: black;
    /* height: 40px; */
    /* width: 80px; */
    /* line-height: 40px; */
    padding: 5px 10px;
    color: blanchedalmond;
    cursor: pointer;
}

.dash
{
  border-bottom: 2px solid #cc0000;
  width: 80px;
  height: 5px;
}

.collection
{
   width:400px; border:1px solid #636363; height:238px; margin:0 auto;
   padding: 10px;
   /*text-align: center;*/
}

.collection_item{
  height: 100%;
}
.collection_item img{
     display: block;
     margin: auto auto;

}

.collection .slick-prev {
    left: -50px;
    z-index: 999;
}

.collection .slick-next {
    right: -50px;
    z-index: 999;
}




.collection .slick-prev:before, .collection .slick-next:before {
    /* font-family: 'slick'; */
    font-size: 30px;
}

/*news*/
.news_title{
  font-size: 16px;
color: #333;
text-shadow: 1px 0 rgba(158, 0, 0, 0.21);
}
.news_title span{
  font-size: 16px;
    font-weight: 500;
    color: #cc0000;
    padding-right: 10px;
}

.news_content{
  line-height: 20px;
  margin-top: 10px;
}

/*title*/
.title_text{
  font-size: 20px;
  font-weight: 500;
  line-height: 28px;
  letter-spacing: 1px;
  color: #3e3e3e;
  text-shadow: rgba(255, 0, 0, 0.2) 0 1px 0;
  font-weight: 600;
}

.title_text_en{
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  letter-spacing: 0px;
  color: #3e3e3e;
  text-shadow: rgba(255, 0, 0, 0.2) 0 1px 0;
}

.news_item{
    padding-bottom: 20px;
    padding-top:20px;
    border-bottom: 1px solid  rgba(255, 0, 0, 0.2);
}

/*btn*/
.line_btn
{
  height: 40px;
text-align: center;
width: 1000px;
line-height: 40px;
overflow: hidden;
margin: 0 auto;
}

.link-item
{
  width: 100px;
  float: left;
  text-align: left;
}
.link-item-title
{
  font-size: 14px;
  color:#cc0000;
  text-shadow: rgba(255, 255, 255, 0.2) 0 1px 0;
      line-height: 24px;
}

.link-item-text
{
  font-size: 12px;
  color:white;
  text-shadow: rgba(255, 0, 0, 0.2) 0 1px 0;
      line-height: 24px;
}


</style>
</head>

<body style="background:#333333">
<div id="container">

<!-- banner -->
<div class="banner-top">
  <div><img src="<?php echo base_url('assets/pc/img/banner1.jpg')?>" width="100%" style="z-index:-1"/></div>
  <div><img src="<?php echo base_url('assets/pc/img/banner2.jpg')?>" width="100%"/></div>
  <!-- <div><img src="<?php echo base_url('assets/pc/img/banner3.jpg')?>" width="100%"/></div> -->
</div>


<!-- header -->
<div id="header">
  <h1><a href="index.html"><img src="<?php echo base_url('assets/pc/img/logo.png') ?>" width="250" height="50" alt="西藏博物馆"></a></h1>
  <div class="nav">
  <ul>
    <li>
        <a href="index.html" class="animate">首页</a>
    </li>
      <li>
        <a href="about.html" class="animate">资讯 </a>
        <div class="subNav" style="display: none;">
            	<a href="/into-the-ai/">西博简介</a>
              <a href="/development-process/">西博动态</a>
              <a href="/development-process/">新馆建设</a>
        </div>
      </li>
      <li>
        <a href="product.html" class="animate">展览</a>
        <div class="subNav" style="display: none;">
              <a href="/into-the-ai/">新展快讯</a>
              <a href="/development-process/">展览回顾</a>
        </div>
      </li>
      <li>
        <a href="research.html" class="animate">藏品</a>
        <div class="subNav" style="display: none;">
              <a href="/into-the-ai/">珍品赏析</a>
              <a href="/development-process/">藏品保护</a>
        </div>
      </li>
      <li>
        <a href="contact.html" class="animate">服务</a>
        <div class="subNav" style="display: none;">
        <a href="/into-the-ai/">基本陈列</a>
        <a href="/development-process/">参观指南</a>
        <a href="/development-process/">360全景</a>
        <a href="/development-process/">移动平台</a>
        </div>
      </li>
      <li>
        <a href="contact.html" class="animate">活动</a>
        <div class="subNav" style="display: none;">
        <a href="/into-the-ai/">活动邀约</a>
        <a href="/development-process/">志愿者风采</a>
        <a href="/development-process/">西博课堂</a>
        </div>
      </li>
  </ul>
  </div>
</div>


<div id="#basic_info" style="height:470px; padding: 20px 0 0px 0; background:#333333; text-align:center; ">
  <div style="width:1000px; margin: 0 auto;">
      <div style="    width: 680px;
    float: left;
    background: #e6e6e6;
    margin-right: 20px;
    overflow: hidden;
    height:470px">
          <img src="<?php echo base_url('assets/pc/img/basic.jpg')?>" width="100%" height="200px"/>
          <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
            <p class="title_text">西博简介</p>
            <p class="title_text_en">About Us</p>
            <div class="dash"></div>
          </div>
          <div style="padding:0 80px 0 80px; text-align:left; font-size:12px; color:#636363;margin-bottom:20px">
            <p style=" line-height:20px">西藏博物馆坐落于拉萨市罗布林卡东南角，是西藏第一座具有现代化功能的博物馆。1994年7月列入西藏自治区成立30周年大庆援藏62项工程之一，于1999年10月中华人民共和国成立50周年和西藏民主改革40周年之际落成开馆。博物馆占地面积53959平方米，总建筑面积23508平方米，展厅面6积10451平方米。馆区中轴线上依次坐落着序言厅、主展馆和…文物库房。西藏博物馆具有鲜明的藏族传统建筑艺术特点，同时又深刻体…现了现代建筑的实用特点和艺术神韵。
            </p>
          </div>
          <div style="padding: 3px 5px; overflow: hidden;"><a class="btn_black">VIEW MORE</a></div>
      </div>

      <div style="width:300px; float:left; height:470px; background:url('<?php echo base_url('assets/pc/img/basic_bg.png')?>'); background-size:100% 100%">
        <div style="padding:60px 0px 20px 40px; text-align:left;height:100px">
          <p class="title_text">VISITING </p>
          <p class="title_text">GUIDE</p>
          <p class="title_text_en">参观指南</p>
          <div class="dash"></div>
        </div>

        <div style="width:220px; padding:40px 40px 0 40px">
          <p style="    letter-spacing: 1px; font-size:12px; text-align:left">
            <b>开放时间：</b><br>
            上午，09:00~12:00 <br>
            下午，14:30~17:30 <br><br>
            <b>Tips：</b>免费开放，周一闭馆<br>
            本馆遇有重大活动或重要设备设施维修保养时，可根据需要临时闭馆，届时将告示公众。<br><br>
            <b>地址：</b> 西藏自治区拉萨市城关区罗布林卡路19号<br><br>
            <b>电话：</b>0891-6835244　6812210<br>

          </p>
        </div>
      </div>
  </div>
</div>

<div style=" padding: 20px 0 0px 0; background:#333333; width:100% ">
<div style="    height: 240px;
    width: 1000px;
    margin: 0 auto;
    overflow: hidden;
    background: black;
    padding: 30px 0 30px 0;">
  <div style="width:180px; float:left; padding-left:20px">
    <p style="    font-size: 20px;
    font-weight: 600;
    line-height: 20px;
    letter-spacing: 1px;
    color: #cc0000;
    text-shadow: rgba(255, 255, 255, 0.2) 0 1px 0;">珍品赏析 </p>
    <p style="font-size: 16px;font-weight:600;line-height:18px;letter-spacing:1px;color:#FFF;font-family:'黑体';margin-top:10px">TREASURE APPRECIATION</p>
    <!-- <p style="font-size: 16px;font-weight:600;line-height:18px;letter-spacing:1px;color:#FFF; font-family:'黑体'"></p> -->
    <div class="dash"></div>
  </div>
  <div style="width:600px; float:left; height:240px">
    <div class='collection' style="padding-top:30px">
        <div class="collection_item"><img src="<?php echo base_url('assets/pc/img/item1.png')?>" height="180px" style="z-index:-1"/></div>
        <div class="collection_item"><img src="<?php echo base_url('assets/pc/img/item2.png')?>" height="180px"/></div>
    </div>
  </div>
  <div style="width:200px;float:left;">
    <p style="    font-size: 20px;
    font-weight: 600;
    line-height: 20px;
    letter-spacing: 1px;
    color: #cc0000;
    font-family: '仿宋';
    text-shadow: rgba(255, 255, 255, 0.2) 0 1px 0;">双体陶罐 </p>
    <p style="    font-size: 12px;
    font-weight: 500;
    line-height: 18px;
    color: #636363;
    font-family: 'Microsoft YaHei';
    margin-top: 20px;
    padding-right: 20px;
    letter-spacing: 1px;
    text-shadow: rgba(232, 0, 0, 0.2) 0 1px 0;">
      双体陶罐出土于昌都卡若遗址，制作工艺纯熟，代表了卡若文化的制陶水平和卡若先民高超的器物造型能力，是新石器时代西藏陶器的代表和点睛之作，也是西藏博物馆的镇馆之宝。</p>
  </div>
</div>
</div>

<div class="line_btn" style="background: #cc0000;">
  <a style="color:white;    color: blanchedalmond;cursor: pointer;">查阅更多珍品 · VIEW MORE</a></div>

<div id="homeContent">
    	<div id="homeProduct" style="background: #333333;">
    		<div class="homeProduct">
            	<ul>
                	<li style="    background: black;"><a href="product.html">
                    	<div class="homeProImg animate"><img src="<?php echo base_url('assets/pc/img/pro1.png')?>" width="150" height="150" alt="休闲小菜"></div>
                        <div class="homeProTitle">
                        	<div class="homeProLine animate"><span></span></div>
                            <div class="homeProName animate"><strong class="animate">展厅导航</strong><span class="animate">展厅导航</span></div>
                        </div>
                        <div class="homeProPlus">
                        	<span class="animate">more</span><div class="animate">+</div>
                        </div></a>
                    </li>
                    <li style="    background: black;"><a href="product.html">
                    	<div class="homeProImg animate"><img src="<?php echo base_url('assets/pc/img/pro2.png')?>" width="150" height="150" alt="调味料"></div>
                        <div class="homeProTitle" style="left:200px;">
                        	<div class="homeProLine animate"><span></span></div>
                            <div class="homeProName animate" style="width:60px;"><strong class="animate">展览回顾</strong><span class="animate">展览回顾</span></div>
                        </div>
                        <div class="homeProPlus">
                        	<span class="animate">more</span><div class="animate">+</div>
                        </div></a>
                    </li>
                    <li style="margin-right:0px;    background: black;"><a href="product.html">
                    	<div class="homeProImg animate"><img src="<?php echo base_url('assets/pc/img/pro3.png')?>" width="150" height="150" alt="什锦泡菜"></div>
                        <div class="homeProTitle" style="">
                        	<div class="homeProLine animate"><span></span></div>
                            <div class="homeProName animate" style="width:60px;"><strong class="animate">360全景</strong><span class="animate">360全景</span></div>
                        </div>
                        <div class="homeProPlus">
                        	<span class="animate">more</span><div class="animate">+</div>
                        </div></a>
                    </li>
                </ul>
            </div>
          </div>
</div>

<div style=" background:#333333; width:100%; clear:both; overflow:hidden ">
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#d6d6d6">
    <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">西博动态</p>
      <p class="title_text_en">NEWS</p>
      <div class="dash"></div>
    </div>

    <div style="padding:0 80px 20px 80px; text-align:left; font-size:12px; color:#636363; ">
      <div class="news_item">
      <p class="news_title">
        <span>2016-5-11</span>博物馆新闻
      </p>
      <p class="news_content">
        西藏博物馆坐落于拉萨市罗布林卡东南角，是西藏第一座具有现代化功能的博物馆。1994年7月列入西藏自治区成立30周年大庆援藏62项工程之一，于1999年10月中华人民共和国成立50周年和西藏民主改革40周年之际落成开馆。博物馆占地面积53959平方米，总建筑面积23508平方米，展厅面6积10451平方米。馆区中轴线上依次坐落着序言厅、主展馆和…文物库房。西藏博物馆具有鲜明的藏族传统建筑艺术特点，同时又深刻体…现了现代建筑的实用特点和艺术神韵。
      </p>
    </div>

    <div class="news_item" style="border:none">
    <p class="news_title">
      <span>2016-5-11</span>博物馆新闻
    </p>
    <p class="news_content">
      西藏博物馆坐落于拉萨市罗布林卡东南角，是西藏第一座具有现代化功能的博物馆。1994年7月列入西藏自治区成立30周年大庆援藏62项工程之一，于1999年10月中华人民共和国成立50周年和西藏民主改革40周年之际落成开馆。博物馆占地面积53959平方米，总建筑面积23508平方米，展厅面6积10451平方米。馆区中轴线上依次坐落着序言厅、主展馆和…文物库房。西藏博物馆具有鲜明的藏族传统建筑艺术特点，同时又深刻体…现了现代建筑的实用特点和艺术神韵。
    </p>
  </div>
    </div>

  </div>
</div>

<div class="line_btn" style="background:black;">
  <a style="color:white;    color: blanchedalmond;cursor: pointer;">查阅更多新闻 · VIEW MORE</a></div>


<div style=" margin: 20px 0 0px 0; background:black; width:100% ">
<div style=" height: 120px; width:1000px; margin: 0 auto; padding:20px 0 20px 0">
  <div class="link-item">
    <p class="link-item-title">资讯</p>
    <p class="link-item-text">西博简介</p>
    <p class="link-item-text">西博动态</p>
    <p class="link-item-text">新馆建设</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">展览</p>
    <p class="link-item-text">新展快讯</p>
    <p class="link-item-text">展览回顾</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">藏品</p>
    <p class="link-item-text">珍品赏析</p>
    <p class="link-item-text">藏品保护</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">服务</p>
    <p class="link-item-text">基本陈列</p>
    <p class="link-item-text">参观指南</p>
    <p class="link-item-text">360全景</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">活动</p>
    <p class="link-item-text">活动邀约</p>
    <p class="link-item-text">志愿者风采</p>
    <p class="link-item-text">西博课堂</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">移动平台</p>
    <p class="link-item-text">投票</p>
    <p class="link-item-text">文创小店</p>
    <p class="link-item-text">语音导航</p>
  </div>

  <div class="link-item" style="width:300px">
    <p class="link-item-title">联系方式</p>
    <p class="link-item-text">地址</p>
    <p class="link-item-text">电话</p>
    <p class="link-item-text">邮箱</p>
  </div>

  <div class="link-item">
    <p class="link-item-title">微信公众平台</p>
    <img src="" width="80px" style="margin:10px"/>
  </div>


</div>
</div>

<div id="homeFooter">
<div class="homeFooter">
        <div class="homeFooterBottom">Copyright(C)西藏博物馆&nbsp;&nbsp;&nbsp;&nbsp;蜀ICP备11020230号&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
</div>


<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>


</body>

<script>

$(document).ready(function(){
  $('.banner-top').slick({
  dots: true,
  infinite: true,
  speed:1500,
  slidesToShow: 1,
  adaptiveHeight: true,
  autoplay: true,
  autoplaySpeed: 1500,
  arrows: true
});

$('.collection').slick({
  dots: true,
  infinite: true,
  speed: 1500,
  fade: true,
  autoplay: true,
  autoplaySpeed: 1500,
  cssEase: 'linear'
});

});

$(".nav li").hover(function(){
	$(".subNav,.subMenu",this).stop(false,true).slideDown();
},function(){
	$(".subNav,.subMenu",this).stop(false,true).slideUp(0);
})


	// $(".proMenu").click(function(){
	// 	$("#wra_opacity").fadeIn();
	// 	$(".xuan_left").stop().css({"margin-left":-2480+"px"}).animate({marginLeft:-1280},{duration:1600,easing:'easeInOutExpo'});
	// 	$(".wj_xuanleft").stop().css({"right":1480+"px"}).delay(400).animate({right:0},{duration:1600,easing:'easeInOutExpo'});
	// 	$(".xuan_right").stop().css({"margin-left":1480+"px"}).animate({marginLeft:-87},{duration:1600,easing:'easeInOutExpo'});
	// 	$(".wj_xuanright").stop().css({"left":1480+"px"}).delay(400).animate({left:0},{duration:1600,easing:'easeInOutExpo'});
	// 	$(".xuan_left").hover(function(){
	// 		$(".wj_xuanleft",this).stop().animate({right:-50},600)
	// 	},function(){
	// 		$(".wj_xuanleft",this).stop().animate({right:0},600)
	// 	})
	// 	$(".xuan_right").hover(function(){
	// 		$(".wj_xuanright",this).stop().animate({left:-50},600)
	// 	},function(){
	// 		$(".wj_xuanright",this).stop().animate({left:0},600)
	// 	})
	// })
	// $(".wra_opacity").click(function(){
	// 	$("#wra_opacity").fadeOut();
	// })
	// var navH = $("#header").offset().top;
	// $(window).scroll(function(){
	// 		var scroH = $(this).scrollTop();
	// 		if(scroH>=navH){
	// 			$("#header").css({"top":0});
	// 		}else if(scroH<navH){
	// 			$("#header").css({"top":25});
	// 		}
	// 	})
</script>
<script>
// $('.homeNewsList').myScroll({visible:1});
// var container2_Interval = new Array();
// $(".homeCaseBtn a").each(function (index, ele) {
//     var random = Math.random();
//     var objID = $(ele).attr("id");
// 	$(ele).css({opacity:random+0.2,"font-size":Math.random()*8+12});
//     var currentLeft = parseFloat($(ele).css("left").replace("px", ""));
//     container2_Interval[objID] = setInterval(function () {
//       $(ele).stop().animate({left: currentLeft + 40 + 30 * random}, 5 * 1000 + index * 400, "easeOutCubic"
//             , function () {
//               $(ele).stop().animate({left: currentLeft - 40 - 30 * random}, 5 * 1000 + index * 400, "easeOutCubic");
//             });
//     }, 2 * 5 * 1000 + index * 400);
// });
</script>

</html>
