<?php
	/**********************************************************************
	*  ezSQL initialisation for mySQL
	*/

	// Include ezSQL core
	include_once "ez_sql_core.php";

	// Include ezSQL database specific component
	include_once "ez_sql_mysql.php";

	// Initialise database object and establish a connection
	// at the same time - db_user / db_password / db_name / db_host
	// 'hostname' => 'qdm121114323.my3w.com:3306',
  // 'username' => 'qdm121114323',
  // 'password' => 'lei000lei',
  // 'database' => 'qdm121114323_db',
	$db = new ezSQL_mysql('qdm121114323', 'lei000lei','qdm121114323_db','qdm121114323.my3w.com:3306','utf-8');

 	$results = $db->get_results("SELECT * FROM `T_MSL_HKDC` ORDER BY LEVEL ASC");

	$data_result["success"] = 1;
	$data_result["errorCode"] = 0;
	$data_result['message'] = "成功获取列表!";
	$data_result['data'] = $results;

  echo json_encode($data_result);

	//echo json_encode($data_result);
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
