<?php

	/**********************************************************************
	*  ezSQL initialisation for mySQL
	*/
  header('Content-Type: text/html; charset=utf-8');
	// Include ezSQL core
	include_once "ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "ez_sql_mysql.php";

	$tel =  $_POST['tel'];
  // $name =iconv("UTF-8","GB2312",$_POST['name']);
	$name = $_POST['name'];
	$sex =  $_POST['sex'];
	$level = $_POST['level'];
	$wechat =  $_POST['wechat'];

	if ($tel == '' || $name == '' || $sex == '' || $level == '' || $wechat == '' ) {
		$data_result["success"] = 0;
		$data_result["errorCode"] = 1;
		$data_result['message'] = "数据错误";
		$data_result['data'] = 0;
		echo json_encode($data_result);
		exit;
	}
	// Initialise database object and establish a connection
	// at the same time - db_user / db_password / db_name / db_host
	// 'hostname' => 'qdm121114323.my3w.com:3306',
  // 'username' => 'qdm121114323',
  // 'password' => 'lei000lei',
  // 'database' => 'qdm121114323_db',
	$db = new ezSQL_mysql('qdm121114323', 'lei000lei','qdm121114323_db','qdm121114323.my3w.com:3306', 'utf-8');

	$count = $db->get_var("SELECT count(*) FROM `T_MSL_HKDC` WHERE `TEL` = '$tel'");

	if ($count >= 1) {
		$data_result["success"] = 0;
		$data_result["errorCode"] = 2;
		$data_result['message'] = "该手机号已经领过奖品啦！把机会让给其他小伙伴吧！".$tel.$count;
		$data_result['data'] = 0;
		echo json_encode($data_result);
		exit;
	}

	$count_level1 = $db->get_var("SELECT count(*) FROM `T_MSL_HKDC` WHERE `LEVEL` = '1'");
	$count_level2 = $db->get_var("SELECT count(*) FROM `T_MSL_HKDC` WHERE `LEVEL` = '2'");
	$count_level3 = $db->get_var("SELECT count(*) FROM `T_MSL_HKDC` WHERE `LEVEL` = '3'");

	if ($level == 1 && $count_level1 >= 3) {
		$data_result["success"] = 0;
		$data_result["errorCode"] = 3;
		$data_result['message'] = "今天的书迷证已经抢光啦！再玩一次说不定会抢到其他礼品哦！";
		$data_result['data'] = 0;
		echo json_encode($data_result);
		exit;
	}

	if ($level == 2 && $count_level2 >= 10) {
		$data_result["success"] = 0;
		$data_result["errorCode"] = 3;
		$data_result['message'] = "今天的书展VIP门票已经抢光啦！再玩一次说不定会抢到其他礼品哦！";
		$data_result['data'] = 0;
		echo json_encode($data_result);
		exit;
	}

	if ($level == 3 && $count_level3 >= 30) {
		$data_result["success"] = 0;
		$data_result["errorCode"] = 3;
		$data_result['message'] = "今天的书展门票已经抢光啦！再玩一次说不定会抢到其他礼品哦！";
		$data_result['data'] = 0;
		echo json_encode($data_result);
		exit;
	}


	$db->query("INSERT INTO `T_MSL_HKDC`(`TEL`, `NAME`, `WECHAT`, `SEX`, `LEVEL`) VALUES ('$tel', '$name','$wechat', '$sex', '$level')");

	$data_result["success"] = 1;
	$data_result["errorCode"] = 0;
	$data_result['message'] = "您已成功领取奖品!";
	$data_result['data'] = 0;

	echo json_encode($data_result);
	exit;

	/**********************************************************************
	*  ezSQL demo for mySQL database
	*/

	// Demo of getting a single variable from the db
	// (and using abstracted function sysdate)
	// $current_time = $db->get_var("SELECT " . $db->sysdate());
	// print "ezSQL demo for mySQL database run @ $current_time";
	//
	// // Print out last query and results..
	// $db->debug();
	//
	// // Get list of tables from current database..
	// $my_tables = $db->get_results("SHOW TABLES",ARRAY_N);
	//
	// // Print out last query and results..
	// $db->debug();
	//
	// // Loop through each row of results..
	// foreach ( $my_tables as $table )
	// {
	// 	// Get results of DESC table..
	// 	$db->get_results("DESC $table[0]");
	//
	// 	// Print out last query and results..
	// 	$db->debug();
	// }

?>
