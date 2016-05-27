(function(){
    //定义类
    this.define = this._define = function (s) {
        return (typeof  s != 'undefined' && typeof  this[s] == 'undefined') ? this[s] = {} : (this[s] || {});
    };

    this.base_ua=navigator.userAgent.toLowerCase();
    this.base_status={
        support_touch:typeof document.ontouchstart!='undefined',
        //微信嵌入
        iswechat: base_ua.indexOf("micromessenger") != -1,
        //Android
        isandroid:base_ua.indexOf("android") != -1,
        //Apple
        isios: !!base_ua.match(/\(i[^;]+;( u;)? cpu.+mac os x/),

        /*isandorid: !!base_ua.indexOf("android") != -1 ? 1 : 0,

        isiphone: !!base_ua.indexOf('iphone') > -1 || ua.indexOf('mac') > -1,
        isipad: !!base_ua.indexOf('ipad') > -1,
        */
    };
    this.base_regex = function(){
        return {
                phone: /^\d{11}$/,
                strict_validation_phone: /^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/,
                mail: /^[a-z\d]+(\.[a-z\d]+)*@([\da-z](-[\da-z])?)+(\.{1,2}[a-z]+)+$/,
                qq: /^\d{5,10}$/,
                chinese_Unicode: /^[\u2E80-\u9FFF]+$/,
                chinese_Name: /^[\u2E80-\u9FFF]{2,5}$/
        };
    };

}).call(this);

//获取URL传参
(function(){
    this.$_GET={};

    var url=window.location.href.split('?'),rl = url.length, a, h, l, e, f={};

    if(rl>1){
        for(var m = 1 ; m < rl;m++){
            h= url[m].split('#');
            a=h[0].split('&');
            l= a.length;
            for(var i=0;i<l;i++){
                e=a[i].split('=');
                f[e[0]]= e.length>1?e[1]:'';
            }
        }
        this.$_GET=f;
    }
    //生成url字符串参数对
    this.base_create_param=function(data){
        var s='',c='?';
        if(typeof data == 'object'){
            for(var i in data){
                s+=c+i+'='+encodeURIComponent(data[i]);
                if(c='?')c='&';
            }
            return s;
        }
    }
}).call(this);

//移动设备事件
(function(){
    $.fn.extend({
        touchtap:function(fn,delay){
            var x, y,s;
            if(base_status.support_touch){
                $(this).bind('touchstart',function(e){
                    x= e.originalEvent.touches[0].pageX;
                    y= e.originalEvent.touches[0].pageY;
                    s = new Date().getTime();
                });
                $(this).bind('touchend',function(e){
                    var event=e.originalEvent.changedTouches[0],move=Math.pow(event.pageX-x,2)+Math.pow(event.pageY-y,2),o = new Date().getTime(),self = $(this);
                    if(o-s<150 && move<81){
                        !delay?fn.call(self):setTimeout(function(){fn.call(self)},200);
                    }
                });
            }
            else{
                $(this).click(fn);
            }

        },
        pressenter:function(fn){
            $(this).bind('keypress',function(e){
                if(e.keyCode==13){
                    fn.call($(this));
                }
            })
        }
    });
}).call(this);

//绑定touch-link元素
(function(){
    var $ele;
    $(document).ready(function(){
        $ele=$('.touch-href');
        $ele.touchtap(function(){
            var href=$(this).data('href');
            if(href!='undefined'){
                location.href=href;
            }
        })
    });
}).call(this);

//头部选项
(function(){
    var $head=$('#header'),
        $headcontainer=$('#head-container'),
        $bk=$('.bk'),
        $option=$head.children('.options'),
        $account=$head.children('.account'),
        $container=$('.options').children('ul'),
        $current=$(),
        sta=false,
        headoption_display={
            show:function(){
                $current.children('ul').slideDown(200,function(){sta=true});
                $current.children('span').css('position','absoute');
                $bk.show(0,function(){$(this).css('opacity',0.7)});
            },
            hide:function(){
                $current.children('ul').slideUp(200,function(){sta=false});
                $bk.css('opacity',0);
                setTimeout(function(){$bk.hide();},400);
            }
        },
        display_controll=function(){
            $current=$option;
            if(!sta){
                headoption_display.show();
            }
            else{
                headoption_display.hide();
            }
        };

    //事件绑定
    $(document).ready(function(){
        $option.touchtap(display_controll);
        $account.touchtap(display_controll);
        $bk.touchtap(function(){if(sta)headoption_display.hide();});
    });
    
}).call(this);
