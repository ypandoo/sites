var w=document.body.clientWidth;
var h=document.body.clientHeight;
$("#viewport").css("height",h);

var canvas,context,src,first,opacity,teach=1;
var bgcanvas,bgcontext;
var startX,startY,endX,endY;
var img,roleImg,resultImg1,imgh,//图片对象;
	//拖动距离
    imgX=w/2,
	imgY=h/2,
    imgScale=1,//图片缩放比例
	radian=0,//旋转角度	
	turnLeft=document.getElementById('Left'),
	turnRight=document.getElementById('Right'),
	changeLarge=document.getElementById('Max'),
	changeSmall=document.getElementById('Min'),
	reSelect=document.getElementById('ReSelect'),
	Complete=document.getElementById('Complete');
	
img = new Image();  
roleImg=new Image();
btnUnClick();
$(".btn").hide();
$("#page1").find(".btn").show();


$(document).on('click','#role a',function(event){
	var index=$("#role a").index(this);	
		switch (index){
			case 0: roleImg.src="images/5.png"; break;
			case 1: roleImg.src="images/4.png"; break;
			case 2: roleImg.src="images/6.png"; break;
			case 3: roleImg.src="images/7.png"; break;
			case 4: roleImg.src="images/8.png"; break;
			case 5: roleImg.src="images/9.png"; break;
			}
		if(roleImg.complete){	
           draw();
		   opacity=0.3;
		}else{
  		   roleImg.onload = function(){
     			draw();
				opacity=0.3;
   			};
   			roleImg.onerror = function(){
     		window.alert('选择失败，请重试');
   			};
		};
		if(teach==1){
			$("#teach").show();
			}
		$("#pages").animate({left:"-300%"},300);
		$(".btn").hide();
		$("#page4").find(".btn").show();
		
	})		
		
		$("#tip").click(function(){//跳到结果页
			$(this).hide();
			$("#pages").animate({left:"-400%"},300);
			$(".btn").hide();
			$("#page5").find(".btn").show();
			})
		$("#teach").click(function(){
			$(this).hide();
			teach=0;
			})
		
		
function getObjectURL(file) {
	var url = null ; 
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}
/*function handleFileSelect (evt) {
		var files = evt.target.files;
		for (var i = 0, f; f = files[i]; i++) { 
	      if (!f.type.match('image.*')) {
	        continue;
	      }
 
	      var reader = new FileReader();
	      reader.onload = (function(theFile) {
	        return function(e) {
	          console.log(e.target.result);
	          var i = img;
	          i.src = event.target.result;
	          console.log($(i).width());
	          console.log($(i).height());
	          $(i).css('width',$(i).width()+'px');
	          $(i).css('height',$(i).height()+'px');
	          console.log($(i).width());
	          console.log($(i).height());
	          var quality =  50;
	          i.src = jic.compress(i,quality).src;
	          console.log(i.src);
			  img.src=i.src;
			  alert(img.src);
	        };
	      })(f);

	      reader.readAsDataURL(f);
		  		  
		  if(img.complete){
		   imgX=w/2; 
		   imgY=h/2;
    	   imgScale=1;
		   radian=0;	
		   first=1;
           draw();
		   btnClick();
		   opacity=0.3;
		   
		}else{
  		   img.onload = function(){
			    var scale = img.width / img.height;
     			img.height=h;
     			img.width =img.height*scale;
			    imgX=w/2; 
		   		imgY=h/2;
    			imgScale=1;
				radian=0;
			    first=1;
     			draw();
				btnClick();
				opacity=0.3;
   			};
   			img.onerror = function(){
     		window.alert('上传失败，请重试');
			btnUnClick();
   			};
		};
	    }
	  }*/
$(".file").change(function(){
		var objUrl = getObjectURL(this.files[0]);	
		console.log("objUrl = "+objUrl) ;
		img.src = objUrl ;
		if(img.complete){
		   imgX=w/2; 
		   imgY=h/2;
    	   imgScale=1;
		   radian=0;	
		   first=1;
           draw();
		   btnClick();
		   opacity=0.3;
		   
		}else{
  		   img.onload = function(){
			   var scale = img.width / img.height;
     			img.height=h;
     			img.width =img.height*scale;
			    imgX=w/2; 
		   		imgY=h/2;
    			imgScale=1;
				radian=0;
			    first=1;
     			draw();
				btnClick();
				opacity=0.3;
   			};
   			img.onerror = function(){
     		window.alert('上传失败，请重试');
			btnUnClick();
   			};
		};
})

bindButtonEvent(changeLarge, "click",_changeLarge);
bindButtonEvent(changeSmall, "click",_changeSmall);
bindButtonEvent(turnLeft, "click",_turnLeft);
bindButtonEvent(turnRight, "click",_turnRight);
bindButtonEvent(Complete, "click",_Complete); 


document.getElementById('btn1').addEventListener("click",_Btn1,false);
document.getElementById('btn1-1').addEventListener("click",_Btn1_1,false);
document.getElementById('btn2').addEventListener("click",_Btn1,false);
document.getElementById('Back').addEventListener("click",_Btn1,false);

function _Btn1(){
	$("#pages").animate({left:"-200%"},250);
	$(".btn").hide();
	$("#page3").find(".btn").show();
	bgcanvas=document.getElementById('bgcanvas');
	bgcontext=bgcanvas.getContext('2d');
	bgcontext.clearRect(0,0,w,h);
	}
function _Btn1_1(){
	$("#pages").animate({left:"-100%"},300);
	$(".btn").hide();
	$("#page2").find(".btn").show();
	}
	
document.getElementById('canvas').addEventListener("touchstart",handleTouchEvent,false);
document.getElementById('canvas').addEventListener("touchmove",handleTouchEvent,false);
document.getElementById('canvas').addEventListener("touchend",handleTouchEvent,false);
/*document.getElementById('fileImg').addEventListener('change', handleFileSelect, false);
document.getElementById('fileImg2').addEventListener('change', handleFileSelect, false);*/


function bindButtonEvent(element, type, handler){  
      if(element.addEventListener) { element.addEventListener(type, handler, false); } 
	  else {element.attachEvent('on'+type, handler);  }  
}
function btnUnClick(){
	changeLarge.style.display="none";
	changeSmall.style.display="none";
	turnLeft.style.display="none";
	turnRight.style.display="none";
	Complete.style.display="none";
	reSelect.style.display="none";
	}
function btnClick(){
	changeLarge.style.display="inline-block";
	changeSmall.style.display="inline-block";
	turnLeft.style.display="inline-block";
	turnRight.style.display="inline-block";
	Complete.style.display="inline-block";
	reSelect.style.display="inline-block";
	$(".first_upload").hide();
	}
function draw(){
		if(first==1&&img.width>1000){//初次导入画布的头像，如果宽度大于400，按比例缩放。
			var scale = img.width / img.height;
     		img.width = 1000;
     		img.height =img.width/scale;
		}
	 
	
	bgcanvas=document.getElementById('bgcanvas');//角色画布
	bgcanvas.width=w;
	bgcanvas.height=h;
	bgcanvas.style.backgroundColor="#eeeeee";
	bgcontext=bgcanvas.getContext('2d');
	bgcontext.save();
	bgcontext.clearRect(0,0,bgcanvas.width,bgcanvas.height);
	bgcontext.drawImage(roleImg,0,0,bgcanvas.width,bgcanvas.height);
	bgcontext.restore();
	
	
	canvas=document.getElementById('canvas');//头像画布
	canvas.width=w;
	canvas.height=h;
	context=canvas.getContext('2d');
	context.save();
	context.clearRect(0,0,canvas.width,canvas.height);//清空画布
	context.globalAlpha=opacity;
	context.translate(imgX,imgY);//拖动
	context.rotate(radian);//旋转
	context.scale(imgScale,imgScale);//缩放
    context.drawImage(img,-img.width/2,-img.height/2,img.width,img.height);
	//drawImageIOSFix(context, img);
	context.restore();




//拖动图片
bgcanvas.onmousedown=canvas.onmousedown=function(event){	
	//将canvas边界框的x、y坐标从窗口坐标中减去。
    var pos=windowToCanvas(canvas,event.clientX,event.clientY);
    bgcanvas.onmousemove=canvas.onmousemove=function(event){
        bgcanvas.style.cursor=canvas.style.cursor="move";
        var pos1=windowToCanvas(canvas,event.clientX,event.clientY);
        var x=pos1.x-pos.x;
        var y=pos1.y-pos.y;
        pos=pos1;
        imgX+=x;
        imgY+=y;
        draw();
    }
    bgcanvas.onmouseup=canvas.onmouseup=function(){
        bgcanvas.onmousemove=canvas.onmousemove=null;
        bgcanvas.onmouseup=canvas.onmouseup=null;
        bgcanvas.style.cursor=canvas.style.cursor="default";
    }
}


//缩放图片
bgcanvas.onmousewheel=canvas.onmousewheel=bgcanvas.onwheel=canvas.onwheel=function(event){
    var pos=windowToCanvas(canvas,event.clientX,event.clientY);
    event.wheelDelta=event.wheelDelta?event.wheelDelta:(event.deltaY*(-40));
    if(event.wheelDelta>0){
        imgScale*=2;
        imgX=imgX*2-pos.x;
        imgY=imgY*2-pos.y;
    }else{
        imgScale/=2;
        imgX=imgX*0.5+pos.x*0.5;
        imgY=imgY*0.5+pos.y*0.5;
    }
    draw();
}

}

function handleTouchEvent(event) {
    //只跟踪一次触摸
	
    //if (event.touches.length == 1) {
        switch (event.type) {
            case "touchstart":
                var touch = event.touches[0];
				var pos=windowToCanvas(canvas,touch.clientX,touch.clientY);
				/*var pos=windowToCanvas(canvas,event.clientX,event.clientY);*/
				startX=pos.x;
				startY=pos.y;
                break;
            case "touchend":
                break;
            case "touchmove":
                event.preventDefault(); //阻止滚动
                var touch1 = event.touches[0];
				var pos1=windowToCanvas(canvas,touch1.clientX,touch1.clientY);
				/*var pos1=windowToCanvas(canvas,event.clientX,event.clientY);*/
    			endX= pos1.x;
    			endY= pos1.y;
				imgX=imgX+(endX-startX);
				imgY=imgY+(endY-startY);
				startX=endX;
				startY=endY;
				//imgX = pos1.x - img.width/2;
    			//imgY = pos1.y - img.height/2;
				draw();
                break;
        }
   // }
}
/*function handleGestureEvent(event) {
	
    switch(event.type) {
        case "gesturestart":
            var PointLength=event.touches.length;
			if(PointLength>1){
			var point0=event.touches[0],
				point1=event.touches[1],
				xLen=point1.pageX-point0.pageX,
				yLen=point1.pageY-point0.pageY;
				}
            break;
        case "gestureend":
			var point0=event.touches[0],
				point1=event.touches[1],
				xLen=point1.pageX-point0.pageX,
				yLen=point1.pageY-point0.pageY;
				alert(xLen,yLen);          
            break;
        case "gesturechange":

            break;
    }
}*/


function windowToCanvas(canvas,x,y){
    var bbox = canvas.getBoundingClientRect();//画布距离页面边界的距离
    return {
        x:x - bbox.left - (bbox.width - canvas.width) / 2,
        y:y - bbox.top - (bbox.height - canvas.height) / 2
    };
}
function _turnLeft(){
	radian -= Math.PI/2;
	imgX=w/2;
	imgY=h/2;
	draw();
	}
function _turnRight(){
	radian += Math.PI/2;
	imgX=w/2;
	imgY=h/2;
	draw();
	}
	
function _changeLarge(){
	imgScale*=1.1;
	draw();
	}
function _changeSmall(){
	imgScale*=0.9;
	draw();
	}

function _Complete(){
	opacity=1.0;
	draw();
	drawResult();
	}
	
var title="我已变身成为麦麦正义联萌的一员啦！你也快来一起联萌吧！";
var desc="我已变身成为麦麦正义联萌的一员啦！你也快来一起联萌吧！";
var website_root="http://www.color.cc/xiangkuang/";
function drawResult(){
    var src1= canvas.toDataURL("image/png"); 
	var img1= new Image();
	img1.src=src1;
	img1.onload=function(){
	canvas=document.getElementById('canvas');
	canvas.width=bgcanvas.width;
	canvas.height=bgcanvas.height;
	context=canvas.getContext('2d');
	context.save();
	context.clearRect(0,0,canvas.width,canvas.height);
    context.drawImage(img1,0,0,img1.width,img1.height);
	context.drawImage(roleImg,0,0,canvas.width,canvas.height);
	var imgSrc = canvas.toDataURL("image/png");
	var resultImg=new Image();
	resultImg.src=imgSrc;
	resultImg.onload=function(){
		var resultCanvas=document.getElementById('result_canvas');
			resultCanvas.width=bgcanvas.width;
			resultCanvas.height=bgcanvas.height;
		var resultContext=resultCanvas.getContext('2d');
			resultContext.save();
			resultContext.clearRect(0,0,resultCanvas.width,resultCanvas.height);
			resultContext.drawImage(resultImg,0,0,resultCanvas.width,resultCanvas.height);
			resultContext.restore();
		}
	/*var image = imgSrc.replace("image/png", "image/octet-stream");  
    window.location.href=image;*/
	var b64 = imgSrc.substring(22);
	$.ajax({
		type: 'POST',
		url: "keep.php",
		data: {
		'data':b64
		},
		success: function(data, status) {
			$("#tip").show();
			var img_url = website_root+"upload/"+data.result;
			$("#share_img").prepend("<img src='"+img_url+"'/>");
			var link = website_root+'index.html#'+data.result;
			location.href="#"+data.result;
			
			//var onBridgeReady = function() {
				// 发送给好友;
				WeixinJSBridge.on('menu:share:appmessage', function(argv) {
					WeixinJSBridge.invoke('sendAppMessage', {
						"img_url": img_url,
						"img_width": "275",
						"img_height": "362",
						"link":link,
						"desc": desc,
						"title":title,
					},function(res){
						alert("分享成功");				
						//window.location="share.html?url="+img_url;
					});
				});
				// 分享到朋友圈;
				WeixinJSBridge.on('menu:share:timeline', function(argv) {
					WeixinJSBridge.invoke('shareTimeline', {
						"img_url": img_url,
						"img_width": "275",
						"img_height": "362",
						"link":link,
						"desc": desc,
						"title": title,
					},function(res){
						alert("分享成功");
						//window.location="share.html?url="+img_url;
					});
				});
			//};
			//if (document.addEventListener) {
			//	document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
			//} else if (document.attachEvent) {
			//	document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
			//	document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
			//}		
		},
		complete: function() {
		},
		error:function(){
		},
		dataType: "json"
	});	
	
	}
}

$(function() {
    var onBridgeReady = function() {
        // 发送给好友;
        WeixinJSBridge.on('menu:share:appmessage', function(argv) {
            WeixinJSBridge.invoke('sendAppMessage', {
                "img_url": website_root+"images/2-1.png",
                "img_width": "275",
                "img_height": "362",
                "link": website_root,
                "desc": desc,
                "title": title,
            }, function(res) {
                //alert("分享成功");
                //window.location="share.html?url="+img_url;
            });
        });
        // 分享到朋友圈;
        WeixinJSBridge.on('menu:share:timeline', function(argv) {
            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": website_root+"images/2-1.png",
                "img_width": "275",
                "img_height": "362",
                "link": website_root,
                "desc": desc,
                "title": title,
            }, function(res) {
                alert("分享成功");
                //window.location="share.html?url="+img_url;
            });
        });
    };
    if (document.addEventListener) {
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    } else if (document.attachEvent) {
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
});

