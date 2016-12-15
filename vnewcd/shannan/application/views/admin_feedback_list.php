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

    <div class="container-fluid"  ms-controller="contents">
      <div class="row">
        <?php include 'admin_sidebar.php' ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="col-sm-12">
            <h2 class="sub-header">投诉列表<small> &nbsp;请及时处理群众反馈</small></h2>
          </div>

          <div class="table-responsive col-sm-12">
            <table class="table table-hover">
              <thead>
                <tr class="active">
                  <th>投诉人</th>
                  <th>投诉人手机号</th>
                  <th>投诉单位</th>
                  <th>投诉标题</th>
                  <th>投诉日期</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>

                <tr ms-for="el in @data" ms-attr="{id:'tr'+el._id}">
                  <td>
                    {{el.name}}
                  </td>
                  <td>
                    {{el.tel}}
                  </td>
                  <td>
                    {{el.department}}
                  </td>
                  <td>
                    {{el.title}}
                  </td>
                  <td>
                    {{el.create_time}}
                  </td>
                  <td>
                     <a type="button" class="btn btn-primary" ms-attr="{href: '<?php echo site_url('admin/feedback?id=')?>'+el._id}">查看及处理</a>
                  </td>
                </tr>

              </tbody>
            </table>


            <nav aria-label="...">
              <ul class="pager">
                <li class="previous" ms-class="[@prev_disable && @disable_css]"><a ms-click="@prev()"><span aria-hidden="true">&larr;</span> 上一页</a></li>
                <li class="next" ms-class="[@next_disable && @disable_css]"><a ms-click="@next()">下一页 <span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>


        </div>
      </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
    <script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>

<script>
//avalon controllers
(function(){

 var self = this;
 self.content = avalon.define({
    $id: "contents",
    data:[],
    page: 0,
    page_count: 0,
    disable_css:'disabled',
    prev_disable: false,
    next_disable: false,
    getAPage:function(){
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            data:{page:self.content.page},
            url:'<?php echo site_url('feedback/getAPage/')?>',
        })
        .done(function (results) {
            if (results.success == 1){
              //self.gallery.files = results.data;
              self.content.data = results.data;
              self.content.page_count =  results.page_count;

              if(self.content.page == 0)
                self.content.prev_disable = true;
              else
                self.content.prev_disable = false;

              if(self.content.page == self.content.page_count)
                self.content.next_disable = true;
              else
                self.content.next_disable = false;
            }
        })
    },
    prev:function(){
      if(self.content.page > 0)
      {
        self.content.page--;
        self.content.getAPage();
      }
      else{
        self.content.page = 0;
      }

    },
    next:function(){
      if(self.content.page >= self.content.page_count){
        self.content.page = self.content.page_count;
      }else{
        self.content.page++;
        self.content.getAPage();
      }
  },

  });
}).call(define('Controller'));

//global
Controller.content.getAPage();
    </script>
  </body>
</html>
