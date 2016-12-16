<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投诉建议</title>
<meta name="keywords" content="投诉建议" />
<meta name="description" content="投诉建议" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php' ?>

<div class="col-ms-12" style="padding:15px" ms-controller="feedback">
  <form>
    <div class="form-group gap_top">
      <label for="title">投诉主题</label>
      <input type="text" class="form-control" id="title" placeholder="" ms-duplex="@title">
    </div>
    <div class="form-group gap_top">
      <label for="department">被投诉单位名称</label>
      <input type="text" class="form-control" id="department" placeholder=""  ms-duplex="@department">
    </div>

    <div class="form-group gap_top">
      <label for="title">被投诉单位地址</label>
      <input type="text" class="form-control" id="address" placeholder=""  ms-duplex="@address">
    </div>

    <div class="form-group gap_top">
      <label for="name">投诉人姓名(不接受匿名投诉)</label>
      <input type="text" class="form-control" id="name" placeholder=""  ms-duplex="@name">
    </div>

    <div class="form-group gap_top">
      <label for="sex">投诉人性别</label>
      <select class="form-control" name="sex"  ms-duplex="@sex">
        <option value="0">男</option>
        <option value="1">女</option>
      </select>
    </div>

    <div class="form-group gap_top">
      <label for="email">投诉人邮箱</label>
      <input type="text" class="form-control" id="email" placeholder=""  ms-duplex="@email">
    </div>

    <div class="form-group gap_top">
      <label for="tel">投诉人电话</label>
      <input type="number" class="form-control" id="tel" placeholder=""  ms-duplex="@tel">
    </div>

    <div class="form-group gap_top">
      <label for="contact">投诉人通信地址</label>
      <input type="text" class="form-control" id="contact" placeholder=""  ms-duplex="@contact">
    </div>

    <div class="form-group gap_top">
      <label for="description">投诉时间详细描述</label>
      <textarea rows="5" type="text" class="form-control" id="description"  ms-duplex="@description">
      </textarea>
    </div>

    <div class="form-group gap_top">
    <button type="button" class="btn btn-primary" ms-click="@check()" style="    width: 100%;
    margin-top: 10px;
    margin-bottom: 30px;">
      提交投诉</button>
    </div>
  </form>
</div>




<?php include 'footer.php' ?>

<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script>
//avalon controllers
(function(){

   var self = this;
   self.content = avalon.define({
      $id: "feedback",
      title:"",
      name:"",
      department:"",
      sex:0,
      address:"",
      tel:"",
      contact:"",
      email:"@",
      description:"",
      validField: function(e){
        if(e == null || e == "" || typeof(e) == 'undefined')
          return false;
        else
          return true;
      },
      check: function(){
        if(!self.content.validField(self.content.title))
        {
          alert('标题输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.name))
        {
          alert('投诉人姓名输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.department))
        {
          alert('被投诉单位名称输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.email))
        {
          alert('邮箱输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.tel))
        {
          alert('电话输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.contact))
        {
          alert('联系方式输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.address))
        {
          alert('被投诉单位地址输入不正确!');
          return;
        }
        if(!self.content.validField(self.content.description))
        {
          alert('投诉详细描述输入不正确!');
          return;
        }

        var submit_data = {
          title: self.content.title,
          name: self.content.name,
          sex: self.content.sex,
          address: self.content.address,
          email: self.content.email,
          contact: self.content.contact,
          tel: self.content.tel,
          description: self.content.description,
          department: self.content.department,
        };

        $.ajax({
            type:'POST',
            dataType: 'JSON',
            data:submit_data,
            url:'<?php echo site_url('feedback/add/')?>',
        })
        .done(function (results) {
            if (results.success == 1){
              alert('投诉提交成功!稍后我们会有工作人员处理您的投诉!');
              history.go(-1);
            }
        })
      }


    });

  }).call(define('Controller'))
  </script>

</body>
</html>
