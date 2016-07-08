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


// for local debug
//require_once 'func.php';
//require_once('config.php');

session_begin();
if (!isset($_SESSION['phone']) || !isset($_SESSION['pass'])) {
    //jump('info.html');
}
$phone = $_SESSION['phone'];

// 取得当天日期 (0 为星期天, 1 为星期一, 2 位星期2, 以此类推)
$qdate=(int)$_REQUEST["qdate"]; 
$date=date('Y-m-d');  //今天日期
$w=date('w',strtotime($date));  //计算今天星期几
$expectDate=date('Y-m-d',strtotime("$date -".($w ? $w - $qdate : ($w==0?0:$w-$qdate+7)).' days'));
$week=date('w',strtotime($expectDate)); 

/*
// 计算本周工作日日期
$weekdays=array();  //本周一至周五的日期
for($i=0;$i<7;$i++)
{
	$d=date('Y-m-d',strtotime("$date -".($w ? $w - $i : $w - $i+7).' days'));
	$weekdays[]=$d;
}


// 判断当天日期是否在答题时间范围内
if(!in_array($expectDate, $weekdays))
{
	echo "<br/>该日期不能答卷,请返回选择新的答卷, <a href='index.php'>返回首页</a><br/>";
}
else */
{
	$link = conn_db();
	$sql = "SELECT qid FROM question where que_date='".$expectDate."'";
	$ret=runquery($sql,$link);
	$qcount=mysql_num_rows($ret); 
	
	if($qcount==0)
	{
		//echo "<br/> 今天没有出题目哦,  <a href='index.php'>返回首页</a><br/>";
		//jump('noquestion.html');
	}
	else
	{
	
		// 显示今日答卷
		$weekarray=array("日","一","二","三","四","五","六");  
		$paper='星期'.$weekarray[$week].'答卷'; 
		// 判断今日答卷是否已经答完
		$query = "SELECT * FROM users WHERE phone='".$phone."' AND usr_passwd = '".$pass."'";
		$row=getaline($query,$link);
		$sql = "SELECT qid FROM answers where uid='".$row['uid']."' and que_date='".$expectDate."'";
		$ret=runquery($sql,$link);
		$acount=mysql_num_rows($ret); 
		if(0 != $acount)
		{
			//echo "<br/> 今日答卷已经完成,  <a href='index.php'>返回首页</a><br/>";
			//jump('answered.html');
		}
		else 
		{	
			// init
			$voteid = '1';
			$optdesc='';
			$qdesc = '';
			$optionid=0;
			$publish_url = '';
			$show_score = true;
			$subject=array();
			$optoinlist=array("A","B","C","D","E","F","G");
						
			// Get all today's questions subjects
			$qsql = "SELECT * FROM question where que_date='".$expectDate."'";// AND department='".$row['department']."'";
			$query = runquery($qsql,$link);

			while($qrow=mysql_fetch_array($query)){
				$qid=$qrow['qid'];
				$subjectid = strval($qid);
				$qtitle = $qrow['que_name'];
				

				// create the options for the question subject
				$optionarr = array();
				$osql="SELECT * FROM options where qid='$qid'limit 1";
				$oret=runquery($osql,$link);
				$orow=mysql_fetch_array($oret);
				$answer = strtoupper(trim($qrow['que_answer']));
				$ocount=0;				
				$optionid = 0;
				
				foreach($optoinlist as $column)
				{
			
					$optionid++;
					$opttitle=$orow[$column];
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
				}
			}

			// result
			$result = array();
			for ($i=0; $i < 4; $i++)
			{
				$conclusion = "你真棒, 继续加油哦!";  // set up the conclusion description here if needed.
				$range_end = '50';
				$range_start = '0';
				$summary = '你是最棒的,亲'; // set up the summary description here if needed.
				$resulttemp = array(
						'range_start'=>$range_start,
						'range_end'=>$range_end,
						'conclusion'=>$conclusion,
						'summary'=>$summary
						);						
				$result[$i] = $resulttemp;
			}
			
			// share
			$abstract="测测你能答多少分?登英雄榜赢大奖!"; // set up the abstract description here if needed.
			$title="答得不错哦!"; // set up the title description here if needed.
			$icon="";
			$share=array(
			'icon'	=>$icon,
			'title'	=>$title,
			'abstract'	=>$abstract
			);

			// weixin
			$weixin=array(
					"username"=>"jblh",
					"nickname"=>"答题达人"
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
			$index=array('name'=>'真棒');
			// next
			$next=array('title'=>'我不信！再测一次:)', 'url'=>'');
			
			// only create the question list if we have valid questions
			if(count($subject)>0) {
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
				'voteid'=>$voteid			
				);
			}
			else	
			{
				//echo "<br/> 今天没有出题目哦,qing   <a href='index.php'>返回首页</a><br/>";
				//jump('noquestion.html');
			}
			//echo json_encode($page_config);
		}	
	}
}
?>