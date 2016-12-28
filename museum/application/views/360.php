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
    <link rel="shortcut icon" href="/favicon.ico" type="image/ico" />
    <link rel="Bookmark" href="/favicon.ico" />

    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/panorama_viewer.css') ?>">
    <?php include 'header.php'; ?>
    <style>
     .banner-top{
       margin-top: 46px;
     }
     .banner-item{
       position: relative;
     }

     .banner-item img{
       width: 100%;
     }

     .item_name_bg {
       position: absolute;
       text-align: left;
       left: 0;
       bottom: 0;
       height: 40px;
       width: 100%;
       z-index: 6;
       background: -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)),color-stop(0.2, rgba(0,0,0,.2)), to(rgba(0,0,0,.8)));
       -webkit-background-origin: padding;
       -webkit-background-clip: content;
     }

     .item_name_bg p{
       text-align: left;
       font-size: 16px;
       margin-left: 15px;
       line-height: 40px;
       /* padding-left: 0px; */
       font-family: 'Microsoft YaHei';
       /* margin-left: 10px; */
       -moz-transform: scale(0.5);
       -ms-transform: scale(0.5);
       -o-transform: scale(0.5);
       /* -webkit-transform: scale(0.5); */
       /* transform: scale(0.5); */
       color: white;
       letter-spacing: 2px;
     }

     .expo_item{
       width: 48%;
       float: left;
       margin: 1%;
       border: 1px solid rgba(0, 0, 0, 0.11);
       box-shadow: 3px 2px 6px #dcdcdc;
     }

     .newhead {
    -webkit-box-shadow: 0 8px 6px -6px #505050;
    -moz-box-shadow: 0 8px 6px -6px #505050;
    box-shadow: 0 8px 6px -6px #505050;
}

.expo_text h2{
  line-height: 30px;
  font-family: 'Microsoft YaHei';
  letter-spacing: 0px;
  /* background-color: #e2e2e2; */
  margin-left: 5px;
  font-size: 12px;
}

.panorama {
  width: 100%;
  float: left;
  margin-top: 46px;
  height: 300px;
  position: relative;
}

.panorama .credit {
  background: rgba(0,0,0,0.2);
  color: white;
  font-size: 12px;
  text-align: center;
  position: absolute;
  bottom: 0;
  right: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  float: right;
}

.locations{
  clear: both;
  width: 100%;
  overflow: hidden;
  /*padding: 0px 20px 0 20px ;*/
}

.locations .item{
  float: left;
  width: 30%;
  margin: 1%;
  border: 1px solid rgba(0, 0, 0, 0.2);
  background: rgba(0, 0, 0, 0.1);
  color: rgba(0, 0, 0, 0.2);
  height: 32px;
  text-align: center;
  font-size: 12px;
  padding-top: 6px;
  border-radius: 5px;
}

.locations .item2{
  float: left;
  width: 31%;
  margin: 1%;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: rgba(0, 0, 0, 0.1);
  color: rgba(0, 0, 0, 0.8);
  height: 32px;
  text-align: center;
  font-size: 13px;
  padding-top: 5px;
  border-radius: 5px;
  line-height: 24px;
}

.locations .selected
{
  border: 1px solid rgba(255, 0, 0, 0.4);
  background: rgba(255, 0, 0, 0.1);
  color:rgba(255, 0, 0, 0.9);
}

.pano {
  width: 100%;
  height: 300px;
  margin-top: 46px;
  cursor: move;
  z-index: 100;
  position: relative;
  border-top: 1px solid white;
    border-bottom: 1px solid white;
}
.pano .controls {
  position: relative;
  top: 40%;
}
.pano .controls a {
  position: absolute;
  display: inline-block;
  text-decoration: none;
  color: #eee;
  font-size: 3em;
  width: 20px;
  height: 20px;
  z-index: 999;
}
.pano .controls a.left {
  left: 10px;
}
.pano .controls a.right {
  right: 10px;
}
.pano.moving .controls a {
  opacity: 0.4;
  color: #eee;
}

.page-title {
    margin-top: 40px;
    margin-bottom: 5px;
    margin-left: 24px;

    /* border-bottom: 1px solid; */
}

h3{
  font-size: 20px;
letter-spacing: 2px;
font-weight: 300;
    color: #7d6a4b;
}
    </style>
</head>

<body>

  <body class="bg1"  ms-controller="t_ctrl">
  <?php include 'header_navi_yueyou.php'; ?>

    <div id="myPano" class="pano">
      <div style="position: absolute;bottom: 0px;right: 10px;">
        <img src="<?php echo base_url('assets/front/img/move.png')?>" width="50px"/>
      </div>
    </div>

    <div class="page-title" style="color: white;">
      <h3><i class="fa fa-eye" aria-hidden="true"></i>切换全景图</h3>
    </div>

    <div class="locations">
      <div :css="[@item, @qj1 && @selected_css]"  ms-click="@switch_view('1')">全景图一</div>
      <div :css="[@item, @qj2 && @selected_css]"  ms-click="@switch_view('2')" ms-visible='@show_pic2'>全景图二</div>
    </div>

    <div class="page-title" style="color: white;">
      <h3><i class="fa fa-street-view" aria-hidden="true"></i>切换展厅</h3>
    </div>

    <div class="locations">
      <div :css="[@item, @zl1 && @selected_css]"  ms-click="@switch_expo('1')">外立面与大厅</div>
      <div :css="[@item, @zl2 && @selected_css]"  ms-click="@switch_expo('2')">史前文化展</div>
      <div :css="[@item, @zl3 && @selected_css]"  ms-click="@switch_expo('3')">地方与祖国关系史</div>
      <div :css="[@item, @zl4 && @selected_css]"  ms-click="@switch_expo('4')">二十一度唐卡展</div>
      <div :css="[@item, @zl5 && @selected_css]"  ms-click="@switch_expo('5')">西藏民俗文化展</div>
      <div :css="[@item, @zl6 && @selected_css]"  ms-click="@switch_expo('6')">西藏佛教艺术展</div>
      <div :css="[@item, @zl7 && @selected_css]"  ms-click="@switch_expo('7')">藏族戏剧用品展</div>
    </div>

    <div class="page-title" style="color: white;">
      <h3><i class="fa fa-link" aria-hidden="true"></i>更多展览信息</h3>
    </div>

    <div class="locations" style="margin-bottom:40px">
      <div class="item2"><a href="<?php echo base_url('pages/view/basic')?>">基本陈列</a></div>
      <div class="item2"><a href="<?php echo base_url('pages/view/expo_review')?>">展览回顾</a></div>
      <div class="item2"><a href="<?php echo base_url('pages/view/new_expo')?>">最新展览</a></div>
    </div>

<?php include 'footer.php'; ?>
</body>
<script src="<?php echo base_url('assets/front/js/360.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/jquery.pano.js') ?>"></script>
<script>
$('#head_text').text('360全景');
// /* jshint jquery: true */
jQuery(document).ready(function($){
  $("#myPano").pano({
    img: "<?php echo base_url('assets/front/img/360/bwg1.jpg')?>"
  });
});
</script>

</html>
