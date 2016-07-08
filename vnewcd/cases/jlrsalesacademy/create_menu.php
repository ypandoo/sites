<?php
include_once 'vnew.wechatmenu.php'; //包含WeChatMenu类

$AppId="wx2394bd8a2d5a3ab2";     //公共平台提供的AppId参数
$AppSecret="a8c14e6dd76883e54d62edf777aaa0c0"; //公共平台提供的AppSecret参数

//创建一个WeChatMenu类的实例
$object = new WeChatMenu("weixin",$AppId, $AppSecret); //第一个参数 "weixin", 表明是针对微信平台的
//$object = new WeChatMenu("yixin",$AppId, $AppSecret); //第一个参数 "yixin", 表明是针对易信平台的


//定义一个菜单
$menu = new MenuDefine();

$menu->menuStart();  //菜单开始

$menu->addMenu("今日答卷");
$menu->addMenuItemView("今日答卷", "http://www.jlrsalesacademy.com/todayque.php");
$menu->addMenuItemClick("往期答卷", "http://www.jlrsalesacademy.com/past.html");

$menu->addMenu("个人中心");
$menu->addMenuItemView("个人信息", "http://www.jlrsalesacademy.com/info.html");


$menu->menuEnd(); //菜单结束, 则此时$menu->str中有菜单定义数据(JSON格式) 

//生成菜单
echo "<h2>Create Menu</h2>";
if ($object->createMenu($menu->str))  //$menu->str中有菜单定义数据(JSON格式) 
	echo "Create menu OK";
else 
	echo "Create menu failure:".$menuObject->errmsg;
echo "<hr>";


//获取当前菜单数据
echo "<h2>Get Menu: the menu json data is</h2>";
echo $object->getMenu();
echo "<hr>";

/*
//删除菜单
echo "<h2>Delete Menu</h2>";
echo $object->deleteMenu();
echo "<hr>";
*/

?>