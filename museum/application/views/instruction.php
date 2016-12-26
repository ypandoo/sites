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
<?php include 'header.php' ?>
</head>
<body class="bg1" ms-controller="instruction_ctrl">
<!-- Carousel -->
<header id="intro">
<!-- Navi-->
<?php include 'header_navi.php' ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
  <div class="item active">
    <img src="<?php echo base_url('application/views/assets/front/img/banner_about1.jpg') ?>" alt="First slide"/>
  </div>
  <div class="item">
    <img src="<?php echo base_url('application/views/assets/front/img/banner_about2.jpg') ?>" alt="Second slide"/>
  </div>
  <div class="item">
    <img src="<?php echo base_url('application/views/assets/front/img/banner_about1.jpg') ?>" alt="Third slide">
  </div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#carousel-example-generic"  role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div><!-- /carousel -->
</header>
<!-- Header -->
  <div id="page-content" class="index-page" style="margin-top:10px">
  		<section class="box-content box-1">
  			<div class="container">
  				<div class="row heading">
  					<div class="col-sm-4 ">
  						<div class="service">
  							<!-- <a href="#"><img src="<?php echo base_url('assets/front/img/logo_sr.png')?>" title="icon-name" width="80px"></a> -->
  							<h3>参观指南</h3>
  							<p class="html" ms-html="@html">
  						</div>
  			 		</div>


  				</div>
  			</div>
  		</section>

  	</div>

  <?php include 'footer.php' ?>
</div>

</body>
<script src="<?php echo base_url('assets/front/js/instruction.js') ?>"></script>

<script>
$('#head_text').text('参观指南');
</script>
</html>
