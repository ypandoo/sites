<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>生活便民</title>
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
  background:url('<?php echo base_url('Application/views/img/icon_bus.png')?>') no-repeat center 18px; background-size:40px;}
nav a:nth-child(2){
  background:url('<?php echo base_url('Application/views/img/icon_plane.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(3){
  background:url('<?php echo base_url('Application/views/img/icon_moutain.png')?>') no-repeat center 17px; background-size:38px;}
nav a:nth-child(4){
  background:url('<?php echo base_url('Application/views/img/icon_thumb.png')?>') no-repeat center 15px; background-size:36px auto;}
nav a:nth-child(5){
  background:url('<?php echo base_url('Application/views/img/icon_nongye.png')?>') no-repeat center 15px; background-size:30px auto;}
nav a:nth-child(6){
  background:url('<?php echo base_url('Application/views/img/icon_hospital.png')?>') no-repeat center 15px; background-size:37px auto;}
  nav a:nth-child(7){
    background:url('<?php echo base_url('Application/views/img/icon_hospital.png')?>') no-repeat center 15px; background-size:34px auto;}
</style>
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php' ?>

        <section class="banner">
        	<img src="<?php echo base_url('Application/views/img/banner/3.jpg') ?>">
            <hgroup>
              <h3>生活便民,服务生活的方方面面</h3>
                <h4 style="text-transform:uppercase">Better Service For Our People</h4>
            </hgroup>
        </section>
                <a class="box1 box1i" href="<?php echo site_url('front/index') ?>">
        	<img src="<?php echo base_url('Application/views/img/banner/11.jpg') ?>">
            <div>
            	<h3>ShanNan News</h3>
                <abbr>山南发布</abbr>
            </div>
        </a>
                <a class="box1" href="<?php echo site_url('front/zwbm') ?>">
        	<img src="<?php echo base_url('Application/views/img/banner/22.jpg') ?>">
            <div>
              <h3>Governmental Services</h3>
                <abbr>政务便民</abbr>
            </div>
        </a>
        <nav style="overflow:hidden">
        	<a href="<?php echo site_url('front/news_pics?type=jtcx')?>">交通出行</a>
            <a href="<?php echo site_url('front/views')?>" style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">旅游景点</a>
            <a href="<?php echo site_url('front/news?type=ypkx')?>">今日影讯</a>
            <a href="<?php echo site_url('front/news_pics?type=mycp')?>" >名优产品</a>
            <a href="<?php echo site_url('front/news_pics?type=nmke')?>"
              style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">农牧课堂</a>
            <a href="<?php echo site_url('front/news_pics?type=ylwd')?>"
              style="">医疗网点</a>
        </nav>
        <div class="gap40">
        </div>
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
