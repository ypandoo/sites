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
      <?php include 'sidebar.php'; ?>


        <!--right-->
        <div ms-controller="items">
        <div id="page_item_list" ms-visible="@show['item_list']">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
              <div class="col-md-10 page-header" style="height:60px;line-height:60px; font-size:24px">珍品赏析</div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <a style="cursor:pointer" id="item_new" ms-click="@item_detail()">添加新的珍品</a>
              </div>
            </div>

            <!--h2 class="sub-header">Section title</h2-->
            <div class="table-responsive clearfix">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>珍品名称</th>
                    <th>操作1</th>
                    <th>操作2</th>
                    <!--th>Header</th-->
                  </tr>
                </thead>
                <tbody>
                  <tr ms-for='($index, item_info) in @data'>
                    <td>{{item_info.ITEM_NAME}}</td>
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

            <div class="row" style="padding-left:20px">
              <button  type="button" class="btn btn-primary col-md-1 " style="margin-right:20px"ms-click="@prev()" ms-attr="{disabled:!@page_start}">上一页</button>
              <button  type="button" class="btn btn-primary col-md-1 " ms-click="@next()"  ms-attr="{disabled:@page_end}">下一页</button>
          </div>
        </div>
      </div>

        <div id="page_item_detail"  ms-visible="@show['item_detail']">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
              <div class="col-md-10 page-header" style="height:60px;line-height:60px; font-size:24px">{{@item_title}}</div>
              <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                <a style="cursor:pointer" id="item_list" ms-click="@view_list()">查看珍品赏析列表</a>
              </div>
            </div>


            <div id="item_detail">
                <form  ms-validate="@validate">
                  <div class="row">
                    <div class="col-md-2"><label><strong>珍品名称:</strong></label></div>
                    <div class="col-md-10">
                       <input class="form-control"  ms-duplex='@item_name' ms-rules="{required:true}"  data-required-message='珍品名称不能为空!' />
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-md-2">
                      <label><strong>显示优先级：</strong></label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" type='number' ms-duplex='@item_priority'
                        ms-rules="{required:true, min:0, max:100}"
                        data-required-message='显示优先级输入错误!' data-min-message='显示优先级输入错误!' data-max-message='显示优先级输入错误!'/>
                      <p>说明:输入0-100任意数字，数字越大在前端页面显示的时候该珍品越靠前。若保持为0，珍品将按照录入的时间排序显示。</p>
                    </div>
                 </div>

                 <hr>
                 <div class="row">
                   <div class="col-md-2"><label><strong>珍品位置编号（请在展厅导航里查阅）:</strong></label></div>
                   <div class="col-md-10">
                      <input class="form-control"  ms-duplex='@item_position' ms-rules="{required:true}"  data-required-message='珍品位置编号!' />
                   </div>
                 </div>
                 <!-- <div class="row">
                   <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                     <span>选择展馆编号：</span>
                   </div>
                   <div class="col-md-4 page-header"  style="height:60px;line-height:60px; font-size:16px">
                       <select ms-duplex='@list_type' class="form-control"
                               ms-rules="{required:true}"  data-required-message='文章发布板块不能为空!'
                               ms-mouseleave="@list_type_change" style="margin-top:10px">
                       <option >新展快讯</option>
                       </select>
                   </div>
                   <div class="col-md-2 page-header"  style="height:60px;line-height:60px; font-size:16px">
                     <a style="cursor:pointer" ms-click="@content_detail()">发布新的文章</a>
                   </div>
                 </div> -->

                  <hr>
                  <label for="pic_list"><strong>珍品图片：</strong>(可以多选文件，单个文件大小在1M之内，分辨率为长宽一致的正方形，支持jpg,jpeg,bmp,png格式)</label>
                  <ul id="pic_list" style="margin:20px 0 20px 0">
                      <li ms-for="($index, pic_info) in @pics" >
                          <div>
                              <img ms-attr="{src:@get_pic_path(pic_info.PATH)}" height="100px"/>
                          </div>
                          <div class="close" ms-click="@delete_pic($index)">

                          </div>
                      </li>
                  </ul>
                  <div id="pic_upload" style="clear:both"></div>

                  <hr><hr>
                  <div class="row">
                    <div class="col-md-5"><label><strong>是否为十大精品:(十大精品将会要求上传语音和视频信息)</strong></label></div>
                    <div class="col-md-1">
                      <label>
                       <input class="checkbox" type="checkbox" ms-duplex-checked="@item_is_topten"
                        ms-rules="{required:true}"  data-required-message='是否十大精品!'/>
                      </lable>
                    </div>
                  </div>


                  <div ms-visible='@item_is_topten'>
                  <hr>
                  <label for="item_video"><strong>珍品视频：</strong>(仅能单选文件，文件大小在10M之内，仅支持mp4格式)</label>
                    <div id="item_video" style="margin:20px 0 20px 0">
                          <p>当前上传视频:{{@video}}</p>
                    </div>
                  <div id="video_upload"></div>

                  <hr>
                  <label for="item_audio_cn"><strong>珍品中文解说：</strong>(仅能单选文件，文件大小在10M之内，仅支持mp3格式)</label>
                    <div id="item_audio_cn" style="margin:20px 0 20px 0">
                          <p>当前上传音频:{{@audio_cn}}</p>
                    </div>
                  <div id="audio_cn_upload"></div>

                  <hr>
                  <label for="item_audio_tibet"><strong>珍品藏语解说：</strong>(仅能单选文件，文件大小在10M之内，仅支持mp3格式)</label>
                    <div id="item_audio_tibet" style="margin:20px 0 20px 0">
                          <p>当前上传音频:{{@audio_tibet}}</p>
                    </div>
                  <div id="audio_tibet_upload"></div>
                </div>

                  <hr>
                  <label><strong>文字说明</strong></label>
                  <script id="editor" type="text/plain" style="width:100%;height:200px;"></script>

                  <hr>
                  <button type="submit" class="btn btn-primary" ms-visible='@isNewItem'>新增珍品信息</button>
                  <button type="submit" class="btn btn-primary" ms-visible='!@isNewItem'>更新珍品信息</button>
              </form>
            </div>
        </div>
      </div>
      </div>
    </div>

    <div style="margin:50px"></div>
    <script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
    <script src="<?php echo base_url('assets/back/js/page-new-item.js') ?>"></script>

  </body>
</html>
