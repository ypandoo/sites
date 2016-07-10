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

/*banner*/
.banner-item{
  margin: 0 70px;
  /*border:1px solid #cc0000;*/
  -moz-box-shadow:    1px 1px 12px rgba(200, 200, 200, 1);
  -webkit-box-shadow:  1px 1px 12px rgba(200, 200, 200, 1);
  box-shadow: 1px 1px 12px rgba(200, 200, 200, 1);
}

.banner-item img{
  width: 100%;
  height: 160px;
}

.banner-top .slick-center {
    -moz-transform: scale(2);
    -ms-transform: scale(2);
    -o-transform: scale(2);
    -webkit-transform: scale(2);
    color: #e67e22;
    opacity: 1;
    transform: scale(2);
}

.banner-top{
  height: 400px;
}

.slick-slider .slick-track, .slick-slider .slick-list {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    padding: 100px 0px;
}

#table{
    display: table;
    width:100%;
    height: 420px;
    background: #333333;
}
#table-cell{
    display: table-cell;
    vertical-align: middle;
}
#center{
    background: #333333;
    width: 1280px;
    margin: 0 auto;
}

.one-edge-shadow {
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
}

.item_name_bg {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 25px;
    width: 100%;
    z-index: 6;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
    -webkit-background-origin: padding;
    -webkit-background-clip: content;
}

.banner-top .slick-center .item_name_bg p{
  text-align: left;
  font-size: 16px;
  line-height: 25px;
  padding-left: 0px;
  color: white;
  letter-spacing: 2px;
  margin-left: -70px;
  -moz-transform: scale(0.5);
  -ms-transform: scale(0.5);
  -o-transform: scale(0.5);
  -webkit-transform: scale(0.5);
  transform: scale(0.5);
}

.banner-top .slick-center .item_name_bg{
  display: block;
}

.banner-top .item_name_bg{
  display: none;
}

.single-item{
  width: 29.3%;
  margin: 2%;
  float:left;
  position: relative;
}

.single-item img{
  width: 100%;
}


.item_name_bg2 {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 25px;
    width: 100%;
    z-index: 6;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
    -webkit-background-origin: padding;
    -webkit-background-clip: content;
}

.item_name_bg2 p{
  color: white;
    padding-left: 10px;
    line-height: 24px;
}
</style>
</head>

<body style="background:#333333"  ms-controller="items_ctrl">

<div style="background:rgba(0,0,0,0.3); width:100%; height:120px"></div>

<div id="table">
      <div id="table-cell">
          <div id="center">
            <div class="banner-top">
              <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/1.jpg')?>" /><div class="item_name_bg"><p >翡翠提梁壶</p></div></div>
              <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/2.jpg')?>" /><div class="item_name_bg"><p >夜光陶瓷碗</p></div></div>
              <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/3.jpg')?>" /><div class="item_name_bg"><p >金贲巴瓶</p></div></div>
              <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/1.jpg')?>"  /><div class="item_name_bg"><p >翡翠提梁壶</p></div></div>
              <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/2.jpg')?>" /><div class="item_name_bg"><p >夜光陶瓷碗</p></div></div>
              <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/3.jpg')?>" /><div class="item_name_bg"><p >金贲巴瓶</p></div></div>
            </div>
          </div>
      </div>
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



<div style=" background:#333333; width:100%; clear:both; overflow:hidden; ">
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#d6d6d6;    padding-bottom: 80px;">
    <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">馆藏珍品</p>
      <p class="title_text_en">MUSEUM COLLECTION</p>
      <div class="dash"></div>
    </div>

    <div style="padding:0 80px 20px 80px; text-align:left; font-size:12px; color:#636363; ">
      <div style="width:100%"  ms-for='($index, item_info) in @data'>
        <div class="single-item">
          <a ms-attr="{href:@get_detail_link_pc(item_info.ITEM_ID)}"><img  ms-attr="{src:@get_pic_path(item_info.PATH)}" />
          <div class="item_name_bg2"><p >{{item_info.ITEM_NAME}}</p></div></div></a>
      </div>
    </div>

  </div>
</div>


<div style=" margin: 20px 0 0px 0; background:rgba(0,0,0,0.3); width:100% ">
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
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/item_list.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
</body>

<script>

$(document).ready(function(){
  $('.banner-top').slick({
  centerMode: true,
  centerPadding: '40px',
  adaptiveHeight: true,
  slidesToShow: 3,
  dots: true,
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
