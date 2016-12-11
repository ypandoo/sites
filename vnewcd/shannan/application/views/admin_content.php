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

<?php include 'header.php' ?>

<!-- Modal -->
<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ms-controller="gallery">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">素材库<small> &nbsp;选取图片,最多一次上传5张图片</small></h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12">
              <span class="btn btn-success fileinput-button">
                  <i class="glyphicon glyphicon-plus"></i>
                  <span>上传图片</span>
                  <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload" type="file" name="files[]" multiple>
              </span>
            </div>
          </div>

          <div class="row top-buffer">
            <div class="col-xs-12">
              <div class="alert alert-success" role="alert">
                <p ms-for="el in @tips">
                  <span :if="@el.error == 1" class="text-danger">{{el.message}}</span>
                  <span :if="@el.error == 0" >{{el.message}}</span>
                </p>
              </div>
            </div>
          </div>

          <!-- file list -->
          <div class="row">
            <div ms-for = "($index, el) in @files" class="col-xs-6 col-md-3" ms-click="@toggleSelect($index)">
              <div class="thumbnail">
                <a href="#" class="mask">
                  <img ms-attr="{src:el.url}" alt="选择图片">
                </a>
              </div>

              <div class="selected_mask" ms-visible="el.selected">
                  <div class="selected_mask_inner"></div>
                  <div class="selected_mask_icon"></div>
              </div>
            </div>
          </div>

            <!-- The container for the uploaded files -->
            <div id="files" class="files"></div>


          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" ms-click="@confirmSelect()">确定</button>
      </div>
    </div>
  </div>
</div>


    <div class="container-fluid" ms-controller="content">
      <div class="row">
        <?php include 'sidebar.php' ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="sub-header">发布&更新文章<small>&nbsp;修改文章时,改动会在发布后生效,请注意保存修改</small></h3>
          <div class="row">
            <nav aria-label="...">
              <ul class="pager">
                <li class="next"><a href="<?php echo site_url('admin/contentlist')?>">查看文章列表 <span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>
          </div>


          <form class="" method="POST" onsubmit="return check(this)">
            <div class="form-group">
              <label for="title">*文章标题:</label>
              <input class="form-control" placeholder="请输入文章标题" name="title" id="title"/>
            </div>


            <label>*封面图片：(单个文件大小在2M之内，推荐尺寸为长宽一致的方形图，支持jpg,jpeg格式)</label>
            <div>
              <img ms-attr="{src:cover.url}" width="100px" height="100px" class="img-rounded"/>
            </div>
            <div class="gap_bottom gap_top_small">
              <button type="button" id="open_cover" class="btn btn-primary"
              data-toggle="modal" data-target="#gallery" data-choose="single">
                选择封面图片
              </button>
            </div>
            <input type="hidden" name='cover' id='cover'/>


            <label>图片库(根据板块需求上传)：(可以多选文件，单个文件大小在2M之内，推荐尺寸为长宽一致的方形图，支持jpg,jpeg格式)</label>
            <div class="clearfix" style="overflow:hidden">
              <div class="pull-left gap_right" ms-for="el in @pics">
                <img ms-attr="{src:el.url}" class="img-rounded" width="100px" height="100px"/>
              </div>
            </div>
            <div class="clearfix gap_bottom gap_top_small ">
              <button type="button" id="open_gallery" class="btn btn-primary"
              data-toggle="modal" data-target="#gallery"  data-choose="multi">
                选择图片
              </button>
            </div>


            <div class="form-group">
                <label for="type">文章发布模块:</label>
                <select class="form-control" name="type" id="type">
                  <?php foreach ($typelist as $type) { ?>
                    <option value="<?php echo $type['_id'] ?>"><?php echo $type['type_name'];?></option>

                  <?php } ?>
                </select>
            </div>


            <div class="form-group">
              <label for="editor">文章内容</label>
              <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
            </div>

            <button type="submit" class="btn btn-primary">发布文章</button>
          </form>


        </div>
      </div>
    </div>
    <script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/vendor/jquery.ui.widget.js') ?>"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/load-image.all.min.js') ?>"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/canvas-to-blob.min.js') ?>"></script>
    <script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/jquery.iframe-transport.js') ?>"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/jquery.fileupload.js')?>"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/jquery.fileupload-process.js') ?>"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/jquery.fileupload-image.js') ?>"></script>
    <script src="<?php echo base_url('application/views/fileupload/js/jquery.fileupload-validate.js') ?>"></script>

    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('application/views/js/jquery.query-object.js') ?>"></script>
    <script src="<?php echo base_url('application/views/ue/ueditor.config.js') ?>"></script>
    <script src="<?php echo base_url('application/views/ue/ueditor.all.js') ?>"></script>



    <script>

//avalon controllers
(function(){

   var self = this;
   self.content = avalon.define({
      $id: "content",
      pics: [],
      cover: "",
      singleSelect: true
    });

   self.gallery = avalon.define({
      $id: "gallery",
      tips:[ {message:'上传或选择图片,一次可上传5张图片,支持jpg,jpeg,图片大小小于2M', error:0}],
      files:[],
      toggleSelect:function(index){
        if(self.gallery.singleSelect)
        {
          for(var i = 0; i < self.gallery.files.length; i++)
          {
            self.gallery.files[i].selected = false;
          }
          self.gallery.files[index].selected = !self.gallery.files[index].selected;
        }
        else
        {
          self.gallery.files[index].selected = !self.gallery.files[index].selected;
        }
      },
      confirmSelect:function(index){
        if(self.gallery.singleSelect)
        {
          for(var i = 0; i < self.gallery.files.length; i++)
          {
            if(self.gallery.files[i].selected == true)
            {
              self.content.cover = self.gallery.files[i];
              break;
            }
          }
        }
        else
        {
          self.content.pics = [];
          for(var i = 0; i < self.gallery.files.length; i++)
          {
            if(self.gallery.files[i].selected == true)
            self.content.pics.push(self.gallery.files[i]);
          }
        }

        $('#gallery').modal('toggle');
      },
      getFiles:function(){
          $.ajax({
              type:'POST',
              dataType: 'JSON',
              url:'<?php echo site_url('file/getAll/')?>',
          })
          .done(function (results) {
              if (results.success == 1){
                //self.gallery.files = results.data;
                self.gallery.files = [];
                for(var i = 0; i < results.data.length; i++)
                {
                  var result=$.extend({},results.data[i],{selected:false})
                  self.gallery.files.push(result);
                }
              }
          })
      }
    });



}).call(define('Controller'));

//file upload
(function () {
'use strict';
// Change this to the location of your server-side upload handler:
var url = '<?php echo site_url('file/upload') ?>' ;
var debug = 0;

$('#fileupload').fileupload({
  url: url,
  dataType: 'json',
  autoUpload: true,
  acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
  maxFileSize: 524000,
  // Enable image resizing, except for Android and Opera,
  // which actually support image resizing, but fail to
  // send Blob objects via XHR requests:
  disableImageResize: /Android(?!.*Chrome)|Opera/
      .test(window.navigator.userAgent),
  previewMaxWidth: 100,
  previewMaxHeight: 100,
  previewCrop: true
  }).on('fileuploadadd', function (e, data) {
    //1. 检查所有上传的文件 这里传入是一个数组
    if(debug)
    {console.log('fileuploadadd');}

    Controller.gallery.tips = [];
  })
  .on('fileuploadprocessalways', function (e, data) {
    //2. 单个文件的处理过程开始
    var index = data.index,
        file = data.files[index];
    if (file.preview) {
       //preview ready
    }
    if (file.error) {
        //
        Controller.gallery.tips.push({message:file.name+'上传失败：'+file.error, error:1});
    }
  })
  .on('fileuploadprogressall', function (e, data) {
    if(debug)
      {console.log('fileuploadprogressall');}
      //3. 单个文件的上传进度，多次调用
      // var progress = parseInt(data.loaded / data.total * 100, 10);
      // vm.tips[vm.tips.length-1] += progress+'% ';

  })
  .on('fileuploaddone', function (e, data) {
    if(debug)
      {console.log('fileuploaddone');}
    //4. 单个文件上传成功
    $.each(data.result.files, function (index, file) {
        if (file.url) {
            Controller.gallery.tips.push({message:file.name+'上传完成.', error:0});
        } else if (file.error) {
            Controller.gallery.tips.push({message:file.name+'上传失败：'+file.error, error:1});
        }
    });
  })
  .on('fileuploadfail', function (e, data) {
      $.each(data.files, function (index, file) {
        Controller.gallery.tips.push({message:file.name+'上传失败.', error:1});
      });
  })
  .on('fileuploadstop', function(){
    if(debug)
      {console.log('fileuploadstop');}

    Controller.gallery.getFiles();

  });

})(define('FileUpload'));


//deal with page logic
    // function setContentById(id)
    // {
    //     $.ajax({
    //         type:'POST',
    //         dataType: 'JSON',
    //         url:'<?php echo site_url('content/getById/')?>'+id,
    //     })
    //     .done(function (results) {
    //         if (results.success == 1){
    //             $('#title').val(results.data.title);
    //             $('#cover_img').attr('src', '<?php echo base_url('uploads/cover/')?>'+results.data.cover);
    //             ue.setContent(results.data.html);
    //             $("#type").val(results.data.type);
    //         }
    //     })
    // }
    //
    // function check(form)
    // {
    //   if(form.title.value == "" || form.title.value == null || typeof(form.title.value) == 'undefined')
    //   {
    //        alert("文章标题不能为空!");
    //        return false;
    //   }
    //
    //   if(ue.getContentTxt() == "" || ue.getContentTxt() == null || typeof(ue.getContentTxt()) == 'undefined')
    //   {
    //     alert("请输入文章正文！");
    //     return false;
    //   }
    //
    //   //update form
    //   if(id != null && typeof(id) != 'undefined' && id != '')
    //   {
    //     var submitData = {
    //       id: id,
    //       title: form.title.value,
    //       plain_text: ue.getContentTxt(),
    //       html:ue.getContent(),
    //       type: form.type.value,
    //       author:''
    //     };
    //     if(form.cover.value != "" && form.cover.value != null && typeof(form.cover.value) != 'undefined')
    //     {
    //       submitData['cover'] = form.cover.value;
    //     }
    //
    //     $.ajax({
    //         type:'POST',
    //         dataType: 'JSON',
    //         url:'<?php echo site_url('content/update/') ?>',
    //         data: submitData
    //     })
    //     .done(function (results) {
    //         if (results.success == 1){
    //             alert('文章更新成功!');
    //             window.location.href = '<?php echo site_url('admin/contentlist') ?>';
    //         }
    //     })
    //
    //     return false;
    //   }
    //
    //   //add new content
    //   if(form.cover.value == "" || form.cover.value == null || typeof(form.cover.value) == 'undefined')
    //   {
    //        alert("请上传文章封面！");
    //        return false;
    //   }
    //
    //   var submitData = {
    //     id:'',
    //     title: form.title.value,
    //     cover: form.cover.value,
    //     plain_text: ue.getContentTxt(),
    //     html:ue.getContent(),
    //     type: form.type.value,
    //     author:''
    //   };
    //
    //   $.ajax({
    //       type:'POST',
    //       dataType: 'JSON',
    //       url:'<?php echo site_url('content/add/') ?>',
    //       data: submitData
    //   })
    //   .done(function (results) {
    //       if (results.success == 1){
    //           alert('文章发布成功!');
    //           window.location.href = '<?php echo site_url('admin/contentlist') ?>'
    //       }
    //   })
    //
    //   return false;
    // }
    //

(function(){
  //Global fuctions
  var ue = UE.getEditor('editor');
  // var id = $.query.get('id');
  // if(id != null && typeof(id) != 'undefined' && id != '')
  // {
  //   ue.ready(function(){
  //     setContentById(id);
  //   });
  // }

  $('#gallery').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var choose = button.data('choose') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    // var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)
    choose == 'single' ? Controller.gallery.singleSelect = true : Controller.gallery.singleSelect = false;
    Controller.gallery.getFiles();
  })
})();
    </script>
  </body>
</html>
