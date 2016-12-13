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
  background: url('<?php echo base_url('assets/front/img/menu/yuelan_bg.jpg') ?>') no-repeat  fixed;
  -webkit-background-size:  cover;
  -moz-background-size:  cover;
  -o-background-size:  cover;
  background-size: cover;
  overflow: hidden;
}

.menu{
  width: 160px;
  /* height: 410px; */
  position: absolute;
  top: 10%;
  right: 20px;
  /* background-size: 145px 410px; */
  /* background: url(http://127.0.0.1/assets/front/img/main_yuequ_menu.png) 145px 410px; */
  background-size: cover;
  background: rgba(29,105,202,0.8);
  box-shadow: 5px 5px rgba(17, 77, 187, 0.4);
  padding: 20px 0px;
}

.menu_item{
  /* height: 60px; */
  /* width: 145px; */
  padding: 10px 10px 10px 5px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.menu_bottom{
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 65px;
  background: url('<?php echo base_url('assets/front/img/menu/m1_bottom.png') ?>');
  background-size: 100% 100%;
}

.menu_bottom .menu_item{
  width: 33.3333%;
  float: left;
  height: 100%;
}
</style>

<body id="bg">

    <div class="menu" id="menu" style="display:none; padding: 10px 0">
      <a href='<?php echo base_url('pages/view/about') ?>'>
        <div class="menu_item" >
          <img src='<?php echo base_url('assets/front/img/menu/m1_about.png') ?>' style="height:40px;"/>
        </div>
      </a>

      <a href='<?php echo base_url('pages/view/new_expo') ?>'>
        <div class="menu_item" >
          <img src='<?php echo base_url('assets/front/img/menu/m1_new.png') ?>' style="height:40px;"/>
        </div>
      </a>
      <a href='<?php echo base_url('pages/view/basic') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m1_basic.png') ?>' style="height:40px;"/>
        </div>
      </a>

      <a href='<?php echo base_url('pages/view/expo_review') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m1_review.png') ?>' style="height:40px;"/>
        </div>
      </a>
      <a href='<?php echo base_url('pages/view/dynamic') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m1_dynamic.png') ?>' style="height:40px;"/>
        </div></a>
      <a href='<?php echo base_url('pages/view/instruction') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m1_instruction.png') ?>' style="height:40px;"/>
        </div></a>
      <a href='<?php echo base_url('pages/view/construction') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m1_construction.png') ?>' style="height:40px;"/>
        </div></a>
      <a href='<?php echo base_url('pages/view/protect') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m1_protect.png') ?>' style="height:40px;"/>
        </div></a>
    </div>

    <div class="menu_bottom">
      <a href='<?php echo base_url('pages/view/menu_yuelan') ?>'>
      <div class="menu_item"></div></a>

      <a href='<?php echo base_url('pages/view/menu_yueyou') ?>'>
      <div class="menu_item"></div></a>

      <a href='<?php echo base_url('pages/view/menu_yuequ') ?>'>
      <div class="menu_item"></div></a>

    </div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script>
$(document).ready(function(){
  setTimeout(function(){$('#menu').slideDown(2000,function(){});}, 1000);
});
</script>
</html>
