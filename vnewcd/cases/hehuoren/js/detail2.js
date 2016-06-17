(function(){
    var self   = this,
        url_id = location.pathname.match(/\d{7,10}/);
    this.status = {
        com_id:'',
        follow:false,
        send_intention:false,
        name:'',
        logo:'',
        get_com_id:function(key){
            var k = key || 'com_id',ret={};
            return self.status.com_id!=''?ret[k]=self.status.com_id:'',ret;
        }
    };

    this.api = {
        basic: base_mobile + 'v4/startup/base_info',
        detail:base_mobile+'v4/startup',
        info:base_mobile+'v4/startup/ops_info',
        follow:base_mobile+'v3/follow',
        unfollow:base_mobile+'v3/unfollow'
    };
    if(url_id) self.status.com_id = url_id[0];
    //日志tag
    log.type = 'detail';
}).call(define('config'));

//Helper
(function(){
    var self = this;
    //文本换行转化为html标签
    this.decode_text = function (txt) {
        var html, txt_list, _i, _len;
        txt_list = txt.split('\n');
        html = '';
        for (_i = 0, _len = txt_list.length; _i < _len; _i++)
            html += txt_list[_i] + "<br>";
        return html;
    };
    //时间戳转为月日
    this.get_md = function(t){
        var tt =new Date(parseInt(t) * 1000),
            m = tt.getMonth()+ 1,
            d = tt.getDate(),
            mm = m < 9 ? '0'+ m : m,
            dd = d < 9 ? '0'+ d : d;
        return !t ? '':mm+'.'+dd;
    };
    //时间戳转为年
    this.get_y = function(t){
        var tt =new Date(parseInt(t) * 1000),
            y = tt.getFullYear();
        return !t ? '' : y;
    };
    //是否为数组
    this.is_array = function(o){
        return Object.prototype.toString.call(o) === '[object Array]';
    };
    //数组是否为空
    this.array_empty = function(a){
        return (!!a && self.is_array(a) && a.length>0);
    };
}).call(this);
//框架绑定
(function(){
    this.basic  = function() {
       return avalon.define(
            "basic",
            function (vm) {
                vm.data = {};
            }
        );
    };

    this.detail = function() {
       return avalon.define(
            "details",
            function (vm) {
                vm.data = {};
            }
        );
    }

}).call(define('framework'));

//Base_view
(function(){
    var self  = this,
        $noti = $('.notification'),
        $bk   = $('.bk');

    this.bk = {
        show:function(){
            $bk.show(0,function(){$bk.css('opacity',0.7);});
        },
        hide:function(){
            $bk.css('opacity',0);
            setTimeout(function(){$bk.hide()},100);
        }
    };

    this.notification = {
        show:function(text,isalter){
            $noti.fadeIn().children('.txt').html(text);
            if(!!isalter){
                $noti.removeClass('red').addClass('green');

            }
            else{
                $noti.removeClass('green').addClass('red');
            }
            setTimeout(function(){$noti.fadeOut();},3000);
        },
        hide:function(){
            $noti.fadeOut();
        }
    };

}).call(define('base_view'));

//数据获取
(function(){
    var self = this,
        default_param={
            uid:account_info.id,
            access_token:account_info.token
        };

    this.error = function(){
        base_view.notification.show('网络错误');
    };
    this.get = function(url,call,data){
        base_remote_data.ajaxjsonp(url,call,$.extend({},default_param,data),self.error);
    };
}).call(define('data_model'));

//获取Basic数据
(function(){
    var self = this;
    data_model.get(config.api.basic,function(data){
        var d = data || {};
        if(!!d.financing_stage){
            if(!!d.financing_stage.financing_progress){
                d.percent = d.financing_stage.financing_progress.percent || 0;
                d.day = d.financing_stage.financing_progress.day || 0;
                d.isfinish = true;
            }
            else{
                d.isfinish = false;
            }
            if(!!d.financing_stage.financing_result){
                d.message = d.financing_stage.financing_result.result_info;
            }
            else{
                d.message = !!d.financing_stage.financing_progress ? (d.financing_stage.financing_progress.progress_info || '') : '';
            }
            if (!d.financing_stage.financing_result && !d.financing_stage.financing_progress) {
                d.isfinish = null;
            }
        }
        //设置页面属性
        config.status.name = d.name;
        config.status.logo = d.logo;
        wechat_controll.append_card();
        framework.basic().data = d;
    },config.status.get_com_id());
}).call(define('basic_controll'));
//项目状态
(function(){
    var self = this;

    this.hook = function(data){
        if(!!data.is_follow){
            follow_controll.follow();
        }
        if(!!data.vc_state && parseInt(data.vc_state)>3){
            intention_controll.has_sent();
        }
    };

    data_model.get(config.api.info,self.hook,config.status.get_com_id());

}).call(define('info_controll'));
//详情
(function(){
    var self = this;
    //未上传头像，随机色
    this.investors_render = function(data){
        var l= 0,color=['#fad53e','#039be6','#81c683','#aed582','#f06292','#f57e16','#fad53e','#b39ddb','#64b5f6','#80cbc4'],cl = color.length;
        if(data.vc_list){
            l = data.vc_list.length;
            while(l){
                if(/.default_10000./g.test(data.vc_list[l-1].avatar)){
                    data.vc_list[l-1].avatar = false;
                    data.vc_list[l-1].avatar_color = color[Math.ceil(Math.random()*cl)-1];
                }
                l--;
            }
        }
        return data;
    };
    this.bp_render = function(data){
      var d = data ||{},host = 'bp',param={};
        if(!!d.bp){
            param.url = encodeURIComponent(d.bp.bp_format_url);
            param.all = d.bp.page_num;
            d.bp_link = host+=base_create_param(param);
        }
        return d;
    };
    this.render = function(data){
        return self.bp_render(self.investors_render(data));
    };
    data_model.get(config.api.detail,function(data){
        var d = data || {},
            encode_current_url=encodeURIComponent(location.href.split('?')[0]),
            pics = d.pics || [];
        //登陆注册回调链接
        d.link_login = "http://m.angelcrunch.com/account/login?source="+encode_current_url;
        d.link_apply = "http://m.angelcrunch.com/angel_vip_simple?source="+encode_current_url;
        d.link_apply_long="http://m.angelcrunch.com/investor/active?source="+encode_current_url;
        if(d.com_video){
            pics.unshift({
                small:'http://dn-acac.qbox.me/mobile/detailscom-video-place-holder.png',
                big:'http://dn-acac.qbox.me/mobile/detailscom-video-place-holder.png',
                vid: d.com_video.id
            })
        }
        d.pics =pics;
        album_controll.hook(pics);
        //产品使用
        d.products = false;
        if(!!d.product_use){
            if(!!d.product_use.android && d.product_use.android.length > 7){
                d.android = d.product_use.android;
                d.products = 1;
            }
            if(!!d.product_use.demourl && d.product_use.demourl.length > 7){
                d.ie = d.product_use.demourl;
                d.products = 1;
            }
            if(!!d.product_use.ios && d.product_use.ios.length > 7){
                d.apple = d.product_use.ios;
                d.products = 1;
            }
        }
        framework.detail().data = self.render(d);
    },config.status.get_com_id());
}).call(define('details_controll'));

//发送投资意向
(function(){
    var self = this,
        $intention=$('#send-intention'),
        $box = $('#none-investor'),
        $close=$box.children('.close'),
        $new_box = $('#new-none-investor'),
        $new_close = $new_box.children('.close');
    this.is_sent = false;
    this.has_sent = function(){
        $intention.addClass('done').removeAttr('href').html('<span>投资意向已发送</span>');
        self.is_sent = true;
    };
    this.send_auth_check = function(){
        if(!self.is_sent){
            if(account_info.role<1){
                $box.show();
            }
            else{
                location.href += '/investment';
            }
        }
    };
    this.send_auth_check_ = function(){
        var linkparam={
            source:location.href,
            title:'谢谢你通过天使汇向我提交投资意向。',
            message:'请先注册或登录天使汇账户，以便我后续和你联系具体的投融资事宜。',
            portrait:config.status.logo,
            id:config.status.com_id
        };
        if(!self.is_sent){
            if(!account_info.is_login){
                location.href='http://m.angelcrunch.com/account/regist'+base_create_param(linkparam);
            }
            else{
                if(account_info.role<1){
                    $new_box.fadeIn();
                }
                else{
                    location.href += '/investment';
                }
            }
        }
    };
    $intention.touchtap(function(){
        self.send_auth_check();
    },200);
    $close.touchtap(function(){$box.hide();});
    $new_close.touchtap(function(){$new_box.hide();});
}).call(_define('intention_controll'));
//分享二维码
(function(){
    var self = this,
        $share=$('#share-wechat'),
        $box=$('#PA-layer'),
        $close = $box.find('.close'),
        $wechatin = $('#wechat-in');
    this.wechat_in_share = function(){
        var ios='http://dn-acac.qbox.me/mobile/detailswechat-in-ios.png',
            android='http://dn-acac.qbox.me/mobile/detailswechat-in-android.png';
        return base_status.isios?$wechatin.fadeIn().children('img').attr('src',ios):$wechatin.fadeIn().children('img').attr('src',android);
    };
    this.generator = function(){
        var has_generate = false,
            qr_container=$box.find('.image-container'),
            qr_title=$box.find('.title'),
            qr_link=$box.find('input');
        return !base_status.iswechat?function(){
            var url=location.href.split('?')[0];
            qr_title.html("分享\""+config.status.name+"\"到微信");
            qr_link.val(url);
            $box.fadeIn(200);
            if(!has_generate){
                qr_container.qrcode({
                    render:'image',
                    width: 200,
                    height: 200,
                    color: "#3a3",
                    text: url,
                    showCloseButton: false
                });
                has_generate = true;
            }
        }:
            function(){
                self.wechat_in_share();
        };

    };
    $wechatin.touchtap(function(){$wechatin.hide()});
    $share.touchtap(self.generator());
    $close.touchtap(function(){$box.hide()});
}).call(define('qa_controll'));
//关注
(function(){
    var self = this,
        $follow = $('#follow-btn'),
        has_follow = false;
    this.follow = function(){
        $follow.addClass('active');
        has_follow = true;
    };
    this.unfollow = function(){
        $follow.removeClass('active');
        has_follow = false
    };
    this.do_follow = function(){
        data_model.get(config.api.follow,function(data){
            if(data.success){
                self.follow();
            }
            else{
                base_view.notification.show(data.message);
            }
        },$.extend({uid:account_info.id},config.status.get_com_id('id')));
    };
    this.do_unfollow = function(){
        data_model.get(config.api.unfollow,function(data){
            if(data.success){
                self.unfollow();
            }
            else{
                base_view.notification.show(data.message);
            }
        }, $.extend({uid:account_info.id},config.status.get_com_id('id')));
    };
    $follow.touchtap(function(){
      return has_follow?self.do_unfollow():self.do_follow();
    })
}).call(define('follow_controll'));

//微信卡片
(function(){
    var self = this;

    wechat_card.deffer = true;
    this.append_card = function(){
        if(base_status.iswechat) {
            wechat_card.img= config.status.logo.replace(/240x/,'350x');
            wechat_card.title=config.status.name+'正在天使汇上融资，查看详情并成为项目的天使投资人';
            wechat_card.render();
        }
    }
}).call(define('wechat_controll'));
//相册
(function(){
 var self = this,
     $box = $('.album'),
     $num = $("#album-num"),
     $num_current = $num.children('span').eq(0),
     $num_total = $num.children('span').eq(1),
     $item_container = $('#album-item-container'),
     $items = $(),
     pub_left= 0,
     pub_index= 0,
     zoom_index= 0,
     width = $(window).width();

    this.list_small = [];
    this.list_big = [];
    this.list_vid = [];
    this.hook = function(data){
        var big = [],small=[],vid = [];
        for(var i in data){
            big.push(data[i].big);
            small.push(data[i].small);
            !!data[i].vid  && vid.push(data[i].vid);
        }
        return self.list_big=big,self.list_small=small,self.list_vid=vid,self.init();
    };
    this.html = function(context){
        return "<div class='item'><img src='"+context+"'></div>";
    };
    this.html_small = function(offset){
        return self.html(self.list_small[offset]);
    };
    this.html_video=function(offset){
        return "<div class='item'><div class='video-container'><img src='"+self.list_small[offset]+"'><div id='youku' video='true' class='video'></div></div></div>";
    };
    this.first = function(){
        var ret='', l=self.list_big.length,has_video=false;
        for(var i = 0;i<l;i++){
            if(!!self.list_vid[i]){
                ret+=self.html_video(i);
                has_video = self.list_vid[i];
            }
            else{
                ret+=self.html_small(i);
            }
        }
        has_video && video_controll.init(has_video);
        $item_container.append(ret);
        $items=$item_container.children('div');
    };
    this.init_style = function(){
    };
    this.init = function(){
        self.first();
        $num_total.html(self.list_big.length);
    };
    this.zoom_out=function(index){
        zoom_index = pub_index;
        $items.eq(zoom_index).children('img').addClass('img-scale');
    };
    this.zoom_in=function(){
        $items.eq(zoom_index).children('img').removeClass('img-scale');
    };
    this.close = function(){
        $box.fadeOut(200);
    };
    this.num_update =function(index){
        var i =parseInt(index)+1;
        $num_current.html(i);
    };
    this.img_big = function(index){
        $items.eq(index).children('img').attr('src',self.list_big[index]);
    };
    this.show = function(index){
        pub_left=-parseInt(index)*width;
        pub_index=parseInt(index);
        $box.fadeIn(200);
        $items.eq(0).css('margin-left',pub_left+'px');
        self.num_update(index);
        self.img_big(index);
        self.init_style();
    };
    this.start = function(){
        //self.zoom_out();
    };
    this.move = function(mX){
        self.zoom_out();
        $items.eq(0).css('margin-left',(pub_left+mX)+'px');
    };
    this.end = function(eX){
        var r = eX, a = Math.abs(r), w = width, rw = 50;
        if(r>0){
            if(a>rw && pub_index>0){
                pub_left+=w;
                pub_index--;
            }
        }
        else{
            if(a>rw && pub_index+1<self.list_small.length){
                pub_left-=w;
                pub_index++;
            }
        }
        self.num_update(pub_index);
        self.img_big(pub_index);
        self.animate(pub_left,3/a*10000);
    };
    this.animate=function(to,during){
        var s = parseInt($items.eq(0).css('margin-left')),
            d = during||200,
            t = to || 0,
            timer = 0,
            n = 0,
            e = (t-s)/(d/13);
        timer = setInterval(function(){
            if(n>d){
                clearInterval(timer);
                $items.eq(0).css('margin-left',t);
            }
            else{
                s+=e;
                $items.eq(0).css('margin-left',s);
                n+=13;
            }
        },13);

    };
    this.cancel =function(){
        self.zoom_in();
    };
    this.touch = function(el){
        var startX,
            startY,
            startT,
            start = function(event){
                var  e = event || window.event;
                startX = e.touches[0].pageX;
                startY = e.touches[0].pageY;
                startT = new Date().getTime();
                event.preventDefault();
                self.start();
            },
            move = function(event){
                var  e = event || window.event;
                mX = e.touches[0].pageX - startX;
                mY = e.touches[0].pageY - startY;
                self.move(mX);
            },
            end = function(event){
                var  e = event || window.event,
                    eX = e.changedTouches[0].pageX - startX,
                    eY = e.changedTouches[0].pageY - startY,
                    eT = new Date().getTime(),
                    is_video=false;
                    target = e.target || e.srcElement,
                    dom_tree = [target,target.parentNode,target.parentNode.parentNode,target.parentNode.parentNode.parentNode];
                if(eT-startT<100 && Math.abs(eX)<5){
                    for(var i in dom_tree){
                        if(dom_tree[i].hasAttribute && dom_tree[i].hasAttribute('video')){
                            is_video=true;
                            video_controll.play();
                            break;
                        }
                    }
                    !is_video && self.close();
                }
                if(eT-startT>100 && Math.abs(eX)>10){
                    self.end(eX);
                }
                self.cancel();
            };
        if(el.nodeType && el.nodeType == 1){
            el.addEventListener('touchstart',start, false);
            el.addEventListener('touchmove',move, false);
            el.addEventListener('touchend',end, false);
        }
    };
    this.touchtap = function(el,fun){
        var startX,
            startY,
            startT,
            start = function(event){
                var  e = event || window.event;
                startT = new Date().getTime();
                startX = e.touches[0].pageX;
                startY = e.touches[0].pageY;
            },
            end = function(event){
                var  e = event || window.event,
                    mX = e.changedTouches[0].pageX - startX,
                    mY = e.changedTouches[0].pageY - startY,
                    eT= new Date().getTime(),
                    target = e.target || e.srcElement,
                    dom_tree = [target.parentNode,target.parentNode.parentNode],id = null;
                for(var i in dom_tree){
                    if(dom_tree[i].hasAttribute('pic-index')){
                        id = dom_tree[i].getAttribute('pic-index');
                        break;
                    }
                }
                if(eT-startT<100 && Math.abs(mX)<5 && id!=null){
                    fun(id);
                }
            };
        if(el.nodeType == 1){
            el.addEventListener('touchstart',start, false);
            el.addEventListener('touchend',end, false);
        }
    };
    self.touchtap(document.getElementById('pic-list'),function(index){
        self.show(index);
        video_controll.player();
    });
    self.touch(document.getElementById('album'));
    window.onresize=function(){width=$(window).width();}
}).call(define('album_controll'));

//视频播放
(function(){
    var self =this,
        player,
        vid = '';

    this.init = function(id){
        vid = id;
        self.loader('http://player.youku.com/jsapi',function(){});
    };

    this.loader = function (url,call){
        var d = document,
            head = d.getElementsByTagName('head'),
            h = head[0]|| d.body,
            s = d.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        h.appendChild(s);
        h.addEventListener('load', call);
    };

    this.player=function(){
        if(vid!=''){
            player = new YKU.Player('youku',{
                styleid: '1',
                client_id: '66655b02396537f4',
                autoplay: true,
                vid: vid
            });
        }
    };

    this.play = function(){
        try{
            player.playVideo();
            document.getElementsByTagName('video')[0].play();
        }
        catch(e){

        }

    }
}).call(define('video_controll'));

//APP查看自己投资人主页隐藏底部关注分享发送意向条
(function(){
    var self = this,
        $bar = $('.fixed-page-action');
    return base_status.isapp && $bar.hide();
}).call(_define('app_controller'));