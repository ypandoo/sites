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
       border-top: 1px solid rgba(51, 51, 51, 0.1);

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

/*popup*/
.popup{
  position: fixed;;
  width: 600px;
  height: 450px;
  padding: 50px;
  left: 50%;
  margin-left: -300px;
  top:10%;
  z-index: 9999;
  background: #FFF;
  border-radius : 5px;
}

.popup h2{
  font-size: 18px;
  text-align: center;
  line-height: 60px;
}

.popup li{
  float:none;
text-align: left;
padding: 15px 20px 15px 20px;
border-top: 1px solid #f3f3f3;
}

.popup li i{
margin-right: 5px ;
color:red;
}
.bk{
  position: fixed;
  width: 100%;
  height: 100%;
  background: #000;
  opacity: 0;
  z-index: 10;
  display: none;
  -webkit-transition:opacity .5s ease;
  -o-transition:opacity .5s ease;
  -moz-transition:opacity .5s ease;
  transition:opacity .5s ease;
  z-index: 9998;
}

</style>
</head>

<body style="background:#333333"  ms-controller="sd-list" >
  <div class="bk"></div>
<!-- data -->
<div id="item_id" data-id="<?php echo $item_id?>"></div>

<!-- banner -->
<div style="background:rgba(0,0,0,0.3); width:100%; text-align:center">
<img src="<?php echo base_url('assets/pc/img/gczp.jpg')?>" width="100%"/>
</div>

<!--video -->
<div class="popup" style="display:none">
<div style="position: absolute;top: 0;font-size: 20px;right: 0;padding: 10px; cursor:pointer" ms-click='{@close_video()}'>X</div>
<video src="http://www.w3school.com.cn/i/movie.ogg" controls="controls" width="600px" height="450px">
your browser does not support the video tag
</video>
 </div>

<!-- service and pics -->
<div style=" background:#333333; width:100%; clear:both; margin:20px 0 20px 0; height:540px">
<div style="width:1000px; margin:0 auto; ">

  <div style="float:left">
    <div class="shadow" style="width:600px; height:400px;">
    <div class="slider slider-for" style="width:600px; height:400px;">
    					<div class="single-item-top" ms-for='($index, item_info) in @items_list' ms-attr="{dataId:$index}">
                <img ms-attr="{src:@get_pic_path(item_info.PATH)}" /><div class="item_name_bg"><p >{{ item_info.ITEM_NAME}}</p></div>
              </div>
    </div>
    </div>
    <div class="slider slider-nav" style="width:600px; height:120px; margin-top:20px;">
    					<div class="single-item-bottom"  ms-for='($index, item_info) in @items_list' ms-attr="{dataId:$index}">
                <img ms-attr="{src:@get_pic_path(item_info.PATH)}" /></div>
    </div>
  </div>

  <div style="width:380px; margin-left:20px; float:left; height:540px; background:url('<?php echo base_url('assets/pc/img/basic_bg.png')?>'); background-size:100% 100%">
    <!-- <div style="padding:60px 0px 0px 40px; text-align:left;height:100px">
      <p class="title_text">SELF-SERVICE </p>
      <p class="title_text_en" style="font-size:18px">自助服务</p>
      <div class="dash"></div>
    </div> -->

    <div class="title_section">
      <div class="title_block">
      <p class="title_text"><a href="/pc/view/dynamic">自助服务</a></p>
      <p class="title_text_en">SELF-SERVICE</p>
      </div>
    </div>

    <div style="width:220px; padding:0px 40px 0 40px">
      <div class="service-container" ms-click= '{@_play_cn()}'><a class="service">
        <span ms-if='!@play_cn'><i class="fa fa-play" aria-hidden="true"></i></i>收听中文语音解说</span>
        <span ms-if='@play_cn' style="color:#cc0000"><i class="fa fa-pause" aria-hidden="true" ></i>关闭中文语音解说</span>
      </a></div>

      <div class="service-container" ms-click= '{@_play_tibet()}'><a class="service">
        <span ms-if='!@play_tibet'><i class="fa fa-play" aria-hidden="true"></i></i>收听藏文语音解说</span>
        <span ms-if='@play_tibet' style="color:#cc0000"><i class="fa fa-pause" aria-hidden="true" ></i>关闭藏文语音解说</span>
      </a></div>


      <div class="service-container" ms-click='{@play_video()}'><a class="service">
        <i class="fa fa-video-camera" aria-hidden="true"></i>观看视频解说
      </a></div>
      <div class="service-container"><a class="service"  ms-click="{@direct2map()}">
        <i class="fa fa-map" aria-hidden="true"></i>查看场馆平面图
      </a></div>
      <div class="service-container"><a class="service" href="/Pc/view/item_list">
        <i class="fa fa-arrow-left" aria-hidden="true"></i></i>返回馆藏珍品列表
      </a></div>
    </div>
  </div>
</div>
</div>


<!-- HEADER -->
<?php include 'header.php';?>

<div style=" background:#333333; width:100%; clear:both; overflow:hidden; " ms-controller="sd-list">
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#d6d6d6;    padding-bottom: 80px;">

    <!-- <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">珍品简介</p>
      <p class="title_text_en">COLLECTION DETAIL</p>
      <div class="dash"></div>
    </div> -->

    <div class="title_section">
      <div class="title_block">
      <p class="title_text"><a href="/pc/view/dynamic">文字介绍</a></p>
      <p class="title_text_en">Description</p>
      </div>
    </div>

    <!-- <div style="padding:0 80px 0 80px; text-align:left; font-size:12px; color:#636363;margin-bottom:20px">
      <div class="item-des" ms-html="@items_list[0].ITEM_DESCRIPTION " >
      </div>
    </div> -->

    <div style="  width:90%; margin-left:5%; margin-top:20px">
      <!-- <p ms-text="@content_title" class="content_title"></p> -->
      <div class="content_html" ms-html="@items_list[0].ITEM_DESCRIPTION">
    </div>
  </div>
</div>


<!-- footer -->
<?php include 'footer.php';?>

<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/pc/js/item_detail.js') ?>"></script>
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
