<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>西藏博物馆</title>
<meta name="keywords" content="西藏博物馆,西藏博物馆,">
<meta name="description" content="">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<?php include 'header.php' ?>
</head>

<body ms-controller="expo_list_ctrl" class="bg1">


<?php include 'header_navi.php' ?>
<!-- <h2>新展快讯</h2> -->
<div id="page-content" class="index-page" style="margin-top:60px">
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

<!-- <div id="details" class="details"  ms-controller="expo_list_ctrl">
    <div style="padding: 0 10px 0 10px; overflow:hidden">
    <div class="content"  ms-for='($index, item_info) in @list'>
        <div class="news_img"  ms-click="@get_detail_link($index)">
          <img ms-attr="{src:@get_cover($index)}" width="100%" height="120px">
        </div>
        <div class="item"  ms-click="@get_detail_link($index)">
         <!-- <span class="time"><small> 2016-02-02  20:56:33</small></span> ->
            <h2>{{item_info.CONTENT_TITLE}}</h2>
            <!-- <h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3> -->
            <!-- <h3>{{item_info.PUBLISH_TIME}}</h3><h3>{{@get_content_text(item_info.CONTENT_TEXT)}}</h3> ->
        </div>
      </a>
    </div>
  </div> -->

  <div ms-visible='@show_more' ms-click='@get_content_by_type()' class="show_more">
    <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>加载更多...
  </div>
</div>

<?php include 'footer.php' ?>
</body>
<script src="<?php echo base_url('assets/front/js/new_expo.js') ?>"></script>
<script>
$('#head_text').text('新展快讯');
</script>
</html>
