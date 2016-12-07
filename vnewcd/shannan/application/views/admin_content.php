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
    <link href="<?php echo base_url('application/views/Huploadify/Huploadify.css') ?>" rel="stylesheet">

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

    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php' ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">发布&更新文章</h2>
          <div class="row">
            <nav aria-label="...">
              <ul class="pager">
                <li class="next"><a href="<?php echo site_url('admin/contentlist')?>">查看文章列表 <span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>
          </div>
          <form class="" method="POST" onsubmit="return check(this)">
            <div class="form-group">
              <label for="title">文章标题:</label>
              <input class="form-control" placeholder="请输入文章标题" name="title" id="title"/>
            </div>

            <!-- <div class="form-group">
              <label for="author" class="form-control">文章作者:</label>
              <input class="form-control" placeholder="请输入文章作者" name="author" id="author"/>
            </div> -->


          <!-- <div class="form-group">
            <label for="cover">封面图片：</label>
            <input type="file" id="cover" name="cover" class="form-control" accept="image/jpg, image/jpeg" />
            <p class="help-block">封面图片：(单个文件大小在1M之内，尺寸推荐400*400，支持jpg,jpeg格式)</p>
          </div> -->

          <label for="pic_list">封面图片：(单个文件大小在1M之内，尺寸600*400，支持jpg,jpeg格式)</label>
          <ul id="pic_list" style="margin:20px 0 20px 0">
              <li>
                  <div>
                      <img src="" height="100px" width="100px" id="cover_img"/>
                  </div>
              </li>
          </ul>
          <div id="pic_upload" style="clear:both"></div>
          <input type="hidden" name='cover' id='cover'/>

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

    <script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('application/views/Huploadify/jquery.Huploadify.js') ?>"></script>
    <script src="<?php echo base_url('application/views/ue/ueditor.config.js') ?>"></script>
    <script src="<?php echo base_url('application/views/ue/ueditor.all.js') ?>"></script>

    <script>
    function check(form)
    {
      if(form.title.value == "" || form.title.value == null || typeof(form.title.value) == 'undefined')
      {
           alert("文章标题不能为空!");
           return false;
      }

      if(form.cover.value == "" || form.cover.value == null || typeof(form.cover.value) == 'undefined')
      {
           alert("请上传文章封面！");
           return false;
      }

      if(ue.getContentTxt() == "" || ue.getContentTxt() == null || typeof(ue.getContentTxt()) == 'undefined')
      {
        alert("请输入文章正文！");
        return false;
      }

      var submitData = {
        id:'',
        title: form.title.value,
        cover: form.cover.value,
        plain_text: ue.getContentTxt(),
        html:ue.getContent(),
        type: form.type.value,
        author:''
      };

      $.ajax({
          type:'POST',
          dataType: 'JSON',
          url:'<?php echo site_url('content/add/') ?>',
          data: submitData
      })
      .done(function (results) {
          if (results.success == 1){
              alert('文章发布成功!``');
          }
      })

      return false;
    }

    var up = $('#pic_upload').Huploadify({
        auto:false,
        fileTypeExts:'*.jpg;*.jpeg;',
        multi:false,
        formData:{id:'0'},
        fileSizeLimit:1024,
        showUploadedPercent:true,
        showUploadedSize:true,
        removeTimeout:500,
        uploader:"<?php echo site_url()?>"+'/content/add_pic',
        onUploadStart:function(file){
        },
        onUploadSuccess: function(file, data, response) {
          console.log('上传成功:');
          var obj = JSON.parse(data);
          if (obj.success==1) {
              $('#cover').val(obj.data);
              $('#cover_img').attr('src', "<?php echo base_url()?>"+'/uploads/cover/'+obj.data);
          }

        }
      });

    var ue = UE.getEditor('editor');

    </script>
  </body>
</html>
