/**
 * add time 2013-09-15
 *
 * @author heruijun
 */
!(function($) {
	var win = window;
	/**
	 * Normalize the browser animation API across implementations. This requests
	 * the browser to schedule a repaint of the window for the next animation frame.
	 * Checks for cross-browser support, and, failing to find it, falls back to setTimeout.
	 * @param {function}    callback  Function to call when it's time to update your animation for the next repaint.
	 * @param {HTMLElement} element   Optional parameter specifying the element that visually bounds the entire animation.
	 * @return {number} Animation frame request.
	 */
	if (!win.requestAnimationFrame) {
	  win.requestAnimationFrame = (win.webkitRequestAnimationFrame ||
	                                  win.mozRequestAnimationFrame ||
	                                  win.msRequestAnimationFrame ||
	                                  win.oRequestAnimationFrame ||
	                                  function (callback) {
	                                    return win.setTimeout(callback, 17 /*~ 1000/60*/);
	                                  });
	}

	/**
	 * Cancels an animation frame request.
	 * Checks for cross-browser support, falls back to clearTimeout.
	 * @param {number}  Animation frame request.
	 */
	if (!win.cancelRequestAnimationFrame) {
	  win.cancelRequestAnimationFrame = (win.cancelAnimationFrame ||
	                                        win.webkitCancelRequestAnimationFrame ||
	                                        win.mozCancelRequestAnimationFrame ||
	                                        win.msCancelRequestAnimationFrame ||
	                                        win.oCancelRequestAnimationFrame ||
	                                        win.clearTimeout);
	}

	/**
	 * 动画效果
	 */
	var showEffect = function() {
		var el = $('.paging-list li:gt('+ (config.startPos - 1) +')'), i = 0;
		var s = win.requestAnimationFrame(function() {
			i += 0.1;
			el.css({
				'opacity' : i,
				'-webkit-transform' : 'scale(' + i + ')'
			});

			if (i >= 0.9) {
				win.cancelRequestAnimationFrame(s);
				return false;
			}

			win.requestAnimationFrame(arguments.callee, 20);
		}, 0);
	};

	/**
	 * 基于ajax的分页查询
	 *
	 * @param data 封装请求url，请求数据，请求类型
	 * @param renderFor 需要渲染的布局
	 * @param renderEle 渲染后填入的html布局
	 * @param renderCallback 渲染前的回调方法
	 */
	$.fn.pageRequest = function(data, renderFor, renderEle, renderCallback) {
		$.ajax({
			url : data.url,
			data : data.queryData,
			type : data.type
		}).then(function(response) {
			var resultData = response.response;
			var renderData = {
				list : resultData
			};
			if ($.isFunction(renderCallback)) {
				renderCallback();
			}

			var result = template.render(renderFor, renderData);

			var hasNextPage = false;
			if(resultData.total > resultData.end_pos){
				hasNextPage = true;
			}
			$('.' + renderEle).append(result).paging({
				total : resultData.total,
				hasNextPage : hasNextPage
			}, function() {
				// 更新标志位
				data.queryData.start_pos = resultData.end_pos;
				config.startPos = data.queryData.start_pos;
				$(this).pageRequest(data, renderFor, renderEle);
			});
		}).done(function() {
			//showEffect();
		});
	};

	/**
	 * 基于ajax的嵌套分页查询
	 *
	 * @param data 封装请求url，请求数据，请求类型
	 * @param renderFor 需要渲染的布局
	 * @param renderEle 渲染后填入的html布局
	 * @param renderCallback 渲染前的回调方法
	 */
	$.fn.pageFuckRequest = function(data, renderFor, renderEle, renderCallback,renderCallbackData) {
		$.ajax({
			url : data.url,
			data : data.queryData,
			type : data.type
		}).then(function(response) {
			var resultData = response.response;

			if(resultData.status != '0'){
				var returnData = renderCallbackData(resultData);

				var renderData = {
					list : returnData
				};

				var result = template.render(renderFor, renderData);

				var hasNextPage = false;
				if(parseInt(resultData.total) > parseInt(resultData.end_pos) + 1){
					hasNextPage = true;
				}
				$('.' + renderEle).append(result).paging({
					total : resultData.total,
					hasNextPage : hasNextPage
				}, function() {
					// 更新标志位
					data.queryData.start_pos = parseInt(resultData.end_pos) + 1;
					config.startPos = parseInt(resultData.end_pos) + 1;
					$(this).pageFuckRequest(data, renderFor, renderEle, renderCallback,renderCallbackData);
				});
			}else{
				$('.paging-more').hide().off();
				renderCallback();
			}
		}).done(function() {
			//showEffect();
		});
	};


	/**
	 * 基于ajax的分页封装
	 *
	 * @param options 分页相关参数
	 * @param callback 分页完成后的回调方法
	 */
	$.fn.paging = function(options, callback) {
		var pObj = {
			total : 0,
			start_pos : 0,
			size : config.size,
			hasNextPage : false
		};

		if (options) {
			$.extend(pObj, options);
		}

		var max = Math.ceil(pObj.total / config.size);

		if (max > 1) {
			if (pObj.hasNextPage) {
				$('.paging-more').show().off().on('click', function(){
					if ($.isFunction(callback)) {
						callback();
					}
				});
			} else {
				$('.paging-more').hide().off();
			}
		} else {
			$('.paging-more').hide().off();
		}
	};


	/**
	 * 将form中的值转换为键值对
	 *
	 * @param form 表单对象
	 */
	var formJson = function(form) {
		var o = {};
		var a = $(form).serializeArray();
		$.each(a, function() {
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [ o[this.name] ];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};

	/**
	 * 基于ajax的表单提交
	 *
	 * @param data 传入的参数
	 * @param callback ajax请求成功后执行的回调方法
	 * @param callbackDone ajax请求成功后最后执行的方法
	 */
	$.fn.formSubmit = function(data, callback, callbackDone) {
		$.ajax({
			url : data.url,
			data : formJson(this),
			type : data.type
		}).then(function(response) {
			if ($.isFunction(callback)) {
				callback(response);
			}
		}).done(function() {
			if ($.isFunction(callbackDone)) {
				callbackDone();
			}
		});
	};

	/**
	 * 基于ajax的查询
	 *
	 * @param data 传入的参数
	 * @param callback ajax请求成功后执行的回调方法
	 * @param callbackDone ajax请求成功后最后执行的方法
	 */
	$.fn.queryRecord = function(data, callback, callbackDone) {
		$.ajax({
			url : data.url,
			data : data.queryData,
			type : data.type
		}).then(function(response) {
			if ($.isFunction(callback)) {
				if(response.response) {
					callback(response.response);
				} else {
					callback(response);
				}
			}
		}).done(function() {
			if ($.isFunction(callbackDone)) {
				callbackDone();
			}
		});
	};

})(jQuery);

$(function() {
	template.openTag = '<!--[';
	template.closeTag = ']-->';

	var userObj = sessionStorage.getItem('userObj');
	//底部导航信息
});

/*******************************20140618增加************************************/
var globalCookie = null; //全局使用，值与sessionkey相同
var globalInWeixin = false; //防止与order中的isWeixin冲突

if(navigator.userAgent.toLowerCase().indexOf("micromessenger")>-1) {
	globalInWeixin = true;
}

function weixinPayValid(pid) {
	return true;
}

function urlencode(str) {
	if(str == '' || str == null || str == undefined) {
		return '';
	}
	return encodeURIComponent(str);
}

//设置cookies
function setCookie (name, value) {
	var Days = 30;
	var expr = new Date();
	expr.setTime(expr.getTime() + Days*24*60*60*1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + expr.toGMTString();
}

//读取cookies
function getCookie (name) {
    var arr,reg = new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr = document.cookie.match(reg))
        return (arr[2]);
    else
        return null;
}

//删除cookies
function delCookie (name) {
    var expr = new Date();
    expr.setTime(expr.getTime() - 1);
    var cval = getCookie(name);


    if(cval != null)
        document.cookie = name + "="+cval+";expires="+expr.toGMTString();
}

//sessionStorage兼容
function sessionStorageCompatible() {
	this.setItem = function(key, value) {
		setCookie(key, value);
	}

	this.getItem = function(key) {
		return getCookie(key);
	}

	this.removeItem = function(key) {
		delCookie(key);
	}
}

var localStorageEx = localStorage;
if(!localStorageEx) {
	localStorageEx = sessionStorage;
}

//ajax封装
function _ajax(url1, postData, funcOk, funcError) {
	$.ajax({
		url : url1,
		data : postData,
		type : 'POST'
	}).then(function(response) {
		funcOk(response);
	}).done(function() {
		if(funcError) funcError();
	});
}

/*
//同步PC登录状态
$(function(){
	var cookie = getCookie('OPPOSID');

	//获取PC版的cookie
	var userinfo = sessionStorage.getItem('userObj');

	globalCookie = cookie;

	//如果是PC端登录的，PC退出则同步退出
	if(userinfo) {
		if(null == cookie) {
			sessionStorage.removeItem('userObj'); //与PC版同步注销
			deleteCookie('proxy/deleteCookie');
			set_cookie("OPPOSID", "", 0, "/", ".oppo.com");
			location.href = location.href;
		}
	}

	//移动端没登录，则判断PC有没登录
	if(cookie == '""') cookie = null;
	if(!userinfo && cookie) {
		var param = {
					'sessionKey':cookie
				};
		//proxy/checklogin?sessionKey=35b61ccf13484a0ea8ee3a0d2eb16d55
		_ajax('proxy/checklogin', param, function(data){
			if(data.response.status == 1){ //已登录，同步移动版登录状态
				var userobj = {};
				userobj.userId = data.response.user.userId;
				userobj.userName = data.response.user.userName;
				userobj.mobile = data.response.user.mobile;
				userobj.sessionkey = cookie;

				sessionStorage.setItem('userObj', JSON.stringify(userobj));
				var userinfo ={'username':userobj.userName,'password': ""};
				recordCookie('proxy/recordCookie',"sessionKey="+cookie+"&requestData="+JSON.stringify(userinfo));
				location.href = location.href; //刷新
			}
		});
	}

});//同步PC登录状态
*/

var doc = document,
	win = window;

function set_cookie(cookieName, value, msToExpire, path, domain, secure, origin) {
	var expiryDate;

	if (msToExpire) {
		expiryDate = new Date();
		expiryDate.setTime(expiryDate.getTime() + msToExpire);
	}

	if ( !!origin ) {
		value = value;
	} else {
		value = win.encodeURIComponent(value);
	}

	doc.cookie = cookieName + '=' + value +
		(msToExpire ? ';expires=' + expiryDate.toGMTString() : '') +
		';path=' + (path || '/') +
		(domain ? ';domain=' + domain : '') +
		(secure ? ';secure' : '');
}

function get_cookie(cookieName, origin) {
	var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
		cookieMatch = cookiePattern.exec(doc.cookie);

	return cookieMatch ? !!origin ? cookieMatch[2] : win.decodeURIComponent(cookieMatch[2]) : 0;
}



function syncLogin() {
	var cookie = get_cookie('OPPOSID', true);

	//获取PC版的cookie
	var userinfo = sessionStorage.getItem('userObj');

	globalCookie = cookie;

	//如果是PC端登录的，PC退出则同步退出
	if( userinfo ) {
		if(null == cookie) {
			sessionStorage.removeItem('userObj'); //与PC版同步注销
			deleteCookie('proxy/deleteCookie');
			set_cookie("OPPOSID", "", 0, "/", ".oppo.com");
			window.location.reload();
			// location.href = location.href;
		}
	}

	//移动端没登录，则判断PC有没登录
	if( cookie == '""' ) cookie = null;

	if( !userinfo && cookie ) {
		var param = {
			'sessionKey': cookie
		};

		$.ajax({
			url: 'proxy/checklogin',
			type: 'POST',
			data: param
		}).then( function( data ){

			if(data.response.status == 1){
				var userobj = {};
				userobj.userId = data.response.user.userId;
				userobj.userName = data.response.user.userName;
				userobj.mobile = data.response.user.mobile;
				userobj.sessionkey = cookie;

				sessionStorage.setItem('userObj', JSON.stringify(userobj));
				var userinfo ={'username':userobj.userName,'password': ""};
				recordCookie('proxy/recordCookie',"sessionKey="+cookie+"&requestData="+JSON.stringify(userinfo));
				window.location.reload();
				// location.href = location.href;
			}
		} );
	}
}
