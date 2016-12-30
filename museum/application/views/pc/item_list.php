<!doctype html>
<html style="width:100%; height:100%; padding:0; margin:0">
<head>
<meta charset="utf-8">
<title>西藏博物馆</title>
<?php include 'include.php'; ?>
<style>
h3{
  color:#713e23
}
</style>
</head>

<body class="bg3"  ms-controller="items_ctrl">
<!-- header -->
<?php include 'header_navi.php';?>


<section class="carousel" style="margin-top:200px; margin-bottom:50px">
  <div class="reel">
    <article class="bg2">
      <a ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[0].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[0].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[0].ITEM_DESCRIPTION)| truncate(60,'...')}})</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[1].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[1].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[1].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[1].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[2].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[2].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[2].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[2].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[3].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[3].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[3].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[3].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[4].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[4].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[4].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[4].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[5].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[5].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[5].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[5].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[6].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[6].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[6].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[6].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[7].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[7].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[7].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[7].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[8].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[8].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[8].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[8].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>
    <article>
      <a ms-attr="{href:@get_detail_link_pc(data[9].ITEM_ID)}" class="image featured"><img ms-attr="{src:@get_pic_path(data[9].PATH)}" alt="" /></a>
      <header>
        <h3><i class="fa fa-bandcamp" aria-hidden="true"></i>{{data[9].ITEM_NAME}}</h3>
      </header>
      <p>{{@get_pure_text(data[9].ITEM_DESCRIPTION)| truncate(60,'...')}}</p><br>
      <a class="btn" ms-attr="{href:@get_detail_link_pc(data[0].ITEM_ID)}"><i class="fa fa-arrow-right gapR10" aria-hidden="true"></i>了解更多</a>
    </article>

  </div>
</section>

<!-- <div id="table" style="padding-top:100px">
      <div id="table-cell">
          <div id="center">
            <div class="banner-top">
              <div class="banner-item"  ms-for='($index, item_info) in @data'>
                <a ms-attr="{href:@get_detail_link_pc(item_info.ITEM_ID)}"><img  ms-attr="{src:@get_pic_path(item_info.PATH)}" />
                <div class="item_name_bg"><p>{{item_info.ITEM_NAME}}</p></div></a>
              </div>

            </div>
          </div>
      </div>
</div> -->





<!-- footer -->

<!-- <script src="<?php echo base_url('application/views/pc/assets/js/main.js') ?>"></script> -->
<script src="<?php echo base_url('assets/pc/js/item_list.js') ?>"></script>

</body>

</html>
