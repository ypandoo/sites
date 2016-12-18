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

          <h2 class="sub-header">分类管理</h2>

          <div class="row">
          <form class="navbar-form navbar-left" >
            <div class="form-group">
              <input type="text" name="name" id="name" class="form-control" placeholder="分类名称(中文)" maxlength="12" minlength="2">
            </div>
            <div class="form-group">
              <input type="text" name="_id" id="_id" class="form-control" placeholder="分类简称(字母)" maxlength="12" minlength="2">
            </div>
            <button type="submit" class="btn btn-default" onclick="check()">增加新的分类</button>
          </form>
        </div>

          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>

                  <th>分类名称（中文）</th>
                  <th>分类简称（字母）</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($typelist as $type): ?>
                <tr id="<?php echo 'tr'.$type['_id']?>">
                  <td>
                    <?php echo $type['type_name']; ?>
                  </td>
                <td>
                  <?php echo $type['_id']; ?>
                </td>

                  <td>
                     <button type="button" id="<?php echo $type['_id']?>" class="btn btn-danger" onclick="deleteType(this.id)">删除</button>
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
    function check(form)
    {
      var _id = $('#_id').val();
      var name = $('#name').val();
      if(name == "")
      {
           alert("分类名不能为空!");
           return false;
      }

      if(_id == "")
      {
           alert("分类简称不能为空!");
           return false;
      }

      $.ajax({
          type:'POST',
          dataType: 'JSON',
          url:'<?php echo site_url('type/add/') ?>',
          data:{'name':name, '_id': _id}
      })
      .done(function (results) {
          if (results.success == 1){
              window.location.reload();
          }
          else{
            alert(results.message);
          }
      })

      return false;
    }

    function deleteType(id)
    {
      // if (id == null || id == '' ||  typeof(id) ==  'undefined') {
      //   return;
      // }
        var tr = $('#tr'+id);
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            url:'<?php echo site_url('type/delete/') ?>' + id,
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
