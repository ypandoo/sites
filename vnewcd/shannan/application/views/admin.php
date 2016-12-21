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

    <title>微山南管理系统</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('application/views/css/dashboard.css') ?>" rel="stylesheet">
  </head>

  <body>

    <?php include 'admin_header.php' ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'admin_sidebar.php' ?>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">欢迎使用微山南管理系统！</h2>

          <div class="row">
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>分类管理</h3>
                  <p>增加，删除新的文章板块</p>
                  <p><a href="<?php echo site_url('admin/typelist')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>内容管理</h3>
                  <p>增加，删除，修改文章</p>
                  <p><a href="<?php echo site_url('admin/contentlist')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>投诉管理</h3>
                  <p>处理违法投诉</p>
                  <p><a href="<?php echo site_url('admin/feedbacklist')?>" class="btn btn-primary" role="button">立刻前往</a>
                    </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <div class="caption">
                  <h3>人员管理</h3>
                  <p>增加，删除网站管理员</p>
                  <p><a href="<?php echo site_url('admin/feedbacklist')?>" class="btn btn-primary" role="button">立刻前往</a>
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
