<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<link rel="stylesheet" href="<?php echo base_url('assets/pc/css/style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick-theme.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/slick/slick.css') ?>">

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

.dash
{
  border-bottom: 2px solid #cc0000;
  width: 80px;
  height: 5px;
}

.collection
{
   width:400px; border:1px solid #636363; height:238px; margin:0 auto;
   padding: 10px;
   /*text-align: center;*/
}

.collection_item{
  height: 100%;
}
.collection_item img{
     display: block;
     margin: auto auto;

}

.collection .slick-prev {
    left: -50px;
    z-index: 999;
}

.collection .slick-next {
    right: -50px;
    z-index: 999;
}




.collection .slick-prev:before, .collection .slick-next:before {
    /* font-family: 'slick'; */
    font-size: 30px;
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

/*banner*/
.banner-item{
  margin: 0 70px;
  /*border:1px solid #cc0000;*/
  -moz-box-shadow:    1px 1px 12px rgba(200, 200, 200, 1);
  -webkit-box-shadow:  1px 1px 12px rgba(200, 200, 200, 1);
  box-shadow: 1px 1px 12px rgba(200, 200, 200, 1);
}

.banner-item img{
  width: 100%;
  height: 160px;
}

.banner-top .slick-center {
    -moz-transform: scale(2);
    -ms-transform: scale(2);
    -o-transform: scale(2);
    -webkit-transform: scale(2);
    color: #e67e22;
    opacity: 1;
    transform: scale(2);
}

.banner-top{
  height: 400px;
}

.slick-slider .slick-track, .slick-slider .slick-list {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    padding: 100px 0px;
}

#table{
    display: table;
    width:100%;
    height: 420px;
    background: rgba(0, 0, 0, 0.3);;
}
#table-cell{
    display: table-cell;
    vertical-align: middle;
}
#center{
    /*background: #333333;*/
    width: 1280px;
    margin: 0 auto;
}

.one-edge-shadow {
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
}

.item_name_bg {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 25px;
    width: 100%;
    z-index: 6;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
    -webkit-background-origin: padding;
    -webkit-background-clip: content;
}

.banner-top .slick-center .item_name_bg p{
  text-align: left;
  font-size: 16px;
  line-height: 25px;
  padding-left: 0px;
  color: white;
  letter-spacing: 2px;
  margin-left: -70px;
  -moz-transform: scale(0.5);
  -ms-transform: scale(0.5);
  -o-transform: scale(0.5);
  -webkit-transform: scale(0.5);
  transform: scale(0.5);
}

.banner-top .slick-center .item_name_bg{
  display: block;
}

.banner-top .item_name_bg{
  display: none;
}

.single-item{
  width: 29.3%;
  margin: 2%;
  float:left;
  position: relative;
}

.single-item img{
  width: 100%;
}


.item_name_bg2 {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 25px;
    width: 100%;
    z-index: 6;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
    -webkit-background-origin: padding;
    -webkit-background-clip: content;
}

.item_name_bg2 p{
  color: white;
    padding-left: 10px;
    line-height: 24px;
}
</style>
</head>

<body style="background:#333333"  ms-controller="items_ctrl">

<!-- <div style="background:rgba(0,0,0,0.3); width:100%; height:120px"></div> -->
<!-- banner -->
<div style="background:rgba(0,0,0,0.3); width:100%; text-align:center">
<img src="<?php echo base_url('assets/pc/img/gczp.jpg')?>" width="100%"/>
</div>
<div id="table">
      <div id="table-cell">
          <div id="center">
            <div class="banner-top">

              <!-- <div style="width:100%"  ms-for='($index, item_info) in @data'>
                <div class="single-item">
                  <a ms-attr="{href:@get_detail_link_pc(item_info.ITEM_ID)}"><img  ms-attr="{src:@get_pic_path(item_info.PATH)}" />
                  <div class="item_name_bg2"><p >{{item_info.ITEM_NAME}}</p></div></div></a>
              </div> -->

              <div class="banner-item"  ms-for='($index, item_info) in @data'>
                <a ms-attr="{href:@get_detail_link_pc(item_info.ITEM_ID)}"><img  ms-attr="{src:@get_pic_path(item_info.PATH)}" />
                <div class="item_name_bg"><p>{{item_info.ITEM_NAME}}</p></div></a>
              </div>

            </div>
          </div>
      </div>
</div>


<!-- header -->
<?php include 'header.php';?>

<div style=" background:#333333; width:100%; clear:both; overflow:hidden; margin-top:20px">
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#d6d6d6;    padding-bottom: 80px;">

    <div class="title_section">
      <div class="title_block">
      <p class="title_text">馆藏珍品</p>
      <p class="title_text_en">Antiquities</p>
      </div>
    </div>


    <div style="padding:0 80px 20px 80px; text-align:left; font-size:12px; color:#636363; ">
      <div style="width:100%"  ms-for='($index, item_info) in @data'>
        <div class="single-item">
          <a ms-attr="{href:@get_detail_link_pc(item_info.ITEM_ID)}"><img  ms-attr="{src:@get_pic_path(item_info.PATH)}" />
          <div class="item_name_bg2"><p> {{item_info.ITEM_NAME}} </p></div></div></a>
      </div>
    </div>

  </div>
</div>


<!-- footer -->
<?php include 'footer.php';?>

<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/pc/js/item_list.js') ?>"></script>
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
</body>

<script>

$(".nav li").hover(function(){
	$(".subNav,.subMenu",this).stop(false,true).slideDown();
},function(){
	$(".subNav,.subMenu",this).stop(false,true).slideUp(0);
})
</script>


</html>
