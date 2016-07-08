<?php 

	echo $showtime=date("Y-m-d");
	
	echo 'Get the timezone to :' . date_default_timezone_get() . "<br />";
	date_default_timezone_set("Asia/Shanghai");
	echo 'Set the timezone to :' . date_default_timezone_get() . "<br />";

	echo $showtime=date("Y-m-d");
	$showtime=date("Y-m-d");
	//获取当前周的第几天 周日是 0 周一到周六是 1 - 6
	$w=date('w',strtotime($showtime)); 
	echo "<br>星期'$w' : '$showtime'（0是星期天）<br/>";
	//$date: 1 表示每周星期一为开始日期 0表示每周日为开始日期
	$date = 1;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days')); //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
	echo "星期1:'$que_Date'<br/>";
	
	$date = 2;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days'));
	echo "星期2:'$que_Date'<br/>";
	
	$date = 3;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days'));
	echo "星期3:'$que_Date'<br/>";
	
	$date = 4;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days'));
	echo "星期4:'$que_Date'<br/>";
	
	$date = 5;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days'));
	echo "星期5:'$que_Date'<br/>";
	
	$date = 6;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days'));
	echo "星期6:'$que_Date'<br/>";
	
	$date = 7;
	$que_Date=date('Y-m-d',strtotime("$showtime -".($w ? $w - $date : 6).' days'));
	echo "星期7:'$que_Date'<br/>";
?>