<!DOCTYPE html>
<html lang="zh-cmn-Hans">
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
.details {
width: 100%;
background: transparent;
}

.content .html p{
   padding: 0px 25px 0 25px;
}

.content .html p span{
      font-family: 微软雅黑, "Microsoft YaHei";
      font-size: 12px;
      line-height: 25px;
}

.content .html p img{
  width: 100%;
  margin: 20px 0 20px 0;
}

.item {
    background: rgba(97, 0, 0, 0.5);
    padding: 10px 10px;
    /* margin-bottom: 10px; */
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
}

h2 {
    font-size: 14px;
    color: white;
}

h3 {
    font-size: 12px;
    color: white;
}


.innerheader {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: .8rem;
z-index: 1000;
/* background: rgba(79, 247, 90, 0.16); */
border-bottom: 1px solid rgb(255, 255, 255);
}

.show_more{
margin-bottom: 50px;
color: white;
text-align: center;
font-size: 12px;
border: 1px solid white;
width: 60%;
margin-left: 20%;
line-height: 24px;
margin-top: 20px;
}

.page-title {
    margin-top: 66px;
    margin-bottom: 5px;
    margin-left: 24px;
    /* border-bottom: 1px solid; */
}
</style>
</head>

<body class="bg5 bg">
<section class="innerheader">
	<a class="btn backbtn" href="javascript:window.history.go(-1)"></a>
    <h2>活动邀约</h2>
    <a class="btn menubtn"></a></section><section class="menuDiv hide">
</section>

<div id="details" class="details"  ms-controller="expo_list_ctrl">
        <div class="page-title" style="color: white;">
          <h3 style="font-size:18px">志愿者风采 | Volunteers</h3></div>

        <div class="content"  style="margin-top:20px">
            <div class="item"  ms-for='($index, item_info) in @list'  ms-click="@get_detail_link($index)">
             <!-- <span class="time"><small> 2016-02-02  20:56:33</small></span> -->
                <h2>{{item_info.CONTENT_TITLE}}</h2>
                <!-- <h3>{{item_info.PUBLISH_TIME}}</h3> -->
                <h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3>
            </div>
          </a>
        </div>

        <div ms-visible='@show_more' ms-click='@get_content_by_type()' class="show_more">
          加载更多...
        </div>

        <div style="margin-top:20px"></div>
    </div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/volunteer.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/base2.js') ?>"></script>

<script>

</script>
</html>
