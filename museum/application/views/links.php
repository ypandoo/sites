<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>西藏博物馆</title>
    <meta name="keywords" content="西藏博物馆"/>
    <meta name="description" content="西藏博物馆"/>
    <meta name="robots" content="all"/>
    <meta name="copyright" content="西藏博物馆"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="author" content="" />
    <meta name="revisit-after"  content="1 days" />
    <meta name="format-detection" content="email=no" />
    <meta name="format-detection" content="telephone=yes" />

<?php include 'header.php'; ?>
    <style>
      .item_link {
        height: 80px;
            width: 100%;
            background: rgba(10, 0, 0, 0.3);
      }

      .item_link .left{
        width: 100px;
        float: left;
        line-height: 50px;
        padding: 10px;
        height: 70px;
        text-align: center;
      }

      .item_link .right{
        width: 55%;
        float: left;
        line-height: 80px;
        padding-left: 5%;
        height: 80px;
        font-size: 16px;
        font-weight: 500;
        color: #dcbe8e;
      }

      img{
        width: 60px;
            height: 60px;
            border-radius: 30px;
      }

      .innerheader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: .8rem;
    z-index: 1000;
    border-bottom: 1px solid white;
}

.page-title {
    margin-top: 40px;
    margin-bottom: 5px;
    margin-left: 24px;
    /* border-bottom: 1px solid; */
}
    </style>
</head>
<body class="bg1">
  <?php include 'header_navi_yueyou.php'; ?>
<div id="details" class="details"  ms-controller="expo_list_ctrl" style="padding-top:50px">

        <div class="item_link" style="margin-top:20px;">
          <a href="http://www.sach.gov.cn/"><div class="left"><img src="<?php echo base_url('assets/front/img/links/gjwwj.jpg') ?>" height="50px"></div>
          <div class="right"><i class="fa fa-link" aria-hidden="true"></i>国家文物局</div></a>
        </div>

        <div class="item_link" style="margin-top:10px;">
          <a href="http://www.chnmuseum.cn/"><div class="left"><img src="<?php echo base_url('assets/front/img/links/gjbwg.jpg') ?>" height="50px"></div>
          <div class="right"><i class="fa fa-link" aria-hidden="true"></i>国家博物馆</div></a>
        </div>

        <div class="item_link" style="margin-top:10px;">
          <a href="http://www.dpm.org.cn/index1024768.html"><div class="left"><img src="<?php echo base_url('assets/front/img/links/ggbwy.jpg') ?>" height="50px"></div>
          <div class="right"><i class="fa fa-link" aria-hidden="true"></i>故宫博物院</div></a>
        </div>

        <div class="item_link" style="margin-top:10px;">
          <a href="http://www.potalapalace.cn/"><div class="left"><img src="<?php echo base_url('assets/front/img/links/bdlg.jpg') ?>" height="50px"></div>
          <div class="right"><i class="fa fa-link" aria-hidden="true"></i>布达拉宫</div></a>
        </div>

        <div class="item_link" style="margin-top:10px;">
          <a href="http://yak.bphg.com.cn/museum1.jsp"><div class="left"><img src="<?php echo base_url('assets/front/img/links/mnbwg.jpg') ?>" height="50px"></div>
          <div class="right"><i class="fa fa-link" aria-hidden="true"></i>西藏牦牛博物馆</div></a>
        </div>

    </div>
<?php include 'footer.php'; ?>
</body>

<script>
$('#head_text').text('相关链接');
</script>
</html>
