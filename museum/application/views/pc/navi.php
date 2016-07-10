<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<link rel="stylesheet" href="<?php echo base_url('assets/pc/css/style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/common/css/font-awesome.min.css') ?>">

<style>
.btn_black{
    background: black;
    /* height: 40px; */
    /* width: 80px; */
    /* line-height: 40px; */
    padding: 5px 10px;
    color: blanchedalmond;
    cursor: pointer;
}

/*link-item*/
.link-item
{
  width: 100px;
  float: left;
  text-align: left;
}
.link-item-title
{
  font-size: 14px;
  color:#cc0000;
  text-shadow: rgba(255, 255, 255, 0.2) 0 1px 0;
      line-height: 24px;
}

.link-item-text
{
  font-size: 12px;
  color:white;
  text-shadow: rgba(255, 0, 0, 0.2) 0 1px 0;
      line-height: 24px;
}

.dash
{
  border-bottom: 2px solid #cc0000;
  width: 80px;
  height: 5px;
}

/*news*/
.news_title{
  font-size: 16px;
color: #333;
text-shadow: 1px 0 rgba(158, 0, 0, 0.21);
}
.news_title span{
  font-size: 16px;
    font-weight: 500;
    color: #cc0000;
    padding-right: 10px;
}

.news_content{
  line-height: 20px;
  margin-top: 10px;
}

/*title*/
.title_text{
  font-size: 20px;
  font-weight: 500;
  line-height: 28px;
  letter-spacing: 1px;
  color: #3e3e3e;
  text-shadow: rgba(255, 0, 0, 0.2) 0 1px 0;
  font-weight: 600;
}

.title_text_en{
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  letter-spacing: 0px;
  color: #3e3e3e;
  text-shadow: rgba(255, 0, 0, 0.2) 0 1px 0;
}

.news_item{
    padding-bottom: 20px;
    padding-top:20px;
    border-bottom: 1px solid  rgba(255, 0, 0, 0.2);
}

/*btn*/
.line_btn
{
  height: 40px;
text-align: center;
width: 1000px;
line-height: 40px;
overflow: hidden;
margin: 0 auto;
}

/*banner*/
#table{
    display: table;
    width:100%;
    height: 420px;
    background: #333333;
}
#table-cell{
    display: table-cell;
    vertical-align: middle;
}
#center{
    background: #333333;
    width: 1280px;
    margin: 0 auto;
}

.shadow {
  -moz-box-shadow:    1px 1px 12px rgba(200, 200, 200, 1);
  -webkit-box-shadow:  1px 1px 12px rgba(200, 200, 200, 1);
  box-shadow: 1px 1px 12px rgba(200, 200, 200, 1);
}

.item_name_bg {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 50px;
    width: 100%;
    z-index: 6;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
    -webkit-background-origin: padding;
    -webkit-background-clip: content;
}

.item_name_bg p{
  line-height: 50px;
padding-left: 20px;
font-size: 18px;
color: white;
letter-spacing: 2px;
}

.single-item-top{
  width: 600px;
  height: 400px;
  position: relative;
  overflow: hidden;
  -moz-box-shadow:    1px 1px 12px rgba(200, 200, 200, 1);
  -webkit-box-shadow:  1px 1px 12px rgba(200, 200, 200, 1);
  box-shadow: 1px 1px 12px rgba(200, 200, 200, 1);
}

.single-item-bottom{
  height: 120px;
  position: relative;
  margin: 0 0px;
}

.single-item-bottom img{
  height: 120px;
  width: 100%;
}

.single-item-top img{
  height: 400px;
  width: 600px;
}

/*service*/
.service{
     letter-spacing: 1px;
     font-size:16px;
     text-align:left;
     cursor:pointer;
     line-height:70px;
     overflow: hidden;

}

.service i{
  font-size: 30px;
  padding-right: 20px;
}

.service-container{
  height: 70px;
       border-top: 1px solid rgba(255, 0, 0, 0.1);

}

.item-des{
  margin-top: 40px;
}
.item-des p
{
  margin-top: 40px;
  font-size: 14px;
  line-height: 24px;
}
.content_html img{
  width: 100%;
}

.hidden-menu li{
  height: 60px;
      font-size: 16px;
      line-height: 60px;
      cursor: pointer;
      border-bottom: 1px solid rgba(255,0,0,0.3);
}
</style>
</head>

<body style="background:#333333">
<!-- data -->
<div id="item_id" data-id="<?php echo $item_id?>"></div>

<!-- banner -->
<div style="background:rgba(0,0,0,0.3); width:100%; text-align:center">
<img src="<?php echo base_url('assets/pc/img/gczp.jpg')?>" width="100%"/>
</div>


<!-- header -->
<div id="header">
  <h1><a href="index.html"><img src="<?php echo base_url('assets/pc/img/logo.png') ?>" width="250" height="50" alt="西藏博物馆"></a></h1>
  <div class="nav">
  <ul>
    <li>
        <a href="index.html" class="animate">首页</a>
    </li>
      <li>
        <a href="about.html" class="animate">资讯 </a>
        <div class="subNav" style="display: none;">
            	<a href="/into-the-ai/">西博简介</a>
              <a href="/development-process/">西博动态</a>
              <a href="/development-process/">新馆建设</a>
        </div>
      </li>
      <li>
        <a href="product.html" class="animate">展览</a>
        <div class="subNav" style="display: none;">
              <a href="/into-the-ai/">新展快讯</a>
              <a href="/development-process/">展览回顾</a>
        </div>
      </li>
      <li>
        <a href="research.html" class="animate">藏品</a>
        <div class="subNav" style="display: none;">
              <a href="/into-the-ai/">珍品赏析</a>
              <a href="/development-process/">藏品保护</a>
        </div>
      </li>
      <li>
        <a href="contact.html" class="animate">服务</a>
        <div class="subNav" style="display: none;">
        <a href="/into-the-ai/">基本陈列</a>
        <a href="/development-process/">参观指南</a>
        <a href="/development-process/">360全景</a>
        <a href="/development-process/">移动平台</a>
        </div>
      </li>
      <li>
        <a href="contact.html" class="animate">活动</a>
        <div class="subNav" style="display: none;">
        <a href="/into-the-ai/">活动邀约</a>
        <a href="/development-process/">志愿者风采</a>
        <a href="/development-process/">西博课堂</a>
        </div>
      </li>
  </ul>
  </div>
</div>


<div style=" background:#333333; width:100%; clear:both; overflow:hidden; "   ms-controller="navi_ctrl" >
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#d6d6d6;    padding-bottom: 80px; position:relative">
    <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:10px"></i>当前展厅：{{@navi_name}}</p>
      <!-- <p class="title_text_en">MUSEUM NAVIGATION </p> -->
      <div class="dash" style="width:200px"></div>
    </div>

    <div style="width:260px;float:left;padding: 20px;">
    <ul class="hidden-menu">
        <li ms-for='($index, item_info) in @list' ms-attr="{dataId:$index}" ms-click='@swith_to_selected($index)'>
            {{item_info.NAVI_NAME}}
        </li>
    </ul>
  </div>

  <div style="    width: 640px;float: left;padding: 0px 20px 0px 20px; margin-top:-50px">
    <div class="item-des" >
      <div ms-html="@navi_html" class="content_html" ></div>
    </div>
  </div>
    <!-- <div class="bottom_fix" ms-click='@switch_navi()'>
        切换展馆
    </div> -->
    </div>




  </div>
</div>


<div style=" margin: 20px 0 0px 0; background:rgba(0,0,0,0.3); width:100% ">
<div style=" height: 120px; width:1000px; margin: 0 auto; padding:20px 0 20px 0">
  <div class="link-item">
    <p class="link-item-title">资讯</p>
    <p class="link-item-text">西博简介</p>
    <p class="link-item-text">西博动态</p>
    <p class="link-item-text">新馆建设</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">展览</p>
    <p class="link-item-text">新展快讯</p>
    <p class="link-item-text">展览回顾</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">藏品</p>
    <p class="link-item-text">珍品赏析</p>
    <p class="link-item-text">藏品保护</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">服务</p>
    <p class="link-item-text">基本陈列</p>
    <p class="link-item-text">参观指南</p>
    <p class="link-item-text">360全景</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">活动</p>
    <p class="link-item-text">活动邀约</p>
    <p class="link-item-text">志愿者风采</p>
    <p class="link-item-text">西博课堂</p>
  </div>
  <div class="link-item">
    <p class="link-item-title">移动平台</p>
    <p class="link-item-text">投票</p>
    <p class="link-item-text">文创小店</p>
    <p class="link-item-text">语音导航</p>
  </div>

  <div class="link-item" style="width:300px">
    <p class="link-item-title">联系方式</p>
    <p class="link-item-text">地址</p>
    <p class="link-item-text">电话</p>
    <p class="link-item-text">邮箱</p>
  </div>

  <div class="link-item">
    <p class="link-item-title">微信公众平台</p>
    <img src="" width="80px" style="margin:10px"/>
  </div>

</div>
</div>

<div id="homeFooter">
<div class="homeFooter">
        <div class="homeFooterBottom">Copyright(C)西藏博物馆&nbsp;&nbsp;&nbsp;&nbsp;蜀ICP备11020230号&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
</div>

<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/navi.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
</body>

<script>

$(document).ready(function(){

});

$(".nav li").hover(function(){
	$(".subNav,.subMenu",this).stop(false,true).slideDown();
},function(){
	$(".subNav,.subMenu",this).stop(false,true).slideUp(0);
})

</script>
</html>
