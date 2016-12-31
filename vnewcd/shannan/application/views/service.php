<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投诉建议</title>
<meta name="keywords" content="投诉建议" />
<meta name="description" content="投诉建议" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style media="screen">
  .item{
    float: left;
    width: 42%;
    margin: 0 4%;
    height: 50px;
    line-height: 50px;
    /* padding-left: 10px; */
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }
</style>
</head>
<body ms-controller="service">
<?php include 'header.php' ?>
<section class="banner">
    <img src="<?php echo base_url('Application/views/img/banner/gwjz.jpg')?>" />
</section>

<div>
  <div style="margin: 20px 3% 20px 3%;
      text-align: left;
      padding: 2% 4%;
      border-left: 2px solid #23527c;
      background: rgba(35, 82, 124, 0.06);
      border-radius: 5px;">
    在下方选择服务区域如:市级单位,系统会显示在该区域下的服务窗口。
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a href="#city" aria-controls="city" role="tab" data-toggle="tab">市级单位</a>
    </li>
    <li role="presentation" >
      <a href="#district" aria-controls="district" role="tab" data-toggle="tab">乃东区</a>
    </li>
    <li role="presentation" >
      <a href="#house" aria-controls="house" role="tab" data-toggle="tab">不动产登记</a>
    </li>
    <li role="presentation" >
      <a href="#fire" aria-controls="fire" role="tab" data-toggle="tab">消防支队</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="overflow:hidden">
    <div role="tabpanel" class="tab-pane active" id="city">
      <a href="<?php echo site_url('front/news_service?type=sgaj')?>"><div class="item">市公安局</div></a>
      <a href="<?php echo site_url('front/news_service?type=saj')?>"><div class="item">市安监</div></a>
      <a href="<?php echo site_url('front/news_service?type=sbyj')?>"><div class="item">市编译局</div></a>
      <a href="<?php echo site_url('front/news_service?type=sgtj')?>"><div class="item">市国土局</div></a>
      <a href="<?php echo site_url('front/news_service?type=shbj')?>"><div class="item">市环保局</div></a>
      <a href="<?php echo site_url('front/news_service?type=sjtj')?>"><div class="item">市交通局</div></a>
      <a href="<?php echo site_url('front/news_service?type=slyj')?>"><div class="item">市林业局</div></a>
      <a href="<?php echo site_url('front/news_service?type=snmj')?>"><div class="item">市农牧局</div></a>
      <a href="<?php echo site_url('front/news_service?type=smzj')?>"><div class="item">市民政局</div></a>
      <a href="<?php echo site_url('front/news_service?type=sqxj')?>"><div class="item">市气象局</div></a>
      <a href="<?php echo site_url('front/news_service?type=srsj')?>"><div class="item">市人社局</div></a>
      <a href="<?php echo site_url('front/news_service?type=ssyj')?>"><div class="item">市食药局</div></a>
      <a href="<?php echo site_url('front/news_service?type=szjj')?>"><div class="item">市质监局</div></a>
      <a href="<?php echo site_url('front/news_service?type=szhjj')?>"><div class="item">市筑建局</div></a>
      <a href="<?php echo site_url('front/news_service?type=jiaotiju')?>"><div class="item">市教体局</div></a>
      <a href="<?php echo site_url('front/news_service?type=zlsgs')?>"><div class="item">水利局</div></a>
    </div>
    <div role="tabpanel" class="tab-pane" id="district">
      <a href="<?php echo site_url('front/news_service?type=ndgtj')?>"><div class="item">乃东国土局</div></a>
      <a href="<?php echo site_url('front/news_service?type=ndhz')?>"><div class="item">乃东户政</div></a>
      <a href="<?php echo site_url('front/news_service?type=ndjsw')?>"><div class="item">乃东计生委</div></a>
      <a href="<?php echo site_url('front/news_service?type=ndmzj')?>"><div class="item">乃东民政局</div></a>
      <a href="<?php echo site_url('front/news_service?type=ndrs')?>"><div class="item">乃东人社</div></a>
      <a href="<?php echo site_url('front/news_service?type=ndzj')?>"><div class="item">乃东住建</div></a>
      <a href="<?php echo site_url('front/news_service?type=ndpcs')?>"><div class="item">乃东派出所</div></a>
    </div>
    <div role="tabpanel" class="tab-pane" id="house">
      <a href="<?php echo site_url('front/news_service?type=jttddj')?>"><div class="item">集体土地登记</div></a>
      <a href="<?php echo site_url('front/news_service?type=gytddj')?>"><div class="item">国有土地登记</div></a>
      <a href="<?php echo site_url('front/news_service?type=dyq')?>"><div class="item">地役权</div></a>      <a href="<?php echo site_url('front/news_service?type=diyaquan')?>"><div class="item">抵押权</div></a>
      <a href="<?php echo site_url('front/news_service?type=ygdj')?>"><div class="item">预告登记</div></a>
      <a href="<?php echo site_url('front/news_service?type=gzdj')?>"><div class="item">更正登记</div></a>
      <a href="<?php echo site_url('front/news_service?type=yydj')?>"><div class="item">异议登记</div></a>
      <a href="<?php echo site_url('front/news_service?type=ysbzhz')?>"><div class="item">遗失补证换证登记</div></a>
      <a href="<?php echo site_url('front/news_service?type=cfdj')?>"><div class="item">查封登记</div></a>
    </div>
    <div role="tabpanel" class="tab-pane" id="fire">
      <a href="<?php echo site_url('front/news_service?type=xfzd')?>"><div class="item">消防支队</div></a>
      <!-- <a href="<?php echo site_url('front/news_service?type=gzjjxfaj')?>"><div class="item"  style="width:94%">公众聚集场所投入使用、营业前消防安全检查</div></a> -->
    </div>
  </div>

  <div class="gap60">
  </div>

</div>

<!-- <div style="overflow:hidden; width:100%">
  <div style="    width: 23%;
    margin-left: 1%;
    margin-right: 1%;
    float: left;
    text-align: center;
    border: 1px solid #eeeeee;
    border-radius: 5px;
    box-shadow: 2px 2px rgba(238,238,238,0.2);
    margin-top:20px" ms-for="el in data">
    <img ms-attr="{src:'<?php echo base_url('Application/views/img/wechat/')?>'+el.abbr+'.jpg'}" alt="" width="90%"  >
    <p>{{el.name}}</p>
  </div>

</div> -->

<?php include 'footer.php' ?>

<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
//avalon controllers
(function(){

   var self = this;
   var wechats = [
   ];
   self.content = avalon.define({
      $id: "service",
      index: 0,
    });

  }).call(define('Controller'))
  </script>

</body>
</html>
