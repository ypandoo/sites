/**
 * 发送ajax请求;
 * @param type : 请求类型;
 * @param url : 请求地址;
 * @param errorThrown : 请求;参数
 * @param successFun : 请求成功回调函数;
 * @param errFun : 请求失败回调函数;
 * @return
 */
var ajax = {};
ajax.sendRequest=function(type,url,data,_successFun,_errFun,async)
{	
	successFun = function(returnData){
			if(_successFun){
				_successFun(returnData);
			}
	}
	errFun = function(XMLHttpRequest, textStatus, errorThrown){
		if(_errFun){
			_errFun(XMLHttpRequest, textStatus, errorThrown);
		}
	}
	
	$.ajax({
		   type: type,
		   url:  url,
		   data: data,
		   success: successFun,
		   error:errFun,
		   async:async
		});
}

/**
 * 查询cookie信息;
 * @return
 */
function findCookie(url,requestdata){
	var userObj = sessionStorage.getItem('userObj');
	if(!userObj){
		ajax.sendRequest("POST",url,null, function(cookieData){
			if(cookieData == null){
				return;
			}
			//sessionStorage.setItem('userObj', JSON.stringify(data.user));
			var username = $('#username').val(),
			password = $('#password').val();
			var data = {
				'url' : config.server + 'md5',
				'queryData':{
					'account': cookieData.username,
					'password': cookieData.password
				},
				'type' : 'POST'
			};
			ajax.sendRequest("POST",data.url,data.queryData, function(msg) {
				var vertify = '';
				if(msg.response) {
					vertify = msg.response.code;
				}
				var data = {
						'url' : config.server + 'proxy/account',
						'queryData':{
							'q': 'user/htmllogin',
							'mobile': cookieData.username,
							'password': cookieData.password,
							'vertify': vertify
						},
						'type' : 'POST'
				};
				ajax.sendRequest("POST",data.url,data.queryData, function(msg) {
					if(msg.response && msg.response.status == "1"){
						sessionStorage.setItem('userObj', JSON.stringify(msg.response.user));
					}
				},null,false);
			},null,false);
		},null,false);
	}
}

function recordCookie(url,requestdata){
	if(requestdata){
		ajax.sendRequest("POST",url,requestdata, function(data){
		},null,false);
	}
}

function deleteCookie(url,requestdata){
	ajax.sendRequest("POST",url,requestdata, function(data){
	},null,false);
}