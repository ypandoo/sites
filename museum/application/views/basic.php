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

    <style>
    .details {
    width: 100%;
    background: transparent;
    }

    .content .item {
        position: absolute;
        width: 100%;
        height: 38px;
        background: rgba(97,0, 0, 0.5);
        /* margin-top: 4px; */
        /* padding: 5px; */
        /* float: left; */
        bottom: 3px;
    }

    .content .item h2 {
      font-size: 12px;
      line-height: 15px;
      font-weight: 500;
      letter-spacing: 0px;
      color: #ffffff;
      padding: 5px 5px 0 5px;
    }

    .content {
        width: 48%;
        height: 130px;
        position: relative;
        /* border-radius: 20px; */
        /* background-color: #f5f5f5; */
        /* margin-bottom: 5px; */
        margin: 10px 1% 10px 1%;
        float: left;
        /* border: 1px solid rgb(0, 132, 77); */
        /* box-shadow: 3px 2px 6px rgba(220, 220, 220, 0); */
    }


    .innerheader {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: .8rem;
    z-index: 1000;
    /* background: rgba(79, 247, 90, 0.16); */
    border-bottom: 1px solid rgb(255, 255, 255);
    }

    .show_more{
    margin-bottom: 50px;
    color: white;
    text-align: center;
    font-size: 12px;
    border: 1px solid white;
    width: 60%;
    margin-left: 20%;
    line-height: 24px;
    margin-top: 20px;
    }
    </style>

</head>
<body class="bg1" style="margin:0;padding:0" ms-controller="expo_list_ctrl">
  <!-- Carousel -->
  <header id="intro">
    <?php include 'header_navi.php' ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo base_url('assets/front/img/m/routine-banner2.jpg') ?>" alt="First slide"/>
        </div>
        <div class="item">
          <img src="<?php echo base_url('assets/front/img/m/routine-banner1.jpg') ?>" alt="Second slide"/>
        </div>
        <div class="item">
          <img src="<?php echo base_url('assets/front/img/m/routine-banner3.jpg') ?>" alt="Third slide">
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic"  role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
    </div>
  </header>
  <!-- Header -->

        <!-- <div class="content"  ms-for='($index, item_info) in @list'>
            <div class="news_img"  ms-click="@get_detail_link($index)">
              <img ms-attr="{src:@get_cover($index)}" width="100%" >
            </div>
            <div class="item"  ms-click="@get_detail_link($index)">
             <!-- <span class="time"><small> 2016-02-02  20:56:33</small></span> ->
                <h2>{{item_info.CONTENT_TITLE}}</h2>
                <!-- <h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3> -->
                <!-- <h3>{{item_info.PUBLISH_TIME}}</h3><h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3> ->
            </div>
          </a>
        </div> -->

        <div id="page-content" class="index-page" style="margin-top:20px">
        		<section class="box-content box-1" ms-for='($index, item_info) in @list'>
        			<div class="container">
        				<div class="row">
        					<div class="col-sm-4 ">
        						<div class="service">
                      <img ms-attr="{src:@get_cover($index)}"  alt="">
        							<p style="font-size:16px"><i class="fa fa-tags" aria-hidden="true"></i>{{item_info.CONTENT_TITLE}}</p>
        							<a class="btn btn-2 btn-sm" ms-click="@get_detail_link($index)">查看详情</a>
        						</div>
        			 		</div>
        				</div>
        			</div>
        		</section>
        </div>


      <div ms-visible='@show_more' ms-click='@get_content_by_type()' class="show_more">
        加载更多...
      </div>

<?php include 'footer.php'; ?>

</body>
<script>
(function(){
  var self = this;
  $('#head_text').text('基本陈列');

  //avalon control space
  self.items_ctrl = avalon.define({
                   $id: 'expo_list_ctrl',
                   list:[],
                   sort: 0,
                   page_start: 0,
                   show_more: false,

                   get_pic_path: function(path){
                     return upload_img+path;
                   },
                   get_detail_link : function(e){
                     window.location.href = base_url+'content/view/'+self.items_ctrl.list[e].CONTENT_ID;
                   },

                   get_detail_link_pc : function(e){
                     window.location.href = base_url+'content/view_basic/'+self.items_ctrl.list[e].CONTENT_ID;
                   },

                   get_content_text: function(e){
                     return e.substr(0, 48)+'...';
                   },

                   get_cover:function(e){
                     return self.items_ctrl.get_pic_path(self.items_ctrl.list[e].CONTENT_COVER);
                   },

                   get_content_by_type:function(){
                     var url = base_url+'Content/get_list';
                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                               if(data.success == 1 ){
                                                   for (var i = 0; i < data.data.length; i++) {
                                                    self.items_ctrl.list.push(data.data[i]);
                                                   }

                                                   //长度大与interval 就加到起始位置
                                                   if (data.data.length == page_interval) {
                                                     self.items_ctrl.page_start += data.data.length;
                                                     //show more
                                                     self.items_ctrl.show_more  = true;
                                                   }
                                                   else {
                                                     self.items_ctrl.show_more  = false;
                                                   }
                                               }
                                               else{
                                                   alert(data.message);
                                               }
                                           }
                                         else {
                                           alert('返回值错误!');
                                         }
                                     },
                                     {'list_type': '基本陈列',
                                      'page_start': self.items_ctrl.page_start,
                                      'page_interval': 4},
                                     function()
                                     {
                                       alert('网络错误!');
                                     });
                   }
  });


  //Init codes run once
  self.items_ctrl.get_content_by_type();

}).call(define('space_basic_list'));

</script>
</html>
