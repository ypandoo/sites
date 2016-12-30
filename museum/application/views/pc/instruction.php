<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>

<?php include 'include.php'; ?>
</head>

<body class="bg1">

<!-- banner -->
<div style="background:rgba(0,0,0,0.3); width:100%; text-align:center;margin-bottom:20px">
<img src="<?php echo base_url('assets/pc/img/xb.jpg')?>" width="100%"/>
</div>

<!-- header -->
<?php include 'header_navi.php';?>

<div style="width:100%; clear:both; overflow:hidden; "   ms-controller="instruction_ctrl">
  <div style="width:1000px; margin:0 auto; overflow:hidden; padding-bottom: 80px; position:relative" class="bg2">

    <div class="title_section">
      <div class="title_block">
      <p class="title_text">参观指南</p>
      <p class="title_text_en">Visiting Guide</p>
      </div>
    </div>

    <!-- <div style="height:50px; text-align:left; padding:30px 0 20px 20px" >
      <p class="title_text"><i class="fa fa-eye" aria-hidden="true" style="margin-right:10px"></i> 西博简介 </p>
      <!-- <p class="title_text_en">作者：{{@author}} | {{@content_time}}</p>>
      <!-- <div class="dash" style="width:130px"></div>
    </div> -->


  <div style="  width:90%; margin-left:5%; margin-top:20px">
    <!-- <p ms-text="@content_title" class="content_title"></p> -->
    <div class="content_html" ms-html="@html ">
    </div>

  </div>
</div>



</div>


<!-- footer -->
<?php include 'footer.php';?>
<script src="<?php echo base_url('assets/front/js/instruction.js') ?>"></script>
</body>
</html>
