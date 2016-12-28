<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>西藏博物馆后台管理系统</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/ie10-viewport-bug-workaround.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/back/css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/Huploadify.css') ?>">
  </head>

  <body>

    <?php include 'header.php' ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php' ?>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">欢迎使用西藏博物馆后台管理系统！</h2>

          <div class="row">
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>西博简介</h3>
                  <p>修改博物馆简介</p>
                  <p><a href="<?php echo site_url('back/about')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>珍品管理</h3>
                  <p>增加，删除，修改珍品</p>
                  <p><a href="<?php echo site_url('back/item')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>内容发布</h3>
                  <p>管理各个板块的文章和内容</p>
                  <p><a href="<?php echo site_url('back/content')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>参观之南</h3>
                  <p>更新参观指南</p>
                  <p><a href="<?php echo site_url('back/instruction')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

        </div>

      </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
