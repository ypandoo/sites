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
    <link rel="shortcut icon" href="/favicon.ico" type="image/ico" />
    <link rel="Bookmark" href="/favicon.ico" />

    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/panorama_viewer.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/expo_review.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">
    <style>
     .banner-top{
       margin-top: 46px;
     }
     .banner-item{
       position: relative;
     }

     .banner-item img{
       width: 100%;
     }

     .item_name_bg {
       position: absolute;
       text-align: left;
       left: 0;
       bottom: 0;
       height: 40px;
       width: 100%;
       z-index: 6;
       background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
       -webkit-background-origin: padding;
       -webkit-background-clip: content;
     }

     .item_name_bg p{
       text-align: left;
       font-size: 16px;
       margin-left: 15px;
       line-height: 40px;
       /* padding-left: 0px; */
       font-family: 'Microsoft YaHei';
       /* margin-left: 10px; */
       -moz-transform: scale(0.5);
       -ms-transform: scale(0.5);
       -o-transform: scale(0.5);
       /* -webkit-transform: scale(0.5); */
       /* transform: scale(0.5); */
       color: white;
       letter-spacing: 2px;
     }

     .expo_item{
       width: 48%;
       float: left;
       margin: 1%;
       border: 1px solid rgba(0, 0, 0, 0.11);
       box-shadow: 3px 2px 6px #dcdcdc;
     }

     .newhead {
    -webkit-box-shadow: 0 8px 6px -6px #505050;
    -moz-box-shadow: 0 8px 6px -6px #505050;
    box-shadow: 0 8px 6px -6px #505050;
}

.expo_text h2{
  line-height: 30px;
  font-family: 'Microsoft YaHei';
  letter-spacing: 0px;
  /* background-color: #e2e2e2; */
  margin-left: 5px;
  font-size: 12px;
}

.panorama {
  width: 100%;
  float: left;
  margin-top: 46px;
  height: 300px;
  position: relative;
}

.panorama .credit {
  background: rgba(0,0,0,0.2);
  color: white;
  font-size: 12px;
  text-align: center;
  position: absolute;
  bottom: 0;
  right: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  float: right;
}

.locations{
  clear: both;
  width: 100%;
  overflow: hidden;
  padding: 0px 20px 0 20px ;
}

.locations .item{
  float: left;
  width: 31%;
  margin: 1%;
  border: 1px solid rgba(0, 0, 0, 0.2);
  background: rgba(0, 0, 0, 0.1);
  color: rgba(0, 0, 0, 0.2);
  height: 32px;
  text-align: center;
  font-size: 12px;
  padding-top: 6px;
  border-radius: 5px;
}

.locations .selected
{
  border: 1px solid rgba(255, 0, 0, 0.4);
  background: rgba(255, 0, 0, 0.1);
  color:rgba(255, 0, 0, 0.9);
}
    </style>
</head>

<body>

    <div id="header" class="newhead" >
        <a href="/pages/view/menu2"><div class="logo touch-href"></div></a>
    </div>


    <div  ms-controller="t_ctrl">
    <div class="panorama">
     <img src="<?php echo base_url('assets/front/img/demo_photo.jpg')?>" />
    </div>

    <div class="page-title" style="clear:both; overflow:hidden; margin:20px;display: inline-block;">
      <h4>场景切换 Switch View</h4>
    </div>

    <div class="locations">
      <div :css="[@item, @selected && @selected_css]"  ms-click="@switch_view('main_floor')">场馆1</div>
      <div :css="[@item, @selected && @selected_css]"  ms-click="@switch_view('main_floor')">场馆2</div>
      <div :css="[@item, @selected && @selected_css]"  ms-click="@switch_view('main_floor')">场馆3</div>
    </div>

    <div class="page-title" style="clear:both; overflow:hidden; margin:20px;display: inline-block;">
      <h4>导航到展览 Navigate to Expo</h4>
    </div>

    <div class="locations">
      <div class="item">古代展</div>
      <div class="item">近代展</div>
      <div class="item selected">现代展</div>
    </div>
  </div>
<!--
    <div style="margin-top:40px">
    </div> -->

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/jquery.panorama_viewer.js') ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/avalon.js/2.1.6/avalon.js"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/360.js') ?>"></script>

<script>

$(document).ready(function(){
  $(".panorama").panorama_viewer({
    repeat: true
  });
});

</script>
</html>
