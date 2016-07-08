<?
$phone = $_REQUEST['phone'];
$type = $_REQUEST['type'];

//$phone = '6666';
//$type = 'fastquestion';

$date =date("Y-m-d");

$mysql = new SaeMysql();

//query access exist if not insert
$sql = "select `times` from `access` where `phone` = '".$phone."' and `type` = '".$type."' and `date` = '".$date."'";
$result = $mysql->getVar($sql);
//print_r($sql.$result);
if($result && $result >= 3)
{
	 $arr = array('full'=>'1','times'=>$result);
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
}

 $arr = array('full'=>'0','times'=>$result);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;

?>