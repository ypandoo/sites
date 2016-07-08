<?php
include_once 'vnew.wechatmenu.php'; //包含WeChatMenu类

$AppId="wx2394bd8a2d5a3ab2";     //公共平台提供的AppId参数
$AppSecret="a8c14e6dd76883e54d62edf777aaa0c0"; //公共平台提供的AppSecret参数

//创建一个WeChatMenu类的实例
$object = new WeChatMenu("weixin",$AppId, $AppSecret); //第一个参数 "weixin", 表明是针对微信平台的
//$object = new WeChatMenu("yixin",$AppId, $AppSecret); //第一个参数 "yixin", 表明是针对易信平台的

//删除菜单
echo "<h2>Delete Menu</h2>";
echo $object->deleteMenu();
echo "<hr>";

?>