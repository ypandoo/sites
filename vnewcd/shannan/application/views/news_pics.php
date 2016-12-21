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
</head>
<body>

<div class="wrapper" ms-controller="contents">
    <?php include 'header.php' ?>

    <section class="banner">
        <!-- <div class="banner-tilte"><h3>时政要闻</h3><p>News</p></div> -->
        <img ms-attr="{src: '<?php echo base_url('Application/views/img/banner/')?>'+type+'.jpg'}" />
    </section>

    <section class="content">
        <div class="firstNews" ms-for="($index,el) in data">
            <a  ms-attr="{href:'<?php echo site_url('front/detail_pics?id=')?>'+el._id}" >
                <img ms-attr="{src:'<?php echo base_url('files/thumbnail/')?>'+el.cover}" />
                <h4>{{el.title}}</h4>
                <p>一{{el.plain_text | truncate(30,'...') }}</p>
                <span>{{el.update_time}}</span>
            </a>
        </div>
         			                    			                    			                    			                    			                    			                    			                    			                    			                    			                </div>
        <!-- <ul class="news">
        	<li ms-for="($index,el) in data" ms-if="$index > 0">
            		<a  ms-attr="{href:'<?php echo site_url('front/detail_pics?id=')?>'+el._id}">
            			<div>
            				<p>{{el.update_time | date("MM-dd")}} <br> {{el.update_time | date("yyyy")}}</p>
            				<!-- <p>{{el.update_time | date("yyyy")}}</p> ->
            			</div>
            			<h4>{{el.title}}</h4>
            			<p>{{el.plain_text  | truncate(35,'...') }}</p>
            		</a>
        	</li>
        </ul> -->

    <!-- <div class="pages">
        <a class='next'>上一页</a>
    	<a class='next' href="/wap/news.php?bid=2&page=2"  title="下一页" style="float:right">下一页</a>
    </div> -->
    </section>

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
              self.content.data = results.data;
              self.content.first = results.data[0];
            }
        })
    },
  });
}).call(define('Controller'));

//global
var type = $.query.get('type');
if(type != null && typeof(type) != 'undefined' && type != '')
{
  Controller.content.type = type;
  Controller.content.getAPage();
}
else{
    alert('数据获取不正确');
    window.location.href = '<?php echo site_url() ?>';
}

</script>
