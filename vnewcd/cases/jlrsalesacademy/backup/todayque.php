<?php

$date=date('Y-m-d');  //当前日期
$w=date('w',strtotime($date));  //计算今天星期几
header("location:showque.php?qdate=".$w);

?>