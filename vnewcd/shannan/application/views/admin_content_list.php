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

    <div class="container-fluid"  ms-controller="contents">
      <div class="row">
        <?php include 'sidebar.php' ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="col-sm-12">
            <h2 class="sub-header">内容管理<small> &nbsp;新闻，产品等文章的发布</small></h2>
          </div>
          <div class="col-sm-3 col-sm-offset-9" style="margin-bottom:15px">
            <a class="btn btn-default pull-right" href="<?php echo site_url('admin/content')?>">
              发布新的文章 <span aria-hidden="true">&rarr;</span></a>
          </div>

          <div class="table-responsive col-sm-12">
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

                <tr ms-for="el in @data" ms-attr="{id:'tr'+el._id}">
                  <td>
                    <img ms-attr="{src: '<?php echo base_url('files/thumbnail/')?>'+el.cover}" width="40px" height="40px"/>
                  </td>
                  <td>
                    {{el.title}}
                  </td>
                  <td>
                    {{el.create_time}}
                  </td>
                  <td>
                     <a type="button" class="btn btn-primary" ms-attr="{href: '<?php echo site_url('admin/content/?id=')?>'+el._id}">更新</a>
                  </td>
                  <td>
                     <button type="button" ms-attr="{id:el._id}" class="btn btn-danger" onclick="deleteById(this.id)">删除</button>
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
            url:'<?php echo site_url('content/getAPage/')?>',
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
    }

  });
}).call(define('Controller'));

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
        // if (results.success == 1){
        //     if (tr.length > 0){
        //         tr.remove();
        //     }
        // }
        Controller.content.page = 0;
        Controller.content.getAPage();
    })
}

//global
Controller.content.getAPage();
    </script>
  </body>
</html>
