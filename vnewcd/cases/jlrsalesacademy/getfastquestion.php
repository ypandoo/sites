<?php
//Get request
$phone  = $_REQUEST['phone'];
//$phone = '6666';

//initial 	
$mysql = new SaeMysql();

$sql = "SELECT * FROM users where phone ='".$phone."'";
$result = $mysql->getData($sql);
if(!$result)
{
	$page_config = array(
	'subject'=>$subject,
	'result'=>$result,
	'show_score'=>$showscore,
	'share'=>$share,
	'weixin'=>$weixin,
	'style'=>$style,
	'index'=>$index,
	'next'=>$next,
	'publish_url'=>$publish_url,
	'voteid'=> 	1000	
	);
	echo json_encode($page_config);
	$mysql->closeDB();
	exit;
} 

//
$department = $result[0]['department'];
$sql = "SELECT COUNT(*) FROM `fastquestion` where department ='".$department."'";
$count =$mysql->getVar ($sql);
if($count && $count < 30)//Not enough questions
{
	$page_config = array(
	'subject'=>$subject,
	'result'=>$result,
	'show_score'=>$show_score,
	'share'=>$share,
	'weixin'=>$weixin,
	'style'=>$style,
	'index'=>$index,
	'next'=>$next,
	'publish_url'=>$publish_url,
	'voteid'=> 	1001	
	);
	$mysql->closeDB();
	echo json_encode($page_config);
	exit;
}

//get 10 questions
$randoffset = rand(0, $count-32);
//$randoffset = 139;
$sql =  "SELECT * FROM `fastquestion` where `department`='".$department."' LIMIT ".$randoffset.", 30";
$result =$mysql->getData($sql); 
$publish_url = "count:".$count."randoffset".$randoffset."sql".$sql;
if(!$result)
{
	$page_config = array(
	'subject'=>$subject,
	'result'=>$result,
	'show_score'=>$show_score,
	'share'=>$share,
	'weixin'=>$weixin,
	'style'=>$style,
	'index'=>$index,
	'next'=>$next,
	'publish_url'=>$publish_url,
	'voteid'=> 1006	
	);
	$mysql->closeDB();
	echo json_encode($page_config);
	exit;
}

$optoinlist=array("A","B","C","D","E","F","G");
$subject=array();
foreach( $result as $qrow )
{
	$qid=$qrow['qid'];
	$subjectid = strval($qid);
	$qtitle = $qrow['que_name'];
		
	// create the options for the question subject
 	$optionarr = array();
	$sql = "select * from `fastoptions` where `qid` = '".$qid."'";
	$orow = $mysql->getData($sql);
	//print_r("sql".$sql);
	//print_r($orow);
	
 	$answer = strtoupper(trim($qrow['que_answer']));
	$ocount=0;				
	$optionid = 0;
	
	//print_r("qid".$qid."qtitle".$qtitle."answer".$answer);
	
	//option list A B C D..
	foreach($optoinlist as $column)
	{
		$optionid++;
		$opttitle=$orow[0][$column];
		$score='0';
		if($answer==$column)
		{
			$score=strval($qrow['que_score']);
		}
	    	
		// 	create a option if exist the title
		if(!empty($opttitle))
		{
			$option=array(
					'voteid'=>$voteid,
					'subjectid'=>$subjectid,
					'optionid'=>strval($optionid),
					'title'=>$opttitle,
					'score'=>$score,
					'desc'=>$optdesc
					);
			$optionarr[] = $option;
			//print_r($option);	
			$ocount++;
		}
	}		
	
	// create subject if the question has valid options - at least one option
	if(count($optionarr)>0) {
		// echo 'creating question '.$qtitle;
		$subjectItem=array(
			'voteid'=>$voteid,
			'subjectid'=>$subjectid,
			'title'=>$qtitle,
			'desc'=>$qdesc,
			'answer'=>$answer,
			'option'=>$optionarr					
		);
		$subject[]=$subjectItem;	
        //print_r($subjectItem);			
	} 
}

$voteid = '1';
$optdesc='';
$qdesc = '';
$optionid=0;
$show_score = true;
			
// result
$result = array();
for ($i=0; $i < 4; $i++)
{
	$conclusion = "";  // set up the conclusion description here if needed.
	$range_end = '';
	$range_start = '';
	$summary = ''; // set up the summary description here if needed.
	$resulttemp = array(
			'range_start'=>$range_start,
			'range_end'=>$range_end,
			'conclusion'=>$conclusion,
			'summary'=>$summary
			);						
	$result[$i] = $resulttemp;
}

// share
$abstract=""; // set up the abstract description here if needed.
$title=""; // set up the title description here if needed.
$icon="";
$share=array(
'icon'	=>$icon,
'title'	=>$title,
'abstract'	=>$abstract
);

// weixin
$weixin=array(
		"username"=>"",
		"nickname"=>""
	  );

// style
$style=array (
	"color"=>"#37b9a1",
	"cover"=>"./images/0.jpg",
	"banner"=>"",
	"color_action"=>"#108872",
	"color_result"=>"#E84C36"
  );

// index
$index=array('name'=>'');
// next
$next=array('title'=>'', 'url'=>'');

// only create the question list if we have valid questions
if(count($subject)>0)
{
	//echo 'creatting config';
	$page_config = array(
	'subject'=>$subject,
	'result'=>$result,
	'show_score'=>$show_score,
	'share'=>$share,
	'weixin'=>$weixin,
	'style'=>$style,
	'index'=>$index,
	'next'=>$next,
	'publish_url'=>$publish_url,
	'voteid'=>'1'			
	);
	
	echo json_encode($page_config);
}
else	
{
	
	$page_config = array(
	'subject'=>$subject,
	'result'=>$result,
	'show_score'=>$show_score,
	'share'=>$share,
	'weixin'=>$weixin,
	'style'=>$style,
	'index'=>$index,
	'next'=>$next,
	'publish_url'=>$publish_url,
	'voteid'=> 	1002		
	);
	echo json_encode($page_config);
}  

?>