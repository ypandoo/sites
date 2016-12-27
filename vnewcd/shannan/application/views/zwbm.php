<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>政务便民</title>
<meta name="keywords" content="关键词" />
<meta name="description" content="关键词描述" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<style>
nav a:nth-child(1){
  background:url('<?php echo base_url('Application/views/img/icon_website.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(2){
  background:url('<?php echo base_url('Application/views/img/icon_wechat.png')?>') no-repeat center 10px; background-size:40px;}
nav a:nth-child(3){
  background:url('<?php echo base_url('Application/views/img/icon_service.png')?>') no-repeat center 15px; background-size:36px;}
nav a:nth-child(4){
  background:url('<?php echo base_url('Application/views/img/icon_complain.png')?>') no-repeat center 15px; background-size:30px auto;}
nav a:nth-child(5){
  background:url('<?php echo base_url('Application/views/img/icon_microphone.png')?>') no-repeat center 15px; background-size:30px auto;}
nav a:nth-child(6){
  background:url('<?php echo base_url('Application/views/img/icon_microphone.png')?>') no-repeat center 15px; background-size:30px auto;}
</style>
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php' ?>

        <section class="banner">
        	<img src="<?php echo base_url('Application/views/img/banner/zwbm.jpg') ?>">
            <hgroup>
            	<h3>政务便民,老百姓的网上办事大厅</h3>
                <h4 style="text-transform: uppercase;">Better service for our people.</h4>
            </hgroup>
        </section>
                <a class="box1 box1i" href="<?php echo site_url('front/index') ?>">
        	<img src="<?php echo base_url('Application/views/img/banner/11.jpg') ?>">
            <div>
            	<h3>ShanNan News</h3>
                <abbr>山南发布</abbr>
            </div>
        </a>
                <a class="box1" href="<?php echo site_url('front/shbm') ?>">
        	<img src="<?php echo base_url('Application/views/img/banner/33.jpg') ?>">
            <div>
            	<h3>Life Services</h3>
                <abbr>生活便民</abbr>
            </div>
        </a>
        <nav style="overflow:hidden">
        	<a href="<?php echo site_url('front/links')?>">官网矩阵</a>
            <a href="<?php echo site_url('front/wechat')?>"
              style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">微信矩阵</a>
            <a href="<?php echo site_url('front/service')?>">一站式服务</a>
            <!-- <a href="<?php echo site_url('front/feedback')?>" style="margin-left:1px;border-right: 1px solid #d8d8d8;">舆论监督</a> -->
        </nav>
        <div class="gap40">
        </div>
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
