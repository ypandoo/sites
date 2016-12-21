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
</head>
<body ms-controller="wechat">
<?php include 'header.php' ?>
<section class="banner">
    <img src="<?php echo base_url('Application/views/img/banner/gwjz.jpg')?>" />
</section>

<div style="margin: 20px 3% 0px 3%;
    text-align: left;
    padding: 2% 4%;
    border-left: 2px solid #23527c;
    background: rgba(35, 82, 124, 0.06);
    border-radius: 5px;">
  友情提示：长按二维码图片，弹出菜单选择识别二维码即可关注相应的公众平台。
</div>


<div style="overflow:hidden; width:100%">
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

</div>

<?php include 'footer.php' ?>

<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script>
//avalon controllers
(function(){

   var self = this;
   var wechats = [
     {name:'错那在线', abbr:'cnzx'},
     {name:'秘境洛扎', abbr:'mjlz'},
     {name:'贡嘎', abbr:'gg'},
     {name:'网信措美', abbr:'wxcm'},
     {name:'网信加查', abbr:'wxjc'},
     {name:'网信乃东', abbr:'wxnd'},
     {name:'网信琼结', abbr:'wxqj'},
     {name:'网信曲松', abbr:'wxqs'},
     {name:'网信桑日', abbr:'wxsr'},
     {name:'幸福隆子', abbr:'xflz'},
     {name:'羊湖之声', abbr:'yhzs'},
     {name:'智慧扎囊', abbr:'zhzn'},
   ];
   self.content = avalon.define({
      $id: "wechat",
      data: wechats,
    });

  }).call(define('Controller'))
  </script>

</body>
</html>
