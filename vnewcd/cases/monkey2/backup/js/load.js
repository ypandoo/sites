
soundList=[{name:"bgSound",path:"sound/bgSound.mp3?v1.1"}];

var LSound={};

var loadInfo={
	loadPageName:"loadPage",
	loadProgressName:"loadProgress",
	loadPercentName:"loadPercent",
	pagesName:"pages",
	imgNum:0,
	soundNum:soundList?soundList.length:0
};



(function (){
	if(window.addEventListener){
		document.addEventListener("DOMContentLoaded",function(){
			                                             var loading=new LLoader();
			                                             loading.loadComplete=function(s){
			                                             	                      if(s){
				                                             	                      var ss=s;
				                                             	                      for(var i in ss){
				                                             	                      	LSound[i]=new sounder(ss[i]);
				                                             	                      }
			                                             	                      }
			                                             	                      console.log("完成")
			                                             	                      init();
			                                                                  }
			                                             loading.load();
		                                             });
	}else if(window.attachEvent){
		
	}
})();



function LLoader(){
	var self=this;
	var loadPageName=loadInfo.loadPageName||"loadPage";
	var loadProgressName=loadInfo.loadProgressName||"loadProgress";
	var loadPercentName=loadInfo.loadPercentName||"loadPercent";
	var loadPage=document.getElementsByClassName(loadPageName)[0];
	var loadProgress=document.getElementsByClassName(loadProgressName)[0];
	var loadPercent=document.getElementsByClassName(loadPercentName)[0];
	var loadImg=new loadImages();
	var loadS=new loadSound();
	self.resetPageObj=function (obj){
		if(obj.loadPage){
			loadPage=document.getElementsByClassName(obj.loadPage);
		}
		if(obj.loadProgress){
		    loadProgress=document.getElementsByClassName(obj.loadProgress);
		}
		if(obj.loadPercent){
		    loadPercent=document.getElementsByClassName(obj.loadPercent);
		}
	}
	var loadingSound;
	self.load=function (){
		
		loadImg.loadingStart=function(){/////////////////////////////开始加载时重写loadImages()类这个方法，可以为空方法
			loadingSound=document.createElement("audio");
			loadingSound.src="sound/start.mp3";
			loadingSound.addEventListener("canplaythrough",playSound);
			loadingSound.load();
			function playSound(){
				loadingSound.removeEventListener("canplaythrough",playSound);
				console.log("aaaaa");
				LSound.loadingSound=new sounder(loadingSound);
				LSound.loadingSound.play(1);
			}
		}
		
		loadImg.setLoadProgress=getProgress;
		loadImg.pagesComplete=loadS.loading;
		loadS.setLoadProgress=getProgress;
		loadS.loadSoundComplete=self.loadComplete;
		loadImg.loadingImg();
	}
	function getProgress(progress){
		loadProgress.style.width=progress*100+"%";
		loadPercent.innerHTML=progress*100<1?Math.ceil(progress*100)+"%":Math.floor(progress*100)+"%";
		console.log(loadPercent.innerHTML);
	}
	self.loadComplete=function(s){};
}


function loadImages(){
	var self=this;
	var loadPageName=loadInfo.loadPageName||"loadPage";
	var pagesName=loadInfo.pagesName||"pages";
	var loadImgObj=[];
	var pagesImgObj=[];
	var loadPageImgs=document.getElementsByClassName(loadPageName)[0].getElementsByTagName("img");
	var pagesImgs=document.getElementsByClassName(pagesName)[0].getElementsByTagName("img");
	loadInfo.imgNum=pagesImgs.length;
	var loadedImg=0;
	var imgNum=pagesImgs.length;
	var soundNum=soundList?soundList.length:0;
	self.setLoadProgress=function(num){};
	self.loadingImg=function (){
		self.loadingStart();
		for(var i=0;i<loadPageImgs.length;i++){
			loadImgObj[i]=document.createElement("img");
			loadImgObj[i].onload=loadPageEachEnd;
			loadImgObj[i].onerror=loadPageEachEnd;
			loadImgObj[i].src=loadPageImgs[i].src;
		}
		if(loadPageImgs.length==0){
			loadPageComplete();
		}
	}
	function loadPageEachEnd(e){
		e.target.onload=null;
		loadedImg++;
		if(loadedImg>=loadPageImgs.length){
			loadedImg=0;
			loadPageComplete();
		}
	}
	function loadPageComplete(){
		loadPagesImg();
	}
	function loadPagesImg(){
		for(var i=0;i<pagesImgs.length;i++){
			pagesImgObj[i]=document.createElement("img");
			pagesImgObj[i].onload=pagesEachEnd;
			pagesImgObj[i].onerror=pagesEachEnd;
			pagesImgObj[i].src=pagesImgs[i].src;
		}
		if(pagesImgs.length==0){
			pagesComplete();
		}
	}
	function pagesEachEnd(e){
		e.target.onload=null;
		loadedImg++;
		self.setLoadProgress(loadedImg/(imgNum+soundNum));
		if(loadedImg>=pagesImgs.length){
			self.pagesComplete();
		}
	}
	self.pagesComplete=function (){};
	self.loadingStart=function (){};////////开始加载时调用 
	self.loadingComplete=function(){};///////加载页图片加载完后调用
}

function loadSound(){
	var self=this;
	var imgNum=loadInfo.imgNum||0;
	var soundNum=loadInfo.soundNum||soundList.length||0;
	var sound=soundList||[];
	var loadedSound=0;
	var soundObj={};
	self.loading=function(){
		
		for(var i=0;i<sound.length;i++){
			if(sound[i].name&&sound[i].path){
				soundObj[sound[i].name]=document.createElement("audio");
				soundObj[sound[i].name].src=sound[i].path;
				soundObj[sound[i].name].addEventListener("canplaythrough",soundEachEnd);
				soundObj[sound[i].name].addEventListener("error",soundEachEnd);
				soundObj[sound[i].name].load();
			}
		}

		if(soundNum==0){
			self.loadSoundComplete();
		}
	}
	function soundEachEnd(){
		loadedSound++;
		self.setLoadProgress((loadedSound+imgNum)/(soundNum+imgNum));
		if(loadedSound>=soundNum){
			for(var i=0;i<sound.length;i++){/////////用循环移除事件
				soundObj[sound[i].name].removeEventListener("canplaythrough",soundEachEnd);
				soundObj[sound[i].name].removeEventListener("error",soundEachEnd);
			}
			self.loadSoundComplete(soundObj);
		}
	}
	self.setLoadProgress=function(n){};
	self.loadSoundComplete=function (s){};
	
}


function sounder(s){
	var self=this;
	var o=s;
	var isIos=browser.versions.ios4;
	self.play=function(loop){
		if(!o){return};
		if(loop){
			if(isIos){
				o.addEventListener("pause",self.play);
			}else{
				o.loop=true;
			}
		}
		o.currentTime=1;
		o.play();
	}
	self.pause=function(){
		if(!o){return};
		if(isIos){
			o.removeEventListener("pause",self.play);
		}else{
			o.loop=false;
		}
		o.pause();
	}
	self.end=function(){};
	if(o){
		o.addEventListener("pause",self.end);
	}
}

browser={
	versions:function(){
		var u = navigator.userAgent;
		var isios = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
		var isios4 = false;
		if(isios){
			if(window.screen.width==320 && window.screen.height <= 480){
				isios4 = true;
			}
			if(window.screen.width==480 && window.screen.height <= 320){
				isios4 = true;
			}
		}
		return {
			ios:isios,
			ios4:isios4
		}
	}()
}
