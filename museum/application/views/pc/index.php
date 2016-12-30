<!DOCTYPE HTML>
<html>
	<head>
		<title>西藏博物馆</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php include 'include.php'; ?>
<style media="screen">

.row_rapper{
  width: 100%;
  margin-left: 0%;
  overflow: hidden;
}

.row_rapper .left{
  width: 70%;
  float: left;
  overflow: hidden;
  height: 700px;
}

.row_rapper .right{
  width: 30%;
  float: left;
  overflow: hidden;
  height: 760px;``
}

.qrcode{
  position: absolute;
  width: 100px;
  height: 100px;
  background: url("<?php echo base_url('assets/pc/img/qrcode.jpg')?>");
  bottom: 50px;
  right: 50px;
  background-size: cover;
}
</style>

	</head>
	<body class="homepage">
		<div id="page-wrapper">
			<!-- Header -->
				<div id="header">
					<!-- Inner -->
						<div class="inner">
							<!-- <header>
								<h1><a href="index.html" id="logo">Helios</a></h1>
								<hr />
								<p>Another fine freebie by HTML5 UP</p>
							</header> -->
							<footer>
								<a href="#des" class="button circled scrolly " style="background:transparent;">
                  <i class="fa fa-angle-double-down fa-2x animated infinite fadeInDown duration3s" aria-hidden="true"></i>
                </a>
							</footer>
						</div>
            <?php include 'header_navi.php'; ?>
            <div class="qrcode">

            </div>
        </div>
			<!-- Banner -->
				<!-- <section id="banner">
					<header>
						<h2>Hi. You're looking at <strong>Helios</strong>.</h2>
						<p>
							A (free) responsive site template by <a href="http://html5up.net">HTML5 UP</a>.
							Built on <strong>skel</strong> and released under the <a href="http://html5up.net/license">CCA</a> license.
						</p>
					</header>
				</section> -->

			<!-- Main -->
      <i class="line"> </i>
				<div class="row_rapper" id="des">
                <div class="left" >
                    <img src="<?php echo base_url('assets/pc/img/basic.jpg')?>" width="100%" />
                    <div class="title_section">
                      <div class="title_block">
                      <p class="title_text">西藏博物馆简介 </p>
                      <p class="title_text_en">Introduction</p>
                      </div>
                    </div>
                    <div style="padding:0 80px 0 80px; text-align:left; font-size:14px; color:#636363;margin-bottom:20px">
                      <p style=" line-height:20px">
                        西藏博物馆是由国家直接投资兴建的西藏自治区唯一一座国家一级博物馆。
                        1999年10月，中华人民共和国成立50周年和西藏民主改革40周年之际落成开馆。
                        博物馆占地面积5万余平方米，展厅面积1万平方米，整体建筑具有鲜明的藏族传统建筑艺术特色，
                        同时兼具现代建筑的实用特点与功能，是传统与现代建筑风格有机结合的典范。

                        <br><br>西藏博物馆馆藏文物丰富，民族特色浓郁，囊括了历代中央政府治藏文物、佛像、唐卡、古籍经典、瓷器、玉器、
                        民俗文物以及考古发现的史前文物等等。目前，馆内常设展览七个，每年推出10个左右临时展览，
                        积极参与和组织了众多的国内外文物交流展和其他展览，在为本地观众和国内外游客提供独具特色的西藏历史文化体验的
                        同时，有效促进了国际国内文化交流与互动。

                        <br><br>近年来，西藏博物馆先后被评为国家一级博物馆、全国三八红旗集体、爱国主义教育基地、国防教育基地和
                        自治区级青年文明号。如今的西藏博物馆，已成为西藏自治区规模最大的文物收藏、保护、研究、展示、教育中心，
                        是展示西藏悠久历史与璀璨文化、社会主义建设和改革开放成果的重要窗口，是拉萨市重要的标志性建筑和旅游景点，
                        是人们了解西藏、认识西藏、映像西藏的重要窗口与平台。

                      </p>
                    </div>
                    <!-- <div style="padding: 3px 5px; overflow: hidden;"><a class="btn_black" href="/Pc/view/about">详细介绍</a></div> -->
                </div>

                <div  class="right" style="background:url('<?php echo base_url('assets/pc/img/basic_bg.png')?>'); background-size:100% 100%">
                  <div class="title_section">
                    <div class="title_block">
                    <p class="title_text">参观指南</p>
                    <p class="title_text_en">Visiting Guide</p>
                    </div>
                  </div>

                  <div style="padding:0px 40px 0 40px">
                    <p style="    letter-spacing: 1px; font-size:14px; text-align:left">
                      <b>开馆时间:</b><br>
                      夏秋季(5月1日至10月31日):<br>
                      09:30-17:30 (17:00游客停止入场)<br>
                      冬春季(11月1日至次年4月30日):<br>
                      10:30-17:00(16:30游客停止入场)<br>
                      周一闭馆（节假日除外）<br><br>

                      <b>公交线路：</b><br>
                      公交车2,8,13,24路至西藏博物馆站下车即到<br><br>

                      <b>地址：</b><br> 西藏自治区拉萨市城关区罗布林卡路19号<br><br>
                      <b>电话：</b><br>0891-6835244, 0891-6812210<br><br>

                    </p>
                    <div style="padding: 3px 5px; overflow: hidden; margin-top:60px; text-align:right">
                      <a href="/Pc/view/instruction"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解详情</a>
                    </div>
                  </div>
          </div>
					<!-- <article id="main" class="container special">
						<!-- <a href="#" class="image featured">简介</a> ->
            <div style="padding:20px 0">
            </div>
						<header>
							<h2><a href="#"><i class="fa fa-university gapR10" aria-hidden="true"></i>西藏博物馆简介 </a></h2>
							<p>
								The Introduction Of Tibet Museum
							</p>
						</header>
						<p>
							Commodo id natoque malesuada sollicitudin elit suscipit. Curae suspendisse mauris posuere accumsan massa
							posuere lacus convallis tellus interdum. Amet nullam fringilla nibh nulla convallis ut venenatis purus
							sit arcu sociis. Nunc fermentum adipiscing tempor cursus nascetur adipiscing adipiscing. Primis aliquam
							mus lacinia lobortis phasellus suscipit. Fermentum lobortis non tristique ante proin sociis accumsan
							lobortis. Auctor etiam porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum
							consequat integer interdum integer purus sapien. Nibh eleifend nulla nascetur pharetra commodo mi augue
							interdum tellus. Ornare cursus augue feugiat sodales velit lorem. Semper elementum ullamcorper lacinia
							natoque aenean scelerisque.
						</p>
						<footer>
							<a href="#" class="button"><i class="fa fa-book gapR10" aria-hidden="true"></i>查阅参观指南</a>
						</footer>
					</article> -->

				</div>
        <?php include 'footer.php'; ?>
        <!-- <script src="<?php echo base_url('application/views/pc/assets/js/main.js') ?>"></script> -->
	</body>
</html>
