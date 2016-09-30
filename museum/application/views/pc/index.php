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
    background:rgba(0,0,0,0.3) ;
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
  <div><img src="<?php echo base_url('assets/pc/img/banner3.jpg')?>" width="100%"/></div>
  <div><img src="<?php echo base_url('assets/pc/img/banner1.jpg')?>" width="100%" style="z-index:-1"/></div>
  <div><img src="<?php echo base_url('assets/pc/img/banner2.jpg')?>" width="100%"/></div>
</div>


<!-- header -->
<?php include 'header.php';?>


<div id="#basic_info" style="height:470px; padding: 20px 0 0px 0; background:#333333; text-align:center; ">
  <div style="width:1000px; margin: 0 auto;">
      <div style="    width: 680px;
    float: left;
    background: #e6e6e6;
    margin-right: 20px;
    overflow: hidden;
    height:470px">
          <img src="<?php echo base_url('assets/pc/img/basic.jpg')?>" width="100%" height="200px"/>
          <div class="title_section">
            <div class="title_block">
            <p class="title_text">西博简介</p>
            <p class="title_text_en">About Us</p>
            </div>
          </div>
          <div style="padding:0 80px 0 80px; text-align:left; font-size:12px; color:#636363;margin-bottom:20px">
            <p style=" line-height:20px">
              西藏博物馆是由国家直接投资兴建的西藏自治区唯一一座国家一级博物馆。1999年10月，中华人民共和国成立50周年和西藏民主改革40周年之际落成开馆。
              博物馆占地面积5万余平方米，展厅面积1万平方米，整体建筑具有鲜明的藏族传统建筑艺术特色，同时兼具现代建筑的实用特点与功能，是传统与现代建筑风格有机结合的典范...

            </p>
          </div>
          <div style="padding: 3px 5px; overflow: hidden;"><a class="btn_black" href="/Pc/view/about">详细介绍</a></div>
      </div>

      <div style="width:300px; float:left; height:470px; background:url('<?php echo base_url('assets/pc/img/basic_bg.png')?>'); background-size:100% 100%">
        <!-- <div style="padding:60px 0px 20px 40px; text-align:left;height:100px">
          <p class="title_text">VISITING </p>
          <p class="title_text">GUIDE</p>
          <p class="title_text_en">参观指南</p>
          <div class="dash"></div>
        </div> -->

        <div class="title_section">
          <div class="title_block">
          <p class="title_text">参观指南</p>
          <p class="title_text_en">Visiting Guide</p>
          </div>
        </div>

        <div style="width:220px; padding:0px 40px 0 40px">
          <p style="    letter-spacing: 1px; font-size:12px; text-align:left">
            <b>开馆时间:</b><br>
            夏秋季(5月1日至10月31日):<br>
            09:30-17:30 (17:00游客停止入场)<br><br>

            冬春季(11月1日至次年4月30日):<br>
            10:30-17:00(16:30游客停止入场)<br><br>

            周一闭馆（节假日除外）<br><br>

            <b>公交线路：</b><br>
            公交车2,8,13,24路至西藏博物馆站下车即到<br><br>

            <b>地址：</b> 西藏自治区拉萨市城关区罗布林卡路19号<br><br>
            <b>电话：</b>0891-6835244　6812210<br>

          </p>
          <div style="padding: 3px 5px; overflow: hidden; margin-top:30px">
            <a class="btn_black" href="/Pc/view/instruction">详细了解</a>
          </div>
        </div>
      </div>
  </div>
</div>

<div style=" padding: 20px 0 0px 0; background:#333333; width:100% ">
<div style="    height: 240px;
    width: 1000px;
    margin: 0 auto;
    overflow: hidden;
    background:rgba(0,0,0,0.3); ;
    padding: 30px 0 30px 0;">
  <div style="width:180px; float:left; padding-left:20px">
    <div style="    border-left: 2px solid #cc0000;
    padding-left: 15px;">
    <p style="    font-size: 20px;
    font-weight: 600;
    line-height: 20px;
    letter-spacing: 1px;
    color: #cc0000;
    text-shadow: rgba(255, 255, 255, 0.2) 0 1px 0;">珍品赏析 </p>
    <p style="font-size: 16px;font-weight:600;line-height:18px;letter-spacing:1px;color:#FFF;font-family:'黑体';margin-top:10px">TREASURE APPRECIATION</p>
    <!-- <p style="font-size: 16px;font-weight:600;line-height:18px;letter-spacing:1px;color:#FFF; font-family:'黑体'"></p> -->
    <!-- <div class="dash"></div> -->
  </div>
  </div>
  <div style="width:600px; float:left; height:240px">
    <div class='collection' style="padding-top:30px">
        <div class="collection_item"><img src="<?php echo base_url('assets/pc/img/item1.png')?>" height="180px" style="z-index:-1"/></div>
        <div class="collection_item"><img src="<?php echo base_url('assets/pc/img/item2.png')?>" height="180px"/></div>
    </div>
  </div>
  <div style="width:200px;float:left;" id="desc1">
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

 <div style="width:200px;float:left;display:none" id="desc2">
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
  <a style="color:white;    color: blanchedalmond;cursor: pointer;" href="/Pc/view/item_list">查阅更多珍品 · VIEW MORE</a></div>

<div id="homeContent">
    	<div id="homeProduct" style="background: #333333;">
    		<div class="homeProduct">
            	<ul>
                	<li style="    background:rgba(0,0,0,0.3); ;"><a href="/navi/view_pc/1">
                    	<div class="homeProImg animate"><img src="<?php echo base_url('assets/pc/img/pro1.png')?>" width="150" height="150" alt="休闲小菜"></div>
                        <div class="homeProTitle">
                        	<div class="homeProLine animate"><span></span></div>
                            <div class="homeProName animate"><strong class="animate">展厅导航</strong><span class="animate">展厅导航</span></div>
                        </div>
                        <div class="homeProPlus">
                        	<span class="animate">more</span><div class="animate">+</div>
                        </div></a>
                    </li>
                    <li style="    background:rgba(0,0,0,0.3); ;"><a href="/Pc/view/expo_review">
                    	<div class="homeProImg animate"><img src="<?php echo base_url('assets/pc/img/pro2.png')?>" width="150" height="150" alt="调味料"></div>
                        <div class="homeProTitle" style="left:200px;">
                        	<div class="homeProLine animate"><span></span></div>
                            <div class="homeProName animate" style="width:60px;"><strong class="animate">展览回顾</strong><span class="animate">展览回顾</span></div>
                        </div>
                        <div class="homeProPlus">
                        	<span class="animate">more</span><div class="animate">+</div>
                        </div></a>
                    </li>
                    <li style="margin-right:0px;    background:rgba(0,0,0,0.3); ;"><a href="/Pc/view/360">
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

<div style=" background:#333333; width:100%; clear:both; overflow:hidden " ms-controller="expo_list_ctrl">
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#d6d6d6">
    <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">西博动态</p>
      <p class="title_text_en">NEWS</p>
      <div class="dash"></div>
    </div>

    <div style="padding:0 80px 20px 80px; text-align:left; font-size:12px; color:#636363; "
      ms-for='($index, item_info) in @list'>
      <div class="news_item">
      <a ms-click='{@direct2detail(item_info.CONTENT_ID)}'><p class="news_title">
        <span>{{item_info.PUBLISH_TIME}}</span>{{item_info.CONTENT_TITLE}}
      </p>
      <p class="news_content">
        {{@get_content_text_pc(item_info.CONTENT_TEXT)}}
      </p></a>
    </div>
    </div>

  </div>
</div>

<div class="line_btn" style="background:rgba(0,0,0,0.3); ;">
  <a style="color:white;    color: blanchedalmond;cursor: pointer;" href="/Pc/view/dynamic">查阅更多新闻 · VIEW MORE</a></div>

<!-- footer -->
<?php include 'footer.php';?>

<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/dynamic.js') ?>"></script>


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

</html>
