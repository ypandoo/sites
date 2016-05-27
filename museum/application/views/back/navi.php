<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="">
    <meta name="author" content="">

    <title>西藏博物馆后台管理系统</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/ie10-viewport-bug-workaround.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/back/css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/Huploadify.css') ?>">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">西藏博物馆后台管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">欢迎您,SuperLei(登出)</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <!--left-->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('back/view/about')?>">关于西博</a></li>
            <li><a href="<?php echo base_url('back/view/layout')?>">基本陈列</a></li>
            <li><a href="<?php echo base_url('back/view/index') ?>">馆藏珍品</a></li>
            <li><a href="<?php echo base_url('back/view/content')?>">内容发布</a></li>
            <li><a href="<?php echo base_url('back/view/instruction')?>">参观指南</a></li>
            <li class="active"><a href="<?php echo base_url('back/view/navi')?>">展厅导航</a></li>
          </ul>

          <!--ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
          </ul-->
        </div>


        <!--right-->
        <div ms-controller="items">
        <div id="page_item_list" ms-visible="@show['item_list']">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
              <div class="col-md-10 page-header" style="height:60px;line-height:60px; font-size:24px">展厅导航列表</div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <a style="cursor:pointer" id="item_new" ms-click="@item_detail()">添加新的展厅导航</a>
              </div>
            </div>

            <!--h2 class="sub-header">Section title</h2-->
            <div class="table-responsive clearfix">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>展厅导航名称</th>
                    <th>展厅导航编号</th>
                    <th>操作1</th>
                    <th>操作2</th>
                    <!--th>Header</th-->
                  </tr>
                </thead>
                <tbody>
                  <tr ms-for='($index, item_info) in @data'>
                    <td>{{item_info.NAVI_NAME}}</td>
                    <td>{{item_info.NAVI_CODE}}</td>
                    <td><a ms-click="@delete_item($index)">删除</a></td>
                    <td><a ms-click="@modify_item($index)">修改信息</a></td>
                 </tr>

                  <!-- <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td><a id="zhenpin1" ms-click="@modify_item(this.id)">修改信息</a></td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div id="page_item_detail"  ms-visible="@show['item_detail']">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
              <div class="col-md-10 page-header" style="height:60px;line-height:60px; font-size:24px">{{@item_title}}</div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <a style="cursor:pointer" id="item_list" ms-click="@view_list()">查看展厅导航列表</a>
              </div>
            </div>


            <div id="item_detail">
                <form  ms-validate="@validate">
                  <div class="row">
                    <div class="col-md-2"><label><strong>导航名称:</strong></label></div>
                    <div class="col-md-10">
                       <input class="form-control"  ms-duplex='@item_name' ms-rules="{required:true}"  data-required-message='导航名称不能为空!' />
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-md-2">
                      <label><strong>导航位置编号:</strong></label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type='text' ms-duplex='@item_code'
                        ms-rules="{required:true, min:0, max:100}"
                        data-required-message='导航位置编号输入错误!' data-min-message='导航位置编号输入错误!' data-max-message='导航位置编号输入错误!'
                          ms-attr="{disabled:!@isNewItem}"/>
                      <p>说明:按照编号规则输入导航位置编号。</p>
                    </div>
                 </div>

                  <hr>
                  <label><strong>上传导航图片及文字</strong></label>
                  <script id="editor" type="text/plain" style="width:100%;height:200px;"></script>

                  <hr>
                  <button type="submit" class="btn btn-primary" ms-visible='@isNewItem'>新增导航信息</button>
                  <button type="submit" class="btn btn-primary" ms-visible='!@isNewItem'>更新导航信息</button>
              </form>
            </div>
        </div>
      </div>
      </div>
    </div>

    <div style="margin:50px"></div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/common/js/jquery.Huploadify.js') ?>"></script>
    <script src="<?php echo base_url('assets/common/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/common/js/ie10-viewport-bug-workaround.js') ?>"></script>
    <script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>

    <!-- UE -->
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/ue/ueditor.config.js') ?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/ue/ueditor.all.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
    <script src="<?php echo base_url('assets/back/js/navi.js') ?>"></script>



  </body>
</html>
