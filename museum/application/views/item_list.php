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

    <?php include 'header.php' ?>
</head>

<body class="bg1"  ms-controller="items_ctrl">
  <?php include 'header_navi_yueyou.php'; ?>
  <!-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top:50px">
  <!-- Indicators ->
  <ol class="carousel-indicators" >
    <li ms-for="($index,el) in data" data-target="#carousel-example-generic"
    ms-attr="{'data-slide-to':$index}" ms-class="[$index == 0 ? 'active' : '']" ></li>
  </ol>

  <!-- Wrapper for slides ->
  <div class="carousel-inner" role="listbox">
    <div ms-class="[($index == 0 ? 'active' : ''), 'item']" ms-for="($index,el) in data">
      <img ms-attr="{src:@get_pic_path(el.PATH)}" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls ->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->


<div id="page-content" class="index-page" style="margin-top:60px">
    <section class="box-content box-1" ms-for='($index, item_info) in @data'>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 ">
            <div class="service" ms-click="@get_detail_link(item_info.ITEM_ID)">
              <img ms-attr="{src:@get_pic_path(item_info.PATH)}"  alt="">
              <p style="font-size:16px; text-align:center"><i class="fa fa-bandcamp" aria-hidden="true"></i>{{@item_info.ITEM_NAME}}</p>
              <!-- <a class="btn btn-2 btn-sm" ms-click="@get_detail_link(item_info.ITEM_ID)">查看详情</a> -->
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<!-- <div class="details"  ms-controller="items_ctrl">
    <div class="banner-top" >
       <div class="banner-item"  ms-for='($index, item_info) in @data'>
         <img  ms-attr="{src:@get_pic_path(item_info.PATH)}" width="100%"/>
         <!-- <div class="item_name_bg"><p >{{@item_info.ITEM_NAME}}</p></div> ->
       </div>
    </div>

    <div class="page-title" style="margin-top: 20px;margin-left: 20px;color: white;">
      <h3>十大精品&nbsp; | &nbsp; Top10 Collections</h3></div>


    <div style=" margin-top:20px; margin-bottom:40px; padding-left:15px; padding-right:15px; overflow:hidden">
      <div class="expo_item"  ms-for='($index, item_info) in @data' >
        <div class="expo_item_container" ms-click="@get_detail_link(item_info.ITEM_ID)">
        <img ms-attr="{src:@get_pic_path(item_info.PATH)}" width="100%" height="120px"/>

        </div>
        <div class="expo_text" ms-click="@get_detail_link(item_info.ITEM_ID)">
          <h2>{{item_info.ITEM_NAME}}</h2>
          <!-- <h4>{{@get_content_text(item_info.ITEM_TEXT)}}</h4> ->
        </div>
      </div>
    </div>
  </div> -->
<?php include 'footer.php'; ?>
</body>
<script>
$('#head_text').text('十大精品');
(function() {
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
    $id: 'items_ctrl',
    data: [],
    sort: 0,

    get_pic_path: function(path) {
      return upload_img + path;
    },
    get_detail_link: function(e) {
      window.location.href = base_url + 'item/view/' + e;
    },
    get_detail_link_pc: function(e) {
      return base_url + 'item/view_pc/' + e;
    },

    get_content_text: function(e) {
      return e.substr(0, 45) + '...';
    },

    get_items_with_pic: function() {
      var url = base_url + 'Item/get_items_topten_with_pic';
      base_remote_data.ajaxjson(
        url, //url
        function(data) {
          if (data.hasOwnProperty('success')) {
            if (data.success == 1) {
              //  console.log(data);
              //  console.log('获取列表及图片成功！');
              items_ctrl.data = data.data;
              // items_ctrl.run_slick();
            } else {
              alert(data.message);
            }
          } else {
            alert('返回值错误!');
          }
        },
        '',
        function() {
          alert('网络错误!');
        });
    }
  });

  //Init codes run once
  items_ctrl.get_items_with_pic();

}).call(define('space_view_items'));

</script>
</html>
