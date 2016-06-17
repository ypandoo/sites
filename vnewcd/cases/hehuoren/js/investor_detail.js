(function(){
    var url_id = location.pathname.match(/\d{7,10}/);
    this.page_config={
        api_investor_details:base_mobile+'v4/user',
        api_follow:base_mobile+'v3/follow',
        api_unfollow:base_mobile+'v3/unfollow',
        api_follower:base_mobile+'v3/user/follower',
        api_following:base_mobile+'v3/user/focused',
        api_com_list:base_mobile+'v2/startup',
        api_com_submit:base_mobile+'v2/user/submit_com',
        api_ops_info:base_mobile+'v4/user/ops_info',
        default_param:{
            uid:account_info.id,
            access_token:account_info.token
        }
    };
    //根据环境切换跳转注册链接
    this.page_link={};
    page_link.reg='/account/regist';
    page_link.create='/startup/create';
    this.page_status={
        //投资人预设ID
        user_id:'',
        follow:false,
        send_intention:false,
        name:'',
        portrait:'',
        //是否为查看自己主页
        is_self : account_info.id == url_id,
        get_user_id:function(){
            return page_status.user_id != ''?{user_id:page_status.user_id}:{};
        }
    };
    if(url_id) page_status.user_id = url_id[0];
    //微信卡片异步添加
    this.wechat_card.deffer=true;
    log.type = 'investor_detail';
}).call(this);
//数据转HTML
(function(){{
    var self = this;
    this.decode_text = function (txt) {
        var html, txt_list, _i, _len;
        txt_list = txt.split('\n');
        html = '';
        for (_i = 0, _len = txt_list.length; _i < _len; _i++)
            html += "<p>" + txt_list[_i] + "</p>";
        return html;
    };
    this.get_url = function(id){
        return base_protocol+id+'.'+base_host;
    };
    this.is_array = function(o){
        return Object.prototype.toString.call(o) === '[object Array]';
    };
    this.array_empty = function(a){
        return (!!a && self.is_array(a) && a.length>0);
    };
}}).call(this);
//数据获取
(function(){
    this.page_remote_data=function(url,call,data){
        base_remote_data.ajaxjsonp(url,function(data){
            call(data);
        },$.extend(true,{},page_config.default_param,{id:page_status.user_id,user_id:page_status.user_id},data),function(){view_notification.show('网络错误');});
    };
    this.page_remote_data_syn=function(url,call,data){
        base_remote_data.ajaxjsonp(url,function(data){
            call(data);
        },$.extend(true,{},page_config.default_param,data),function(){view_notification.show('网络错误');});
    };
}).call(this);
//获取当前页面ID
(function(){
    this.get_host_id=function(call){
        if(page_status.user_id == ''){
            page_remote_data(api.host_id,function(data){
                if(data.hasOwnProperty('ret')){
                    page_status.user_id=data.ret;
                    call(data.ret);
                }
            });
        }
        else{
            call(page_status.user_id);
        }
    }
}).call(this);
//框架绑定
(function(){
    this.avalon_model={};
    this.avalon_attach_details= function() {
        return function (data) {
            avalon_model.details = avalon.define("investor-details", function (vm) {
                vm.data = data;
            });
        };
    };

    this.avalon_model.entrelist=avalon.define("entre-list", function (vm) {
            vm.data = {
                name: '',
                list: '',
                select: function () {
                }
            };
    });
    this.avalon_model.followlist=avalon.define("follow-list", function (vm) {
            vm.data = {};
    });
}).call(this);
//消息通知
(function(){
    var $dom=$('.notification'),$bk=$('.bk');
    this.view_bk={
        show:function(){
            $bk.show(0,function(){$bk.css('opacity',0.7);});
        },
        hide:function(){
            $bk.css('opacity',0);
            setTimeout(function(){$bk.hide()},100);
        }
    };
    this.view_notification={
        show:function(text){
            $dom.fadeIn().children('.txt').html(text);
            if(typeof arguments[1]!='undefined' && !arguments[1]){
                $dom.removeClass('red').addClass('green');

            }
            else{
                $dom.removeClass('green').addClass('red');
            }
            setTimeout(function(){$dom.fadeOut();},3000);
        },
        hide:function(){
            $dom.fadeOut();
        }
    };
}).call(this);
//投资人信息获取
(function(){
    var self = this;
    this.render = function(data){
        var ret = data || {},edu=[],career=[];
        if(ret.edu){
            for(var i in ret.edu){
                edu = [];
                !!ret.edu[i].school && edu.push(ret.edu[i].school);
                !!ret.edu[i].degress && edu.push(ret.edu[i].degress);
                !!ret.edu[i].major && edu.push(ret.edu[i].major);
                ret.edu[i].title = edu.join('·');
            }

        }
        if(ret.career && false){
            for(var m in ret.career){
                career = [];
                !!ret.career[m].company && career.push(ret.career[m].company);
                !!ret.career[m].title && career.push(ret.career[m].title);
                ret.career[m].during = ret.career[m].start+'~'+(!!ret.career[m].end?ret.career[m].end:'至今');
                ret.career[m].title = career.join('·');
            }
        }
        ret.services = !!ret.service ? ret.service.split('·') : [];
        ret.avatar=ret.avatar.replace(/\d{0,3}x$/,'800x');
        return ret;
    };
    page_remote_data_syn(page_config.api_investor_details, function (data) {
        if (data.hasOwnProperty('user')) {
            avalon_attach_details()(self.render(data.user));
            page_status.name = data.user.name;
            page_status.user_id = data.user.id;
            page_status.portrait = data.user.avatar;
            data.user.follower && (follow_view.total_follower = data.user.follower.follower_count);
            data.user.following && (follow_view.total_following = data.user.following.following_count);
            //微信卡片制作
            wechat_card.img = page_status.portrait.replace(/\d{1,3}x$/, '310x');
            wechat_card.title = '向投资人' + page_status.name + '提交商业计划书';
            wechat_card.render();
            //异步获取数据后填充投资人信息
            view_personal_info();
        }
    }, page_status.get_user_id());
    get_host_id(function(){
        page_remote_data(page_config.api_ops_info,function(data){
           data.user && follow_hook(data.user.is_follow==1);
        });
    });
}).call({});

//个人主页
(function(){
    var $share=$('#share'),
        $qr_box = $('#personal-card'),
        qr_close=$qr_box.find('.close'),
        qr_container=$qr_box.find('.image-container'),
        qr_title = $qr_box.find('.title'),
        qr_link=$qr_box.find('input'),
        $wechatin = $('#wechat-in');
    this.wechat_in_share = function(){
        var ios='http://dn-acac.qbox.me/mobile/detailswechat-in-ios.png',
            android='http://dn-acac.qbox.me/mobile/detailswechat-in-android.png';
        return base_status.isios?$wechatin.fadeIn().children('img').attr('src',ios):$wechatin.fadeIn().children('img').attr('src',android);
    };
    this.view_qrcode={
        sta:false,
        show:function(){
            var url=location.href.split('?')[0];
            $qr_box.fadeIn(200);
            qr_link.val(url);
            qr_title.html('分享"'+(page_status.name || '投资人')+'"的名片');
            if(!view_qrcode.sta){
                qr_container.qrcode({
                    render:'image',
                    width: 200,
                    height: 200,
                    color: "#3a3",
                    text: url,
                    showCloseButton: false
                });
                view_qrcode.sta=true;
            }

        },
        hide:function(){
            $qr_box.fadeOut(100);
        }
    };
    $wechatin.touchtap(function(){$wechatin.hide()});
    $share.touchtap(function(){
       return !base_status.iswechat ? view_qrcode.show() : wechat_in_share();
    });
    qr_close.touchtap(function(){
        view_qrcode.hide();
    })
}).call(this);
//关注投资人
(function(){
    this.follow_sta=false;
    this.dom_follow_btn=$('#follow-btn');
    this.follow_view={
        follow:function(){
            dom_follow_btn.addClass('active');
            follow_sta=true;
        },
        unfollow:function(){
            dom_follow_btn.removeClass('active');
            follow_sta=false;
        }
    };
    this.follow_model={
        follow:function(){
            page_remote_data(page_config.api_follow,function(data){
                if(data.hasOwnProperty('success')){
                    if(data.success){
                        follow_view.follow();
                    }
                    else{
                        view_notification.show(data.message);
                    }
                }
            });
        },
        unfollow:function(){
            page_remote_data(page_config.api_unfollow,function(data){
                if(data.success){
                    follow_view.unfollow();
                }
                else{
                    view_notification.show(data.message);
                }
            });
        }
    };
    this.follow_hook=function(isfollow){
        if(isfollow){
            follow_view.follow();
        }
        else{
            follow_view.unfollow();
        }
    };
    dom_follow_btn.touchtap(function(){
        if(page_status.is_self){
            return view_notification.show('错误:禁止关注自己');
        }
        if(!follow_sta){
            follow_model.follow();
        }
        else{
            follow_model.unfollow();
        }
    });
    
}).call(this);
//提交项目结果成功
(function(){
    var $result       = $('#sendresult'),
        $resultclose  = $result.find('.yesiknow'),
        $com_name     = $('#result-com-name'),
        $investor_por = $('#result-investor-por'),
        $investor_name= $('#result-investor-name'),
        $title        = $('#result-title');

    this.view_personal_info=function(){
        $investor_por.attr('src',page_status.portrait);
        $investor_name.html(page_status.name);
    };
    this.view_result={
        show:function(com,title){
            var c=!!com?'"'+com+'"':'',t=title || '提交项目成功';
            $com_name.html(c);
            $title.html(t);
            $result.fadeIn(100);
        },
        hide:function(){
            $result.fadeOut(100);
        }
    };
    $resultclose.touchtap(function(){
        view_result.hide();
    });
}).call(this);
//提交项目
(function(){
    var self = this;
    this.dom_submit_btn=$('#submit-project');
    this.my_com_list=function(call){
        page_remote_data(page_config.api_com_list,function(data){
            call(data);
        },{type:3});
    };
    this.submit_my_commit=function(id,success_function){
        get_host_id(function(target_id){
            page_remote_data(page_config.api_com_submit,function(data){
                if(data.hasOwnProperty('success')){
                    if(data.success){
                        if(typeof success_function != 'undefined'){
                            success_function();
                        }
                        else{
                            view_list_display.hide();
                            view_result.show();
                        }
                    }
                    else{
                        view_notification.show(data.message);
                    }
                }
                else{
                    view_notification.show('提交失败');
                }
            },{target_id:target_id,com_id:id});

        });

    };
    this.com_list_display = function(){
        if(page_status.is_self){
            return view_notification.show('禁止向自己提交项目');
        }
        //判断对应逻辑
        if(!account_info.is_login){
            //跳转链接传参
            var linkparam={
                source:location.href,
                title:'谢谢你通过天使汇向我提交项目。',
                message:'请先注册或登录天使汇账户，以便我后续和你联系具体的投融资事宜。',
                portrait:page_status.portrait,
                id:page_status.user_id
            };
            location.href=page_link.reg+base_create_param(linkparam);
        }
        else{
            my_com_list(function(data){
                if(data.hasOwnProperty('total') && data.total>0){
                    //显示列表
                    view_list_display.show();
                    //输出列表
                    view_list_import(data.list);
                }
                else{
                    //跳转到创建项目页
                    location.href=page_link.create+base_create_param({'source':location.href});
                }
            });
        }
    };
    dom_submit_btn.touchtap(function(){
       self.com_list_display();
    });
}).call(this);
//当前用户项目列表
(function(){
    var wh=$(window).height(),
        $header=$('#header'),
        $detail=$('.details'),
        $list=$('#submit-com-list'),
        $cancle=$('#list-cancle'),
        $confirm=$('#list-confirm'),
        $current_select=$(),
        select_id=0;
    this.view_body_lock={
        lock:function(){
            $header.css({'position':'fixed'});
            $detail.css({'height':wh,'overflow':'hidden'});
        },
        unlock:function(){
            $header.css({'position':'static'});
            $detail.css({'height':'auto','overflow':'auto'});
        }
    };
    this.view_list_display={
        show:function(){
            view_body_lock.lock();
            $list.css({'top':0});
        },
        hide:function(){
            view_body_lock.unlock();
            $list.css({'top':'100%'});
        }
    };
    this.view_list_import=function(list){
        var data={};
        data.list=list||false;
        data.name=page_status.name||'';
        data.select=function(){
            $current_select.removeClass('active');
            $current_select=$(this).children('em').addClass('active');
            select_id=$(this).data('id');
            if(select_id>0){
               $confirm.addClass('active');
            }
        };
        avalon_model.entrelist.data=data;
        //状态重置
        $confirm.removeClass('active');
        select_id=0;
    };
    $confirm.touchtap(function(){
        if(select_id>0){
            submit_my_commit(select_id);
        }
    });
    $cancle.touchtap(function(){
       view_list_display.hide();
    });

}).call(this);
//创建项目完成 回调 提交项目
(function(){
    if($_GET.hasOwnProperty('com_id') && $_GET.hasOwnProperty('time') && $_GET.hasOwnProperty('com_name')){
        if($.now()-$_GET.time<20000){
            this.submit_my_commit($_GET.com_id,function(){
                view_result.show(decodeURIComponent($_GET.com_name),'创建并提交项目成功');
            });
        }
    }
}).call(this);
//默认提交项目
(function(){
    if($_GET.hasOwnProperty('default_submit')){
        com_list_display();
    }
}).call(this);

(function(){
    var self = this,
        h = $(window).height(),
        $details = $('.details'),
        $following = $('#following'),
        $follower = $('#follower'),
        $slide_page = $('#slide-page'),
        $slide_back_btn = $('#slide-back'),
        $slide_title = $('#slide-title'),
        $slide_list = $('#slide-list'),
        $slide_loading =$('#slide-loading'),
        following_index = 0,
        follower_index = 0,
        following_list = [],
        follower_list = [],
        following_default_list=[],
        follower_default_list=[],
        loadlock = false,
        is_following = true;
    this.total_follower  = 0;
    this.total_following = 0;
    this.slide_left = function(text){
        $slide_title.html(text);
        $details.css({'margin-left':-100+'%',height:h}).addClass('slide-left');
        $slide_page.css({height:h});
    };
    this.render = function(data){
        return $slide_loading.hide(),avalon_model.followlist.data = data;
    };
    this.slide_right = function(){
        $details.css({'margin-left':0+'%',height:'auto'}).removeClass('slide-left');
    };
    this.slide_height_syn = function(){
        var nh = $(window).height();
        if(Math.abs(nh-h)>5){
            h = nh;
            $slide_page.css({height:h});
            $slide_list.height(h-46);
        }
    };
    this.filter_default_avatar = function(list,is_following){
        var l = list.length,ret=[];
        if(!!l){
            for(var i = 0 ; i < l; i++){
                if(!/default_10000/.test(list[i].avatar)){
                    ret.push(list[i]);
                }
                else{
                    is_following?following_default_list.push(list[i]):follower_default_list.push(list[i]);
                }
            }
        }
        return ret;
    };
    this.get_following_list = function(next){
        is_following = true;
        if(following_list.length==0 || (next && Math.ceil(self.total_following/10)>following_index+1)){
            following_index++;
            $slide_loading.show();
            page_remote_data(page_config.api_following,function(data){
                if(data.list){
                    following_list = following_list.concat(data.list);
                    self.render(following_list);
                    loadlock = false;
                }
            },{pageindex:following_index,pagesize:10});
        }
        else{
            self.render(following_list);
        }
    };
    this.get_follower_list = function(next){
        is_following = false;
        if(follower_list.length==0 || (next && Math.ceil(self.total_follower/10)>follower_index+1)){
            follower_index++;
            $slide_loading.show();
            page_remote_data(page_config.api_follower,function(data){
                if(data.list){
                    follower_list = follower_list.concat(data.list);
                    self.render(follower_list);
                    loadlock = false;
                }
            },{pageindex:follower_index,pagesize:10});
        }
        else{
            self.render(follower_list);
        }
    };
    this.touch = function(el){
        var move = function(event){
                if($slide_list.scrollTop()+$slide_list.height()+10>$slide_list[0].scrollHeight && !loadlock){
                    loadlock = true;
                    if(is_following){
                        self.get_following_list(true);
                    }
                    else{
                        self.get_follower_list(true);
                    }
                }
            self.slide_height_syn();
            };
        if(el.nodeType && el.nodeType == 1){
            el.addEventListener('touchmove',move, false);
        }
    };
    this.show_following_list = function(){
        if(self.total_following>0){
            self.slide_left('关注');
            $slide_list.height(h-46);
            self.get_following_list();
            setTimeout(function(){$slide_list.show();},500);
        }
    };
    this.show_follower_list = function(){
        if(self.total_follower>0){
            self.slide_left('粉丝');
            $slide_list.height(h-46);
            self.get_follower_list();
            setTimeout(function(){$slide_list.show();},500);
        }
    };
    this.follow_router = function(){
        var h = location.hash;
        if(/follow/.test(h)){
            if(/follower/.test(h)){
                self.show_follower_list();
            }
            if(/following/.test(h)){
                self.show_following_list();
            }
        }
        else{
            self.slide_right();
            $slide_list.hide();
        }
    };
    self.touch(document.getElementById('slide-list'));
    $slide_back_btn.touchtap(function(){
        location.hash='';
    });
    window.onhashchange = function(){
        self.follow_router();
    };
    location.hash='';
}).call(follow_view);
//APP查看自己投资人主页隐藏底部关注分享发送意向条
(function(){
    var self = this,
        $bar = $('.handle-bar');
    return base_status.isapp && $bar.hide();
}).call(_define('app_controller'));
