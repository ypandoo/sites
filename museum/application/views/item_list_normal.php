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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/base2.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">

    <style>
    .details {
    width: 100%;
    background: transparent;
    }

    .content .item {
        position: absolute;
        width: 100%;
        height: 38px;
        background: rgba(97,0, 0, 0.5);
        /* margin-top: 4px; */
        /* padding: 5px; */
        /* float: left; */
        bottom: 3px;
    }

    .content .item h2 {
      font-size: 12px;
      line-height: 15px;
      font-weight: 500;
      letter-spacing: 0px;
      color: #ffffff;
      padding: 5px 5px 0 5px;
    }

    .content {
        width: 48%;
        height: 130px;
        position: relative;
        /* border-radius: 20px; */
        /* background-color: #f5f5f5; */
        /* margin-bottom: 5px; */
        margin: 10px 1% 10px 1%;
        float: left;
        /* border: 1px solid rgb(0, 132, 77); */
        /* box-shadow: 3px 2px 6px rgba(220, 220, 220, 0); */
    }


    .innerheader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: .8rem;
    z-index: 1000;
    /* background: rgba(79, 247, 90, 0.16); */
    border-bottom: 1px solid rgb(255, 255, 255);
    }

    .show_more{
    margin-bottom: 50px;
    color: white;
    text-align: center;
    font-size: 12px;
    border: 1px solid white;
    width: 60%;
    margin-left: 20%;
    line-height: 24px;
    margin-top: 20px;
    }

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

    .expo_item {
        width: 48%;
        float: left;
        margin: 1%;
        /* border: 1px solid rgba(0, 0, 0, 0.11); */
        box-shadow: 3px 2px 6px rgba(0, 15, 58, 0.64);
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

.expo_text{
  background: rgba(255, 0, 0, 0.5);
  color:white;
  margin-top: -4px;
}

.show_more{
margin-bottom: 50px;
color: white;
text-align: center;
font-size: 12px;
border: 1px solid white;
width: 60%;
margin-left: 20%;
line-height: 24px;
margin-top: 20px;
}

    </style>

</head>
<body class="bg bg5" style="margin:0;padding:0">
<section class="innerheader">
	<a class="btn backbtn" href="javascript:window.history.go(-1)"></a>
    <h2>十大精品</h2>
</section>

<div class="details"   ms-controller="items_ctrl" style="margin-top:66px">

    <div class="page-title" style="margin-left: 20px;color: white;">
      <h3>馆藏珍品&nbsp; | &nbsp; Antiquities</h3></div>

    <div style=" margin-top:20px; padding-left:15px; padding-right:15px; overflow:hidden">
      <div class="expo_item"  ms-for='($index, item_info) in @data' >
        <div class="expo_item_container" ms-click="@get_detail_link(item_info.ITEM_ID)">
        <img ms-attr="{src:@get_pic_path(item_info.PATH)}" width="100%" height="120px"/>

        </div>
        <div class="expo_text" ms-click="@get_detail_link(item_info.ITEM_ID)">
          <h2>{{item_info.ITEM_NAME}}</h2>
          <!-- <h4>{{@get_content_text(item_info.ITEM_TEXT)}}</h4> -->
        </div>
      </div>

    </div>

    <div ms-visible='@show_more' ms-click='@get_items_with_pic()' class="show_more">
      加载更多珍品
    </div>



    </div>

    <div style="margin-top:40px">
    <div>
</div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/item_list_normal.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/base2.js') ?>"></script>
<script>
// $(document).ready(function(){
//   $('.banner-top').slick({
//   adaptiveHeight: false,
//   slidesToShow: 1,
//   dots: true,
//   arrows: false,
//   autoplay: true,
// autoplaySpeed: 2000,
// });
//
// });
</script>
</html>
