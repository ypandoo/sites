(function (global, factory) {
  if (typeof exports === "object" && exports) {
    factory(exports); // CommonJS
  } else if (typeof define === "function" && define.amd) {
    define(['exports'], factory); // AMD
  } else {
    global.crossDomainHttp = factory(); // <script>
  }
}(this, function (exports) {
	/*常量*/
			_count = 0,
			_OVERTIME = {
				"errCode": 404,
				"errorMsg": "超时"
			},

			/*Regular Expression*/
			_RE_READY_STATE = /loaded|complete|undefined/,

			/*节点操作*/
			_doc = document,
			_head = _doc.head ||
					_doc.getElementsByTagName("head")[0] ||
					_doc.documentElement,
			_body = _doc.body ||
					_doc.getElementsByTagName("body")[0] ||
					_doc.documentElement,

			_createElement = function (element, parent, params) {
				var tempnode = _doc.createElement(element),
					i;
				for(i in params){
					if(params.hasOwnProperty(i)){
						tempnode.setAttribute(i, params[i]);
					}
				}
				parent.appendChild(tempnode);
				return tempnode;
			},

			/*默认设置*/
			_config = {
				"method": "GET",
				"jsonp": true,      // True or False， 默认为 True
				"charset": "utf-8",
				"timeout": 2500,  // 默认10秒超时
				"data": {},
				"callback": function(){},
				"callbackHandler": ""
			};
var crossDomainHttp = function (url, config) {
		var getMode, cbName, timer,
			node, iframe, form,
			cfg = {}, i;

		$.extend(cfg, _config, config);
		cfg.method = cfg.method.toUpperCase();
		
		// debugger;
		if (cfg.method === "POST") {
			cbName = cfg.data.callback ? cfg.data.callback.split('.')[1] : [cfg.method, _count++].join("_");
			iframe = _createElement("iframe", _body, {
				"style": "display: none",
				"id": ["iframe", _count].join("_"),
				"name": ["iframe", _count].join("_")
			});
			form = _createElement("form", _body, {
				"method": "post",
				"action": url,
				"target": ["iframe", _count].join("_")
			});

			if(!("_callback" in cfg.data) && !("callback" in cfg.data)){
				cfg.data._callback = cbName;
			}

			for(i in cfg.data){
				if(cfg.data.hasOwnProperty(i)){
					_createElement("input", form, {
						"type": "hidden",
						"name": i,
						"value": cfg.data[i]
					});
				}
			}
			
			window[cbName] = function(data){
				cfg.callback(data);
				clearTimeout(timer);
				_body.removeChild(iframe);
				_body.removeChild(form);
				iframe = undefined;
				form = undefined;
			};
			form.submit();
			timer = setTimeout(function(){
				window[cbName](_OVERTIME);
			}, cfg.timeout);

		} else if (cfg.method === "GET") {
			cbName = [cfg.method, _count++].join("_");
			getMode = /callback=\?/.test(url),     // 有callback为True，否则为False

			node = _doc.createElement("script");
			node.id = cbName;
			node.async = true;
			node.charset = cfg.charset;
			node.onload = node.onerror = node.onreadystatechange = function() {
				if (_RE_READY_STATE.test(node.readyState)) {
					window[cbName]();               // #TOTEST
				}
			};
			node.src = getMode ? url.replace("callback=?", "callback=" + cbName) : url;

			window[cbName] = function(data){
				clearTimeout(timer);
				node.onload = node.onerror = node.onreadystatechange = null;
				_head.removeChild(node);
				node = undefined;
				cfg.callback(data);
			};

			_head.appendChild(node);

			timer = setTimeout(function(){
				window[cbName](_OVERTIME);
				window[cbName] = null;
			}, cfg.timeout);
		}
	};
	window.postCallback=function(data){
		return data;
	};
	return crossDomainHttp;
}));
/*  |xGv00|0d6fe5e8ecc18db06fbffe35f75c277b */