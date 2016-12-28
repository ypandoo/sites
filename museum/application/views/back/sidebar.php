
<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li <?php if($tree_item == 0) echo 'class="active"'; ?>><a href="<?php echo site_url('back/index')?>">首页 <span class="sr-only">(current)</span></a></li>
    <li <?php if($tree_item == 1) echo 'class="active"'; ?>><a href="<?php echo site_url('back/about')?>">西博简介</a></li>
    <li <?php if($tree_item == 2) echo 'class="active"'; ?>><a href="<?php echo site_url('back/item')?>">珍品管理</a></li>
    <li <?php if($tree_item == 3) echo 'class="active"'; ?>><a href="<?php echo site_url('back/content')?>">内容发布</a></li>
    <li <?php if($tree_item == 4) echo 'class="active"'; ?>><a href="<?php echo site_url('back/instruction')?>">参观指南</a></li>
    <!-- <li><a href="#">Export</a></li> -->
  </ul>
</div>
