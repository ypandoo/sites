<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微山南</title>
<meta name="keywords" content="微山南" />
<meta name="description" content="微山南" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper" ms-controller="contents">
        <?php include 'header.php' ?>

        <section class="banner">
            <img src="<?php echo base_url('Application/views/img/banner/gwjz.jpg')?>" />
        </section>

        <section class="content">
        	<hgroup class="newsTitel">
                <h4> {{_title}}</h4>
                <p>发布时间：{{_update_time}}</p>
            </hgroup>
            <div class="txtEdit">
            	 <p ms-html="_html"></p>
                 <p><br/></p>
            </div>
            <div class="newsOther">

        	</div>
        </section>

        <?php include 'footer.php' ?>

    </div>
</body>
</html>
<script src="<?php echo base_url('application/views/js/base.js') ?>"></script>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/avalon.js/2.2.0/avalon.min.js"></script>
<script src="<?php echo base_url('application/views/js/jquery.query-object.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('Application/views/js/site_base.js')?>"></script>
<script>
//avalon controllers
(function(){
 var self = this;
 self.content = avalon.define({
    $id: "contents",
    _cover: "",
    _title: "",
    _update_time: "",
    _id:"",
    _pics:[],
    _html:"",
    _type:'1',
    getContent:function(){
        $.ajax({
            type:'POST',
            dataType: 'JSON',
            url:'<?php echo site_url('content/getById/')?>'+id,
        })
        .done(function (results) {
            if (results.success == 1){
                self.content._title = results.data.title;
                self.content._type = results.data.type;
                self.content._cover = results.data.cover;
                self.content._pics = results.data.pics.split(";");
                self.content._update_time = results.data.update_time;
                self.content._html = results.data.html;
            }
        })
    },
  });
}).call(define('Controller'));

//global
var id = $.query.get('id');
if(id != null && typeof(id) != 'undefined' && id != '')
{
  Controller.content.getContent();
}
else{
    alert('数据获取不正确');
    window.location.href = '<?php echo site_url() ?>';
}

</script>
