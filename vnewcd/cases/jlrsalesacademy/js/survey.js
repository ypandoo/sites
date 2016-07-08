(function() {
  var e, _EVENTS;

  require.config({
    urlArgs: "_v=0.12",
    baseUrl: 'http://mat1.gtimg.com/www/mobtosite/js',
    paths: {
      'zepto': 'zepto.min',
      'domReady': "domReady",
      'mustache': 'mustache',
      'cross_http': 'corssdomain_http',
      'weixin_api': "weixin_api"
    }
  });

  _EVENTS = {
    tap: 'tap'
  };

  try {
    document.domain = 'qq.com';
  } catch (_error) {
    e = _error;
  }

  if (!/(android)|(iphone)|(ipod)/i.test(navigator.userAgent)) {
    _EVENTS.tap = 'click';
  }

  require(['zepto', 'corssdomain_http', 'weixin_api'], function($, crossHttp, WeixinApi) {
    var host, pages, panshi, survery, trace, user, _load_share_data, _load_timeline_data;
    pages = {
      option: {
        'window': {
          'width': null
        },
        page: {
          number: null
        }
      },
      init: function() {
        this.option.window.width = $(window).width();
        this.option.page.number = $('.page').length;
        $('.pages').width(this.option.window.width * this.option.page.number);
        $('.page').width(this.option.window.width);
        $.fx.off = false;
        return this.page_item = $(".pages");
      },
      next: function(e) {
        var index, left, page, width;
        width = this.option.window.width;
        page = $(e.target).parents('.page').eq(0);
        index = $('.page').index(page);
        left = width * index + width;
        return this.page_item.animate({
          translateX: -1 * left + 'px'
        }, 300, 'ease-out', function() {});
      },
      start: function(e) {
        var home;
        home = $(e.target).parents('.page').eq(0);
        return home.animate({
          scale: '3,3',
          opacity: 0
        }, 500, 'ease-out', function() {
          return home.remove();
        });
      }
    };
    host = {
      brower: function() {
        var brower, patternBrower, resultBrower, ua;
        ua = navigator.userAgent;
        patternBrower = /MicroMessenger|QQLiveBrowser|qqvideobrower|QQ\/|qqnews/gi;
        resultBrower = patternBrower.exec(ua);
        if (resultBrower != null) {
          switch (resultBrower[0].toLowerCase()) {
            case 'micromessenger':
              brower = 'wx';
              break;
            case 'qqlivebrowser':
            case 'qqvideobrower':
              brower = 'videoapp';
              break;
            case 'qq/':
              brower = 'qq';
              break;
            case 'qqnews':
              brower = 'newsapp';
              break;
            default:
              brower = 'html5';
          }
        } else {
          brower = 'html5';
        }
        this.brower = function() {
          return brower;
        };
        return brower;
      },
      system: function() {
        var patternSystem, resultSystem, system, ua;
        ua = navigator.userAgent;
        patternSystem = /iPhone|Android/gi;
        resultSystem = patternSystem.exec(ua);
        if (resultSystem != null) {
          switch (resultSystem[0].toLowerCase()) {
            case 'iphone':
              system = 'ios';
              break;
            case 'android':
              system = 'android';
              break;
            default:
              system = 'html5';
          }
        } else {
          system = 'html5';
        }
        this.system = function() {
          return system;
        };
        return system;
      }
    };
    trace = function(msg) {
      var log;
      if (!/debug/.test(window.location.href)) {
        return;
      }
      log = $("#trace-log");
      if (!log.length) {
        log = $('<div id="trace-log" style="position:absolute;top:0;z-index:10000;"></div>');
        log.appendTo('body');
      }
      return log.html(log.html() + '<br />' + msg);
    };
    user = {
      user_info: null,
      login_type: 0,
      get_params: function() {
        var data;
        data = {
          login: this.login_type
        };
        if (this.login_type === 2) {
          data['access_token'] = this.access_token;
          data['openid'] = this.openid;
          data['appid'] = window.page_config.appid;
        }
        return data;
      },
      is_login: function() {
        var access_token, brower, open_id, skey, system, uin;
        brower = host.brower();
        system = host.system();
        if (brower === 'wx') {
          open_id = $.fn.cookie('tencentvideo_openid');
          access_token = $.fn.cookie('tencentvideo_access_token');
          trace('openid:' + open_id);
          trace('access_token:' + access_token);
          if ((open_id != null) && (access_token != null)) {
            this.user_info = {
              open_id: open_id,
              access_token: access_token
            };
            this.login_type = 2;
            return true;
          } else {
            trace('获取cookie失败');
            return false;
          }
        } else if (brower === 'videoapp') {
          if (system === 'android') {
            uin = window.Android.getCookieValue('uin');
            skey = window.Android.getCookieValue('skey');
          } else {
            uin = $.fn.cookie('uin');
            skey = $.fn.cookie('skey');
          }
          if ((uin != null) && (skey != null)) {
            this.user_info = {
              uin: uin,
              skey: skey
            };
            this.login_type = 1;
            return true;
          } else {
            return false;
          }
        } else {
          this.login_type = 1;
          return true;
          uin = $.fn.cookie('uin');
          skey = $.fn.cookie('skey');
          if ((uin != null) && (skey != null)) {
            this.user_info = {
              uin: uin,
              skey: skey
            };
            return true;
          } else {
            return false;
          }
        }
      },
    };
    panshi = {
      post: function() {
        var CONSTANT_RANK, CONSTANT_SOURCE, CONSTANT_URL, data, k, survey_data, url, user_data, v, vote_id;
        CONSTANT_URL = '';
        CONSTANT_SOURCE = 3;
        CONSTANT_RANK = 0;
        vote_id = window.page_config.voteid;
        url = CONSTANT_URL + vote_id + '/submit';
        survey_data = survery.get_params();
        user_data = user.get_params();
        data = {
          source: CONSTANT_SOURCE,
          answer: JSON.stringify(survey_data),
          rank: CONSTANT_RANK,
          format: 'script',
          callback: 'parent.postCallback',
          score: survery.score
        };
        for (k in user_data) {
          v = user_data[k];
          data[k] = v;
        }
        return crossHttp(url, {
          data: data,
          method: 'post'
        });
      }
    };
    survery = {
      html: [],
      score: 0,
      subject_length: 0,
      subject_count: 0,
      result: {},
      answer: {},
      init: function() {
				
        var i, item, self, _i, _len, _ref,
          _this = this;
        self = this;
        if (window.page_config.subject != null) {
          this.subject_count = window.page_config.subject.length;
          this.subject_length = window.page_config.subject.length;
          _ref = window.page_config.subject;
          for (i = _i = 0, _len = _ref.length; _i < _len; i = ++_i) {
            item = _ref[i];
            this.creat_item(i + 1, item);
          }
          $('.home').after(this.html.join(''));
        }
        this.creat_result();
        $(document).on(_EVENTS.tap, '.option', function(e) {
          var optionid, score, subjectid;
          self.subject_count -= 1;
          score = parseInt($(this).attr('score'));
          optionid = $(this).attr('optionid');
          subjectid = $(this).parent().attr('subjectid');
          if (optionid) {
            self.answer[subjectid] = {
              selected: [optionid]
            };
          }
          self.score += score;
          if (self.subject_count === 0) {
            return self.end();
          }
        });
        $(document).on(_EVENTS.tap, '#share', function(e) {
          return _this.share();
        });
        $(document).on(_EVENTS.tap, '#again', function(e) {
          return _this.again();
        });
        $(document).on(_EVENTS.tap, '#weixin', function(e) {
          return _this["public"]();
        });
        return $("#weixin").hide();
      },
      get_params: function() {
        return this.answer;
      },
      creat_item: function(i, data) {
        var html, option, _i, _len, _ref;
        html = [];
        html.push('<div class="page">\
                  <div class="page-content">\
                      <div class="progress"><div><span>' + i + '</span>/' + this.subject_length + '</div></div>\
                      <h2>' + data.title + '</h2>\
                      <ul class="options" subjectid=' + data.subjectid + '>');
        _ref = data.option;
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          option = _ref[_i];
          html.push('<li class="next option" optionid="' + option.optionid + '" score="' + option.score + '">' + option.title + '</li>');
        }
        html.push('</ul></div></div>');
        return this.html.push(html.join(''));
      },
      creat_result: function() {
        var html;
        html = [];
        if ((window.page_config.show_score != null) && window.page_config.show_score === false) {

        } else {
          html.push('<div class="score"><b>0</b>');
          if ((window.page_config.index != null) && (window.page_config.index.name != null)) {
            html.push('<span>本次答对<i>'+ '</i>题数</span>');
          }
          html.push('</div>');
        }
		html.push('<div style="text-align:center"><p style="margin-top:40px"><img src="images/win.png" width="250px"/></p></div>');
        html.push('<p class="discription"></p>');
        html.push('<ul class="options">');
       //html.push('<li id="share"><span class="share">给好友看看</span></li>');
        html.push('</ul>');
        return $('.result .page-content').html(html.join(''));
      },
      find_result: function() {
        var end, result, start, _i, _len, _ref, _results;
        _ref = window.page_config.result;
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
          result = _ref[_i];
          start = result.range_start;
          end = result.range_end;
          if (this.score >= start && this.score <= end) {
            this.result = result;
            break;
          } else {
            _results.push(void 0);
          }
        }
        return _results;
      },
      share: function() {
        return $(".share_overmask").show();
      },
      again: function() {
        return window.location.href = window.page_config.next.url;
      },
      "public": function() {
        var nickname, username;
        try {
          if (window.page_config.weixin != null) {
            username = window.page_config.weixin.username;
            nickname = window.page_config.weixin.nickname;
            if (window.WeixinJSBridge != null) {
              WeixinJSBridge.invoke("profile", {
                "username": username,
                "nickname": nickname
              });
            }
          }
        } catch (_error) {
          e = _error;
          return alert(e.message);
        }
      },
      end: function() {
        this.find_result();
        
        $('.result .discription').html(this.result.summary);
        if ((this.result.conclusion != null) && this.result.conclusion !== '') {
          $('.result .discription').before('<div class="conclusion"><span>' + this.result.conclusion + '</span></div>');
        }
		
		var result_back = survery.get_params();	
		var num = 0;
		var test_data = new Array;
		for(var i in result_back)
		{
			test_data["qid"+num] = i;
			test_data["aid"+num] = result_back[i].selected[0];
			num++;
		}	
		
		var phone = localStorage.mobile;
		if(null == phone)
		{
			phone = getCookie("mobile");
		}
		var submit_data = {
							"qid0": test_data["qid0"],
							"qid1": test_data["qid1"],
							"qid2": test_data["qid2"],
							"qid3": test_data["qid3"],
							"qid4": test_data["qid4"],
							"aid0": test_data["aid0"],
							"aid1": test_data["aid1"],
							"aid2": test_data["aid2"],
							"aid3": test_data["aid3"],
							"aid4": test_data["aid4"],
							"phone": phone
							
		};
		
		//submit_data["phone"] = localStorage.mobile;
		$.post('questanswer.php', submit_data,
				function(data)
				{
					if(data != 0)
					{
						this.score = data.score;
						var correct_num = parseInt(this.score/20);
						$('.result .score b').html(correct_num + '题'); 
					}
				},
				"json")
        //return panshi.post();
      },
	  
      style: function() {
        var banner, color, cover, style_config, _style;
        //style_config = window.page_config.style;
        color = "#37b9a1";//style_config.color;
        //if (style_config.color_action == null) {
          //style_config.color_action = color;
        //}
        //if (style_config.color_result == null) {
          //style_config.color_result = color;
        //}
        cover = "../images/0.jpg";//style_config.cover;
        banner = "";//style_config.banner;
        _style = '<style type="text/css">';
        /*if (window.page_config.next.url === '') {
          _style += "#again{display:none;}";
        }*/
        _style += '\
          /*banner图*/\
          .page-content {background-image: url(' + banner + ');}\
          /*封面图*/\
          .home .page-content {background-image: url(' + cover + ');}\
          /* 主题色*/\
          .progress div,h2{color:' + color + ';}\
          .progress div,h2{border:5px solid ' + color + ';}\
          .options li,.home .start span{background-color:' + color + ';}\
          /*主题按下色*/\
          .options li:active,.home .start span:active{background-color:' + "#108872" + ';}\
          /*结果反色*/\
          .result .score{background-color:' + "#E84C36" + ';}\
          .result .score span i{color:' + "#E84C36" + ';}';
        _style += '</style>';
        return $("head").append($(_style));
      }
    };
	
    survery.style();
    _load_share_data = function() {
      var config, data;
      data = {};
      config = window.page_config;
      data.imgUrl = config.share.icon;
      data.link = config.publish_url;
      if (!data.link) {
        data.link = parent.window.location.href;
      }
      if (!((survery.result != null) && survery.result.summary)) {
        data.title = config.share.title;
        data.desc = config.share.abstract;
        return data;
      }
      if (config.index.name == null) {
        config.index.name = '';
      }
      /*if ((window.page_config.show_score != null) && window.page_config.show_score === false) {
        data.title = '我是' + survery.result.conclusion + '，来回答几道题，看看你的测试结果！';
      } else {
        data.title = '我的' + config.index.name + '指数为:' + $('.score b').html() + '!' + config.share.abstract;
      }*/
	  data.title = '恭喜你完成答题！';
      data.desc = survery.result.summary;
      return data;
    };
    _load_timeline_data = function() {
      var data;
      data = _load_share_data();
      data.desc = data.title;
      return data;
    };
    return $(function() {
		
		if(!localStorage.mobile || !localStorage.jlrlogin || localStorage.jlrlogin == 0)
		{
			sessionStorage.preTab = location.href;
			window.location.replace( "login.html");
			return;
		}
		
		var name,value,i;
		var str=location.href;//获得浏览器地址栏URL串
		var num=str.indexOf("?");
		str=str.substr(num+1);//截取“?”后面的参数串
		var arrtmp=str.split("&");//将各参数分离形成参数数组
		num=arrtmp[0].indexOf("=");
		if(num>0){
			value=arrtmp[0].substr(num+1);//取得参数值
		}
		else
		{
			alert("请通过正确的形式访问！");
			sessionStorage.preTab = location.href;
			window.location.replace( "noquestion.html"); 
			return;
		}
		 
		var phone = localStorage.mobile;
		if(null == phone)
		{
			phone = getCookie("mobile");
		}
	  	 var submit_data = {
				'phone': phone,
				'date': value
		};
				
		$.ajax({
         url: '../getquestion_test.php',
         type: "POST",
         data: submit_data,
         dataType: "json",
		 async: false,
         success:function(data) {
				 if(data.voteid == 1 && data.subject && data.subject.length == 5)
				{
					window.page_config = data;
				}
				else if(data.voteid == 1001)
				{
					window.location.replace("answered.html");
					return;
				}
				else{
					alert("读取题目信息错误！");
					sessionStorage.preTab = location.href;
					window.location.replace("noquestion.html");
					
				}
			},
		 error:function(){
				alert("读取题目信息错误！");
				sessionStorage.preTab = location.href;
				window.location.replace("noquestion.html");
			}
         });
		 
      survery.init();
      pages.init();
      $(document).on(_EVENTS.tap, '.next', function(e) {
        return pages.next(e);
      });
      $(document).on(_EVENTS.tap, '.start', function(e) {
        try {
          return pages.start(e);
        } catch (_error) {
          e = _error;
          return alert(e);
        }
      });
      $(document).on(_EVENTS.tap, '.share_overmask', function() {
        return $(".share_overmask").hide();
      });
      return $(".page-loading-mask").animate({
        opacity: 0
      }, 500, 'ease-out', function() {
        return $(".page-loading-mask").remove();
      });
    });
  });

}).call(this);
/*  |xGv00|5704407ceccb05443b43b7990f101027 */