<?php
session_start();
$code = $_GET['code'];
$state = $_GET['state'];
//换成自己的接口信息
$appid = 'wx2394bd8a2d5a3ab2';
$appsecret = 'a8c14e6dd76883e54d62edf777aaa0c0';
if (empty($code)) $this->error('授权失败');
$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
$token = json_decode(file_get_contents($token_url));
if (isset($token->errcode)) {
    echo '<h1>错误：</h1>'.$token->errcode;
    echo '<br/><h2>错误信息：</h2>'.$token->errmsg;
    exit;
}
$access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
//转成对象
$access_token = json_decode(file_get_contents($access_token_url));
if (isset($access_token->errcode)) {
    echo '<h1>错误：</h1>'.$access_token->errcode;
    echo '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
    exit;
}

$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN';
//转成对象
$user_info = json_decode(file_get_contents($user_info_url));
if (isset($user_info->errcode)) {
    echo '<h1>错误：</h1>'.$user_info->errcode;
    echo '<br/><h2>错误信息：</h2>'.$user_info->errmsg;
    exit;
}
$_SESSION['pid']=$access_token->openid;
$_SESSION['nickname']=$user_info->nickname;
$_SESSION['pic']=$user_info->headimgurl;

//insert user info
require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = 'qdm123993354.my3w.com:3306';
$dbuser = 'qdm123993354';
$dbpw = 'lei000lei';
$dbname='qdm123993354_db';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);
$sql = "INSERT INTO `guiren_user` (userid,usernick,userpic) 
VALUES('".$access_token->openid."','".$user_info->nickname."','".$user_info->headimgurl."')";
$result = $dbobj->query($sql);

if(isset($_GET['pid']) && !empty($_GET['pid']))
{
	$pid = $_GET['pid'];
}
else
{
	$pid = $access_token->openid;
}

header('location:looking.php?pid='.$pid);
//header('location:index.php?userid='.$access_token->openid);
?>