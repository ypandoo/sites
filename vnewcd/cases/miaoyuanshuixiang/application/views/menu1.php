<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>淼源水箱</title>
    <meta name="keywords" content="淼源水箱"/>
    <meta name="description" content="淼源水箱"/>
    <meta name="robots" content="all"/>
    <meta name="copyright" content="淼源水箱"/>
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
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/font-awesome.min.css') ?>">
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
  background: url('<?php echo base_url('assets/front/img/sx_bg.jpg') ?>') no-repeat  fixed;
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
  padding-top: 7.5px;
  border: 1px solid rgba(0,0,0,0.1);
  margin-top: 10px;
}

</style>

<body id="bg">

</div>
    <div style="position: absolute;
    text-align: left;
    height: 280px;
    width: 60%;
    margin-top: 40%;
    margin-left: 20%;
    padding: 20px;
    border-radius: 10px;
    background: rgba(0,0,0,0.6);display:none" id='popup_up'>

    <div style="    position: absolute;
    color: red;
    font-size: 28px;
    right: 10px;
    top: 5px;" id='popup' onclick="close()">
      X
    </div>

    <p style="color:white; font-size:18px; font-weight:500">
      联系我们
    </p>

    <p >
      <i class="fa fa-home fa-2x" aria-hidden="true" style="color:white; margin-top:20px; margin-bottom:10px"></i>
      <span  style="color:white; font-size:16px; font-weight:500; margin-left:10px">刘洪贵</span>
    </p>

    <p>
      <i class="fa fa-mobile fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:10px"></i>
      <a href="tel:18613206866" style="color:white; margin-left:10px; font-size:16px">18613206866</a>
    </p>

    <p>
      <i class="fa fa-mobile fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:10px"></i>
      <a href="tel:13678078775" style="color:white; margin-left:10px; font-size:16px">13678078775</a>
    </p>

    <p>
      <i class="fa fa-phone fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:10px"></i>
      <a href="tel:028-83402121" style="color:white; margin-left:10px; font-size:16px">028-83402121</a>
    </p>

    <p>
      <i class="fa fa-qq fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:10px"></i>
            <span  style="color:white; font-size:16px; font-weight:500; margin-left:10px">16692361</span>
    </p>


    </div>
    <div style="position:fixed; bottom:0; width:100%; height:80px; background:rgba(0,0,0,0.6)">
      <div style="width:25%; float:left; height:80px; text-align:center">
          <a href="<?php echo base_url('/pages/view/about') ?>"><i class="fa fa-home fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:5px"></i>
          <p style="color:white; font-size:12px">关于我们</p>
          <p style="color:white; font-size:12px">About Us</p></a>
      </div>

      <div style="width:25%; float:left; height:80px; text-align:center">
          <a href="<?php echo base_url('/pages/view/instruction') ?>"><i class="fa fa-book fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:5px"></i>
          <p style="color:white; font-size:12px">资质证明</p>
          <p style="color:white; font-size:12px">Certification</p></a>
      </div>

      <div style="width:25%; float:left; height:80px; text-align:center">
          <a  href="<?php echo base_url('/pages/view/lesson') ?>"> <i class="fa fa-briefcase fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:5px"></i>
          <p style="color:white; font-size:12px">案例与方案</p>
          <p style="color:white; font-size:12px">Solutions</p></a>
      </div>

      <div style="width:25%; float:left; height:80px; text-align:center" id="contact">
          <i class="fa fa-phone fa-2x" aria-hidden="true" style="color:white; margin-top:10px; margin-bottom:5px"></i>
          <p style="color:white; font-size:12px">联系我们</p>
          <p style="color:white; font-size:12px">Contact Us</p>
      </div>
    <div>
</body>

<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>

<script>

// $(document).ready(function(){
//   $('.banner-top').slick({
//   dots: true,
//   infinite: true,
//   speed:1500,
//   slidesToShow: 1,
//   adaptiveHeight: true,
//   autoplay: true,
//   autoplaySpeed: 1500,
//   arrows: true
// });
$('#popup').click(function () {
    $('#popup_up').fadeOut();
});

$('#contact').click(function () {
    $('#popup_up').fadeIn();
});

</script>
</html>
