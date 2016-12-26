<!DOCTYPE html>
<html>
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

<body ms-controller="sd-list" class="bg1">
<div id="content_id" data-id="<?php echo $content_id?>"></div>
<?php include 'header_navi.php' ?>

<!-- <div class="txtbox">
  <h2 style="font-size:18px">{{@content_title}}</h2>
  <h4 style="font-size:12px">{{@content_time}}</h4>
</div> -->

<div id="page-content" class="index-page" style="margin-top:60px">
		<section class="box-content box-1">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 ">
						<div class="service">
              <h3 style="font-size:18px">{{@content_title}}</h3>
              <h4 style="font-size:12px;">发布日期: &nbsp; {{@content_time}}</h4>
              <hr>
							<p class="html" ms-html="@content_html"></p>
							<!-- <a class="btn btn-2 btn-sm" ms-click="@get_detail_link($index)">查看详情</a> -->
						</div>
			 		</div>
				</div>
			</div>
		</section>
</div>

<!-- <div class="innerContent">
	<div class="toppadding"></div>
    <div class="details-box">
    	<div class="txtbox">
        <h2 style="font-size:18px">{{@content_title}}</h2>
        <h4 style="font-size:12px">{{@content_time}}</h4>
      </div>
    </div>
      <div class="details" >
              <div id="header" class="newhead">
                  <div class="logo touch-href"  ms-click="@get_type_link()"></div>
              </div>

              <!-- <div class="page-title" ms-click="@get_type_link()">
                <h2>{{@content_type}}</h2>
                <h4>{{@get_content_name_en()}}</h4>
              </div> -->

              <!-- <div class="page-title-name" >
                <h2>{{@content_title}}</h2>
                <h4>{{@author}}发表于:{{@content_time}}</h4>
              </div> ->

              <div class="content">
                    <!-- <p ms-text="@content_title" class="content_title"></p>
                    <p class="content_time">{{@author}}发表于:{{@content_time}}</p> ->

                    <p class="html" ms-html="@content_html">

                    </p>
              </div>
      </div>
    </div> -->
<?php include 'footer.php' ?>
</body>
<script>
(function() {
  var self = this;

  self.contents = {
    '新展快讯': ['New Exhibitions', 'new_expo'],
    '基本陈列': ['Routine Exhibitions', 'basic'],
    '展览回顾': ['Exhibitions Review', 'expo_review'],
    '西博动态': ['News', 'dynamic'],
    '新馆建设': ['New Contructions', 'construction'],
    '藏品保护': ['Antiquities Protection', 'protect'],
    '西博课堂': ['Knowledge Share', 'lesson'],
    '活动邀约': ['Activities', 'activity'],
    '志愿者风采': ['Volunteer', 'volunteer'],
    '文创小店': ['Craft Galleries', 'shop']
  };

  self.framework = avalon.define({
    $id: "sd-list",
    content_id: '',
    content_html: '',
    content_time: '',
    content_title: '',
    content_type: '',
    author: '',

    get_pic_url_path: function(e) {
      return 'url(' + e + ')';
    },
    direct_to_list_path: function() {
      window.location.href = base_url + 'pages/view/new_expo';
    },
    get_type_link: function() {
      window.location.href = base_url + 'pages/view/' + self.contents[
        self.framework.content_type][1];
    },

    get_content_name_en: function() {
      //var detail = self.contents[e][0];
      if (self.framework.content_type == '') {
        return '';
      }

      return self.contents[self.framework.content_type][0];
    }

  });

  //get data via ajax
  self.get_detail = function() {
    var content_id = $('#content_id').attr('data-id');
    if (!content_id) {
      alert('数据错误！');
      return;
    }

    var url = base_url + 'Content/get_content_detail';
    var submit_data = {
      'content_id': content_id
    };
    base_remote_data.ajaxjson(
      url, //url
      function(data) {
        if (data.hasOwnProperty('success')) {
          if (data.success == 1) {
            console.log(data);
            console.log('获取列表及图片成功！');
            //self.list = self.framework.items_list = data.data;
            //self.info(0);
            //self.btn_display(0);
            self.framework.item_id = data.data[0].CONTENT_ID;
            self.framework.content_html = data.data[0].CONTENT_HTML;
            self.framework.content_title = data.data[0].CONTENT_TITLE;
            self.framework.author = data.data[0].AUTHOR;
            self.framework.content_type = data.data[0].CONTENT_TYPE;
            self.framework.content_time = data.data[0].PUBLISH_TIME;
            $('#head_text').text(self.framework.content_type);
          } else {
            alert(data.message);
          }
        } else {
          alert('返回值错误!');
        }
      },
      submit_data,
      function() {
        alert('网络错误!');
      });
  };

  self.get_detail();

}).call(define('space_content_detail'));

</script>
</html>
