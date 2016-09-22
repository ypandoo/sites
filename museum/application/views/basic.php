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
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/expo_review.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">
</head>
<body>
<div class="bk"></div>
<div id="details" class="details"  ms-controller="expo_list_ctrl">
    <!--首页-->
    <div id="main-page" class="main-page slide-page">
        <!--头部-->

        <div id="header" class="newhead">
            <a href="<?php echo base_url('pages/view/menu1') ?>"><div class="logo touch-href" data-href="/"></div></a>
        </div>

        <!-- banner -->
        <div class="banner-top" style="margin-top:46px">
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner2.jpg')?>" width="100%" style="z-index:-1"/></div>
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner1.jpg')?>" width="100%"/></div>
          <div><img src="<?php echo base_url('assets\front\img\m\routine-banner3.jpg')?>" width="100%"/></div>
        </div>


        <div class="page-title"   style="margin-top:20px">
          <h2>基本陈列</h2>
          <h4>Routine Exhibitions</h4>
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

      <div style="margin-top:20px"></div>

    </div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
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
