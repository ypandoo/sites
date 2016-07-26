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
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/navi.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/font-awesome.min.css') ?>">
    <style>
    .hidden-menu {
    position: fixed;
    top: 100px;
}
    </style>

</head>

<body  ms-controller="navi_ctrl">

<div id="item_id" data-id="1"></div>
<div class="bk"></div>

<div id="header" class="newhead" >
    <a href="/pages/view/menu3"><div class="logo touch-href"></div></a>
</div>

<div class="page-title" style="margin-top:65px">
  <h2>展厅导览</h2>
  <h4 style="letter-spacing: 1px;">Navigator</h4>
</div>

<div class="page-title-name" >
  <h2><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:10px"></i>当前展厅: {{@navi_name}}</h2>
</div>

<div class="content_detail" style="margin-bottom:40px">
      <!-- <p   ms-text="@navi_name" class="content_title"></p> -->
      <div ms-html="@navi_html" class="content_html" ></div>
</div>

<div  id='navi_list'>
<ul class="hidden-menu">
    <li ms-for='($index, item_info) in @list' ms-attr="{dataId:$index}" ms-click='@swith_to_selected($index)'>
        {{item_info.NAVI_NAME}}
    </li>
</ul>
</div>

<div class="bottom_fix" ms-click='@switch_navi()'>
    切换展馆
</div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/navi.js') ?>"></script>

</html>
