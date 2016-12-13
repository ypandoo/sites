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
    </style>

</head>
<body class="bg bg5" style="margin:0;padding:0">
<section class="innerheader">
	<a class="btn backbtn" href="javascript:window.history.go(-1)"></a>
    <h2>基本陈列</h2>
</section>

<div id="details" class="details"  ms-controller="expo_list_ctrl">
        <!-- banner -->
        <div class="banner-top" style="margin-top:46px">
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner2.jpg')?>" width="100%" style="z-index:-1"/></div>
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner1.jpg')?>" width="100%"/></div>
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner3.jpg')?>" width="100%"/></div>
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner4.jpg')?>" width="100%"/></div>
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner5.jpg')?>" width="100%"/></div>
        </div>

        <div class="page-title"   style="margin-top: 20px;margin-left: 20px;color: white;">
          <h3>基本陈列&nbsp; | &nbsp; Routine Exhibitions</h3>
        </div>

        <div style="margin-top:20px; padding: 0 10px 0 10px; overflow:hidden">
        <div class="content"  ms-for='($index, item_info) in @list'>
            <div class="news_img"  ms-click="@get_detail_link($index)">
              <img ms-attr="{src:@get_cover($index)}" width="100%" >
            </div>
            <div class="item"  ms-click="@get_detail_link($index)">
             <!-- <span class="time"><small> 2016-02-02  20:56:33</small></span> -->
                <h2>{{item_info.CONTENT_TITLE}}</h2>
                <!-- <h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3> -->
                <!-- <h3>{{item_info.PUBLISH_TIME}}</h3><h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3> -->
            </div>
          </a>
        </div>
      </div>

      <div ms-visible='@show_more' ms-click='@get_content_by_type()' class="show_more">
        加载更多...
      </div>
</div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/base2.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/basic_list.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>

<script>

$(document).ready(function(){
  $('.banner-top').slick({
  dots: true,
  infinite: true,
  speed:1500,
  slidesToShow: 1,
  adaptiveHeight: false,
  autoplay: true,
  autoplaySpeed: 1500,
  arrows: true
});

});
</script>
</html>
