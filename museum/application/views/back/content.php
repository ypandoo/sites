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
    <?php include 'include.php'; ?>

  </head>

  <body>
<?php include 'header.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php' ?>
        </div>


        <!--right-->
        <div ms-controller="content_ctrl">
        <div id="page_item_list" ms-visible="@show['content_list']">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
              <div class="col-md-4 page-header" style="height:60px;line-height:60px; font-size:24px">文章列表</div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <span>选择文章模块</span>
              </div>
              <div class="col-md-4 page-header"  style="height:60px;line-height:60px; font-size:16px">
                  <select ms-duplex='@list_type' class="form-control"
                          ms-rules="{required:true}"  data-required-message='文章发布板块不能为空!'
                          ms-mouseleave="@list_type_change" style="margin-top:10px">
                  <option >新展快讯</option>
                  <option>展览回顾</option>
                  <option>基本陈列</option>
                  <option>西博动态</option>
                  <option>新馆建设</option>
                  <option>藏品保护</option>
                  <option>西博课堂</option>
                  <option>活动邀约</option>
                  <option>志愿者风采</option>
                  <option>文创小店</option>
                  </select>
              </div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <a style="cursor:pointer" ms-click="@content_detail()">发布新的文章</a>
              </div>
            </div>

            <!--h2 class="sub-header">Section title</h2-->
            <div class="table-responsive clearfix">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>文章标题</th>
                    <th>文章板块</th>
                    <th>发布日期</th>
                    <th>操作1</th>
                    <th>操作2</th>
                    <!--th>Header</th-->
                  </tr>
                </thead>
                <tbody>
                  <tr ms-for='($index, item_info) in @list'>
                    <td>{{item_info.CONTENT_TITLE}}</td>
                    <td>{{item_info.CONTENT_TYPE}}</td>
                    <td>{{item_info.PUBLISH_TIME}}</td>
                    <td><a ms-click="@delete_content($index)">删除</a></td>
                    <td><a ms-click="@modify_content($index)">修改信息</a></td>
                 </tr>

                  <!-- <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td><a id="zhenpin1" ms-click="@modify_item(this.id)">修改信息</a></td>
                  </tr> -->
                </tbody>
              </table>

              <div class="row" style="padding-left:20px">
                <button  type="button" class="btn btn-primary col-md-1 " style="margin-right:20px"ms-click="@prev()" ms-attr="{disabled:!@page_start}">上一页</button>
                <button  type="button" class="btn btn-primary col-md-1 " ms-click="@next()"  ms-attr="{disabled:@page_end}">下一页</button>
            </div>
          </div>
        </div>
      </div>

        <div id="page_item_detail"  ms-visible="@show['content_detail']">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
              <div class="col-md-10 page-header" style="height:60px;line-height:60px; font-size:24px">{{@item_title}}</div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <a style="cursor:pointer" ms-click="@view_list()">查看文章列表</a>
              </div>
            </div>


            <div>
                <form  ms-validate="@validate">
                  <div class="row">
                    <div class="col-md-2"><label><strong>文章标题:</strong></label></div>
                    <div class="col-md-10">
                       <input class="form-control"  ms-duplex='@content_title' ms-rules="{required:true}"  data-required-message='文章标题不能为空!' />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"><label><strong>文章作者:</strong></label></div>
                    <div class="col-md-10">
                       <input class="form-control"  ms-duplex='@content_author' ms-rules="{required:true}"  data-required-message='文章作者不能为空!' />
                    </div>
                  </div>

                  <!-- 封面图 -->
                  <hr>
                  <label for="pic_list"><strong>封面图片：</strong>(单个文件大小在1M之内，尺寸600*400，支持jpg,jpeg,bmp,png格式)</label>
                  <ul id="pic_list" style="margin:20px 0 20px 0">
                      <li>
                          <div>
                              <img ms-attr="{src:@get_pic_path()}" height="100px"/>
                          </div>
                      </li>
                  </ul>
                  <div id="pic_upload" style="clear:both"></div>

                  <hr>
                  <div class="row">
                      <div class="col-md-2"><label><strong>文章发布模块:</strong></label></div>
                      <div class="col-md-10">
                        <select ms-duplex='@content_type' class="form-control"
                                ms-rules="{required:true}"  data-required-message='文章发布板块不能为空!'>
                        <option>新展快讯</option>
                        <option>展览回顾</option>
                        <option>基本陈列</option>
                        <option>西博动态</option>
                        <option>新馆建设</option>
                        <option>藏品保护</option>
                        <option>西博课堂</option>
                        <option>活动邀约</option>
                        <option>志愿者风采</option>
                        <option>文创小店</option>
                        </select>
                      </div>
                  </div>

                  <hr>
                  <label><strong>文章内容</strong></label>
                  <script id="editor" type="text/plain" style="width:100%;height:200px;"></script>


                  <hr>
                  <button type="submit" class="btn btn-primary" ms-visible='@isNew'>发布文章</button>
                  <button type="submit" class="btn btn-primary" ms-visible='!@isNew'>更新文章</button>
              </form>
            </div>
        </div>
      </div>
      </div>
    </div>

    <div style="margin:50px"></div>
    <script src="<?php echo base_url('assets/back/js/content.js') ?>"></script>



  </body>
</html>
