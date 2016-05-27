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
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/dynamic.css') ?>">
</head>
<body>
<div class="bk"></div>
<div id="details" class="details"  ms-controller="construction_ctrl">
    <!--首页-->
    <div id="main-page" class="main-page slide-page">
        <!--头部-->

        <div id="header" class="newhead">
            <a href="<?php echo base_url('pages/view/menu1') ?>"><div class="logo touch-href" data-href="/"></div></a>
        </div>


        <div class="newhead-container">
            <img src="<?php echo base_url('assets/front/img/detail_construction.png') ?>" width="180px"/>
        </div>

        <div class="content"  ms-for='($index, item_info) in @list'>
            <div class="news_img"  ms-click="@get_detail_link($index)">
              <img src="<?php echo base_url('assets/front/img/default_news.png') ?>" width="60px" height="60px">
            </div>
            <div class="item"  ms-click="@get_detail_link($index)">
             <!-- <span class="time"><small> 2016-02-02  20:56:33</small></span> -->
                <h2>{{item_info.CONTENT_TITLE}}</h2>
                <h3>{{item_info.PUBLISH_TIME}}</h3><h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3>
            </div>
          </a>
        </div>
    </div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/construction.js') ?>"></script>

<script>

</script>
</html>
