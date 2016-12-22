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
.news a {
    display: block;
    position: relative;
    padding: 10px 0 10px 10px;
}

.news li {
    height: 60px;
    border-bottom: 1px solid rgba(0, 5, 43, 0.03);
}
</style>
</head>
<body>

<div class="wrapper" ms-controller="contents">
    <?php include 'header.php' ?>

    <section class="banner">
        <img src="<?php echo base_url('Application/views/img/banner/gwjz.jpg')?>" />
    </section>

    <section class="content">
    <div>            			                    			                    			                    			                    			                    			                    			                    			                    			                    			                </div>
        <ul class="news">
        	<li ms-for="($index,el) in data" >
            		<a  ms-attr="{href:'<?php echo site_url('front/service_detail?id=')?>'+el._id}">
            			<!-- <div>
            				<p>{{el.update_time | date("MM-dd")}} <br> {{el.update_time | date("yyyy")}}</p>
            				<!-- <p>{{el.update_time | date("yyyy")}}</p> ->
            			</div> -->
            			<h4>{{el.title}}</h4>
            			<p>{{el.update_time }}</p>
            		</a>
        	</li>
        </ul>
    </div>

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
