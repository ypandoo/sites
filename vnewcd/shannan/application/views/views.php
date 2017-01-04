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
<style media="screen">
  .item{
    float: left;
    width: 42%;
    margin: 0 4%;
    height: 50px;
    line-height: 50px;
    /* padding-left: 10px; */
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }
</style>
</head>
<body ms-controller="contents">
<?php include 'header.php' ?>
<section class="banner">
    <img src="<?php echo base_url('Application/views/img/banner/lyjd.jpg')?>" />
</section>


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" ms-click="@switch_type('rwjg')">
      <a href="#renwen" aria-controls="renwen" role="tab" data-toggle="tab">人文景观</a>
    </li>
    <li role="presentation"  ms-click="@switch_type('zrjg')">
      <a href="#renwen" aria-controls="renwen" role="tab" data-toggle="tab">自然景观</a>
    </li>
    <li role="presentation"  ms-click="@switch_type('mswh')">
      <a href="#renwen" aria-controls="renwen" role="tab" data-toggle="tab">民俗文化</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="overflow:hidden">
    <div role="tabpanel" class="tab-pane active" id="renwen">
      <section class="content">
          <div class="firstNews" ms-for="($index,el) in data">
              <a  ms-attr="{href:'<?php echo site_url('front/detail_pics?id=')?>'+el._id}" >
                  <img ms-attr="{src:'<?php echo base_url('files/')?>'+el.cover}" />
                  <h4>{{el.title}}</h4>
                  <p>一{{el.plain_text | truncate(30,'...') }}</p>
                  <span>{{el.update_time}}</span>
              </a>
          </div>
      </section>
      <div id="loading" style="display:; position:fixed; bottom:200px; text-align:center;width:100%" ms-visible="@sending">
        <i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:#337ab7"></i>
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>

  <div class="gap40">
  </div>

<?php include 'footer.php' ?>

<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
//avalon controllers
(function(){
 var self = this;
 self.content = avalon.define({
    $id: "contents",
    data:[],
    page: 0,
    type: 'rwjg',
    sending: false,
    switch_type: function(type) {
      self.content.type = type;
      self.content.sending = true;
      self.content.page = 0;
      self.content.data =[];
      self.content.getAPage();
    },
    getAPage:function(){
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            data:{page:self.content.page, category:self.content.type},
            url:'<?php echo site_url('content/getAPageByCategory/')?>',
        })
        .done(function (results) {
            if (results.success == 1 && results.data.length > 0){
              //self.gallery.files = results.data;

              if(self.content.data.length == 0)
                self.content.first = results.data[0];

              for(i=0; i<results.data.length; i++)
                self.content.data.push(results.data[i]);

              self.content.page += 1;
            }
            self.content.sending = false;
        })
        .fail(function(){
          self.content.sending = false;
        })
    },
  });
}).call(define('Controller'));

Controller.content.sending = true;
Controller.content.getAPage();

window.onscroll = function () {
  if (Controller.content.sending) {
    return;
  }

  if(Scroll.isScrollToPageBottom()){
        Controller.content.sending = true;
        Controller.content.getAPage();
    }
}
</script>

</body>
</html>
