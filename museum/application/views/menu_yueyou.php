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
  background: url('<?php echo base_url('assets/front/img/menu/yueyou_bg.jpg') ?>') no-repeat  fixed;
  -webkit-background-size:  cover;
  -moz-background-size:  cover;
  -o-background-size:  cover;
  background-size: cover;
  overflow: hidden;
}

.menu{
  width: 145px;
  /* height: 410px; */
  position: absolute;
  top: 7%;
  right: 20px;
  /* background-size: 145px 410px; */
  /* background: url(http://127.0.0.1/assets/front/img/main_yuequ_menu.png) 145px 410px; */
  background-size: cover;
  background: rgba(202, 29, 29, 0.8);
  box-shadow: 5px 5px rgba(187, 17, 17, 0.4);
  padding: 20px 0px;
}

.menu_item{
  /* height: 60px; */
  /* width: 145px; */
  padding: 5px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.menu_bottom{
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 60px;
  background: url('<?php echo base_url('assets/front/img/menu/m2_bottom.png') ?>');
  background-size: 100% 100%;
}

.menu_bottom .menu_item{
  width: 33.3333%;
  float: left;
  height: 100%;
}

.menu .menu_item img{
  height: 35px;
}
</style>

<body id="bg">

    <div class="menu" id="menu" style="display:none; padding: 10px ">
      <a href='<?php echo base_url('pages/view/item_list') ?>'>
        <div class="menu_item" >
          <img src='<?php echo base_url('assets/front/img/menu/m2_top10.png') ?>' />
        </div>
      </a>

      <a href='<?php echo base_url('pages/view/item_list_normal') ?>'>
        <div class="menu_item" >
          <img src='<?php echo base_url('assets/front/img/menu/m2_item.png') ?>' />
        </div>
      </a>
      <a href='<?php echo base_url('pages/view/360') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m2_360.png') ?>' />
        </div>
      </a>

      <a href='<?php echo base_url('pages/view/nav') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m2_nav.png') ?>' />
        </div>
      </a>
      <a href='<?php echo base_url('pages/view/links') ?>'>
        <div class="menu_item" >
        <img src='<?php echo base_url('assets/front/img/menu/m2_links.png') ?>' />
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
