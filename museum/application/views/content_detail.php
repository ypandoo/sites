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
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/content_detail.css') ?>">
</head>

<body>
<div id="content_id" data-id="<?php echo $content_id?>"></div>
<div class="bk"></div>

<div class="details" ms-controller="sd-list">
        <div id="header" class="newhead">
            <a href="<?php echo base_url('pages/view/menu1') ?>"><div class="logo touch-href"></div></a>
        </div>

        <div class="content_detail">
              <p ms-text="@content_title" class="content_title"></p>
              <p class="content_time">{{@author}}发表于:{{@content_time}}</p>
              <div class="content_html" ms-html="@content_html ">
              </div>
        </div>
</div>

<div style="margin-top:40px">
<div>

<div style="height:20px; background: #ec422b;">
</div>
</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/content_detail.js') ?>"></script>
<script>
</script>
</html>
