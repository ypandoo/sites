<?php
// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
    echo "mc init failed\n";
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

session_begin();

session_begin();
$date=date('Y-m-d');  //当前日期
$w=date('w',strtotime($date));  //计算今天星期几
?>
<html>
<head>
<title>快问快答比赛</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
</head>
<body>

<div align="left">
<font size="10pt">快问快答大赛</font></div>
<?php

if (!isset($_SESSION['phone'])||!isset($_SESSION['pass'])){
?>
<div align="right">
<table width="10%" style="margin-right:20px;margin_top:0px" border='0'>
<tr align="right">
<td width="%5"><a href='login.html'>登录</a></td>
<td width="%5"><a href='reg.html'>注册</a></td></tr>
</table>
</div>
<?}else{?>
<div align="right">
<table width="20%" style="margin-right:20px;margin_" border='0'>
<tr align="right">
<td width="%20">欢迎您，<?echo $_SESSION['usr_name'];?>&nbsp;&nbsp;
<a href='logout.php'>注销</a>
<a href='todayque.php'>今日答卷</a>&nbsp;&nbsp;
<a href='list.php'>往期答卷</a></td>
</table>
</div>

<?}?>
<hr>

<br>
<div align="center">
排名<br><br>
<table width="70%" border='1'>
<tr>
<td align='center'>排名</td>
<td align='center'>用户名</td>
<td align='center'>手机号</td>
<td align='center'>大区</td>
<td align='center'>经销商</td>
<td align='center'>部门</td>
<td align='center'>总分</td>
</tr>
<?
$link = conn_db();
$sql = "SELECT usr_name,phone,region,dealer,department,que_score,ratecount FROM users ORDER BY que_score desc";
$ret = runquery($sql, $link);
$i = 1;
while($row = getresult($ret)){
?>
<tr>
<td align='center'><?echo $i++;?></td>
<td align='center'><?echo $row['usr_name'];?></td>
<td align='center'><?echo $row['phone'];?></td>
<td align='center'><?echo $row['region'];?></td>
<td align='center'><?echo $row['dealer'];?></td>
<td align='center'><?echo $row['department'];?></td>
<td align='center'><?echo $row['que_score'];?></td>
</tr>
<?}?>
</table>
</div>

<div align="center" style="margin-top:30px;">Copyright PataApp Studio 2015</div>
</body>
</html>