<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>西藏博物馆</title>
    <meta name="keywords" content="西藏博物馆"/>
    <meta name="description" content="西藏博物馆"/>
    <meta name="robots" content="all"/>
    <meta name="copyright" content="西藏博物馆"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="author" content="" />
    <meta name="revisit-after"  content="1 days" />
    <meta name="format-detection" content="email=no" />
    <meta name="format-detection" content="telephone=yes" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/ico" />
    <link rel="Bookmark" href="/favicon.ico" />

    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/list_style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/investor_list.css') ?>">
</head>

<body>
<div class="bk"></div>
<div class="notification red"><i class="txt">关注失败, 请稍后重试.</i><i class="close">×</i></div>
<div class="details" >
    <div id="header" class="newhead" style="margin-bottom: 6px;">
        <div class="logo touch-href"></div>
    </div>

    <div id="list-container" class="list-container">
        <div class="loading-container">
            <div class="loading"></div>
        </div>
        <div class="not-found">
            <div>
                <h3>呀~没找到</h3>
                <p>很抱歉，未找到与该筛选条件相匹配的结果</p>
            </div>
    </div>

    <div class="investor-list" ms-controller="items_ctrl">
        <section ms-for='($index, item_info) in @data'>
            <div class="summary">
                <div class="avatar left">
                    <a ms-attr="{href:@get_detail_link(item_info.ITEM_ID)}"><img ms-attr="{src:@get_pic_path(item_info.PATH)}" ></a>
                </div>
                <div class="text right">
                    <p class="basic"><span class="name">{{item_info.ITEM_NAME}}</span></p>
                    <p class="desc">这里是展品的介绍：该展品是第一次在国内展出。价值连城。出土地址：陕西西安。价值：￥9000000. </p>
                    <p class="figure"><span class="after">展馆位置: 2B2F</span></p>
                </div>
            </div>
        </section>
    </div>

    </div>
    <div class="position-occupy"></div>
    <!-- <div class="page-turn-occupy"></div>
    <div class="page-turn">
        <div class="page-turn2">
        <a class="btn prev-page">上一页</a>
        <p><i class="current-page">0</i>/<i class="total-page">0</i></p>
        <a class="btn next-page">下一页</a>
        </div>
    </div> -->

</div>

</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/investor_list.js') ?>"></script>
<script>

</script>
</html>
