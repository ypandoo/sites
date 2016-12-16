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
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php' ?>

        <section class="banner">
        	<img src="<?php echo base_url('Application/views/img/banner1.jpg') ?>">
            <hgroup>
              <h3>微山南，一站式微信服务平台</h3>
                <h4>Shannan Information Platform Official</h4>
            </hgroup>
        </section>
                <a class="box1 box1i" href="<?php echo site_url('front/index') ?>">
        	<img src="<?php echo base_url('Application/views/img/img1.jpg') ?>">
            <div>
            	<h3>山南发布</h3>
                <abbr>ShanNan News</abbr>
            </div>
        </a>
                <a class="box1" href="<?php echo site_url('front/zwbm') ?>">
        	<img src="<?php echo base_url('Application/views/img/img2.jpg') ?>">
            <div>
              <h3>Governmental Services</h3>
                <abbr>政务便民</abbr>
            </div>
        </a>
        <nav>
        	<a href="<?php echo site_url('front/news?type=1')?>">旅游景点</a>
            <a href="<?php echo site_url('front/news?type=2')?>" style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">名优产品</a>
            <a href="<?php echo site_url('front/news?type=3')?>">农牧课堂</a>
            <a href="http://m.weather.com.cn/mweather/101140301.shtml">天气查询</a>
            <a href="<?php echo site_url('front/news?type=4')?>" style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">名俗文化</a>
            <a href="<?php echo site_url('front/news?type=4')?>">特色美食</a>
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
        <div class="gap_top gap_bottom">
        </div>
        <?php include 'footer.php' ?>
    </div>
</body>
</html>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
