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
    width: 44%;
    margin: 0 3%;
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
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="city">
      <div class="item">市公安局</div>
      <div class="item">市安监</div>
      <div class="item">市编译局</div>
      <div class="item">市国土局</div>
      <div class="item">市环保局</div>
      <div class="item">市交通局</div>
      <div class="item">市林业局</div>
      <div class="item">市民政局</div>
      <div class="item">市气象局</div>
      <div class="item">市人社局</div>
      <div class="item">市食药局</div>
      <div class="item">市质监局</div>
      <div class="item">市主建局</div>
      <div class="item">市教体局</div>
      <div class="item">市自来水公司</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="district">
      <div class="item">乃东国土局</div>
      <div class="item">乃东户政</div>
      <div class="item">乃东计生委</div>
      <div class="item">乃东民政局</div>
      <div class="item">乃东人社</div>
      <div class="item">乃东住建</div>
      <div class="item">乃东派出所</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="house">
      <div class="item">集体土地登记</div>
      <div class="item">国有土地登记</div>
      <div class="item">地役权</div>      <div class="item">抵押权</div>
      <div class="item">预告登记</div>
      <div class="item">更正登记</div>
      <div class="item">异议登记</div>
      <div class="item">遗失补证换证登记</div>
      <div class="item">查封登记</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="fire">
      <div class="item" style="width:94%">建筑工程消防设计审核（备案）和竣工消防验收（备案）</div>
      <div class="item"  style="width:94%">公众聚集场所投入使用、营业前消防安全检查</div>
    </div>
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
