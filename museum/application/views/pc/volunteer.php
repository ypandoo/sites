<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<?php include 'include.php'; ?>
</head>

<body class="bg1" ms-controller="expo_list_ctrl">
<div id="container">

<!-- banner -->
<div style="background:rgba(0,0,0,0.3); width:100%; text-align:center">
<img src="<?php echo base_url('assets/pc/img/xb.jpg')?>" width="100%"/>
</div>

<!-- header -->
<?php include 'header_navi.php';?>

<div style=" width:100%; clear:both; overflow:hidden; margin-top:20px">
  <div style="width:1000px; margin:0 auto; overflow:hidden;" class="bg_content bg2">
    <div class="title_section">
      <div class="title_block">
      <p class="title_text">志愿者风采</p>
      <p class="title_text_en">Volunteer</p>
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

<!-- <div class="line_btn" style="background:rgba(0,0,0,0.3); ;">
  <a style="color:white;    color: blanchedalmond;cursor: pointer;">加载更多内容 · VIEW MORE</a></div> -->

<!-- footer -->
<?php include 'footer.php';?>
<script src="<?php echo base_url('assets/front/js/volunteer.js') ?>"></script>

</body>

</html>
