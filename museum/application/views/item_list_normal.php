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
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/front/css/list_style.css') ?>"> -->
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
    </style>
</head>

<body>
<!-- <div class="bk"></div>
<div class="notification red"><i class="txt">关注失败, 请稍后重试.</i><i class="close">×</i></div> -->
<div class="details"   ms-controller="items_ctrl">
    <div id="header" class="newhead" >
        <a href="/pages/view/menu2"><div class="logo touch-href"></div></a>
    </div>

     <!-- <div class="banner-top">
      <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/1.jpg')?>" /><div class="item_name_bg"><p >翡翠提梁壶</p></div></div>
      <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/2.jpg')?>" /><div class="item_name_bg"><p >夜光陶瓷碗</p></div></div>
      <div class="banner-item"><img src="<?php echo base_url('assets/pc/img/items/3.jpg')?>" /><div class="item_name_bg"><p >金贲巴瓶</p></div></div>
    </div> -->

    <div class="page-title" style="margin-top:66px">
      <h2 style="letter-spacing:1px">馆藏珍品 </h2>
      <h4 style="letter-spacing: 1px;">Antiquities</h4>
    </div>

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
    <!-- <div class="page-turn-occupy"></div>
    <div class="page-turn">
        <div class="page-turn2">
        <a class="btn prev-page">上一页</a>
        <p><i class="current-page">0</i>/<i class="total-page">0</i></p>
        <a class="btn next-page">下一页</a>
        </div>
    </div> -->

    <div style="margin-top:40px">
    <div>

    <!-- <div style="height:20px; background: #ec422b;">
    </div> -->

</div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/item_list_normal.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
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
