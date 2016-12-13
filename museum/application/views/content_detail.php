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
.content {
    padding: 15px 15px;
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

  .innerheader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: .8rem;
    z-index: 1000;
    border-bottom: 1px solid white;
}

.details-box .txtbox {
    width: 5.7rem;
}
</style>

</head>
<body class="bg2 bg" ms-controller="sd-list">
<div id="content_id" data-id="<?php echo $content_id?>"></div>

<section class="innerheader">
	<a class="btn backbtn" href="javascript:window.history.go(-1)"></a>
  <h2>{{@content_type}}</h2>
</section>


<div class="innerContent">
	<div class="toppadding"></div>
    <div class="details-box">
    	<div class="txtbox">
        <h2 style="font-size:18px">{{@content_title}}</h2>
        <h4 style="font-size:12px">{{@content_time}}</h4>
        </div>
    </div>
      <div class="details" >
              <div id="header" class="newhead">
                  <div class="logo touch-href"  ms-click="@get_type_link()"></div>
              </div>

              <!-- <div class="page-title" ms-click="@get_type_link()">
                <h2>{{@content_type}}</h2>
                <h4>{{@get_content_name_en()}}</h4>
              </div> -->

              <!-- <div class="page-title-name" >
                <h2>{{@content_title}}</h2>
                <h4>{{@author}}发表于:{{@content_time}}</h4>
              </div> -->

              <div class="content">
                    <!-- <p ms-text="@content_title" class="content_title"></p>
                    <p class="content_time">{{@author}}发表于:{{@content_time}}</p> -->

                    <p class="html" ms-html="@content_html">

                    </p>
              </div>
      </div>
    </div>

</body>
<script type="text/javascript" src="<?php echo base_url('assets/front/js/jquery1.9.1.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.touchSwipe.min.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.bstMobile.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/base2.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/content_detail.js') ?>"></script>
<script>
</script>
</html>
