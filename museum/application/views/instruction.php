<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>西藏博物馆</title>
<meta name="keywords" content="西藏博物馆,西藏博物馆,">
<meta name="description" content="">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/css/base2.css')?>"/>

<style>
  .content{
    padding: 0 15px;
    background: rgba(97, 0, 0, 0.5);
  }

  .content p{
    color: white;
    font-size: 12px;
  }

  .content img{
    width: 100%;
    margin: 10px 0;
  }

  .content p img{
    width: 100%;
    margin: 10px 0;
  }
</style>

</head>
<body class="bg2 bg">
<section class="innerheader">
	<a class="btn backbtn" href="javascript:window.history.go(-1)"></a>
    <h2>关于西博</h2>
    <a class="btn menubtn"></a></section><section class="menuDiv hide">

</section>

<div class="innerContent">
	<div class="toppadding"></div>
    <div class="details-box">
    	<div class="txtbox">
			<h2 style="font-size:16px">参观指南</h2>
      <p>
        <br>您需要知道的博物馆基本资讯！
      </p>
        </div>
        <div class="imgbox"><img src="<?php echo base_url('assets/front/img/nav/8.jpg')?>"/></div>
    </div>

  <div id="details" class="details"  ms-controller="instruction_ctrl">
          <div class="content">
              <p class="html" ms-html="@html">

              </p>
          </div>
  </div>


  <div class="mousetip-s"></div>
</div>

</body>
<script type="text/javascript" src="<?php echo base_url('assets/front/js/jquery1.9.1.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.touchSwipe.min.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.bstMobile.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/base2.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/instruction.js') ?>"></script>

<script>

</script>
</html>
