<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成都创新探索“互联网+劳动保障”新路径 - 公司新闻 - 商学院 - 成都珍才人力资源服务有限责任公司</title>
<meta name="keywords" content="公司新闻,商学院" />
<meta name="description" content="一是构筑用工管理新模式。设计“企业用工自主申报平台”，变劳动监察“被动执法”为“主动预防”。区内企业根据监察网格提供的账号登录系统，按季度自主申报用工数量、工资支付、劳动时间和社会保险等情况，未按期申报的用人单位，系统自动报警并提示监察人员上门检查。截至目前，已向区内近千户企业发放账号，已有666户企.." />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Application/views/css/site_base.css')?>"/>

</head>
<body>
    <div class="wrapper" ms-controller="contents">
        <?php include 'header.php' ?>

        <section class="banner">
            <img ms-attr="{src:'<?php echo base_url('Application/views/img/banner/')?>'+ _type +'.jpg'}">
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
