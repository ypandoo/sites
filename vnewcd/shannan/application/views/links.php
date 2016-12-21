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

.news li {
    height: 60px;
    border-bottom: 1px solid rgba(0, 5, 43, 0.03);
    width: 50%;
    float: left;
}

.news a {
    display: block;
    position: relative;
    padding: 20px 0 10px 80px;
}

.news div {
    position: absolute;
    left: 10px;
    top: 10px;
    /* padding-top: .16rem; */
    width: 40px;
    height: 40px;
    text-align: center;
    background: #e7e7e7;
}

.news p, .firstNews p, .firstNews span {
    font-size: 18px;
    font-weight: 600;
    color: #ffffff;
    margin: 0;
    line-height: 20px;
    margin-top: 10px;
}
</style>
</head>
<body>

<div class="wrapper" ms-controller="contents">
    <?php include 'header.php' ?>

    <section class="banner">
        <img src="<?php echo base_url('Application/views/img/banner/gwjz.jpg')?>" />
    </section>

    <div style="margin: 20px 3% 0px 3%;
        text-align: left;
        padding: 2% 4%;
        border-left: 2px solid #23527c;
        background: rgba(35, 82, 124, 0.06);
        border-radius: 5px;">
      友情提示：点击文字跳转到相应的政府网站。
    </div>
      			                    			                    			                    			                    			                    			                    			                    			                    			                    			                </div>
        <ul class="news" style="margin-top:10px;">
        	<li ><a  href="http://www.xzsnw.com/">
        			<div><p>山</p></div>
        			<h4>山南网<br>(中国西藏山南网）</h4>
          </a></li>

          <li><a  href="http://www.xznd.gov.cn/">
        			<div><p>乃</p></div>
        			<h4>乃东区政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzcn.gov.cn/">
        			<div><p>错</p></div>
        			<h4>错那县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzzn.gov.cn/">
        			<div><p>扎</p></div>
        			<h4>扎囊县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzgg.gov.cn/">
        			<div><p>贡</p></div>
        			<h4>贡嘎县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzsr.gov.cn/">
        			<div><p>桑</p></div>
        			<h4>桑日县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzqjx.gov.cn/">
        			<div><p>琼</p></div>
        			<h4>琼结县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzqus.gov.cn/">
        			<div><p>曲</p></div>
        			<h4>曲松县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzcm.gov.cn/">
        			<div><p>措</p></div>
        			<h4>措美县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzluoz.gov.cn/">
        			<div><p>洛</p></div>
        			<h4>洛扎县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzjc.gov.cn/">
        			<div><p>加</p></div>
        			<h4>加查县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzlongz.gov.cn/">
        			<div><p>隆</p></div>
        			<h4>隆子县政府新闻网</h4>
          </a></li>

          <li><a  href="http://www.xzlkz.gov.cn/">
        			<div><p>浪</p></div>
        			<h4>浪卡子县政府新闻网</h4>
          </a></li>

        </ul>
    </div>

    <!-- <div class="pages">
        <a class='next'>上一页</a>
    	<a class='next' href="/wap/news.php?bid=2&page=2"  title="下一页" style="float:right">下一页</a>
    </div> -->
    </section>

    <div class="gap40">
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
