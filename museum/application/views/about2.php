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
<body class="bg5 bg">
<section class="innerheader">
	<a class="btn backbtn" href="javascript:window.history.go(-1)"></a>
    <h2>关于西博</h2>
    <a class="btn menubtn"></a></section><section class="menuDiv hide">

</section>

<div class="innerContent" ms-controller = "about_ctrl">
	<div class="toppadding"></div>
    <div class="details-box">
    	<div class="txtbox">
			<h2 style="font-size:16px">西藏博物馆</h2>
      <p>
        <br>地址:西藏自治区拉萨市城关区罗布林卡路19号
        <br>电话：0891-6835244　6812210
        <br>公交：2,8,13,24路至西博站下车即到</p>
        </div>
        <div class="imgbox"><img src="<?php echo base_url('assets/front/img/nav/2.jpg')?>" ></div>
    </div>

    <div class="content">
        <p class="html" ms-html="@html">

        </p>
    </div>

    <div class="mousetip-s"></div>
</div>

</body>
</html>
<script type="text/javascript" src="<?php echo base_url('assets/front/js/jquery1.9.1.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.touchSwipe.min.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/jquery.bstMobile.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/base2.js') ?>"></script>


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
