<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<?php include 'include.php'; ?>

<style>
.btn_black{
    background:rgba(0,0,0,0.3) ;
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
    border-bottom: 1px solid  #dadad0;
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

.news_item a{
  cursor: pointer;
}

</style>
</head>

<body class="bg2"   ms-controller="protect_ctrl">
<div id="container">

<!-- banner -->
<div style="width:100%; text-align:center">
<img src="<?php echo base_url('assets/pc/img/xb.jpg')?>" width="100%"/>
<i class="line"> </i>
</div>

<!-- header -->
<?php include 'header_navi.php';?>

<div style=" width:100%; clear:both; overflow:hidden; margin-top:20px">
  <div style="width:1000px; margin:0 auto; overflow:hidden;" class="bg_content">

    <div class="title_section">
      <div class="title_block">
      <p class="title_text">藏品保护</p>
      <p class="title_text_en">Antiquities Protection</p>
      </div>
    </div>

    <!-- <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">藏品保护</p>
      <p class="title_text_en">Antiquities Protection</p>
      <div class="dash"></div>
    </div> -->
    <!-- <div class="content"  style="margin-top:20px">
        <div class="item"  ms-for='($index, item_info) in @list'  ms-click="@get_detail_link($index)">
         <!-- <span class="time"><small> 2016-02-02  20:56:33</small></span> -
            <h2>{{item_info.CONTENT_TITLE}}</h2>
            <h3>{{item_info.PUBLISH_TIME}}</h3><h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3>
        </div>
      </a>
    </div> -->
    <div style="padding:0 80px 20px 80px; text-align:left; font-size:12px; color:#636363; "
      ms-for='($index, item_info) in @list'>
      <div class="news_item">
      <a ms-click='@get_detail_link_pc($index)'><p class="news_title">
        <span>{{item_info.PUBLISH_TIME}}</span>{{item_info.CONTENT_TITLE}}
      </p>
      <p class="news_content">
        {{@get_content_text_pc(item_info.CONTENT_TEXT)}}
      </p></a>
    </div>
    </div>

  </div>
</div>

<div class="line_btn" style="background:rgba(0,0,0,0.3);"  ms-visible="@show_more" ms-click='@get_content_by_type()'>
  <a style="color:white; color: blanchedalmond;cursor: pointer;">加载更多课堂内容 · VIEW MORE</a></div>

<!-- footer -->
<?php include 'footer.php';?>
<script src="<?php echo base_url('assets/front/js/protect.js') ?>"></script>

</body>

<script>
</script>

</html>
