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

          <h2 class="sub-header">人员管理 <small style="margin-left:10px">注意登录名必须为字母，且不能与已有的重复</small></h2>

          <div class="row">
          <form class="navbar-form navbar-left" >
            <div class="form-group">
              <input type="text" value= "<?php echo $adminlist[0]['name']?>" name="name" id="name1" class="form-control" placeholder="管理员名称(字母)" maxlength="12" minlength="2">
            </div>
            <div class="form-group">
              <input type="password" value= "<?php echo $adminlist[0]['password']?>" name="password" id="password1" class="form-control" placeholder="密码(至少6位字母)" maxlength="12" minlength="2">
            </div>
            <div class="form-group">
              <input type="password" id="password_repeat1" class="form-control" placeholder="重复密码(字母)" maxlength="12" minlength="2">
            </div>

            <button type="submit" class="btn btn-default" onclick="check(1)">修改管理员1</button>
          </form>
        </div>

        <div class="row">
        <form class="navbar-form navbar-left" >
          <div class="form-group">
            <input type="text"  value= "<?php echo $adminlist[1]['name']?>" name="name" id="name2" class="form-control" placeholder="管理员名称(字母)" maxlength="12" minlength="2">
          </div>
          <div class="form-group">
            <input type="password" value= "<?php echo $adminlist[1]['name']?>" name="password" id="password2" class="form-control" placeholder="密码(至少6位字母)" maxlength="12" minlength="2">
          </div>
          <div class="form-group">
            <input type="password" id="password_repeat2" class="form-control" placeholder="重复密码(字母)" maxlength="12" minlength="2">
          </div>

          <button type="submit" class="btn btn-default" onclick="check(2)">修改管理员2</button>
        </form>
      </div>

      <div class="row">
      <form class="navbar-form navbar-left" >
        <div class="form-group">
          <input type="text"  value= "<?php echo $adminlist[2]['name']?>" name="name" id="name3" class="form-control" placeholder="管理员名称(字母)" maxlength="12" minlength="2">
        </div>
        <div class="form-group">
          <input type="password" value= "<?php echo $adminlist[2]['name']?>" name="password" id="password3" class="form-control" placeholder="密码(至少6位字母)" maxlength="12" minlength="2">
        </div>
        <div class="form-group">
          <input type="password" id="password_repeat3" class="form-control" placeholder="重复密码(字母)" maxlength="12" minlength="2">
        </div>

        <button type="submit" class="btn btn-default" onclick="check(3)">修改管理员3</button>
      </form>
    </div>

      </div>


      </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
    function check(i)
    {
      var password = $('#password'+i).val();
      var password_repeat = $('#password_repeat'+i).val();
      var name1 = $('#name1').val();
      var name2 = $('#name2').val();
      var name3 = $('#name3').val();
      var name = $('#name'+i).val();

      if(password.length < 6)
      {
        alert("密码至少为6位！");
        return false;
      }

      if(i == 1)
      {
          if(name1 == name2 ||name1 == name3)
          {
            alert("两个或以上管理员名称相同，请更改！");
            return false;
          }
      }

      if(i == 2)
      {
          if(name2 == name3 ||name2 == name1)
          {
            alert("两个或以上管理员名称相同，请更改！");
            return false;
          }
      }

      if(i == 3)
      {
          if(name3 == name2 ||name3 == name1)
          {
            alert("两个或以上管理员名称相同，请更改！");
            return false;
          }
      }

      if(name == "")
      {
           alert("管理员"+i+"名不能为空!");
           return false;
      }

      if(password == "" || password_repeat == "" || typeof(password) == "undefined" || typeof(password_repeat) == "undefined")
      {
           alert("管理员"+i+"密码不能为空!");
           return false;
      }

      if( password != password_repeat)
      {
        alert("管理员"+i+"两次密码输入不相同!");
        return false;
      }

      $.ajax({
          type:'POST',
          dataType: 'JSON',
          url:'<?php echo site_url('user/update/') ?>',
          data:{'name':name, 'password': password}
      })
      .done(function (results) {
          if (results.success == 1){
              alert('密码更新成功!');
              window.location.reload();
          }
          else{
            alert(results.message);
          }
      })

      return false;
    }
    </script>
  </body>
</html>
