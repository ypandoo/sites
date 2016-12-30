<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<?php include 'include.php'; ?>
</head>
<div id="content_id" data-id="<?php echo $content_id?>"></div>
<body class="bg1">

<!-- banner -->
<div style="width:100%; text-align:center; margin-bottom:20px">
<img src="<?php echo base_url('assets/pc/img/xb.jpg')?>" width="100%"/>
<i class="line"> </i>
</div>

<!-- header -->
<?php include 'header_navi.php';?>

<div style=" width:100%; clear:both; overflow:hidden; "    ms-controller="sd-list">
  <div style="width:1000px; margin:0 auto; overflow:hidden; background:#f2f2f2;   padding-bottom: 80px; position:relative" class="bg2">

    <div class="title_section">
      <div class="title_block">
      <p class="title_text"><a href="/pc/view/volunteer">自愿者风采</a></p>
      <p class="title_text_en">Volunteers</p>
      </div>
    </div>

    <div>
      <p class="title_name">{{@content_title}}</p>
      <p class="title_author">作者：{{@author}}  |  发表于：{{@content_time}}</p>
    </div>

    <!-- <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text"><i class="fa fa-eye" aria-hidden="true" style="margin-right:10px"></i> {{@content_title}} </p>
      <p class="title_text_en">作者：{{@author}} | {{@content_time}}</p>
      <!-- <div class="dash" style="width:130px"></div> --
    </div> -->


  <div style="  width:90%; margin-left:5%; margin-top:20px">
    <!-- <p ms-text="@content_title" class="content_title"></p> -->
    <div class="content_html" ms-html="@content_html ">
  </div>

  </div>
</div>



</div>


<!-- footer -->
<?php include 'footer.php';?>
<script src="<?php echo base_url('assets/front/js/content_detail.js') ?>"></script>
</body>
</html>
