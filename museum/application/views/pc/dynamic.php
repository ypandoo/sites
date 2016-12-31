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

</style>
</head>

<body class="bg2"  ms-controller="expo_list_ctrl">
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
    <!-- <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text">西博动态</p>
      <p class="title_text_en">NEWS</p>
      <div class="dash"></div>
    </div> -->

    <div class="title_section">
      <div class="title_block">
      <p class="title_text">西博动态</p>
      <p class="title_text_en">News</p>
      </div>
    </div>

    <div style="padding:0 80px 20px 80px; text-align:left; font-size:12px; color:#636363; "
      ms-for='($index, item_info) in @list'>
      <div class="news_item">
      <a ms-click='@direct2detail(item_info.CONTENT_ID)'><p class="news_title">
        <span>{{item_info.PUBLISH_TIME}}</span>{{item_info.CONTENT_TITLE}}
      </p>
      <p class="news_content">
        {{@get_content_text_pc(item_info.CONTENT_TEXT)}}
      </p></a>
    </div>

    </div>

  </div>
</div>

<div class="line_btn" style="background:rgba(0,0,0,0.3); ;" ms-visible="@show_more" ms-click='@get_content_by_type()'>
  <a style="color:white;    color: blanchedalmond;cursor: pointer;">查阅更多新闻 · VIEW MORE</a></div>

<!-- footer -->
<?php include 'footer.php';?>
<script src="<?php echo base_url('assets/front/js/dynamic.js') ?>"></script>

</body>

<script>
</script>

</html>
