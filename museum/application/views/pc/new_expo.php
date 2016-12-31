<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<?php include 'include.php'; ?>

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

.expo_item{
  width: 22%;
      float: left;
      background: #FFF;
      border: 1px solid rgba(102, 102, 102, 0.4);
      margin: 1.5%;
}

.expo_item:hover{
  border: 1px solid rgba(255, 0, 0, 0.5);
}

.expo_item p{
  line-height: 48px;
  font-size: 14px;
  color: black;
  text-align: center;
  font-family: "Arial","Microsoft YaHei","黑体","宋体",sans-serif;
    text-shadow: rgba(255, 255, 255, 0.2) 0 1px 0;
    cursor: pointer;
    color:#cc0000;
}

.expo_check{
  border-top: 1px solid rgba(102, 102, 102, 0.19);
}

.expo_check p:hover{
  background: rgba(197, 11, 11, 0.82);
  color: white;
}

.expo_check a:hover{
  background: rgba(197, 11, 11, 0.82);
    color: white;
}

.expo_item_container{
  padding: 10px;
}

.expo_item:hover {
    box-shadow: 0 0 38px rgba(0,0,0,.3);
    transition: all .15s ease;
}

h2, h4{
  text-align: center;
  font-weight: 500;
  font-family: "Arial","Microsoft YaHei","黑体","宋体",sans-serif;
}

.expo_text{
  padding: 0px 10px 10px 10px;
}
.expo_text h2{
  font-size: 18px;
      line-height: 50px;
      color: black;
}

.expo_text h4{
  font-size: 12px;
  line-height: 24px;
  color: #666;
}
</style>
</head>

<body class="bg1">

<!-- header -->
<?php include 'header_navi.php';?>

<!-- banner -->
<div style="width:100%; text-align:center; margin-bottom:20px">
<img src="<?php echo base_url('assets/pc/img/zl.jpg')?>" width="100%" style="margin:0"/>
<i class="line"> </i>
</div>



<div style=" width:100%; clear:both; overflow:hidden; "   ms-controller="expo_list_ctrl">
  <div style="width:100%; margin:0 auto; overflow:hidden; padding-bottom: 80px; position:relative">
    <!-- <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">新展快讯</p>
      <p class="title_text_en">New Exhibitions </p>
      <div class="dash" style="width:130px"></div>
    </div> -->

    <div class="title_section">
      <div class="title_block">
      <p class="title_text">新展快讯</p>
      <p class="title_text_en">New Exhibitions</p>
      </div>
    </div>



  <div style="  width:90%; margin-left:5%; margin-top:20px">
    <div class="expo_item"  ms-for='($index, item_info) in @list'>
      <div class="expo_item_container">
      <img ms-attr="{src:@get_pic_path(item_info.CONTENT_COVER)}" width="100%"/>

      </div>
      <div class="expo_text">
        <h2>{{item_info.CONTENT_TITLE | truncate(13, '...')}}</h2>
        <h4>{{@get_content_text(item_info.CONTENT_TEXT)}}</h4>
      </div>
      <div class="expo_check">
        <a ms-click="@get_detail_link_pc($index)"><p>查看详情</p></a>
      </div>
    </div>

  </div>
  </div>

  <div class="line_btn" style="background:rgba(0,0,0,0.3); ;" ms-visible="@show_more" ms-click='@get_content_by_type()'>
    <a style="color:white;    color: blanchedalmond;cursor: pointer;">查阅更多新闻 · VIEW MORE</a></div>
</div>



</div>


<!-- footer -->
<?php include 'footer.php';?>
<script src="<?php echo base_url('assets/front/js/new_expo.js') ?>"></script>
</body>
</html>
