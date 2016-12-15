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
    <link href="<?php echo base_url('application/views/css/dashboard.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('application/views/fileupload/css/jquery.fileupload.css') ?>" rel="stylesheet">

    <style>
    #pic_list
    {
      margin: 20px 0 20px 0;
    overflow: hidden;
    padding: 0;
    }

    #pic_list li
    {
      width: auto;
      padding: 10px;
      float: left;
      height: 120px;
      list-style-type: none;
      margin-right: 20px;
      position: relative;
      border: 1px solid #e2e2e2;
    }

    #pic_list .close
    {
      background-image: url('../img/close.png');
      background-size: 100% 100%;
      height: 20px;
      width: 20px;
      position: absolute;
      right: 0px;
      top: 0px;
    }
    </style>
  </head>

<body>

<?php include 'admin_header.php' ?>

    <div class="container-fluid" ms-controller="content">
        <?php include 'admin_sidebar.php' ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">查看和处理投诉</h2>

          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr class="info">
                  <th>投诉人</th>
                  <th>投诉人电话</th>
                  <th>投诉人邮箱</th>
                  <th>投诉人通信地址</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>
                  {{data.name}}
                </td>
                  <td>
                    {{data.tel}}
                  </td>
                  <td>
                    {{data.email}}
                  </td>
                  <td>
                     {{data.contact}}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr class="info">
                  <th>投诉标题</th>
                  <th>投诉时间</th>
                  <th>被投诉单位</th>
                  <th>被投诉单位地址</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    {{data.title}}
                  </td>
                  <td>
                    {{data.create_time}}
                  </td>
                <td>
                  {{data.department}}
                </td>
                  <td>
                    {{data.address}}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr class="info">
                  <th>投诉内容</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    {{data.description}}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <form method="post" action="<?php echo site_url('feedback/update/')?>">
            <label for="comment">记录投诉进展及情况（可多次更新，建议更新时带上日期如 2016-1-1:已电话回访投诉人）</label>
            <textarea class="form-control" name="comment" rows="10" ms-duplex="@data.comment">

            </textarea>
            <input type="hidden" name="id" ms-duplex="data._id">
            <div class="gap_top">
              <button type="submit" class="btn btn-default">更新记录</button>
            </div>
          </form>

        </div>
    </div>

    <script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('application/views/js/jquery.query-object.js') ?>"></script>




    <script>

//avalon controllers
(function(){
   var self = this;
   self.content = avalon.define({
      $id: "content",
      data:{},
      getFeedback: function(){
        //new content
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            url:'<?php echo site_url('feedback/getById/') ?>'+id,

        })
        .done(function (results) {
            if (results.success == 1){
              self.content.data = results.data;
            }
            else{
              alert('通信错误！');
            }
        })
      }
    });
}).call(define('Controller'));

var id = $.query.get('id');
if(id != null && typeof(id) != 'undefined' && id != '')
{
  Controller.content.getFeedback();
}
else{
  alert('无效的投诉id');
}


    </script>
  </body>
</html>
