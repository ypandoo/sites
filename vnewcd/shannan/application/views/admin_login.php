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

    <title>微山南</title>

    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('application/views/css/signin.css') ?>" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <div class="form-signin">
        <h2 class="header">欢迎登录微山南一站式微信信息服务管理系统</h2>
        <label for="name" class="sr-only">请输入管理员名称</label>
        <input type="text" id="name" class="form-control" placeholder="请输入管理员名称" required autofocus>
        <label for="password" class="sr-only">请输入密码</label>
        <input type="password" id="password" class="form-control" placeholder="请输入密码" required>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check()">登录</button>
      </div>

    </div> <!-- /container -->
  </body>
  <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  function check()
  {
    var password = $('#password').val();
    var name = $('#name').val();
    if(name == "")
    {
         alert("管理员名称不能为空!");
         return false;
    }

    if(password == "")
    {
         alert("密码不能为空!");
         return false;
    }

    $.ajax({
        type:'POST',
        dataType: 'JSON',
        url:'<?php echo site_url('user/valid/') ?>',
        data:{'name':name, 'password': password}
    })
    .done(function (results) {
        if (results.success == 1){
            window.location.href="<?php echo site_url('admin/index')?>";
        }
        else{
          alert(results.message);
        }
    })

    return false;
  }
  </script>
</html>
