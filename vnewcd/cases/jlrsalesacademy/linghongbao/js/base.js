(function() {
    var Data = {
        map: {
            //正常返回
            0: {
                type:'input-phone',
                topmsg : 'index_msg',
                render : function(){
                    var msg = Data && Data.data && Data.data.brand || {}; 
                    document.querySelector('.input-phone .bag-desc').innerHTML = '米芝莲邀您免费喝!饮品券任性送';
                //    document.querySelector('#fetche-voucher-form .text').innerHTML = msg.index_ad_2 || '全力以赴的你，今年回家坐好一点';
                    document.querySelector('.bag-text').innerHTML = '输入手机,姓名,获取免费饮品券';

                    document.querySelector('.arrow-wrapper').style.display = 'block';
                    //var link = document.querySelector('.activity-details');
                    //Render.slip(link);
                    //Render.coverSlip(link);
					Render.renderPhone();
                }
            },
            '9999' : {
                type : 'download', 
                topmsg : 'result_success_msg',
                render : function(data){
				
                    Render.voucherList(data.coupon_list || []);
                    document.querySelector('.arrow-wrapper').style.display = 'block';
                    var link = document.querySelector('#activity-details-already');
//					document.querySelector('.img-responsive').src = baseUrl + 'image/voucher_bg_download.png'
					document.querySelector('#amount-box-title').innerHTML = "恭喜获得";
					document.querySelector('.voucher-count').innerHTML = Data.data.brand.result_success_msg;

                    Render.slip(link);
                    Render.coverSlip(link);

				//	Render.partnerLinkBtn();
                }
            },
            //过期了
            3: {
                type : 'expired',
                topmsg : 'over_msg',
                render : function(){
					var msg = Data.data.brand.over_msg;
                    Render.showFetched(msg);
				//	var cont = document.querySelector('.expired');
				//	Render.partnerLinkBtn(cont);
                }
            },
            //红包已领完
            4: {
                //type : 'gameover',
                //topmsg : 'gameover',
                type : 'expired',
                topmsg : 'over_msg',
                render : function(){
					var msg = Data.data.brand.gameover;
                    Render.showFetched(msg);
				//	var cont = document.querySelector('.expired');
				//	Render.partnerLinkBtn(cont);
                }
            },
            //手机号错误
            5: 'errmsg',
            //你已经领过了
            7: {    
                type : 'fetched',
                topmsg : 'robbed_msg' ,
                render : function(data){
                    var $count = document.querySelector('.voucher-count');
                    $count && ($count.innerHTML='这是您已领过的大礼包'); 
                    Render.voucherList(data.coupon_list || []);
                    document.querySelector('.arrow-wrapper').style.display = 'block';
                    var link = document.querySelector('#activity-details-already');
					document.querySelector('#amount-box-title').innerHTML = "";
					document.querySelector('.unit').innerHTML = '';
					document.querySelector('.voucher-count').innerHTML = Data.data.brand.result_success_msg;
                    Render.slip(link);
                    Render.coverSlip(link);
			//		var cont = document.querySelector('.fetched');
			//		Render.partnerLinkBtn(cont);
                }
            },
            //系统错误*默认的配置
            11: {
                type : 'errmsg',
                render : function(){
                    Render.showErrmsg();
                }
            },
            //请求超时
            12: {
                type : 'errmsg',
                render : function(){
                    Render.showErrmsg();
                }
            },
        },
        data: {
            /**
              input-phone:输入用户手机号
download : 输入手机号后，显示下载
last-use-info : 剩余
expired 过期
fetched 已领过
gameover 领完了
errmsg:错误提示
*/
            /*
               'status': 'fetched',
               'topimg': 'http://y0.ifengimg.com/tech_spider/dci_2012/07/4282b5cc398f4f67f3feb8a7dd3bdd24.jpg',
               'topmsg': '恭喜你抢到了我的滴滴专车券!!滴滴一下,专车接驾，快去体验吧!!',
               'msg_1': '30元',
               'msg_2': '专车券已放入滴滴账户18601367665，下载滴滴打车到“我的打车券”查看',
               'showToolBar': 1,
               'share': {
appid: '123',
img_url: 'http://img3.imgtn.bdimg.com/it/u=3822840563,1901297030&fm=23&gp=0.jpg',
link: 'http://www.baidu.com/',
title: '测试标题',
desc: '随便写点什么吧'
},
*/
        },
        //向服务器端请求券结果
        getVoucher: function(url) {
            var fn = arguments.callee,
            _data = Data.data,
            baseUrl = _data.promo_ip,
            phone = document.querySelector('#user-phone').value;
            name = document.querySelector('#user-name').value;
			if(name == '')
			{
				alert('请输入姓名');
				return;
			}
			
			var submit_data = {
				'name': name,
				'phone' : phone
			};
		
		//item info
		$.post('linghongbao.php', submit_data, 
			function(data) {
				if(data && data.status == 0) {
					alert(data.msg);
					document.querySelector('.input-phone .bag-desc').innerHTML = '领券成功!';
					//document.querySelector('#fetche-voucher-form .text').innerHTML = '请于5.3日到群光负1米芝莲领券！';
					document.querySelector('.bag-text').innerHTML = '限5.3日到群光米芝莲店领取！';
					//Tool.addClass(document.querySelector('.voucher-content'),'hide');
					var $Input = document.querySelector('#user-phone');
					var $txt = $Input.parentNode.querySelector('.input-text');
					Tool.addClass($txt,'hide');
					$Input.setAttribute('readonly','true');	

					$Input = document.querySelector('#user-name');
					$txt = $Input.parentNode.querySelector('.input-text');
					Tool.addClass($txt,'hide');
					$Input.setAttribute('readonly','true');				

					$submit = document.querySelector('#submit');
					$submit.setAttribute('disabled', 'true');
					
				} else if(data && data.status == 1){
				    alert(data.msg);
					document.querySelector('.input-phone .bag-desc').innerHTML = '您已经领过券了!';
					//document.querySelector('#fetche-voucher-form .text').innerHTML = '请于5.3日到群光负1米芝莲领券！';
					document.querySelector('.bag-text').innerHTML = '限5.3日到群光米芝莲店使用！';
					//Tool.addClass(document.querySelector('.voucher-content'),'hide');
					var $Input = document.querySelector('#user-phone');
					var $txt = $Input.parentNode.querySelector('.input-text');
					Tool.addClass($txt,'hide');
					$Input.setAttribute('readonly','true');	

					$Input = document.querySelector('#user-name');
					$txt = $Input.parentNode.querySelector('.input-text');
					Tool.addClass($txt,'hide');
					$Input.setAttribute('readonly','true');				

					$submit = document.querySelector('#submit');
					$submit.setAttribute('disabled', 'true');
				}
				else
				{
					alert(data.msg);
					document.querySelector('.input-phone .bag-desc').innerHTML = '领取失败!';
					//document.querySelector('#fetche-voucher-form .text').innerHTML = '请于5.3日到群光负1米芝莲领券！';
					document.querySelector('.bag-text').innerHTML = '';
					//Tool.addClass(document.querySelector('.voucher-content'),'hide');
					var $Input = document.querySelector('#user-phone');
					var $txt = $Input.parentNode.querySelector('.input-text');
					Tool.addClass($txt,'hide');
					$Input.setAttribute('readonly','true');	

					$Input = document.querySelector('#user-name');
					$txt = $Input.parentNode.querySelector('.input-text');
					Tool.addClass($txt,'hide');
					$Input.setAttribute('readonly','true');				

					$submit = document.querySelector('#submit');
					$submit.setAttribute('disabled', 'true');
				}
			},
			"json")	            
        },
        os: null,
        downloadApp: {
           /* 'android': 'http://dldir1.qq.com/diditaxi/apk/didi_psngr.apk',
            'apple': 'http://diditaxi.com.cn/cdown.html'*/
           ios:{
              "packageName": "com.xiaojukeji.didi",
              "packageUrl": "diditaxi:passenger",
              "downloadUrl": "https://itunes.apple.com/cn/app/di-di-da-che-zhi-jian-shang/id554499054?ls=1&mt=8"
           },
           android:{
             "packageName": "com.sdu.didi.psnger",
             "packageUrl": "didipasnger://didi_apk_intalled_scheme",
             "downloadUrl": "http://dldir1.qq.com/diditaxi/apk/didi_psngr.apk"
           }
        },

        setShareData : function(){
            var data = Data.data || {},
            baseUrl = 'http://static.udache.com/gulfstream/webapp/pages/activity/big-gift-package/image/',
            brand = data.brand || {},
            isShowToolBar = parseInt(brand.is_show_toolbar);
            isShowToolBar = isNaN(isShowToolBar) ? 1 : isShowToolBar,
            imgUrl = ((brand.share_logo_url || '') + '').toLowerCase();
            imgUrl = imgUrl.substr(0,7) == 'http://' ? imgUrl : (baseUrl + imgUrl);

            data.share = {
                showToolBar : isShowToolBar,
                appid : data.appid,
                img_url : imgUrl,
                link : data.share_link,
                title : brand.share_title,
                desc : brand.share_msg 
            }
        },
        setParam : function(param){
            if(!param){
                return ''; 
            }

            var search = [];
            for(var i in param){
                search.push(i + '=' + encodeURIComponent(param[i])); 
            }

            return search.join('&');
        },
        /*
        getParam : function(){
            //udacheActivityStarConfig
            var data = Data.data, 
            star =  Tool.getParam('star'),
            channel = Tool.getParam('channel'),
            version = Tool.getParam('version'),
            starConfig,
            headImg,nickName;
            if(starConfig = udacheActivityStarConfig.star[star]){
                headImg = udacheActivityStarConfig.baseUrl + 'image/star/' + star+ '/head_img.jpg'; 
                nickName = starConfig.name || '滴滴';
            }else{
                star = '';
                headImg = Tool.getParam('headImg',udacheActivityStarConfig.headImg),
                nickName = Tool.getParam('nickName','滴滴');
            }

            data.name = nickName;
            data.star = star;
            data.headImg = headImg;
            data.nickName = nickName;

            data.search = Data.setParam({
                channel : channel, 
                version : version,
                nickName : nickName,
                star : star,
                headImg : headImg
            });

            data.search = location.search.replace('?','');
        },
        */
        init: function() {
            //获取所需参数
            //Data.getParam();
            //设置分享数据
            Data.setShareData();
            //渲染数据
            Render.init();
            //初始化事件
            Event.init();
            //Render.loading.show();
        }
    };

    var Tool = {
    ajax: function(opts) {
    var helper = {
    createXhr: function() {
    var xhr;
    if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
    } else {
    try {
    xhr = new ActiveXObject('Microsoft.XMLHTTP');
    } catch(e) {
    try {
    xhr = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(err) {}
    }
    }
    return xhr;
    },
    obj2Body: function(obj) {
    var res = '';
    if (obj) {
    for (var p in obj) {
    if (obj.hasOwnProperty(p)) {
    res += '&' + p + '=' + obj[p] + '';
    } else {}
    }
    } else {}
    return res.replace(/^\&/, "");
    },
    abortReq: function(xhr) {
    if (xhr) {
    xhr.abort();
    }
    }
    };

    var xhr = helper.createXhr();
    var _timeout = null;
    if (xhr) {
    xhr.open(opts.method, opts.url, true); //true表示异步
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
    if (_timeout) {
    clearTimeout(_timeout);
    }
    if (xhr.status === 200) {
    opts.success(xhr.responseText);
    } else {
    opts.error(xhr.responseText);
    }
    } else if (xhr.readyState === 3) {} else {}
    };
    if (opts.method.toUpperCase() === 'GET') {
    xhr.send(null);
    } else if (opts.method.toUpperCase() === 'POST') {
    var body = opts.data ? helper.obj2Body(opts.data) : "";
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(body);
    } else {}

    if (opts.timeout) {
    var _millisecond = opts.timeout.millisecond || 300,
    _callback = opts.timeout.callback || function() {};
    _timeout = setTimeout(function() {
    helper.abortReq(xhr);
    _callback();
    },
    _millisecond);
    }
    }
    },

    getParam: function(key, def, url) {
    var url = url || location.search,
    svalue = url.match(new RegExp('[\?\&]' + key + '=([^\&]*)(\&?)', 'i')),
    val = svalue ? svalue[1] : svalue;
    val = (val === null) ? '': val;
    val = decodeURIComponent(val);
    return val || def || "";
    },
    hasClass: function(obj, cls) {
    if (!obj) return;
    return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
    },

    addClass: function(obj, cls) {
    if (!obj) {
    return;
    }
    if (obj.length) {
    for (var i = 0; i < obj.length; i++) {
    if (!Tool.hasClass(obj[i], cls)) obj[i].className += " " + cls;
    }
    return;
    }
    if (!Tool.hasClass(obj, cls)) obj.className += " " + cls;
    },

    removeClass: function(obj, cls) {
    if (!obj) return;
    if (obj.length) {
    for (var i = 0; i < obj.length; i++) {
    if (Tool.hasClass(obj[i], cls)) {
    var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
    obj[i].className = obj[i].className.replace(reg, ' ');
    }
    }
    return;
    }

    if (Tool.hasClass(obj, cls)) {
    var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
    obj.className = obj.className.replace(reg, ' ');
    }
    },

    toggleClass: function(obj, cls) {
    if (Tool.hasClass(obj, cls)) {
    Tool.removeClass(obj, cls);
    } else {
    Tool.addClass(obj, cls);
    }
    }
    }

    var Render = {
		renderPhone: function(){
			var geturl = window.location.href;
//			var geturl = "http://10.10.10.82:12583/api/channel/giftpackage/index?channel=aefca7819e7028b5-1115&phone=15904611458";
			
			/*var urlArr = geturl.split('=');
			
			if(urlArr.length==3){
				var phone = parseInt(urlArr[2]) || "";
				var $Input = document.querySelector('#user-phone');
				$Input.value = phone;
				var $txt = $Input.parentNode.querySelector('.input-text');
				Tool.addClass($txt,'hide');
				$Input.setAttribute('readonly','true');			

				$submit = document.querySelector('#submit');
				$submit.removeAttribute("disabled");
			}else{
				return;
			}*/
		},
        coverSlip : function(link){
            var start=0 , end=0, move=0,distance=0;

            
            link.addEventListener('touchstart',function(e){
                 
                var touch = e.touches[0];
                start = move = parseInt(touch.pageY);
            },false);
            link.addEventListener('touchmove',function(e){
                var touch = e.touches[0];
                move = parseInt(touch.pageY);
            },false);
            link.addEventListener('touchend',function(e){
                end = move;
                distance = Math.abs(end-start);
                if(distance <= 10){
                      document.querySelector('.activity-details-cover').style.display = "block";
                }
                else{
                    Render.slip(link);
                }
            },false);

            var close = document.querySelector('.activity-details-cover-close');
            close.addEventListener('touchend',function(e){
                document.querySelector(".activity-details-cover").style.display = "none";
              //  Tool.removeClass(document.querySelector('body'),'over_main');
            },false);
            
        },
    //上下滑动箭头显示隐藏
        slip : function(link){
            var startY = 0,
                endY = 0,
                move = 0,
                distance = 0,
                pageY = 0;
            var oArrow = document.querySelector('.arrow');
            var height = window.screen.height;
            var lengthY = 0;
            var container = document.querySelector('.container-content');

            setInterval(function(){
            
                 pageY = window.pageYOffset;
                if(pageY <= 80){
                    Tool.removeClass(oArrow,'arrow_none');
                }else{
                    Tool.addClass(oArrow,'arrow_none');
                }
            },500);

        }, 
        loading : function(){
            var $loading = document.querySelector('.loading-box'),
            $bg = document.querySelector('.loading-bg-img>.loading-bg'),
            $status = document.querySelector('.loading-bg-img>.loading');
            $text = document.querySelector('.loading-bg-img>span.text');

            //
            var $progress = document.querySelector('.progress');
            var $bar = document.querySelector('.progress-bar');
            var tId;
            var progress = {
                timeout : 10,//计时器时间，单位：秒
                defaultWidth : 5,//默认长度
                maxWidth : 98,//最大长度
                per : 0.5//每隔X秒动画前进一次 
            }

            return {
                //显示loading，正在获取红包
                show : function(){
                    var data = Data.data,
                    baseUrl = data.promo_ip;
                    Tool.removeClass($loading,'hide');
                    $bg.src = baseUrl + 'image/loading_bg.png';
                    $status.src = baseUrl + 'image/loading.gif';
                    $text.src = baseUrl + 'image/get_0.png';
                    //
                    Render.loading.progressShow();


                    //隐藏金钱图
                    Tool.addClass(document.querySelector('.img-money-input'),'hide');
                    var $bag = document.querySelector('.img-bag-top'),
                        bagImg = $bag.src;
                    $bag.src = bagImg.replace('bag-1','bag-1-fetched');
                },
                hide : function(){
                    Tool.addClass($loading,'hide');
                    Render.loading.progressHide();
                },
                secStatus :function(){
                    var data = Data.data,
                    baseUrl = data.promo_ip;
                    $text.src = baseUrl + 'image/get_1.png';
                },
                lastStatus : function(){
                    var data = Data.data,
                    baseUrl = data.promo_ip;
                    //$text.src = baseUrl + 'image/get_empty.png';
                    $text.innerHTML = '抱歉，没有拿到红包<br />请一会再来吧';
                    //$status.src = baseUrl + 'image/loading_empty.png';
                    $status.className = 'loading empty';
                    //隐藏进度条
                    Render.loading.progressHide();
                },
                progressShow : function(){
                    var timeline,
                    per = timeline = progress.per,
                    bar = progress.defaultWidth, 
                    timeout = progress.timeout,
                    step = (progress.maxWidth - bar) / (timeout / per);
                    $bar.style.width = bar + '%';

                    Tool.removeClass($progress,'hide');
                    tId = setInterval(function(){
                        bar += step; 
                        $bar.style.width = bar + '%';
                        timeline += per;
                        if(timeline > timeout ){
                            clearInterval(tId);
                        }
                    },per * 1000);

                },
                progressHide : function(){
                    clearInterval(tId);
                    Tool.addClass($progress,'hide');
                }
            } 
        }(),
        init: function() {
            var data = Data.data,
            status = data.status;
            //渲染用户用户头像
            Render.headImg();
            //切换对应状态
            Render.switchStatus();
            //获取系统类型
            Render.downloadApp();
            Render.weixin();

		//	Render.qq();
        },


		partnerLinkBtn: function(content){
			content = content || document;	
			var btn = content.querySelector('.partner-link');

			if(Data.data.brand.is_show_partner == 0 || typeof(Data.data.brand.is_show_partner) == 'undefined'){
				Tool.addClass(btn,'hide');
//				btn.innerHTML ="  ";
//				btn.style.background = "transparent";
//				btn.style.height = 27+"px";
			}else if(Data.data.brand.is_show_partner == 1){
				btn.innerHTML = partner.name;

				btn.addEventListener('touchend',function(){
					location.href = partner.link;		
				});
			}
	
		},

        switchStatus : function(){
            //渲染用户提示信息，引号内数据
            var data = Data.data,
            errno = data.errno !=undefined ? data.errno :  11,
            brand = data.brand || {},
            partner = brand.partner || {},
            $partnerLogo = document.querySelector('.logo-box .partner'),
            partnerLogo = partner.logo || '',
            isShowBanner = parseInt(brand.is_show_banner) || 0,
            map = Data.map[errno],
            status = (map && map.type != undefined) ? map.type : 'errmsg',
            msg = data.brand || {},
            topmsg = msg && map && map.topmsg && msg[map.topmsg] || '操作太频繁啦！！！',
            $tipsContent = document.querySelector('.tips-content');

            baseUrl = data.promo_ip,
            $share = document.querySelector('.share-to-friend'),
            $company = document.querySelector('.external-company'),
            $app = document.querySelector('.download-app'),
            ifShare = parseInt(brand.show_toobar),
            ifShare = isNaN(ifShare) ? 1 : ifShare;


			var $logo = document.querySelector('.logo'),
			$titleImg = document.querySelector('.img-title');

			//设置logo，若传值为合作方logo否则为默认didilogo	

			if(msg.index_logo_url){
				$logo.querySelector('.img-responsive').src = "images/logo.jpg";
			}else{
			
				$logo.querySelector('.img-responsive').src = "images/logo.jpg";
			}

     		titleImg = 'image/bg_title.png';
			if(msg.index_banner_url){
				$titleImg.src = 'images/bg_title.png';		
			}else{
				$titleImg.src = 'images/bg_title.png';	
			}

	/*		
            //判断是否显示合作方logo
            if(partnerLogo){
                setTimeout(function(){
                Tool.removeClass($partnerLogo,'hide');
                $partnerLogo.style.backgroundImage = 'url('+ partnerLogo +')';
                $partnerLogo.style.height = document.querySelector('.logo-box img').height + 'px';
                },500)
            }
	*/

//			Tool.removeClass($partnerLogo,'hide');
//			if(typeof(msg.index_logo_url) == 'undefined'){
//				$partnerLogo.style.backgroundImage = 'url('+baseUrl+logo_new.png+')';
//			}
//            $partnerLogo.style.backgroundImage = 'url(image/'+ msg.index_logo_url +')';
//            $partnerLogo.style.height = document.querySelector('.logo-box img').height + 'px';

            Tool.addClass(document.querySelector('.voucher-content'),'hide');
            Tool.removeClass(document.querySelector('.'+status),'hide');
            //判断上方气泡文案长度
            if(topmsg.length<=17){
               $tipsContent.style.textAlign = 'center';
            }else{
               $tipsContent.style.textAlign = 'left';
            }

            $tipsContent.innerHTML = topmsg;

            //底部文案
            if(footMsg = msg.foot_msg){
                document.querySelector('.activity-desc p').innerHTML = footMsg;
                //document.querySelector('.activity-desc p').style.color='#9e9e9e';
            }

            //分享按钮及右上角的分享是否显示
            if(ifShare == 0){
                Tool.addClass($share,'hide');
                data.share.showToolBar = false;
            }else if(ifShare == 1){
                Tool.removeClass($share,'hide');
                data.share.showToolBar = true;
            }

            //商家按钮是否显示 
            Render.companyBtn();
            //渲染荣誉框
            Render.voucherContent();

            map && map.render && map.render(data) || Data.map[11].render(data);
        },
        voucherList : function(data){
        if(!(data && data.length)){
        return false;    
        }


        //设置logo
        Tool.addClass(document.querySelector('.img-title'),'active')

        var $voucherList = document.querySelector('.voucher-list')  ;
        var html = [],
        temp = '<div class="{type} clearfix">' + 
            '     <div class="amount"> ' + 
                '         <span class="unit">￥</span>' + 
                '         <span>{amount}</span>' + 
                '     </div>'+
            '     <div class="desc">' + 
                '         <p>{remark}</p>' + 
                '         <p>{deadline}到期</p>'+ 
                '     </div>' + 
            ' </div>';

        var str ,item,type,amount;
        var typeConf = {
        '100' : 'taxi',
        '200' : 'zhuanche'
        };

        if(!$voucherList){
        console.error('未能找到券列表容器');
        return;
        }

        for(var i in data) {
        str = temp; 
        item = data[i];
        type = typeConf[item.productid] || '';
        amount = item.amount || '';
        if(!type || amount.length > 2){
        continue; 
        }

        str = str.replace(/\{amount\}/g,item.amount || 0);
        str = str.replace(/\{remark\}/g,item.remark || item.name || '通用券' );
        str = str.replace(/\{deadline\}/g,item.deadline||'' );
        str = str.replace(/\{type\}/g,type || '' );

        html.push(str);
        }

        $voucherList.innerHTML = html.join('');

        var $count = document.querySelector('.voucher-count span');
        $count && ($count.innerHTML = html.length);

        //设置动画
        document.body.scrollTop=0;
        setTimeout(function(){
        Tool.addClass(document.querySelector('.container-content'),'fetched-active');
        },500)
        },
        //显示错误信息
        showErrmsg : function(){
            //document.querySelector('.errmsg .text').innerHTML = '您操作太频繁了';
            document.querySelector('#errmsg-text').innerHTML = '您操作太频繁了';
        },
        //显示已抢过 
        showFetched : function(msg){
        //    document.querySelector('.expired .text').innerHTML = '大礼包被抢完啦！';
            document.querySelector('.expired .text').innerHTML = msg;
			document.querySelector('.expired .tip').innerHTML = '你来晚了，下次早点来哦~';
        },
        companyBtn : function(){
            var data = Data.data,
            msg = data.brand || {},
            partner = msg.partner || {},
            baseUrl = data.promo_ip;
            $company = document.querySelectorAll('.external-company'),
            $app = document.querySelector('.download-app'), 
            ifCompany = partner.link ? 1 : 0;
            //商家按钮存在或不存在
            //ifCompany = 1;
      /*      if(!ifCompany){
                Tool.addClass($company,'hide');
                $app.style.width = '100%';
                $app.style.color = '#fff';
                $app.style.backgroundColor ='#ff8a01';
                $app.style.border = 'none';
            }else{
                $company.innerHTML = partner.name ||'合作商家';
                //$company.style.background = '#fff url('+msg.external_links_logo+') no-repeat left center';              
                document.querySelector('body').addEventListener('click', function(e) {
                    if (Tool.hasClass(e.target, 'external-company')) {
                       location.href = partner.link || '#';
                       return false;
                    }
                });
            }          
*/
//			Data.data.brand.is_show_partner = 0;

            if(msg.is_show_partner == 0 || typeof(msg.is_show_partner) == 'undefined'){
                Tool.addClass($company,'hide');
			//	document.querySelector('.external-company').className="hide";
                $app.style.width = '100%';
                $app.style.color = '#fff';
                $app.style.backgroundColor ='#ff8a01';
                $app.style.border = 'none';
            }else if(msg.is_show_partner == 1){

				for(var i = 0; i< $company.length; i++){
                	$company[i].innerHTML = partner.name ||'合作商家';
				}
                //$company.style.background = '#fff url('+msg.external_links_logo+') no-repeat left center';              
                document.querySelector('body').addEventListener('click', function(e) {
                    if (Tool.hasClass(e.target, 'external-company')) {
                       location.href = partner.link || '#';
                       return false;
                    }
                });
            }          
//			console.log(partner.name);
//			console.log($company);
//			console.log(msg.is_show_partner);
        },
        //渲染荣誉框
        voucherContent: function() {
            var data = Data.data,
            errno = data.errno, 
            map = Data.map,
            status = map && map[errno]!== undefined && map[errno].type || 'errmsg';

            var $content = document.querySelector('.' + status);

            Tool.removeClass($content, 'hide');
			if(errno == 7){
				data.msg_1 = '您已领过大礼包';
				$content.querySelector('.msg_1 .amount').style.fontSize = '14px';
				$content.querySelector('.msg_1 .amount').style.display = 'block';
				$content.querySelector('.msg_1 .amount').style.marginBottom = '0';
				$content.querySelector('.msg_1 .unit').style.display = 'none';
			}
            $content.querySelector('.msg_1 .amount') && ($content.querySelector('.msg_1 .amount').innerHTML = data.msg_1 || '');
           // $content.querySelector('.msg_2') && ($content.querySelector('.msg_2').innerHTML = data.msg_2 || '');
            
			$content.querySelector('.msg_2') && ($content.querySelector('.msg_2').innerHTML = data.msg_2 || '');

        },
        //渲染用户头像
        headImg: function() {
            var data = Data.data,
            baseUrl = data.promo_ip,
            img = "images/logo.jpg";
            $topImg = document.querySelector('.top-img');

            $topImg.src = img;
        },
        //设置微信显示，隐藏，分享
        weixin: function(fn) {
            //微信相关
            var onBridgeReady = function() {
                if (!WeixinJSBridge) {
                    return; // 保证WeixinJSBridge存在
                } 
                 if (!Data.data.share.showToolBar) {
                  WeixinJSBridge.call('hideToolbar'); //隐藏底部工具栏
                  WeixinJSBridge.call('hideOptionMenu'); //隐藏右上角分享按钮  
                }
             //  WeixinJSBridge.call('hideAllNonBaseMenuItem');
              // WeixinJSBridge.invoke('getNetworkType',{},function(e){alert(e.err_msg);});
               WeixinJSBridge.invoke('hideMenuItems',{"menuList":['menuItem:copyUrl']},function(res){});
                if(fn){
                   fn();
                }else{
     
                define_wx_share(WeixinJSBridge);
                }
            };

            //微信控制
            if (typeof WeixinJSBridge === "undefined") {
                document.addEventListener('WeixinJSBridgeReady', onBridgeReady);
                return;
            } else {
                onBridgeReady();
            }
            /*if(!Data.data.share.showToolBar){
                 WeixinJSBridge.call('hideToolbar'); //隐藏底部工具栏
                 WeixinJSBridge.call('hideOptionMenu'); //隐藏右上角分享按钮
                 return;
            }*/

        },

	/*
		qq: function(){
			wx.onMenuShareQQ({
				title: "12345",
				desc: "aaaaa",		
			})	
			
		},
	*/
        //初始化下载按钮对应的链接
        downloadApp: function() {
           /* if ((navigator.userAgent.match(/(Android)/i))) {
                Data.os = 'android';
            } else if ((navigator.userAgent.match(/(iPhone|iPod|ios|iPad)/i))) {
                Data.os = 'apple';
            }*/
           var os='';
           if ((navigator.userAgent.match(/(Android)/i)) ) {
               os = 'android';
             } else if ( (navigator.userAgent.match(/(iPhone|iPod|ios|iPad)/i)) ) {
               os = 'ios';
             }
          Data.os = Data.downloadApp[os];

            /*
               else if ( (navigator.userAgent.match(/(Windows phone)/i)) ) {
               callFn(opts.wp);
               } 
               */
        }
    }

      var Event = {
      //初始化
      init: function() {
          Event.bindEvent();
          //Event.downloadApp();
          //Event.shareToFriend();
          //Event.makePoster();
      },
      bindEvent: function() {
           //验证用户的手机号码
   
            document.querySelector('#user-phone').addEventListener('focus',function(){
                   document.querySelector('.input-text').style.visibility='hidden';               
            });
            document.querySelector('#user-phone').addEventListener('blur',function(){
               if(this.value.length==0){
                 document.querySelector('.input-text').style.visibility='visible';
               }else{
                 document.querySelector('.input-text').style.visibility='hidden';
               }
            });
           document.querySelector('#user-phone').addEventListener('input', function() {
                               var phone = this.value.replace(/\s/ig, ''),
                               $submit = document.querySelector('#submit');
                               if (/\d{11}/.test(phone)) {
                                   $submit.removeAttribute('disabled');
                               } else {
                                   $submit.style={};
                                   $submit.setAttribute('disabled', true);
                               }
           });
           document.querySelector('#submit').addEventListener('touchstart',function(){
                   if(this.disabled){
                        return ; 
                   }
                  this.style.backgroundColor='#cd6600';
           });
           document.querySelector('#submit').addEventListener('touchend',function(){
                   if(this.disabled){
                        return ; 
                   }
                  this.style.backgroundColor='#ff8a01';
           });
           //提交表单，获取红包
           document.querySelector('#fetche-voucher-form').addEventListener('submit', function(e){
                  //Render.loading.show();
                  Data.getVoucher();
                  e.preventDefault();
           });
      },
      shareToFriend :function(){

		  return false;

          var $div = document.querySelector('#dv-cover');
          var data = Data.data,
              baseUrl= data.promo_ip;
          document.querySelector('.voucher-content .share-to-friend').addEventListener('click', function(e) {
              //document.querySelector('#btn-hide-cover').src = baseUrl+"image/share-bg-btn.png";
              $div && Tool.removeClass($div,'hide');
              
          });

          document.querySelector('#btn-hide-cover').addEventListener('click', function(e) {
              $div && Tool.addClass($div,'hide');
          });

      },
      //下载客户端
      downloadApp: function() {
        /* var data = Data.data,
          $button = document.querySelector('.voucher-content .download-app'),
          os = Data.os;

          if (!os) {
              $button.innerHTML = '系统APP不支持';
              Tool.addClass($button, 'no-app');
              return;
          }

          document.querySelector('body').addEventListener('click', function(e) {
              if (Tool.hasClass(e.target, 'download-app')) {
                  location.href = Data.downloadApp[os];
              }
              return false;
          });*/
        	var data =Data.data,
            os=Data.os;
			
			var goto=function(type){
				
				if(type=="download"){
					url = os.downloadUrl;
					document.querySelector('.download-app').innerHTML = '下载客户端';
				}else{
					url = os.packageUrl; 
					document.querySelector('.download-app').innerHTML = '立即试用';
				}
				
				document.querySelector('.download-app').addEventListener('click',function(e){
					location.href = url;
				},false);
			}
         
			 var fn = function(){
				 
			 };
			    console.log(os); 
         	if(navigator.userAgent.match(/(micromessenger)/i)) {
            	Render.weixin(function(){
					setTimeout(function() {
						WeixinJSBridge.invoke('getInstallState', os, function(e) {
							// WeixinJSBridge.invoke('getInstallState', {packageName:"com.sdu.didi.psnger",packageUrl:"didipasnger://didi_apk_intalled_scheme"}, function(e) {
							 var msg = e.err_msg;
							 var url;
							if(msg.indexOf("get_install_state:yes") > -1){
								goto("app");
							}else{
								goto("download");
							}
						});
					}, 200);
				});
            }else if(os){
				goto("download");
            }else{
                document.querySelector('.download-app').style.opacity=0;
			}
             
             //alert(url);
             //document.querySelector('.download-app').addEventListener('click',function(e){
               //  location.href=url;
            // },false );
         
         //Render.weixin(fn);

      },
      makePoster : function(){
          //如果PC则不显示制作按钮,
          $btnBox = document.querySelector('.download .btn-box');

          //仅仅手机端允许
          if (navigator.userAgent.match(/(Android|iPhone|iPod|ios|iPad)/i)) {
              //允许制做海报
              //去掉边框，允许滚动
              Tool.addClass(document.querySelector('.container'),'mobile');
          }

          if(navigator.userAgent.match(/(micromessenger)/i)){
              Tool.removeClass($btnBox,'hide'); 
          }

      }
      }

/**
 * 定义微信分享接口
 * @param  {[type]} WeixinJSBridge [description]
 * @return {[type]}                [description]
 */
      function define_wx_share(WeixinJSBridge) {
          var share = Data.data.share;

          //WeixinJSBridge.call('hideToolbar'); //隐藏底部工具栏
          //WeixinJSBridge.call('hideOptionMenu'); //隐藏右上角分享按钮
          //WeixinJSBridge.call("showOptionMenu");
         // WeixinJSBridge.call('hideToolbar');
          // WeixinJSBridge.call('hideToolbar');
           /**
           * 分享给好友
           * @param  {[type]} argv [description]
           * @return {[type]}      [description]
           */
          WeixinJSBridge.on('menu:share:appmessage', function() {
              WeixinJSBridge.invoke('sendAppMessage', {
                  "appid": share.appid,
                  "img_url": share.img_url,
                  "link": share.link,
                  "title": share.title,
                  "desc": share.desc,
              },
              function(res) {});
          });

          /**
           * 分享到朋友圈
           * @param  {[type]} argv [description]
           * @return {[type]}      [description]
           */
          WeixinJSBridge.on('menu:share:timeline', function() {
              WeixinJSBridge.invoke('shareTimeline', {
                  "img_url": share.img_url,
                  "link": share.link,
                  "title": share.title,
                  "desc": share.desc,
              },
              function(res) {});
          });
      }

      document.addEventListener("DOMContentLoaded", function(ev) {
          //设置默认数据
          Data.data = didiActivityData;
          console.log(Data.data);      


          Data.init();
      },
      false);
})();

