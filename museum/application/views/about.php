<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>西藏博物馆</title>
    <meta name="keywords" content="西藏博物馆"/>
    <meta name="description" content="西藏博物馆"/>
    <meta name="robots" content="all"/>
    <meta name="copyright" content="西藏博物馆"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="author" content="" />
    <meta name="revisit-after"  content="1 days" />
    <meta name="format-detection" content="email=no" />
    <meta name="format-detection" content="telephone=yes" />

    <?php include 'header.php' ?>
</head>
<body  ms-controller="about_ctrl">
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
        <img src="<?php echo base_url('application/views/assets/front/img/banner_about3.jpg') ?>" alt="Third slide">
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

<div id="page-content" class="index-page">
		<section class="box-content box-1">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 ">
						<div class="service">
							<!-- <a href="#"><img src="<?php echo base_url('assets/front/img/logo_sr.png')?>" title="icon-name" width="80px"></a> -->
							<h3>西博简介</h3>
							<p class="html" ms-html="@html">
							<a class="btn btn-2 btn-sm" href="#">Read More</a>
						</div>
			 		</div>


				</div>
			</div>
		</section>

	</div>

<?php include 'footer.php' ?>
</body>

<script>
(function(){
    var self = this;

    this.framework =  avalon.define({
        $id:"about_ctrl",
        html: '',
    });

    //get data via ajax
    this.get_detail = function(){

        var url = base_url+'About/get_about';
        base_remote_data.ajaxjson(
                          url, //url
                          function(data){
                            if(data.hasOwnProperty('success')){
                                  if(data.success == 1){
                                      console.log(data);
                                      self.framework.html = data.data[0].HTML;
                                  }
                                  else{
                                      alert(data.message);
                                  }
                              }
                            else {
                              alert('返回值错误!');
                            }
                        },
                        '',
                        function()
                        {
                          alert('网络错误!');
                        });
    };

    this.get_detail();

}).call(define('space_content_detail'));
</script>
</html>
