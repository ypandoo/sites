/*时间通知*/
(function(){
    var self = this,
        $bk = $('.bk_new'),
        $notice = $('.notification'),
        $filter = $('.filter-occupy'),
        $loading = $('.loading-container'),
        $not_found = $('.not-found');

    this.bk={
        show:function(){
            if(self.bk.timer)clearTimeout(self.bk.timer);
            $bk.show().addClass('fadeTransIn');
        },
        hide:function(){
            $bk.removeClass('fadeTransIn');
            self.bk.timer = setTimeout(function(){$bk.hide();},200);
        },
        event:function(){
            //取消搜索
            if(controll_search.sta){
                base_helper.delay(function(){
                    controll_search.stop_search(1);
                },200);
            }
            else{
                self.bk.hide();
            }
            view_filter.list.hide();
            view_filter.select_active();
        },
        timer:0
    };

    /*Notice*/
    this.notification={
        show:function(text,isalert){
            $notice.fadeIn().children('.txt').html(text);
            if(typeof isalert!='undefined' && !isalert){
                $notice.removeClass('red').addClass('green');
            }
            else{
                $notice.removeClass('green').addClass('red');
            }
            $notice.delay(3000).fadeOut();
        },
        hide:function(){
            $notice.fadeOut();
        }
    };

    this.loading = {
        show:function(){
            base_helper.scroll_to(0);
            $loading.show();
        },
        hide:function(){
            $loading.hide();
        }
    };

    this.not_found = {
        sta:false,
        show:function(){
            $not_found.show();
            self.not_found.sta = true;
        },
        hide:function(){
            $not_found.hide();
            self.not_found.sta = false;
        }
    };
    this.error = function(){
        self.notification.show('网络错误');
    };


    this.filter = {
        show:function(){
            $filter.show();
        },
        hide:function(){
            $filter.hide();
        }
    };
    /*背景事件整理*/
    $bk.touchtap(self.bk.event);
}).call(define('view_dom'));

/*搜索*/
(function(){

    var $btn=$('.search'),
        $searchmodel=$('.search-list'),
        $input=$searchmodel.find('input'),
        self = this;
    this.sta = false;
    /*view*/
    this.input = {
        foucus:function(){
            $input.focus();
        },
        blur:function(){
            $input.blur();
        },
        fill:function(k){
            var kk=k||'';
            $input.val(kk);
        }
    };

    this.btn = {
        show:function(){
            $btn.addClass('active');
        },
        hide:function(){
            $btn.removeClass('active');
        }
    };

    this.module = {
        show:function(){
            $searchmodel.fadeIn();
        },
        hide:function(){
            $searchmodel.fadeOut();
        }
    };

    this.start_search = function(){
        if(!self.sta){
            self.btn.show();
            self.module.show();
            self.input.foucus();
            self.input.fill();
            view_dom.bk.show();
            self.sta = true;
        }
        else{
            self.word_search($input.val());
        }

    };

    this.cancel_search = function(){
        setTimeout(self.stop_search,300);
        route.go_history();
    };

    this.stop_search = function(keep_result){
        self.btn.hide();
        self.module.hide();
        self.input.blur();
        if(!keep_result){
            self.search.result_name ='';
        }
        view_dom.bk.hide();
        self.sta = false;
    };

    this.word_search = function(k){
        if(k != ''){
            self.btn.hide();
            self.input.blur();
            self.search.result_name ='';
            view_dom.bk.hide();
            self.sta = false;
            //alert('search');
            view_dom.notification.show('正在搜索..', true);
        }
    };

    this.input_search = function(e){
        if(e.keyCode == 13){
            self.word_search(this.value);
        }
    };

    this.search = avalon.define("search", function (vm) {
        vm.history = [];
        vm.result_name = '';
        vm.result_num = 0;
    });

}).call(define('controll_search'));

(function(){
    var self = this,
        $filter = $('#list-filter'),
        $select = $filter.children().children('a'),
        $list = $filter.children('ul'),
        $win = $(window);

    this.view_filter={
        show:function(){
            $filter.addClass('top');
        },
        hide:function(){
            $filter.removeClass('top');
        }
    };
    this.list={
        show:function(){
            $list.addClass('active');
            self.bk.lock = false;
        },
        hide:function(){
            $list.removeClass('active');
            self.bk.lock = true;
        }
    };
    this.bk = {
        lock:true,
        show:function(){
            view_dom.bk.show();
        },
        hide:function(){
            !self.bk.lock && view_dom.bk.hide();
        }
    };

    $win.scroll(function(){
        var n = document.body.scrollTop;
        if(n > 75){
            self.view_filter.show();
        }
        if(n < 46){
            self.bk.hide();
            self.list.hide();
            self.view_filter.hide();
            self.select_active();
        }
    });
    this.filter_acitve=function(index){

        if(document.body.scrollTop>75){
            self.list.show();
            self.bk.show();
            self.select_active(index);
        }
        else{
            base_helper.scroll_to(80,function(){
                setTimeout(function(){
                    self.list.show();
                    self.bk.show();
                    self.select_active(index);
                },300);
            },100);
        }
    };
    this.select_active=function(index){
        $select.removeClass('active');
        if(typeof index != 'undefined'){
            $select.eq(index).addClass('active');
        }
    };
    this.active_offset = 0;
    this.curret_type = 1;

    /*initialize list select*/
    this.com_active = '全部等级';
    this.industry_active = '全部行业';
    this.district_active = '全部地区';
    this.order_active = '热度排序';

    this.check_active = function(array,k,t){
        self.curret_type = t;
        for(var i in array){
            if(array[i] == k){
                self.active_offset = i;
                break;
            }
        }
        return array;
    };
    this.select_action = function(){
        base_helper.scroll_to(0);

        self.industry_active == self.industry_active;
        self.district_active == self.district_active;
        self.order_active == self.order_active;
    };

    this.industry_list = ["全部行业","电子商务","移动互联网","信息技术","游戏","旅游","教育","金融","社交","娱乐","硬件","能源","医疗健康","餐饮","企业","平台","汽车","数据","房产酒店","文化艺术","体育运动","生物科学","媒体资讯","广告营销","节能环保","消费生活","工具软件","资讯服务","智能设备"];
    this.district_list = ['全部地区','北京','上海','深圳','广州','杭州','南京','西安','成都','苏州','天津','无锡','武汉','重庆','厦门','青岛'];
    this.page_list     = ['全部等级','优先等级','一级','二级'];
    //this.sd_state_list = ['正在热投','完成融资'];
    this.order_list    =  ['热度排序','时间排序'];

    this.avalon_filter = avalon.define("list-filter", function (vm) {
        vm.page_name = '全部等级';
        vm.industry_name = '全部行业';
        vm.district_name = '全部地区';
        vm.sd_state_name = '';
        vm.order_name = '热度排序';
        vm.list_content= self.page_list.concat();
        vm.list_page=function(){
            self.filter_acitve(0);
            self.avalon_filter.list_content=self.check_active(self.page_list.concat(),self.com_active,1);
        };
        vm.list_industry=function(){
            self.filter_acitve(1);
            self.avalon_filter.list_content=self.check_active(self.industry_list.concat(),self.industry_active,2);
        };
        vm.list_district=function(){
            self.filter_acitve(2);
            self.avalon_filter.list_content=self.check_active(self.district_list.concat(),self.district_active,3);
        };
        /*vm.sd_state = function(){
            self.filter_acitve(3);
            self.avalon_filter.list_content=self.check_active(self.sd_state_list.concat(),self.sd_state_active,4);
        };*/
        vm.order = function(){
            self.filter_acitve(4);
            self.avalon_filter.list_content=self.check_active(self.order_list.concat(),self.order_active,5);
        };
        vm.select_this=function(){
            var val =this.innerHTML;
            self.select_active();
            base_helper.delay(function(){
                self.bk.hide();
                self.list.hide();
            },200);
            switch (self.curret_type){
                case 1:
                    self.com_active = self.avalon_filter.page_name = val;
                    break;
                case 2:
                    self.industry_active = self.avalon_filter.industry_name = val;
                    break;
                case 3:
                    self.district_active = self.avalon_filter.district_name = val;
                    break;
                case 4:
                    self.sd_state_active = self.avalon_filter.sd_state_name = val;
                    break;
                case 5:
                    self.order_active = self.avalon_filter.order_name = val;
                    break;
                default :
            }
            self.select_action();
        };

    });

}).call(define('view_filter'));



//关注项目
(function(){
    var self = this,
        $base = $('.project-list'),
        touch = {
            x:0,
            y:0,
            t:0
        };

    this.follow = function(id,ele){
                ele.addClass('active');
                view_dom.notification.show('关注成功');
 
    };
    this.unfollow = function(id,ele){

                ele.removeClass('active');
                view_dom.notification.show('取消关注');
    };
    $base.delegate(".follow_star","touchstart",function(e){
        touch.x= e.originalEvent.touches[0].pageX;
        touch.y= e.originalEvent.touches[0].pageY;
        touch.t = new Date().getTime();
    });
    $base.delegate(".follow_star","touchend",function(e){
        var event=e.originalEvent.changedTouches[0],move=Math.pow(event.pageX-touch.x,2)+Math.pow(event.pageY-touch.y,2),o = new Date().getTime();
        e.preventDefault();
        if(o-touch.t<150 && move<81){
            $(this).parent().hasClass('active')?self.unfollow($(this).data('id'),$(this).parent()):self.follow($(this).data('id'),$(this).parent());
        }
    });

}).call(define('view_follow'));