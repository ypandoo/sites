<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>山南发布</title>
<meta name="keywords" content="山南发布" />
<meta name="description" content="山南发布" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<style>
nav a:nth-child(1){
  background:url('<?php echo base_url('Application/views/img/icon2.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(2){
  background:url('<?php echo base_url('Application/views/img/icon3.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(3){
  background:url('<?php echo base_url('Application/views/img/icon_book.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(4){
  background:url('<?php echo base_url('Application/views/img/icon5.png')?>') no-repeat center 15px; background-size:30px auto;}
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
        	<img src="<?php echo base_url('Application/views/img/banner/3.jpg') ?>">
            <hgroup>
            	<h3>微山南，一站式微信服务平台</h3>
                <h4>ShanNan Official Information Platform </h4>
            </hgroup>
        </section>
                <a class="box1 box1i" href="<?php echo site_url('front/zwbm') ?>">
        	<img src="<?php echo base_url('Application/views/img/img1.jpg') ?>">
            <div>
            	<h3>Governmental Services</h3>
                <abbr>政务便民</abbr>
            </div>
        </a>
                <a class="box1" href="<?php echo site_url('front/shbm') ?>">
        	<img src="<?php echo base_url('Application/views/img/img2.jpg') ?>">
            <div>
            	<h3>Life Services</h3>
                <abbr>生活便民</abbr>
            </div>
        </a>
        <nav style="overflow:hidden">
        	<a href="<?php echo site_url('front/news?type=szyw')?>">时政要闻</a>
            <a href="<?php echo site_url('front/news?type=jzfp')?>"
              style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">精准扶贫</a>
            <a href="<?php echo site_url('front/news?type=lxyz')?>">两学一做</a>
            <a href="<?php echo site_url('front/news?type=lhzt')?>">两会专题</a>
            <a href="<?php echo site_url('front/news?type=gcft')?>"
              style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">高层访谈</a>
        </nav>
        <!-- <section class="chunkin">
        	<a href="/wap/about.php?bid=9">
            	<img src="<?php echo base_url('Application/views/img/img3.jpg') ?>">
            	<h3>关于我们</h3>
                <p>成都珍才人力资源服务有限公司，成立于2009年，前身为珍才商务服务有限公司，我们的理念：“打造企业与人才之间的Garden Bridge”，成为求职者与企业间的坚实桥梁；</p>
            </a>
            <div>
            	<img src="<?php echo base_url('Application/views/img/img4.jpg') ?>') ?>">
            	<h3>职场资讯</h3>
                <ul>
                	                </ul>
            </div>
            <a href="news.php?bid=2">
            	<img src="<?php echo base_url('Application/views/img/img5.jpg') ?>">
            	<h3>商学院</h3>
                <p>测试</p>
            </a>
        </section> -->
        <div class="gap40">
        </div>

        <?php include 'footer.php' ?>
    </div>
</body>
</html>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
