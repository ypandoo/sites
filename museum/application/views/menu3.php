<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>西藏博物馆</title>
    <meta name="keywords" content="西藏博物馆"/>
    <meta name="description" content="西藏博物馆"/>
    <meta name="robots" content="all"/>
    <meta name="copyright" content="西藏博物馆"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="author" content="" />
    <meta name="revisit-after"  content="1 days" />
    <meta name="format-detection" content="email=no" />
    <meta name="format-detection" content="telephone=yes" />
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/about.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">

</head>

<style>
/*.item_container_left
{
  width: 49%;
  float: left;
  margin-left: 0.99%;
}

.item_container_right
{
  width: 49%;
  float: left;
  margin-right: 0.99%;
  margin-top: 20px;
}

.item_container_inside
{
  border: 1px solid #eeeeee;
  height: 60px;
  padding: 6px;
  margin: 7px;
}*/

#bg {
background: url('<?php echo base_url('assets/front/img/main_yuejian.jpg') ?>') no-repeat  fixed;
-webkit-background-size:  cover;
-moz-background-size:  cover;
-o-background-size:  cover;
background-size: cover;
overflow: hidden;
}

.menu{
width: 145px;
height: 410px;
position: absolute;
top: 10%;
right: 20px;
/* background-size: 145px 410px; */
background: url('<?php echo base_url('assets/front/img/main_yuejian_menu.png') ?>') 145px 410px;
background-size: cover;
}

.menu_item{
height: 50px;
width: 145px;
}

.row{
width: 90%;
margin-left: 5%;
}

.row .item{
width: 48%;
float: left;
height: 50px;
text-align: center;
padding-top: 6.5px;
border: 1px solid rgba(0,0,0,0.1);
margin-top: 10px;
}

</style>

<body>
  <div id="header" class="newhead">
      <div class="logo" ></div>
  </div>

  <!-- banner -->
  <div class="banner-top" style="margin-top:46px">
    <div><img src="<?php echo base_url('assets\front\img\m\m3_banner1.jpg')?>" width="100%" style="z-index:-1"/></div>
    <div><img src="<?php echo base_url('assets\front\img\m\m3_banner2.jpg')?>" width="100%"/></div>
    <!-- <div><img src="<?php echo base_url('assets\front\img\menu/banner3.jpg')?>" width="100%"/></div> -->
  </div>

  <div class="page-title" style="margin-top:20px">
    <h2>悦游</h2>
  </div>

<div class="row" style="margin-top:10px">
  <div class="item"  style="margin-right:4%"><a href='<?php echo base_url('pages/view/shop') ?>'>
    <img src='<?php echo base_url('assets\front\img\menu\m3_shop.png') ?>' height="35px">
  </a></div>
  <div class="item"><a href='<?php echo base_url('pages/view/activity') ?>'>
    <img src='<?php echo base_url('assets\front\img\menu\m3_activity.png') ?>' height="35px">
  </a></div>
</div>

<div class="row">
  <div class="item"  style="margin-right:4%"><a href='<?php echo base_url('pages/view/volunteer') ?>'>
    <img src='<?php echo base_url('assets\front\img\menu\m3_volunteer.png') ?>' height="35px">
  </a></div>
  <div class="item"><a href='<?php echo base_url('pages/view/lesson') ?>'>
    <img src='<?php echo base_url('assets\front\img\menu\m3_lesson.png') ?>' height="35px">
  </a></div>
</div>

<!-- <div class="row">
  <div class="item"  style="margin-right:4%"><a href='http://mp.weixin.qq.com/s?__biz=MzIzMDI4MDM1OQ==&mid=100000127&idx=1&sn=69b7a2337783870b80c2bcf9388fdb23&scene=20#wechat_redirect'>
    <img src='<?php echo base_url('assets\front\img\menu\m3_vote.png') ?>' height="35px">
  </a></div>
</div> -->



    <!-- <div class="menu" id="menu" style="display:none">

      <a href='<?php echo base_url('pages/view/item_list') ?>'><div class="menu_item" style="margin-top:8px"></div></a>
      <a href='<?php echo base_url('pages/view/item_list_all') ?>'><div class="menu_item"></div></a>
      <a href='<?php echo base_url('navi/view/1') ?>'><div class="menu_item" ></div></a>
      <a href='<?php echo base_url('pages/view/360') ?>'><div class="menu_item" ></div></a>
      <a href='<?php echo base_url('pages/view/links') ?>'><div class="menu_item" ></div></a> -->

      <!--a href='<?php echo base_url('pages/view/expo_review') ?>'><div class="menu_item" ></div></a>
      <a href='<?php echo base_url('pages/view/dynamic') ?>'><div class="menu_item" ></div></a>
      <a href='<?php echo base_url('pages/view/instruction') ?>'><div class="menu_item"></div></a>
      <a href='<?php echo base_url('pages/view/construction') ?>'><div class="menu_item" ></div></a>
      <a href='<?php echo base_url('pages/view/protect') ?>'><div class="menu_item"></div></a> -->

    </div>
</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>

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

});

</script>
</html>
