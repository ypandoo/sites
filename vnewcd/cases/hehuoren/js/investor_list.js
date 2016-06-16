
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
    this.com_active = '全部擅长';
    this.industry_active = '工作圈';
    this.district_active = '生活圈';
    this.order_active = '全部等级';

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

    this.industry_list = ["工作圈",'北京','上海','深圳','广州','成都'];
    this.district_list = ['生活圈','北京','上海','深圳','广州','成都'];
    this.page_list     = ['全部擅长','C++','JAVA'];
    this.order_list    =  ['全部等级','一级'];

    this.avalon_filter = avalon.define("list-filter", function (vm) {
        vm.page_name = '全部擅长';
        vm.industry_name = '工作圈';
        vm.district_name = '生活圈';
        vm.sd_state_name = '';
        vm.order_name = '全部等级';
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
            var val =this.innerHTML,
                hash = {};
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
/*                case 4:
                    self.sd_state_active = self.avalon_filter.sd_state_name = val;
                    break;*/
                case 5:
                    self.order_active = self.avalon_filter.order_name = val;
                    break;
                default :
            }
            self.select_action();
        };

    });

}).call(define('view_filter'));