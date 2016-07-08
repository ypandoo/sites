<?php

function conn_db() {	
// 连主库
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
// Connect local server
if(!$link)
{
	$link=conn_db2($hostname, $username, $password, $database);
}
else{
	mysql_select_db(SAE_MYSQL_DB,$link);    
}
set_encode($link);

return $link;
}

function conn_db2($hostname, $username, $password, $database) {
	$link = mysql_connect($hostname,$username,$password);
	if (!$link) {
		echo "Mysql Connect Error".mysql_error();
		return false;
	}
	else{
		mysql_select_db($database,$link);    
	}
	return $link;
}

function conn_db_error(){
}

function runquery($sql, $link = NULL) {
	/*提交查询语句前，检查语句的合法性，若safe=0，则不合法*/
	$ret = @mysql_query($sql, $link);
	if (!$ret) {
		return false;
	}
	else{
		return $ret;
	}
}
/*获得一条记录，用作身份验证时返回一条记录*/
function getaline($sql, $link) {
	$ret = runquery($sql, $link);
	$row = @mysql_fetch_array($ret, MYSQL_ASSOC);
	if (!$row){
		return false;
	}else return $row;
}
/*获得结果集中的一行，用作查询用 */
function getresult($ret){
	$row = @mysql_fetch_array($ret,MYSQL_ASSOC);
	if (!$row){
		return false;
	} else {
		return $row;
	}
}

function closedb($link){
	if($link){
		mysql_close($link);
	}
}

function set_encode($link){
	runquery("SET NAMES 'utf8'",$link);
}

/*=================================================*/
function encrypt($str){
	$str = base64_encode($str);
	$md = md5($str);
	return substr($md,0,17);
}
function jump($url){
//header("refresh:3;url='".$url."'");
//echo '请稍等...<br>三秒后自动跳转';
echo "<script>location.href='".$url."';</script>";
}
function alert($str){
	echo "<script>alert('".$str."');</script>";
}
function goback(){
	echo "<script>history.go(-1);</script>";
}

function xss($str){
	//$str = str_replace(":","：",trim($str));
	return htmlspecialchars($str);
}
/*=================================================*/
function session_begin() {
	//session_save_path($CONFIG['session_dir']); 
	session_start();
}

function create_session($val) {
	 if (!is_array($val)) {
		 return false;
	 }
	 foreach ($val as $key => $val) {
		 $_SESSION[$key] = $val;
	 }
	 return true;
 }

 function destory_session() {
	 session_start();
	 $_SESSION = array();
	 if (isset($_COOKIE[session_name()])) {
		 setcookie(session_name(), '', time()-42000, '/');
	 }
	 session_destroy();
 }

?>