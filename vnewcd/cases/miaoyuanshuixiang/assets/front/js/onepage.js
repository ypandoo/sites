//Hash 方法
(function(){
    var sep='-',
        con=':',
        self = this;

    this.get_hash_str = function(){
        var s = location.hash.split('#'),
            str = s.length>1 ? s[1] : '';

        return str.split('?')[0];
    };

    this.get_data=function(k){
        var hash = self.get_hash_str().split(sep),
            l = hash.length,
            a = {}, c = [];

        if(typeof k != 'undefined'){
            for(var i = 0 ; i < l ; i++){
                c = hash[i].split(con);
                if(c.length == 2 && c[0] == encodeURIComponent(k)){
                    return decodeURIComponent(c[1]);
                }
            }
        }
        else{
            for(var n = 0 ; n < l ; n++){
                c = hash[n].split(con);
                if(c.length == 2){
                    a[decodeURIComponent(c[0])] = decodeURIComponent(c[1]);
                }
            }
        }
        return a;
    };

    this.save_data=function(d){
        var o = self.get_data(),
            a = typeof d == 'object'? d :{},
            n = $.extend(true,o,a);

        return self.convert_str(n);
    };

    this.set_data=function(d){
        var a = typeof  d == 'object' ? d :{};
        return self.convert_str(a);
    };

    this.del_data=function(k){
        var o = self.get_data(),
            r = {};
        if(!!k){
            for(var i in o){
                if(i != k){
                    r[i]=o[i];
                }
            }
        }
        return self.convert_str(r);
    };

    this.convert_str = function(o){
        var s = '#';

        if(typeof o == 'object'){
            for(var i in o){
                if(typeof o[i] != 'object' && typeof o[i]!= 'function'){
                    s+= ''+encodeURIComponent(i)+con+encodeURIComponent(o[i])+sep;
                }
            }
        }

        return s.slice(0,s.length-1);
    }
}).call(define('base_hash_model'));

//数据Model
(function(){
    var self = this,
        config = {};

    this.init = function(key,api,default_param,call,error,loading){
        if(!!key && !!api && !!default_param && !!call) {
            config[key] = {};
            config[key].api = api;
            config[key].default_param = default_param;
            config[key].call = call;
            config[key].error= error || function(){};
            config[key].loading = loading || {start:function(){},end:function(){}};
        }
        return new self.get_data(key);
    };
    this.get_data = function(k){
        var key = k;
        return function(params){
            var post = params || {};
            if(!!key && config.hasOwnProperty(key)){
                config[key].loading.start();
                base_remote_data.ajaxjsonp(
                    config[key].api,
                    function(d){
                        config[key].call(d);
                        config[key].loading.end();
                    },
                    $.extend(true,config[key].default_param,post),
                    config[key].error,
                    config[key].loading
                );
            }
        };

    };

}).call(define('base_data_model'));

//Helper
(function(){
    this.scroll_to = function (p,call,during) {
        var l = during || 200,n =   parseInt(document.body.scrollTop), t = p || 0, e = (t-n)/(l/13), d = 0, s = 0;
        d = setInterval(function(){
            if(s<l){
                n += e;
                s += 13;
            }
            else{
                n = t;
                clearInterval(d);
                if(!!call)call();
            }
            document.body.scrollTop = n;
        },13);
    };
    this.delay = function(call,delay){
        var d = delay || 300;
        setTimeout(call,delay);
    };
}).call(define('base_helper'));