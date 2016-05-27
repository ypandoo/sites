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
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/base.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/css/item_detail.css') ?>">
</head>

<body>
<div id="item_id" data-id="<?php echo $item_id?>"></div>
<div class="bk"></div>

<div class="details" ms-controller="sd-list">
        <div id="header" class="newhead">
            <div class="logo touch-href" ms-click="{@direct_to_list_path()}"></div>
        </div>

        <div class="section-container">
            <section class="sd-list pub-title">
                <div id="touch-zone" class="pro-info">
                    <div style="position:relative">
                      <img width="100%" ms-attr="{src:@data.path}"></img>
                      <div class='item_name_bg'>
                          <p ms-text="@data.name"></p>
                      </div>
                    </div>

                <div class="fin-info">
                    <p class="left pro-info-unit"><span>展出位置:B23F</span></p>
                    <p class="right pro-info-unit"><span>视频解说</span></p>
                </div>

                <div class="list-container">
                    <ul id="list-container">
                        <li id="sd-selector" class="selector"><div></div></li>
                        <li ms-for='($index, item_info) in @items_list' ms-attr="{dataId:$index}">
                            <div> <img ms-attr="{src:@get_pic_path(item_info.PATH)}"></img>
                            </div>
                        </li>
                    </ul>
                </div>

                <div style="height:10px; background-color:#eeeeee"></div>
                <div class="personal-summary" style="clear:both">
                      <h1>展品介绍</h1>
                      <div class="item" ms-html="@data.description ">
                      </div>
                </div>
              </div>
            </section>

        </div>
</div>
</body>
<script src="<?php echo base_url('assets/common/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/avalon.js') ?>"></script>
<script src="<?php echo base_url('assets/common/js/base.js') ?>"></script>
<script src="<?php echo base_url('assets/front/js/item_detail.js') ?>"></script>
<script>
</script>
</html>
