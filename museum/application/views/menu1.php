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
    .item_container_left
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
    }
</style>

<body>
    <div style="width:100%">
      <img src='<?php echo base_url('assets/front/img/head1.png') ?>' width="100%"/>
    </div>
    <div style="width:100%; position:fixed; bottom:-3px; left:0px; margin:0px">
      <img src='<?php echo base_url('assets/front/img/bottom1.png') ?>' width="100%"/>
    </div>

    <div>
      <div class="item_container_left">
        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/about') ?>">
            <img src='<?php echo base_url('assets/front/img/about.png') ?>' height="90%"/></a>
        </div>

        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/layout') ?>">
          <img src='<?php echo base_url('assets/front/img/basiclayout.png') ?>' height="90%"/></a>
        </div>

        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/dynamic') ?>">
          <img src='<?php echo base_url('assets/front/img/xibonews.png') ?>' height="90%"/></a>
        </div>

        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/construction') ?>">
          <img src='<?php echo base_url('assets/front/img/newexpo.png') ?>' height="90%"/></a>
        </div>
      </div>

      <div class="item_container_right">
        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/new_expo') ?>">
          <img src='<?php echo base_url('assets/front/img/exponews.png') ?>' height="90%"/></a>
        </div>

        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/expo_review') ?>">
          <img src='<?php echo base_url('assets/front/img/exporeview.png') ?>' height="90%"/></a>
        </div>

        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/instruction') ?>">
          <img src='<?php echo base_url('assets/front/img/instruction.png') ?>' height="90%"/></a>
        </div>

        <div class="item_container_inside">
          <a href="<?php echo base_url('pages/view/protect') ?>">
          <img src='<?php echo base_url('assets/front/img/protect.png') ?>' height="90%"/></a>
        </div>
      </div>
    </div>
</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script>
</script>
</html>
