<?php
/*
MYSQL 数据库访问封装类
MYSQL 数据访问方式，php4支持以mysql_开头的过程访问方式，php5开始支持以mysqli_开头的过程和mysqli面向对象
访问方式，本封装类以mysql_封装
数据访问的一般流程：
1,连接数据库 mysql_connect or mysql_pconnect
2,选择数据库 mysql_select_db
3,执行SQL查询 mysql_query
4,处理返回的数据 mysql_fetch_array mysql_num_rows mysql_fetch_assoc mysql_fetch_row etc
*/


class db_mysql
{
    var $querynum = 0 ; //当前页面进程查询数据库的次数
    var $dblink ;       //数据库连接资源
	
    //链接数据库
    function connect($dbhost,$dbuser,$dbpw,$dbname,$dbcharset='utf-8',$pconnect=0 , $halt=true)
    {
        $func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect' ;
        $this->dblink = @$func($dbhost,$dbuser,$dbpw) ;
        if ($halt && !$this->dblink)
        {
            $this->halt('数据库连接出错'.$dbhost.$dbuser.$dbpw);
        }
		
        //设置查询字符集
        mysql_query("SET character_set_connection={$dbcharset},character_set_results={$dbcharset},character_set_client=binary",$this->dblink) ;
        //选择数据库
        $dbname && @mysql_select_db($dbname,$this->dblink) ;
		
    }

    //选择数据库
    function select_db($dbname)
    {
        return mysql_select_db($dbname,$this->dblink);
    }

    //执行SQL查询
    function query($sql)
    {
		mysql_query("set character set 'utf8'");//读库 
		mysql_query("set names 'utf8'");//写库 
        $this->querynum++ ;
        return mysql_query($sql,$this->dblink) ;
    }

    //返回最近一次与连接句柄关联的INSERT，UPDATE 或DELETE 查询所影响的记录行数
    function affected_rows()
    {
        return mysql_affected_rows($this->dblink) ;
    }

    //取得结果集中行的数目,只对select查询的结果集有效
    function num_rows($result)
    {
        return mysql_num_rows($result) ;
    }

    //获得单格的查询结果
    function result($result,$row=0)
    {
        return mysql_result($result,$row) ;
    }

    //取得上一步 INSERT 操作产生的 ID,只对表有AUTO_INCREMENT ID的操作有效
    function insert_id()
    {
        return ($id = mysql_insert_id($this->dblink)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
    }

    //从结果集提取当前行，以数字为key表示的关联数组形式返回
    function fetch_row($result)
    {
        return mysql_fetch_row($result) ;
    }

    //从结果集提取当前行，以字段名为key表示的关联数组形式返回
    function fetch_assoc($result)
    {
        return mysql_fetch_assoc($result);
    }

    //从结果集提取当前行，以字段名和数字为key表示的关联数组形式返回
    function fetch_array($result)
    {
        return mysql_fetch_array($result);
    }

    //关闭链接
    function close()
    {
        return mysql_close($this->dblink) ;
    }

    //输出简单的错误html提示信息并终止程序
    function halt($msg)
    {
        $message = "<html>\n<head>\n" ;
        $message .= "<meta content='text/html;charset=gb2312'>\n" ;
        $message .= "</head>\n" ;
        $message .= "<body>\n" ;
        $message .= "http://vnewcd.com 数据库出错：".htmlspecialchars($msg)."\n" ;
        $message .= "</body>\n" ;
        $message .= "</html>" ;
        echo $message ;
        exit;
    }
}
?>