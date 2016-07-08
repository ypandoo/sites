//cookie functions
function setCookie(name,value) 
{ 
    var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 

//读取cookies 
function getCookie(name) 
{ 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
} 

//删除cookies 
function delCookie(name) 
{ 
    var exp = new Date(); 
    exp.setTime(exp.getTime() - 1); 
    var cval=getCookie(name); 
    if(cval!=null) 
        document.cookie= name + "="+cval+";expires="+exp.toGMTString(); 
} 

//////////////get parameter from url
function getQueryString(name)
{
	// 如果链接没有参数，或者链接中不存在我们要获取的参数，直接返回空
	if(location.href.indexOf("?")==-1 || location.href.indexOf(name+'=')==-1)
	{
		return '';
	}
 
	// 获取链接中参数部分
	var queryString = location.href.substring(location.href.indexOf("?")+1);
 
	// 分离参数对 ?key=value&key2=value2
	var parameters = queryString.split("&");
 
	var pos, paraName, paraValue;
	for(var i=0; i<parameters.length; i++)
	{
		// 获取等号位置
		pos = parameters[i].indexOf('=');
		if(pos == -1) { continue; }
 
		// 获取name 和 value
		paraName = parameters[i].substring(0, pos);
		paraValue = parameters[i].substring(pos + 1);
 
		// 如果查询的name等于当前name，就返回当前值，同时，将链接中的+号还原成空格
		if(paraName == name)
		{
			return unescape(paraValue.replace(/\+/g, " "));
		}
	}
	return '';
};

///////////////get random number within a range
function randomRange(min, max) {
	var randomNumber;
	randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
	return randomNumber;
}

////////////////uuid
function uuid(){

return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
    return v.toString(16);
});  

}