<?php

//Get request
$phone  = $_REQUEST['phone'];
$qdate  = $_REQUEST['date'];// qdate (0 为星期天, 1 为星期一, 2 位星期2, 以此类推，8为今日)

/* $phone  = '6666';
$qdate  = 8; */

// 取得当天日期
$expectDate = date('Y-m-d');
if ($qdate != 8) // 通过qdate， 取得日期。
{
	$date=date('Y-m-d');  //今天日期
	$w=date('w',strtotime($date));  //计算今天星期几(0 为星期天, 1 为星期一, 2 位星期2, 以此类推）
	if($w != 0)
	{
		$expectDate=date('Y-m-d',strtotime("$date -".($w ? $w - $qdate : ($w==0?0:$w-$qdate+7)).' days'));
	}
	else
	{
		$expectDate=date('Y-m-d',strtotime("$date -".(7 - $qdate).' days'));
	}
	$week=date('w',strtotime($expectDate)); 
}

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


	$mysql = new SaeMysql();
	$sql = "SELECT COUNT(*) FROM question where que_date='".$expectDate."'";
	$count =$mysql->getVar ($sql);
	if($count && $count < 1)//No question
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
		'voteid'=> 	1000	
		);
		echo json_encode($page_config);
	}
	
 	else
	{
	
		// 显示今日答卷
		$weekarray=array("日","一","二","三","四","五","六");  
		$paper='星期'.$weekarray[$week].'答卷'; 
		
		// 判断今日答卷是否已经答完
		$sql = "SELECT * FROM users WHERE phone='".$phone."'";
		$row = $mysql->getData($sql);
		
		$sql = "SELECT COUNT(*) FROM answers where uid='".$row[0]['uid']."' and que_date='".$expectDate."'";
		$count =$mysql->getVar ($sql);
		
		if(0 != $count)//Already answered
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
			echo json_encode($page_config);
		}
 		else //Get questions
		{	
			
			$voteid = '1';
			$optdesc='';
			$qdesc = '';
			$optionid=0;
			$publish_url = '';
			$show_score = true;
			$subject=array();
			$optoinlist=array("A","B","C","D","E","F","G");
						
			// Get all today's questions subjects
			$qsql = "SELECT * FROM question where que_date='".$expectDate."'AND department='".$row[0]['department']."'";
			//print_r($qsql);
			$query =$mysql->getData($qsql);

			foreach( $query as $qrow )
			{
				$qid=$qrow['qid'];
				$subjectid = strval($qid);
				$qtitle = $qrow['que_name'];
				
					
				// create the options for the question subject
				$optionarr = array();
				$osql="SELECT * FROM options where qid='".$qid."'";
				$orow =$mysql->getData($osql);
				
				$answer = strtoupper(trim($qrow['que_answer']));
				$ocount=0;				
				$optionid = 0;
				
				//echo 'row-'.$qid.$subjectid.$qtitle.$answer.'-row';
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
				'voteid'=> 	1003		
				);
				echo json_encode($page_config);
			} 
	}
}	
?>