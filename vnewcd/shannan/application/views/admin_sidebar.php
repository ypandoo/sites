<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li <?php if($tree_item == 0) echo 'class="active"'; ?>><a href="<?php echo site_url('/admin/index')?>">首页 <span class="sr-only">(current)</span></a></li>
    <li <?php if($tree_item == 1) echo 'class="active"'; ?>><a href="<?php echo site_url('/admin/typelist')?>">分类管理</a></li>
    <li <?php if($tree_item == 2) echo 'class="active"'; ?>><a href="<?php echo site_url('/admin/contentlist')?>">内容管理</a></li>
    <li <?php if($tree_item == 3) echo 'class="active"'; ?>><a href="<?php echo site_url('/admin/feedbacklist')?>">投诉管理</a></li>
    <li <?php if($tree_item == 4) echo 'class="active"'; ?>><a href="<?php echo site_url('/admin/user')?>">用户管理</a></li>
    <!-- <li><a href="#">Export</a></li> -->
  </ul>
  <!-- <ul class="nav nav-sidebar">
    <li><a href="">Nav item</a></li>
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
    <li><a href="">More navigation</a></li>
  </ul>
  <ul class="nav nav-sidebar">
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
  </ul> -->
</div>
