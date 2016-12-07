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

    <?php include 'header.php' ?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php' ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">内容管理管理</h2>

          <div class="row">
            <nav aria-label="...">
              <ul class="pager">
                <li class="next"><a href="<?php echo site_url('admin/content')?>">发布新的文章 <span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>
          </div>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr class="active">
                  <th>封面</th>
                  <th>文章标题</th>
                  <th>发布时间</th>
                  <th>操作1</th>
                  <th>操作2</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($contentlist as $content): ?>
                <tr id="<?php echo 'tr'.$content['_id']?>">
                  <td>
                    <img src='<?php echo base_url('uploads/cover/'.$content["cover"])?>' width="40px" height="40px"/>
                  </td>
                  <td>
                    <?php echo $content['title']; ?>
                  </td>
                  <td>
                    <?php echo $content['create_time']?>
                  </td>
                  <td>
                     <button type="button" id="<?php echo $content['_id']?>" class="btn btn-primary" onclick="update(this.id)">更新</button>
                  </td>
                  <td>
                     <button type="button" id="<?php echo $content['_id']?>" class="btn btn-danger" onclick="deleteById(this.id)">删除</button>
                  </td>
                </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
    function deleteById(id)
    {
        if (id == null || id == '' ||  typeof(id) ==  'undefined') {
          return;
        }

        var tr = $('#tr'+id);
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            url:'<?php echo site_url('content/delete/') ?>' + id,
        })
        .done(function (results) {
            if (results.success == 1){
                if (tr.length > 0){
                    tr.remove();
                }
            }
        })
    }
    </script>
  </body>
</html>
