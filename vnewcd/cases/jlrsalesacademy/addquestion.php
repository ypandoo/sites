<?php

// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
{
	echo "mc init failed\n";
}
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

$q_name = $_POST['q_name'];
$opt_a   = $_POST['opt_a'];
$opt_b = $_POST['opt_b'];
$opt_c   = $_POST['opt_c'];
$opt_d= $_POST['opt_d'];
$answer   = $_POST['answer'];
$department   = $_POST['department'];
$q_date   = $_POST['q_date'];

/*
测试代码
$q_name = "1";
$opt_a   = "1";
$opt_b = "1";
$opt_c   = "1";
$opt_d= "1";
$answer   = "A";
$department   = 'jb';
$q_date   = "2015-12-03";
*/

$link = conn_db();
// inset the question
$sql="INSERT INTO  question  (`que_name`, `que_answer`, `que_score`, `que_date`, `department`) VALUES ('$q_name', '$answer', '20', '$q_date', '$department')";
$ret=runquery($sql,$link);

// insert or update the options for the questions
$qsql="SELECT * FROM question where que_name='$q_name' and que_date='$q_date'";
$qids=getaline($qsql,$link);

// update the options
$qid=$qids['qid'];
$sql="replace INTO options (`qid`, `A`, `B`, `C`, `D`) VALUES ('$qid', '$opt_a', '$opt_b', '$opt_c', '$opt_d')";
runquery($sql,$link);
$json_arr =array('status'=>0, 'msg'=>'添加问题成功!');

echo json_encode($json_arr);
?>