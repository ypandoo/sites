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
  background:url('<?php echo base_url('Application/views/img/szyw.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(2){
  background:url('<?php echo base_url('Application/views/img/jzfp.png')?>') no-repeat center 15px; background-size:40px;}
nav a:nth-child(3){
  background:url('<?php echo base_url('Application/views/img/lhzt.png')?>') no-repeat center 15px; background-size:30px;}
nav a:nth-child(4){
  background:url('<?php echo base_url('Application/views/img/lhzt.png')?>') no-repeat center 15px; background-size:30px auto;}
nav a:nth-child(5){
  background:url('<?php echo base_url('Application/views/img/gcft.png')?>') no-repeat center 15px; background-size:30px auto;}
nav a:nth-child(6){
  background:url('<?php echo base_url('Application/views/img/icon_microphone.png')?>') no-repeat center 15px; background-size:30px auto;}
</style>
</head>
<body>
    <div class="wrapper" ms-controller="contents">
        <?php include 'header.php' ?>

        <section class="banner">
        	<img src="<?php echo base_url('Application/views/img/banner/snfb.jpg') ?>">
            <hgroup>
            	<h3>山南发布，官方微信信息发布平台</h3>
                <h4 style="text-transform: uppercase;">ShanNan Official Information Platform </h4>
            </hgroup>
        </section>

       <a class="box1 box1i" href="<?php echo site_url('front/zwbm') ?>">
        	<img src="<?php echo base_url('Application/views/img/banner/22.jpg') ?>">
            <div>
            	<h3 style="text-transform: uppercase;">Governmental Services</h3>
                <abbr>政务便民</abbr>
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
        	<a href="<?php echo site_url('front/news?type=szyw')?>">时政要闻</a>
            <a href="<?php echo site_url('front/news?type=jzfp')?>"
              style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">精准扶贫</a>
            <!-- <a href="<?php echo site_url('front/news?type=lxyz')?>">两学一做</a> -->
            <a href="<?php echo site_url('front/news?type=lhzt')?>">时事专题</a>
            <!-- <a href="<?php echo site_url('front/news?type=gcft')?>"
              style="border-left: 1px solid #d8d8d8;border-right: 1px solid #d8d8d8;">高层访谈</a> -->
        </nav>

        <!-- <section class="banner" >
        	<img src="<?php echo base_url('Application/views/img/banner/szyw.jpg') ?>">
            <hgroup style="text-align:30px; ">
            	<h3 style="text-align:left; margin-left:30px; font-size:16px;text-align: left;
    margin-left: 30px;
    font-size: 16px;
    margin-bottom: 0px;
    margin-top: 40px;">时政要闻</h3>
              <h4 style="text-align:left; margin-left:30px; font-size:14px;text-transform: uppercase; margin-top:5px">
                Hot News</h4>
            </hgroup>
        </section>

        <section class="content">
          <div class="firstNews" ms-for="($index,el) in data">
              <a  ms-attr="{href:'<?php echo site_url('front/detail?id=')?>'+el._id}" >
                  <img ms-attr="{src:'<?php echo base_url('files/')?>'+el.cover}" />
                  <h4>{{el.title}}</h4>
                  <p>一{{el.plain_text | truncate(30,'...') }}</p>
                  <span>{{el.update_time}}</span>
              </a>
          </div> -->

        <!-- <div class="pages">
            <a class='next'>上一页</a>
          <a class='next' href="/wap/news.php?bid=2&page=2"  title="下一页" style="float:right">下一页</a>
        </div> -->


        <?php include 'footer.php' ?>
    </div>
</body>
</html>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script src="<?php echo base_url('application/views/js/jquery.query-object.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
<script>
//avalon controllers
(function(){
 var self = this;
 self.content = avalon.define({
    $id: "contents",
    data:[],
    type: 'szyw',
    getAPage:function(){
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            data:{page:self.content.page, category:self.content.type},
            url:'<?php echo site_url('content/getAPageByCategory/')?>',
        })
        .done(function (results) {
            if (results.success == 1 && results.data.length > 0){
              //self.gallery.files = results.data;
              self.content.data = results.data;
              self.content.first = results.data[0];
            }
        })
    },
  });
}).call(define('Controller'));

Controller.content.getAPage();


</script>
