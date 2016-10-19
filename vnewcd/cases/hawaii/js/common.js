var device = {
    Android: function() {  
        return navigator.userAgent.match(/Android/i) ? true : false;  
    },
    BlackBerry: function() {  
        return navigator.userAgent.match(/BlackBerry/i) ? true : false;  
    },  
    iOS: function() {  
        return navigator.userAgent.match(/iPad|iPod|iPhone/i) ? true : false;  
    },
    iphone: function(){
        return navigator.userAgent.match(/iPhone/i) ? true : false;  
    },
    Windows: function() {  
        return navigator.userAgent.match(/IEMobile/i) ? true : false;  
    },  
    any: function() {  
        return (device.Android() || device.BlackBerry()  || device.Windows() || device.iOS());  
    }
};
var prefix = (function () {
  var styles = window.getComputedStyle(document.documentElement, ''),
    pre = (Array.prototype.slice
      .call(styles)
      .join('') 
      .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
    )[1],
    dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
    var result = {
    dom: dom,
    lowercase: pre,
    css: '-' + pre + '-',
    js: pre[0].toLowerCase() + pre.substr(1)
  };
  if(result.dom=='MS')
  {
    result.js = 'MS';
  }
  return result;
})();
if(!device.any())
{
    //window.location.href="../";
}

function isWeixin(){
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger") {
        return true;
    } else {
        return false;
    }
}

function transform (element,style)
{
    if(typeof(element)=="string"){
        element = $(element);
    }
    element.css({"transform":style});
    element.css({"-webkit-transform":style});
    element.css({"-moz-transform":style});
    element.css({"-ms-transform":style});
    element.css({"-o-transform":style});
}
var defaultShareText="";
var defaultShareImg="";
function getMeta(name)
{
    var meta = document.getElementsByTagName('meta');
    var result = "";
    for(var i=0;i<meta.length;i++){
        if(meta[i].getAttribute('name')==name)
        {
            result = meta[i].getAttribute('content');
            break;
        }
    }
    return result;
}
function setShare(shareText,shareImg)
{
    if(typeof(shareText)=='undefined'||!shareText)
    {
        shareText = defaultShareText;
    }
    if(typeof(shareImg)=='undefined'||!shareImg)
    {
        shareImg = defaultShareImg;
    }
    if(shareText=="")
    {
        shareText = document.title+"_"+getMeta("description");
    }

    window._bd_share_config={
        "common":{
            "bdSnsKey":{},
            "bdText":shareText,
            "bdMini":"2",
            "bdMiniList":false,
            "bdPic":shareImg,
            "bdStyle":"0",
            "bdSize":"16"
        },
        "share":{}
        // "image":{
        //  "viewList":["qzone","tsina","tqq","renren","kaixin001"],
        //  "viewText":"鍒嗕韩鍒帮細",
        //  "viewSize":"16"
        // },
        // "selectShare":{
        //  "bdContainerClass":null,
        //  "bdSelectMiniList":["qzone","tsina","tqq","renren","kaixin001"]
        // }
    };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
}

var Gjstab = function (tabBtns,tabs,firstOn,onClass,trigerEvent,callback)
{
    var self = this;
    var current = 0;
    var clock = null;
    var total;
    if(!(tabBtns instanceof Array))
    {
        tabBtns = [tabBtns];
    }
    total = tabBtns[0].length;
    if(typeof(trigerEvent)=='undefined')
    {
        trigerEvent="click";
    }
    this.goto = function(index,clicked)
    {
        if(index>=total)
        {
            index = 0;
        }
        else if(index<0)
        {
            index = total-1;
        }
        if(tabBtns[0].eq(index).hasClass(onClass))
            return;
        for(var i in tabBtns)
        {
            tabBtns[i].removeClass(onClass);
            tabBtns[i].eq(index).addClass(onClass);
        }
        // tabs.css({height:'0'}).hide();
        // tabs.find('li').not(tabs.eq(index)).hide();
        tabs.hide();
        tabs.eq(index).show();
        //tabs.eq(index).prependTo(tabs.parent()).css({height:'auto'}).show();
        // setTimeout(function(){
        //  tabs.eq(index).find('li').show();
        // });
        
        if(typeof(callback)=='function')
        {
            callback(index);
        }
        current = index;
    }
    // self.goto(firstOn);
    for(var i in tabBtns)
    {
        tabBtns[i].bind(trigerEvent,function(){
            var index = $(this).index();
            self.goto(index);
        });
    }
}

var Sugar = function(){
    var $domList = [];
    var callbackList = {};
    var callbackId = 0;
    var fireIn = function(name){
        var page = name;
        var $animates = $(page).find('.animation');
        $domList = [];
        $animates.each(function(){
            var an = {};
            an.dom = $(this);
            an.cn = an.dom.attr('data-class');
            an.type = an.dom.attr('data-type');
            an.delay = an.dom.attr('data-delay');
            an.laterClass = an.dom.attr('later-class');
            an.callback = function(event){
                if(an.laterClass)
                {
                    $(this).removeClass(an.cn);
                    $(this).addClass(an.laterClass);
                }
                this.removeEventListener(prefix.js+"AnimationEnd",an.callback);
            };
            callbackList[callbackId] = an.callback;
            an.dom.attr('callback-id',callbackId);
            $domList.push(an.dom);
            if(an.delay == 0 || !an.delay){
                an.dom.addClass(an.cn);
            } else {
                setTimeout(function(){
                    an.dom.addClass(an.cn);
                }, an.delay);
            }
            an.dom[0].addEventListener(prefix.js+"AnimationEnd",an.callback,false); 
        });
    };

    var fireOut = function(){
        while($domList.length > 0){
            var $dom = $domList.pop();
            $dom.removeClass($dom.attr('data-class'));
            if($dom.attr('later-class'))
                $dom.removeClass($dom.attr('later-class'));
        }   
    };

    return {
        fireIn: fireIn,
        fireOut: fireOut
    }
};

function UrlSearch() 
{
    var name,value; 
    var str=decodeURI(location.href); //取得整个地址栏
    var num=str.indexOf("?") 
    str=str.substr(num+1); //取得所有参数   stringvar.substr(start [, length ]

    var arr=str.split("&"); //各个参数放到数组里
    for(var i=0;i < arr.length;i++){ 
        num=arr[i].indexOf("="); 
        if(num>0){
            name=arr[i].substring(0,num);
            value=arr[i].substr(num+1);
            this[name]=value;
        }
    } 
}
var Request=new UrlSearch();

function getParam(key)
{
    if(typeof(Request[key])=='undefined')
    {
        return null;
    }
    return Request[key];
}

window.onerror = function(msg,url,num){

    //debug(msg+" "+url+" "+num);
}
function debug(text)
{
    if($("#debug").length<1)
    {
        $("body").append("<div id='debug'></div>");
        $("#debug").css({position:'absolute',bottom:0,top:'auto',zIndex:9999});
    }
    $("#debug").html($("#debug").html()+"<br/>"+text);
}

function playAudio(id,loop)
{
    var au = document.getElementById(id+"_sound");
    if(au)
    {
        au.play();
        if(id=='bg')
        {
            $(".music_btn").removeClass("close");
        }
    }
}
function stopAudio(id)
{
    var au = document.getElementById(id+"_sound");
    if(au)
    {
        au.pause();
        if(id=='bg')
        {
            $(".music_btn").addClass("close");
        }
        if(typeof(window.musicClock[id])!='undefined'&&window.musicClock[id])
        {
            clearTimeout(window.musicClock[id]);
            window.musicClock[id] = null;
        }
    }
}

function setLoop(id,time)
{
    if(typeof(time)=='undefined')
        time = 0;
    var au = document.getElementById(id+"_sound");
    au.addEventListener('ended',function(){
        if(typeof(window.musicClock)=='undefined')
        {
            window.musicClock = {};
        }
        if(typeof(window.musicClock[id])!='undefined'&&window.musicClock[id])
        {
            clearTimeout(window.musicClock[id]);
            window.musicClock[id] = null;
        }
        window.musicClock[id] = setTimeout(function(){
            au.play();
        },time);
    },false)
}
function setVolum(id,value)
{
    var au = document.getElementById(id+"_sound");
    au.volume = value;
}