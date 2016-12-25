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
  </head>

<body>
<?php include 'header.php' ?>

<div class="container-fluid">
  <div class="row">
    <?php include 'sidebar.php' ?>

    <!--right-->
    <div ms-controller="content_ctrl">
    <div id="page_item_detail">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="row">
          <div class="col-md-10 page-header" style="height:60px;line-height:60px; font-size:24px">关于西博</div>
        </div>


        <div id="item_detail">
          <form  ms-validate="@validate" method="post">
              <script id="editor" type="text/plain" style="width:100%;height:200px;"></script>

              <hr>
              <button type="submit" class="btn btn-primary">更新信息</button>
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
    <script src="<?php echo base_url('assets/common/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/common/js/ie10-viewport-bug-workaround.js') ?>"></script>
    <script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>

    <!-- UE -->
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/ue/ueditor.config.js') ?>"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url('assets/ue/ueditor.all.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
    <script>
    var ue = UE.getEditor('editor');
    (function(){
      var self = this;
      self.content_ctrl = avalon.define({
                       $id: 'content_ctrl',
                       content_text:'',
                       validate: {
                         onValidateAll: function (reasons) {

                          var submit_data = {
                                  'html':  ue.getContent(),
                                  'text':  ue.getContentTxt(),
                          };

                          //Ajax
                          console.log('Submit:提交数据');
                          console.log(submit_data);

                          var url = base_url+'About/update_about';
                          //url call data error_call
                          base_remote_data.ajaxjson(
                            url, //url
                            function(data){
                              if(data.hasOwnProperty('success')){
                                    if(data.success == 1){
                                        console.log(data);
                                        alert('文章更新成功！');
                                    }
                                    else{
                                        alert(data.message);
                                    }
                                }
                              else {
                                alert('返回值错误!');
                              }
                          },
                          submit_data,
                          function()
                          {
                            alert('网络错误!');
                          });

                         }//End onValidateAll
                       },//End validate
        get_about:function(){
            var url = base_url+'About/get_about';
            //url call data error_call
            base_remote_data.ajaxjson(
              url, //url
              function(data){
                if(data.hasOwnProperty('success')){
                      if(data.success == 1){
                          console.log(data);
                          ue.setContent(data.data[0].HTML);
                      }
                      else{
                          alert(data.message);
                      }
                  }
                else {
                  alert('返回值错误!');
                }
            },
            '',
            function()
            {
              alert('网络错误!');
            });
        }
      });
    }).call(define('space_about'));

        space_about.content_ctrl.get_about();
</script>


  </body>
</html>
