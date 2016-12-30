<?php
echo '<div id="header">';
echo '<h1><a href="Pc/view/index"><img src="'.base_url('assets/pc/img/logo.png').'" width="200" height="50" alt="西藏博物馆"></a></h1>';
echo  '<div class="nav">
  <ul>
    <li>
        <a href="/Pc/view/index" class="animate">首页</a>
    </li>
      <li>
        <a href="/Pc/view/about" class="animate">资讯 </a>
        <div class="subNav" style="display: none;">
            	<a href="/Pc/view/about">西博简介</a>
              <a href="/Pc/view/dynamic">西博动态</a>
              <a href="/Pc/view/construction">新馆建设</a>
        </div>
      </li>
      <li>
        <a href="/Pc/view/new_expo" class="animate">展览</a>
        <div class="subNav" style="display: none;">
              <a href="/Pc/view/basic_list">基本陈列</a>
              <a href="/Pc/view/new_expo">新展快讯</a>
              <a href="/Pc/view/expo_review">展览回顾</a>
        </div>
      </li>
      <li>
        <a href="/Pc/view/item_list" class="animate">藏品</a>
        <div class="subNav" style="display: none;">
              <a href="/Pc/view/item_list">十大精品</a>
              <a href="/Pc/view/item_list_normal">珍品赏析</a>
              <a href="/Pc/view/protect">藏品保护</a>
        </div>
      </li>
      <li>
        <a href="/Navi/view_pc/1" class="animate">服务</a>
        <div class="subNav" style="display: none;">
        <a href="/Navi/view_pc/1">展厅导览</a>
        <!--a href="/into-the-ai/">基本陈列</a-->
        <a href="/Pc/view/instruction">参观指南</a>
        <a href="">全景趣览</a>
        <!--a href="">移动平台</a-->
        </div>
      </li>
      <li>
        <a href="/Pc/view/lesson" class="animate">活动</a>
        <div class="subNav" style="display: none;">
        <a href="/Pc/view/lesson">西博课堂</a>
        <a href="/Pc/view/activity">活动邀约</a>
        <a href="/Pc/view/volunteer">志愿者风采</a>

        </div>
      </li>
  </ul>
  </div>
</div>'
?>
