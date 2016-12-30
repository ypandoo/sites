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
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/front/css/base.css') ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/item_detail.css') ?>">
        <?php include 'header.php'; ?>
    <style>
    .service-container{
height: 40px;
float: left;
line-height: 40px;
width: 50%;
    }

    .service span{
          font-size: 14px;
          padding-left: 10px;
          color: #3c1212;
    }

    .service span i{
          margin-right: 5px;
    }
h2{
  font-size: 18px;
  color:#634e2c;
}

/*h3{
  font-size: 24px;
  color:#634e2c;
}*/

.service-container{
  border: 1px solid #634e2c;
padding-left: 20px;
margin-bottom: 10px;
border-radius: 5px;
width: 60%;
}

/*.page-title{
  font-size: 18px;
  padding: 0 20px;
}*/
    </style>

</head>

<body class="bg1">
<div id="item_id" data-id="<?php echo $item_id?>"></div>
<?php include 'header_navi_yueyou.php'; ?>

<div class="details" ms-controller="sd-list" style="margin-top:50px;background: transparent;">
        <div class="section-container" >
            <section class="sd-list pub-title">
                <div id="touch-zone" class="pro-info" style="background:transparent">
                    <div style="position:relative">
                      <img width="100%" ms-attr="{src:@data.path}"></img>
                      <div class='item_name_bg'>
                          <p ms-text="@data.name"></p>
                      </div>
                    </div>

                <!-- <div class="fin-info">
                    <p class="left pro-info-unit"><span>展出位置:B23F</span></p>
                    <p class="right pro-info-unit"><span>视频解说</span></p>
                </div> -->

                <div class="list-container">
                    <ul id="list-container">
                        <li id="sd-selector" class="selector"><div></div></li>
                        <li ms-for='($index, item_info) in @items_list' ms-attr="{dataId:$index}">
                            <div> <img ms-attr="{src:@get_pic_path(item_info.PATH)}"></img>
                            </div>
                        </li>
                    </ul>
                </div>




              </div>
            </section>

        </div>

        <div ms-visible="@item_is_topten" class="bg2" style="    padding: 10px 20px;">
        <div style="    margin-top: 0px;
    height: 5px;
    width: 100%;">

        </div>
        <div class="page-title" style="margin-top:0px; margin-bottom:30px">
          <h2><i class="fa fa-home" aria-hidden="true"></i>自助服务 </h2>
          <!-- <h4 style="letter-spacing: 1px;">Self-Service</h4> -->
        </div>

        <div style="clear:both; overflow:hidden;">
          <div class="service-container" ms-click= '@_play_cn()'><a class="service">
            <span ms-if='!@play_cn'><i class="fa fa-play" aria-hidden="true"></i>收听中文语音解说</span>
            <span ms-if='@play_cn' style="color:#cc0000"><i class="fa fa-pause" aria-hidden="true" ></i>关闭中文语音解说</span>
          </a></div>

          <div class="service-container" ms-click= '@_play_tibet()'><a class="service">
            <span ms-if='!@play_tibet'><i class="fa fa-play" aria-hidden="true"></i>收听藏文语音解说</span>
            <span ms-if='@play_tibet' style="color:#cc0000"><i class="fa fa-pause" aria-hidden="true" ></i>关闭藏文语音解说</span>
          </a></div>


          <!-- <div class="service-container" ms-click='{@play_video()}'><a class="service">
            <span><i class="fa fa-video-camera" aria-hidden="true"></i>观看视频解说</span>
          </a></div> -->
          <!-- <div class="service-container"><a class="service"  ms-click="{@direct2map()}">
            <span><i class="fa fa-map" aria-hidden="true"></i>查看场馆导览</span>
          </a></div> -->

          <!-- <div class="service-container"><a class="service" href="/pages/view/item_list">
            <span><i class="fa fa-arrow-right" aria-hidden="true"></i>返回珍品赏析列表</span>
          </a></div> -->
        </div>

        <div class="page-title" style="margin-top:15px">
          <h2><i class="fa fa-video-camera" aria-hidden="true"></i>视频解说 </h2>
          <!-- <h4 style="letter-spacing: 1px;">Video</h4> -->
        </div>

        <div  style="margin-top:20px; padding-left:0px;">
          <div style="width:100%">
          <video id='video' controls="controls" width="320px" height="240px">
          您的浏览器不支持 video 标签。
          </video>
          </div>
        </div>
      </div>


        <div class="page-title" style="margin-top:25px; margin-bottom:60px; padding-left:20px">
          <h2><i class="fa fa-tags" aria-hidden="true" ></i>展品介绍 </h2>
          <!-- <h4 style="letter-spacing: 1px;">Antiquities Introduction</h4> -->
        </div>

        <div class="content" style="clear:both; margin-top:20px; padding:0 20px" >
              <p class="html" ms-html="@data.description ">
              </p>
        </div>

<?php include 'footer.php'; ?>
</div>
</body>
<script src="<?php echo base_url('assets/front/js/item_detail.js') ?>"></script>
<script>
</script>
</html>
