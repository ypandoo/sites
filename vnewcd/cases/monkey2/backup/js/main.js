
LGlobal={};


var linkInfo = {
	/*'shuzhan'*/ 0 :'http://hkbookfair.hktdc.com/tc/index.aspx',
	/*'yiliao'*/  1 : 'http://www.hktdc.com/fair/hkmedicalfair-sc/%E9%A6%99%E6%B8%AF%E8%B4%B8%E5%8F%91%E5%B1%80%E9%A6%99%E6%B8%AF%E5%9B%BD%E9%99%85%E5%8C%BB%E7%96%97%E5%99%A8%E6%9D%90%E5%8F%8A%E7%94%A8%E5%93%81%E5%B1%95.html',
	/*'chuangye'*/2 : 'http://www.hktdc.com/fair/eday-sc/s/2271-General_Information/HKTDC-Entrepreneur-Day/fair-details.html', 
	/*'jiating'*/ 3 :'http://www.hktdc.com/fair/hkhousewarefair-sc/',
	/*'shuzhan'*/ 4 :'http://hkbookfair.hktdc.com/tc/index.aspx',
	/*'dengshi'*/ 5 :'http://www.hktdc.com/fair/hklightingfairse-sc/%E9%A6%99%E6%B8%AF%E8%B4%B8%E5%8F%91%E5%B1%80%E9%A6%99%E6%B8%AF%E5%9B%BD%E9%99%85%E6%98%A5%E5%AD%A3%E7%81%AF%E9%A5%B0%E5%B1%95.html',
	/*'meishi'*/  6 :'http://www.hktdc.com/fair/hkfoodexpo-tc/',
}

var gifts = ['手机流量红包','10元话费红包','20元话费红包','50元话费红包'];
//window.onload=function(){
//	init();
//}
var LastS = 15;
function init(){
	LGlobal.page1=new page1();
	LGlobal.page2=new page2();
	LGlobal.page3=new page3();
	LGlobal.page4=new page4();
	LGlobal.page5=new page5();
	LGlobal.page6=new page6();
	var loadPage=document.getElementsByClassName("loadPage")[0];
	var loadCom=document.getElementsByClassName("loadCom")[0];
	var loadBox=document.getElementsByClassName("loadBox")[0];
	loadBox.style.display="none";
	loadCom.style.display="block";
	setTimeout(function(){loadPage.parentNode.removeChild(loadPage);LGlobal.page1.show();},1500);
}

function page1(){
	var self=this;
	self.currentPage=document.getElementsByClassName("page1")[0];
	var but=document.getElementById("m_but1");
	var but2=document.getElementById("m_but2");
	var p1_fd=document.getElementsByClassName("page1_fd")[0];
	var close=document.getElementsByClassName("page1_close")[0];
	var img1=document.getElementsByClassName("page1_img1");
	var img2=document.getElementsByClassName("page1_img2");
	var line=document.getElementsByClassName("line1");
	but.addEventListener("touchstart",function(){
		                                 p1_fd.style.display="block";
										 but.className="but1";
										 se2=setTimeout(function(){LGlobal.page2.show(LGlobal.page1.currentPage);clearInterval(se);clearInterval(se1);},4000);
									  });
	close.addEventListener("touchstart",function(){LGlobal.page2.show(LGlobal.page1.currentPage);clearInterval(se);clearInterval(se1);clearInterval(se2);});
	but2.addEventListener("touchstart",function(){
		                                LGlobal.page2.show(LGlobal.page1.currentPage)
		                                									  });
	var n1=0,n2=0;
	var se,se1,se2;
	self.show=function(hdObj){
		if(hdObj){
			hdObj.style.display="none";
		}
		self.currentPage.style.display="block";
		/*se=setInterval(function(){
			                n1==0?n1=1:n1=0;
			                img1[0].style.display="none";
			                img1[1].style.display="none";
			                img1[n1].style.display="block";
			                img2[0].style.display="none";
			                img2[1].style.display="none";
			                img2[n1].style.display="block";
		               },350);*/
		var m=0;
		/*se1=setInterval(function(){
			               for(var i=0;i<line.length;i++){
							   line[i].style.display="none";
						   }
						   line[m].style.display="block";
						   ++m>=3?m=0:true;
		                },200);*/
		//se2=setTimeout(function(){LGlobal.page2.show(LGlobal.page1.currentPage);clearInterval(se);clearInterval(se1);},3000);
	}
	self.hidden=function(){
		self.currentPage.style.display="none";
	}
}

function page2(){
	var self=this;
	self.currentPage=document.getElementsByClassName("page2")[0];
	var bg=document.getElementsByClassName("page2_bg")[0];
	var time=document.getElementsByClassName("time")[0];
	var ren=document.getElementsByClassName("page2_ren")[0];
	var door=document.getElementsByClassName("door");
	var feng=document.getElementsByClassName("feng");
	var texts=document.getElementsByClassName("text1");
	var text_l=[0.01,0.03,0.01,-0.09];
	var currentS=15;///倒计时
	var se,se1,se2;
	var angleB=0,angleG=0;
	var w=window.innerWidth;
	var h=window.innerHeight;
	var moveRange={x:{min:w*0.15,max:w*0.72},y:{min:h*0.09,max:h*0.8}};///移动范围
	var mk=[0.252,0.46,0.7,0.275,0.426,0.375];///门位置
	var current;////临时移动距离
	var num=10;
	var f={left:moveRange.x.min+(moveRange.x.max-moveRange.x.min)*0.2,right:moveRange.x.max-(moveRange.x.max-moveRange.x.min)*0.2,
		   top:moveRange.y.min+(moveRange.y.max-moveRange.y.min)*0.13,bottom:moveRange.y.max-(moveRange.y.max-moveRange.y.min)*0.13};
	var doorOpen;/////打开的门
	var playS=false;
//	var obstacle=[{left:0.265,top:0.176}]
	self.show=function(hdObj){
		if(hdObj){
			hdObj.style.display="none";
		}
		self.currentPage.style.display="block";
		gameStart();
		LSound.loadingSound.pause();
		//if(!playS){
			LSound.bgSound.play(1);
			//playS=true;
		//}else{
			//LSound.bgSound.pause();
			//setTimeout(function(){LSound.bgSound.play(1);},50);
		//}
		
	}
	self.hidden=function(){
		self.currentPage.style.display="none";
	}
	function gameStart(){
		se=setInterval(setTime,1000);////计时
		//showText();
		openDoor();
		window.ondeviceorientation=function(e){
			angleB=e.beta;
			angleG=e.gamma;
			if(e.beta>90){//////绕X轴旋转（-180-180）
				 angleB=90;
			}else if(e.beta<-90){
				angleB=-90;
			}
			if(e.gamma>90){//////绕Y轴旋转（-90-90）
				angleG=90;
			}else if(angleG<-90){
				angleG=-90;
			}
			var guafeng=false;
			//if(doorOpen<3){
				//guafeng=Math.floor(Math.random()*11)<6?true:false;/////是否刮风
			//}else{
				//guafeng=Math.floor(Math.random()*11)<3?true:false;/////是否刮风
			//}
			
			current=ren.offsetLeft+angleG*0.35;
//			if(current<f.left&&guafeng){////////////////////////////////刮风
//				current+=2+Math.floor(Math.random()*10);
//				showWind(doorOpen);/////显示风
//			}
//			if(current>f.right&&guafeng){
//				current-=2+Math.floor(Math.random()*10);
//				showWind(doorOpen);/////显示风
//			}
			if(current<moveRange.x.min){//////////判断是否到达边界
				current=moveRange.x.min;
			}else if(current>moveRange.x.max){
				current=moveRange.x.max;
			}
			ren.style.left=current+"px";
			current=ren.offsetTop+angleB*0.35;
//			if(current<f.top&&guafeng){
//				current+=2+Math.floor(Math.random()*10);
//				showWind(doorOpen);/////显示风
//			}
//			if(current>f.bottom&&guafeng){
//				current-=2+Math.floor(Math.random()*10);
//				showWind(doorOpen);/////显示风
//			}
			if(current<moveRange.y.min){//////////判断是否到达边界
				current=moveRange.y.min;
			}else if(current>moveRange.y.max){
				current=moveRange.y.max;
			}
			ren.style.top=current+"px";
			//isWind(guafeng)///////////////////////刮风
			gameComplete();/////////////////逃出去判断
		}
	}
	/////////刮风
	function isWind(g){
		var tempLeft=0,tempTop=0;
		if(ren.style.left.split("px")[0]*1<f.left&&g&&(ren.style.top.split("px")[0]*1-mk[doorOpen]*h<=0.01*h&&ren.style.top.split("px")[0]*1-mk[doorOpen]*h>=0&&doorOpen==0)){
			tempLeft+=45+Math.floor(Math.random()*60);
			showWind(doorOpen);/////显示风
		}
		if(ren.style.left.split("px")[0]*1<f.left&&g&&(ren.style.top.split("px")[0]*1-mk[doorOpen]*h<=0.0248*h&&ren.style.top.split("px")[0]*1-mk[doorOpen]*h>=0&&doorOpen==1)){
			tempLeft+=45+Math.floor(Math.random()*60);
			showWind(doorOpen);/////显示风
		}
		if(ren.style.left.split("px")[0]*1<f.left&&g&&(ren.style.top.split("px")[0]*1-mk[doorOpen]*h<=0.0119*h&&ren.style.top.split("px")[0]*1-mk[doorOpen]*h>=0&&doorOpen==2)){
			tempLeft+=45+Math.floor(Math.random()*60);
			showWind(doorOpen);/////显示风
		}
		if(ren.style.left.split("px")[0]*1>f.right&&g&&(ren.style.top.split("px")[0]*1-mk[doorOpen]*h<=0.0664*h&&ren.style.top.split("px")[0]*1-mk[doorOpen]*h>=0&&doorOpen==4)){
			tempLeft-=45+Math.floor(Math.random()*60);
			showWind(doorOpen);/////显示风
		}
		if(ren.style.top.split("px")[0]*1>f.bottom&&g&&(ren.style.left.split("px")[0]*1-mk[doorOpen]*w<=0.02*w&&ren.style.left.split("px")[0]*1-mk[doorOpen]*w>=0&&doorOpen==3)){
			tempTop-=45+Math.floor(Math.random()*60);
			showWind(doorOpen);/////显示风
		}
		if(ren.style.top.split("px")[0]*1<f.top&&g&&(ren.style.left.split("px")[0]*1-mk[doorOpen]*w<=0.067*w&&ren.style.left.split("px")[0]*1-mk[doorOpen]*w>=0&&doorOpen==5)){
			tempTop+=45+Math.floor(Math.random()*60);
			showWind(doorOpen);/////显示风
		}
		ren.style.left=ren.offsetLeft+tempLeft+"px";
		ren.style.top=ren.offsetTop+tempTop+"px";
	}
	/////显示风
	function showWind(n){
		for(var i=0;i<feng.length;i++){
			feng[i].style.display="none";
		}
		feng[n].style.display="block";
		setTimeout(function(){feng[n].style.display="none";},1000);
	}
	/////判断人能否逃出
	function gameComplete(){
		if(Math.abs(ren.offsetLeft-moveRange.x.min)<=3&&doorOpen<=2){
			if(((ren.offsetTop-mk[doorOpen]*h<=0.01*h&&doorOpen==0)||(ren.offsetTop-mk[doorOpen]*h<=0.0248*h&&doorOpen==1)||(ren.offsetTop-mk[doorOpen]*h<=0.0119*h&&doorOpen==2))&&ren.offsetTop-mk[doorOpen]*h>=0){
				gameVictory("ani_tran_7");
			}
		}
		if(Math.abs(ren.offsetLeft-moveRange.x.max)<=3&&doorOpen==4&&ren.offsetTop-mk[doorOpen]*h<=0.0664*h&&ren.offsetTop-mk[doorOpen]*h>=0){
			gameVictory("ani_tran_8");
		}
		if(Math.abs(ren.offsetTop-moveRange.y.min)<=3&&doorOpen==5&&ren.offsetLeft-mk[doorOpen]*w<=0.067*w&&ren.offsetLeft-mk[doorOpen]*w>=0){
			gameVictory("ani_tran_10");
		}
		if(Math.abs(ren.offsetTop-moveRange.y.max)<=3&&doorOpen==3&&ren.offsetLeft-mk[doorOpen]*w<=0.02*w&&ren.offsetLeft-mk[doorOpen]*w>=0){
			gameVictory("ani_tran_9");
		}
		
	}
	/////逃出跳到page4
	function gameVictory(cc){
		ren.className+=" "+cc;
		window.ondeviceorientation=null;
		clearInterval(se);
		clearTimeout(se1);
		clearTimeout(se2);
		LSound.bgSound.pause();
		LastS = currentS;
		setTimeout(function(){LGlobal.page4.show(LGlobal.page2.currentPage)},1500);
	}
	
	function showText(){
		var s=Math.floor(2+Math.random()*4)*1000;
		se1=setTimeout(display,s);
		function display(){
			for(var i=0;i<texts.length;i++){
				texts[i].style.display="none";
			}
			var n=Math.floor(Math.random()*texts.length);
			texts[n].style.display="block";
			//if(n==0||n==3){
				//texts[n].style.left=Math.floor(17+Math.random()*13)+"%";
			//}else{
				//texts[n].style.left=Math.floor(17+Math.random()*41)+"%";
			//}
			//texts[n].style.top=Math.floor(32+Math.random()*42)+"%";
			s=Math.floor(2+Math.random()*4)*1000;
			se1=setTimeout(display,s);
			setTimeout(function(){texts[n].style.display="none";},1800);
		}
	}
	
	function setTime(){////////倒计时
		currentS--;
		if(currentS<=0){////////时间到
			clearInterval(se);
			clearTimeout(se1);
			clearTimeout(se2);
			window.ondeviceorientation=null;
			time.innerHTML="0";
			LSound.bgSound.pause();
			LGlobal.page3.show(self.currentPage);
		}else{
			if(currentS<10){
				time.innerHTML=""+currentS+"S";
			}else{
				time.innerHTML=""+currentS+"S";
			}
				//time.innerHTML="0:02";
		}
	}
	
	self.restart=function(){
		ren.className="page2_ren";
		ren.style.left="36%";
		ren.style.top="42%";
		ren.style.opacity=1;
		currentS=15;
		angleB=0;
		angleG=0;
		time.innerHTML="15";
		for(var i=0;i<door.length;i++){
			door[i].style.display="none";
		}
		for(var i=0;i<texts.length;i++){
			texts[i].style.display="none";
		}
		self.show();
	}
	function openDoor(){///////随机打开门
		var s=300;
		var n;
		se2=setTimeout(open,s);
		function open(){
			do
			{
				n=Math.floor(Math.random()*door.length);
			}while(doorOpen==n)

			if (n == 1)
			  n=3;
			if (n == 2) 
			  n=4;

			doorOpen=n;
			for(var i=0;i<door.length;i++){
				door[i].style.display="none";
			}
			door[n].style.display="block";
			s=Math.floor(1+Math.random()*2)*1000;
			se2=setTimeout(open,s);
			/*for(var i=0;i<feng.length;i++){
				feng[i].style.display="none";
			}*/
		}
	}
}

//////逃不出来调用
function page3(){
	var self=this;
	self.currentPage=document.getElementsByClassName("page3")[0];
	var but2=document.getElementsByClassName("but2")[0];//////点击进入page5
	var but3=document.getElementsByClassName("but3")[0];//////点击进入page6
	var line=document.getElementsByClassName("line2");
	but2.addEventListener("touchstart",function()
	{
		/*LGlobal.page5.show();
		but2.className="but2";
		but3.className="but3";
		clearInterval(se)*/
		window.location.reload();
	});
	but3.addEventListener("touchstart",function()
	{
		LGlobal.page6.show();
		but2.className="but2";
		but3.className="but3";
		clearInterval(se)
	});
	var se;
	self.show=function(hdObj){
		if(hdObj){
			hdObj.style.display="none";
		}
		window.title= '帮大圣逃出天宫，就能赢取猴年话费红包哦！不信你也来试试？';
		self.currentPage.style.display="block";
		but2.className="but2 ani_tran_4";
		but3.className="but3 ani_tran_4";
		var m=0;
		se=setInterval(function(){
			               for(var i=0;i<line.length;i++){
							   line[i].style.display="none";
						   }
						   line[m].style.display="block";
						   ++m>=3?m=0:true;
		                },200);
		//LSound.loadingSound.play(1);
	}
	self.hidden=function(){
		self.currentPage.style.display="none";
	}
	self.setBut=function(){
		but2.className="but2 ani_tran_4";
		but3.className="but3 ani_tran_4";
	}
}


function Percent(LastS)
{
	var Percent = 0;
	if (LastS >= 14) 
	{
		Percent = '99.'+randomRange(0,9);
	}
	else if (LastS >= 13) 
	{
		Percent = '96.'+randomRange(0,9);
	}
	else if (LastS >= 12) 
	{
		Percent = '92.'+randomRange(0,9);
	}
	else if (LastS >= 11) 
	{
		Percent = '88.'+randomRange(0,9);
	}
	else if (LastS >= 10) 
	{
		Percent = '77.'+randomRange(0,9);
	}
	else if (LastS >= 8) 
	{
		Percent = '50.'+randomRange(0,9);
	}
	else if (LastS >= 5) 
	{
		Percent = '40.'+randomRange(0,9);
	}
	else if (LastS >= 4) 
	{
		Percent = '20.'+randomRange(0,9);
	}
	else if (LastS >= 1) 
	{
		Percent = '1.'+randomRange(0,9);
	}

	return Percent;
}
//////逃出来调用
function page4(){
	var self=this;
	self.currentPage=document.getElementsByClassName("page4")[0];
	var but471=document.getElementsByClassName("m_but471")[0];
	var but472=document.getElementsByClassName("m_but472")[0];
	var but49=document.getElementsByClassName("m_but49")[0];
	//var line=document.getElementsByClassName("line3");
	but471.addEventListener("touchstart",function()
		{
			window.location.reload();
			//LGlobal.page2.restart();
			//LGlobal.page5.hidden();
			//LGlobal.page3.hidden();
			//LGlobal.page4.hidden();
			//clearInterval(se);
		});
	but472.addEventListener("touchstart",function()
		{
			LGlobal.page6.show();
			//LGlobal.page2.restart();
			//LGlobal.page5.hidden();
			//LGlobal.page3.hidden();
			//LGlobal.page4.hidden();
			//clearInterval(se);
		});
	but49.addEventListener("touchstart",function()
		{
			submitInfo();
		});
	var se;
	self.show=function(hdObj){
		if(hdObj){
			hdObj.style.display="none";
		}
		self.currentPage.style.display="block";
		var luckyNum = randomRange(6,7);
		if (luckyNum <= 6) 
		{
			luckyNum = randomRange(0,6);
			document.getElementById("0").style.display="block";
			document.getElementById("p40link").href = linkInfo[luckyNum];
			document.getElementById("p40image").src = "images/p4"+luckyNum+".png";
			document.getElementById("p40Sec").innerHTML = (15-parseInt(LastS))+"S";
			document.title = '我只用了'+(15-parseInt(LastS))+'秒就帮助大圣逃出天宫，超过了'+Percent(LastS)+'%的小帮手，试试你能有多快？';
		}
		else if (luckyNum == 7) 
		{
			document.getElementById("1").style.display="block";
			var p = Percent(LastS);
			document.getElementById("p47Percent").innerHTML =p+"%";
			//document.getElementById("p47link").href = "http://www.baidu.com/";

			document.getElementById("p47Sec").innerHTML = (15-parseInt(LastS))+"S";
			//我只用了10s中就帮助大圣逃出天宫，超过了90%的小帮手，还赢得了XX元话费，试试你能有多快？
			document.title = '我只用了'+(15-parseInt(LastS))+'秒就帮助大圣逃出天宫，超过了'+p+'%的小帮手，试试你能有多快？';
		};

		/*var m=0;
		se=setInterval(function(){
			               for(var i=0;i<line.length;i++){
							   line[i].style.display="none";
						   }
						   line[m].style.display="block";
						   ++m>=3?m=0:true;
		                },200);
		LSound.loadingSound.play(1);*/
	}
	self.hidden=function(){
		self.currentPage.style.display="none";
	}
}

var gift;
function luckyDraw()
{
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="block";
	gift = gifts[randomRange(0, 2)];
	document.getElementById("p48Gift").innerHTML = gift; 
	//我只用了10s中就帮助大圣逃出天宫，超过了90%的小帮手，还赢得了XX元话费，试试你能有多快？
	document.title = '我只用了'+ (15-parseInt(LastS))+'秒就帮助大圣逃出天宫，超过了'+Percent(LastS)+'%的小帮手，还赢得了'+gift+',试试你能有多快？';
}

function submitInfo()
{
	//
	var phone = document.getElementById("phone").value;
	var name = document.getElementById("name").value;
	var telecom = document.getElementById("telecom").value;
	if(!phone || phone.length <= 0){
		alert("手机号不能为空！");
		return false;
	}else if(!name || name.length <= 0){
		alert("微信昵称不能为空！");
		return false;
	}

	$.ajax({
		type:'post',//可选get
		url:'save_words.php',
		dataType:'Json',//服务器返回的数据类型 可选XML ,Json jsonp script html text等
		data:{
			phone: phone,
			name: name,
			gift: gift,
			telecom: telecom
		},
		success:function(msg){
			if(msg.status == '1'){
				document.getElementById("2").style.display="none";
				document.getElementById("3").style.display="block";
				document.getElementById("p49Gift").innerHTML = gift; 
			}else{
				alert('您提交的手机号已经中过奖了！请重新提交新号码！');
			}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert('提交失败:'+XMLHttpRequest.responseText);
		}
	});
}



/////下载拿奖
function page5(){
	var self=this;
	self.currentPage=document.getElementsByClassName("page5")[0];
	var but5=document.getElementsByClassName("but5")[0];
	var but6=document.getElementsByClassName("but6")[0];
	//but5.addEventListener("touchstart",function(){LGlobal.page2.restart();LGlobal.page5.hidden();LGlobal.page3.hidden();LGlobal.page4.hidden()});
	//but6.addEventListener("touchstart",download);
	self.show=function(hdObj){
		if(hdObj){
			hdObj.style.display="none";
		}
		self.currentPage.style.display="block";
	}
	self.hidden=function(){
		self.currentPage.style.display="none";
	}
}
/////分享页
function page6(){
	var self=this;
	self.currentPage=document.getElementsByClassName("page6")[0];
	var ren1=document.getElementsByClassName("page6_ren1")[0];
	var ren2=document.getElementsByClassName("page6_ren2")[0];
	self.currentPage.style.display="block";
	var se,se1;
	self.currentPage.addEventListener("touchstart",function(){LGlobal.page6.hidden()});
	self.show=function(hdObj){
		if(hdObj){
			hdObj.style.display="none";
		}
		setTranCss(self.currentPage,{transform:"translate(0,0)"});
		ren2.className="page6_ren2";
		ren1.className="page6_ren1 none";
		se=setTimeout(function(){ren2.className="page6_ren2 ani_tran_5"},800);
		se1=setTimeout(function(){ren2.className="page6_ren2 none";ren1.className="page6_ren1"},1400);
	}
	self.hidden=function(){
		setTranCss(self.currentPage,{transform:"translate(0,-100%)"});
		clearTimeout(se);
		clearTimeout(se1);
		ren2.className="page6_ren2";
		ren1.className="page6_ren1 none";
		setTimeout(function(){LGlobal.page3.setBut()},300);
	}
}

function setTranCss(o,ss){
    var s=ss;
    var obj=o;
    if(s.time!=0){
    	s.time=s.time||0.8;
    }
    if(s.time<=0){
    	obj.style.transition=null;
    	obj.style.webkitTransition=null;
    }else{
    	obj.style.transition="all "+s.time+"s";
    	obj.style.webkitTransition="all "+s.time+"s";
    }
    if(s.transform){
        obj.style.transform=s.transform;
        obj.style.webkitTransform=s.transform;
    }
}


