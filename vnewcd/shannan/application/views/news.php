<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微山南</title>
<meta name="keywords" content="微山南" />
<meta name="description" content="微山南" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<style>
.banner-tilte{
    position: absolute;
    top: 30%;
    left: 10%;
    color: white;
    /* margin-top: 0; */
    /* padding-top: 0; */
    font-size: 14px;
    font-weight: bold;
    /*box-shadow: -2px 2px white;*/
    padding: 0 10px;
    line-height: 18px;
}

.banner-tilte h3{
  margin: 0;
}

.banner-tilte p{
  font-size: 14px;
}

.banner h3 {
    font-size: 16px;
    font-weight: bold;
}

</style>
</head>
<body ms-controller="contents">

<div class="wrapper" >
    <?php include 'header.php' ?>

    <section class="banner">
        <!-- <div class="banner-tilte"><h3>时政要闻</h3><p>News</p></div> -->
        <img ms-attr="{src: '<?php echo base_url('Application/views/img/banner/')?>'+type+'.jpg'}" />
    </section>

    <section class="content">
        <div class="firstNews">
            <a  ms-attr="{href:'<?php echo site_url('front/detail?id=')?>'+first._id}" >
                <img ms-attr="{src:'<?php echo base_url('files/')?>'+first.cover}" />
                <h4>{{first.title}}</h4>
                <p>一{{first.plain_text | truncate(30,'...') }}</p>
                <span>{{first.update_time}}</span>
            </a>
        </div>

    <div>            			                    			                    			                    			                    			                    			                    			                    			                    			                    			                </div>
        <ul class="news">
        	<li ms-for="($index,el) in data" ms-if="$index > 0">
            		<a  ms-attr="{href:'<?php echo site_url('front/detail?id=')?>'+el._id}">
            			<div>
            				<p>{{el.update_time | date("MM-dd")}} <br> {{el.update_time | date("yyyy")}}</p>
            				<!-- <p>{{el.update_time | date("yyyy")}}</p> -->
            			</div>
            			<h4>{{el.title}}</h4>
            			<p>{{el.plain_text  | truncate(35,'...') }}</p>
            		</a>
        	</li>
        </ul>
    </div>

    <!-- <div class="pages">
        <a class='next'>上一页</a>
    	<a class='next' href="/wap/news.php?bid=2&page=2"  title="下一页" style="float:right">下一页</a>
    </div> -->
    </section>

    <div id="loading" style="display:; position:fixed; bottom:200px; text-align:center;width:100%" ms-visible="@sending">
      <i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:#337ab7"></i>
      <span class="sr-only">Loading...</span>
    </div>

    <?php include 'footer.php' ?>
</div>

</body>
</html>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script src="<?php echo base_url('application/views/js/jquery.query-object.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>

<script>
//avalon controllers
(function(){
 var self = this;
 self.content = avalon.define({
    $id: "contents",
    data:[],
    page: 0,
    type: 1,
    sending: false,
    first: {cover:'default.png', title:'数据加载中...'},
    getAPage:function(){
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            data:{page:self.content.page, category:self.content.type},
            url:'<?php echo site_url('content/getAPageByCategory/')?>',
        })
        .done(function (results) {
            if (results.success == 1 && results.data.length > 0){
              //self.gallery.files = results.data;

              if(self.content.data.length == 0)
                self.content.first = results.data[0];

              for(i=0; i<results.data.length; i++)
                self.content.data.push(results.data[i]);

              self.content.page += 1;
            }
            self.content.sending = false;
        })
        .fail(function(){
          self.content.sending = false;
        })
    },
  });
}).call(define('Controller'));

//global
var type = $.query.get('type');
if(type != null && typeof(type) != 'undefined' && type != '')
{
  Controller.content.type = type;
  Controller.content.sending = true;
  Controller.content.getAPage();
}
else{
    alert('数据获取不正确');
    window.location.href = '<?php echo site_url() ?>';
}


window.onscroll = function () {
  if (Controller.content.sending) {
    return;
  }

  if(Scroll.isScrollToPageBottom()){
        Controller.content.sending = true;
        Controller.content.getAPage();
    }
}

</script>
