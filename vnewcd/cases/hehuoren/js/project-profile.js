(function(){
    this.page_config={
    };
    //命名空间
    this.space_uploader = {};
    this.space_select   = {};
    this.space_industry = {};
    this.space_framework= {};
    this.space_create   = {};

}).call(this);


//选择行业页面显示及文本内容
(function(){

    this.view_box={
        show:function(){
            var $head   = $('#header'),
            $box    = $('#industry-choose'),
            $items  = $('#item-container');
            $head.css('position','fixed');
            //$box.css('top','50px');
            $box.animate({top:0+'%'},150,'linear',function(){
                $items.hide();
            });
        },
        hide:function(){
            var $head   = $('#header'),
            $box    = $('#industry-choose'),
            $items  = $('#item-container');
            $items.show();
            $head.css('position','static');
            $box.animate({top:100+'%'},150,'linear');
        }
    };
}).call(space_industry);


//框架绑定
(function(){
    this.first_active=0;
    this.selected = [];
    this.input_selected=[];
    this.second_level = function(){
        var parent = space_industry.list[space_framework.first_active],
            list = parent.child,
            ll = list.length,
            selected = space_framework.selected,
            ret = [],
            first = [{active:false,name:'全部'}];

        for(var n = 0 ; n < ll; n++) {
            var a = false;
            if(selected.indexOf(list[n]) != -1){
                a = true;
            }
            ret.push({active:a,name:list[n]});
        }
        if(selected.indexOf(parent.name) != -1){
            first[0].active = true;
        }

        return first.concat(ret);
    };
    this.list_render = function(index){
        if(typeof index != 'undefined'){
            space_framework.first_active=index;
        }
        space_framework.industry.btn_confirm=space_framework.selected.length>0?true:false;
        space_framework.industry.list=space_industry.list;
        space_framework.industry.second_level=space_framework.second_level();
    };
    this.add_selected = function(name,isinput){
        var list = space_framework.selected,
            all =space_industry.list[space_framework.first_active],
            ele = name,
            ll=list.length,
            child=all.child,
            cl=child.length;
        if(name == '全部'){
            ele = all.name;
            for(var i = 0; i < ll; i ++){
                for(var n = 0; n <cl ; n++){
                    if(list[i] == child[n]){
                        list.splice(i,1);
                        i--;
                    }
                }
            }
        }
        else{
            if(!isinput){
                for(var i = 0; i < ll; i ++){
                    if(list[i] == all.name){
                        list.splice(i,1);
                        i--;
                    }
                }
            }
        }
        if(list.length<5 && typeof ele != 'undefined' && list.indexOf(ele) == -1){
                list.push(ele);
        }
        space_framework.industry.selected  = list;
    };
    this.write_new = function(){
        if(!!space_framework.industry.input){
            space_framework.add_selected(space_framework.industry.input,true);
            space_framework.list_render();
            space_framework.industry.input='';
        }
    };
    this.industry = avalon.define('industry-select', function (vm) {
        //space_industry.view_box.hide();
        vm.list=[];
        vm.selected= [];
        vm.input_selected=[];
        vm.second_level = [];
        vm.input = '';
        vm.btn_confirm=false;
        vm.cancle_industry=function(el){
            space_framework.selected.splice(el,1);
            space_framework.industry.selected = space_framework.selected;
            space_framework.list_render();
        };
        vm.cancle_input_industry=function(el){
            space_framework.input_selected.splice(el,1);
            space_framework.industry.input_selected = space_framework.input_selected;
            space_framework.industry.selected = space_framework.selected = space_framework.input_selected.concat();
            space_framework.list_render();
        };
        vm.first_active=function(index){
            space_framework.list_render(index);
        };
        vm.second_active=function(name){
            space_framework.add_selected(name);
            space_framework.list_render();
        };
        vm.write_new=space_framework.write_new;
        vm.cancle_choose=function(){
            space_framework.industry.input_selected = space_framework.input_selected;
            space_framework.industry.selected = space_framework.selected = space_framework.input_selected.concat();
            space_industry.view_box.hide();
            space_framework.list_render();
        };
        vm.confirm_choose=function(){
            if(space_framework.selected.length>0){
                space_framework.industry.input_selected = space_framework.input_selected = space_framework.selected.concat();
                space_industry.view_box.hide();
            }
        };
        vm.input_enter=function(e){
            if(e.keyCode == 13){
                space_framework.write_new();
            }
        };
        vm.box_show=function(){
            space_industry.view_box.show();
            space_framework.list_render();
        };
    })
}).call(space_framework);


//获取行业列表
(function(){
    this.list=[];

    data_list=[{child:["移动电商","测试"],name:"移动互联网"},{child:["火锅","连锁经营"],name:"餐饮娱乐"}];

    space_framework.industry.list = space_industry.list = data_list;
    space_framework.industry.second_level=space_framework.second_level();
}).call(space_industry);



/*标题控制*/
(function(){
    var self = this;
    this.avalon_title_control = avalon.define("title-controller", function (vm) {
         vm.toggle_content=function(id){
            if ($('#'+id).is(':visible'))
            {
                $('#em_'+id).css("background-image", "url(img/paper.png)");
                $('#'+id).fadeOut();
            }
            else
            {
                $('#em_'+id).css("background-image", "url(img/edit.png)");
                $('#'+id).fadeIn();
            }
        };
    });
}).call(define('title-space'));


/*开店计划*/
(function(){
    var self = this;
    this.avalon_shop_open_control = avalon.define("shop-open-controller", function (vm) {
        vm.list = [{'area':'', 'street':''}];
        vm.add_shop = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个地址！');
            return;
          }
          vm.list.push({'area':'', 'street':''});
        };
    });
}).call(define('shop-open-space'));

/*团队成员*/
(function(){
    var self = this;
    this.avalon_team_control = avalon.define("team-controller", function (vm) {
        vm.list = [{'name':'', 'email':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'name':'', 'email':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };

    });
}).call(define('team-space'));


/*导师*/
(function(){
    var self = this;
    this.avalon_mentor_control = avalon.define("mentor-controller", function (vm) {
        vm.list = [{'name':'', 'email':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'name':'', 'email':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };
    });
}).call(define('mentor-space'));


/*新闻*/
(function(){
    var self = this;
    this.avalon_mentor_control = avalon.define("news-controller", function (vm) {
        vm.list = [{'title':'', 'link':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'title':'', 'link':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };
    });
}).call(define('news-space'));

/*视频*/
(function(){
    var self = this;
    this.avalon_mentor_control = avalon.define("vedio-controller", function (vm) {
        vm.list = [{'title':'', 'link':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'title':'', 'link':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };
    });
}).call(define('vedio-space'));


/*大事记*/
(function(){
    var self = this;
    this.avalon_mentor_control = avalon.define("history-controller", function (vm) {
        vm.list = [{'date':'', 'content':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'date':'', 'content':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };
    });
}).call(define('history-space'));

/*店铺*/
(function(){
    var self = this;
    this.avalon_mentor_control = avalon.define("shop-controller", function (vm) {
        vm.list = [{'name':'', 'location':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'name':'', 'location':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };
    });
}).call(define('shop-space'));

/*店铺*/
(function(){
    var self = this;
    this.avalon_mentor_control = avalon.define("eval-controller", function (vm) {
        vm.list = [{'name':'', 'location':''}];
        //定义数据：you should define the data structure for filling the team section
        vm.add = function(){
          if (vm.list.size() >= 4) {
            alert('您最多只能添加4个！');
            return;
          }
          vm.list.push({'name':'', 'location':''});
        };

        vm.del = function() {
          if (vm.list.size() >= 1) {
          vm.list.pop();
        }
        };
    });
}).call(define('eval-space'));

//选择阶段 职位
(function(){
    var $select1 = $('#select1'),
        $select2 = $('#select2'),
        $select3 = $('#select3'),
        $select4 = $('#select4');

        $select_position1 = $('#select_position1'),
        $select_position2 = $('#select_position2'),
        $select_position3 = $('#select_position3'),

        $shop_type = $('#shop_type');
        $brand = $('#brand');
        $chain_type = $('#chain_type');


    $select1.children('select').change(function(){
        var t = $(this), v= t.val();
        t.prev().html(v);

    });
    $select2.children('select').change(function(){
        var t = $(this), v= t.val();
        t.prev().html(v);
    });
    $select3.children('select').change(function(){
        var t = $(this), v= t.val();
        t.prev().html(v);
    });
    $select4.children('select').change(function(){
        var t = $(this), v= t.val();
        //if(v != 0)
            t.prev().html(v);
    });

    $select_position1.children('select').change(function(){
        var t = $(this), v= t.val();
        //if(v != 0)
            t.prev().html(v);
    });

    $select_position2.children('select').change(function(){
        var t = $(this), v= t.val();
        //if(v != 0)
            t.prev().html(v);
    });

    $select_position3.children('select').change(function(){
        var t = $(this), v= t.val();
        //if(v != 0)
            t.prev().html(v);
    });


    $shop_type.children('select').prev().html('新店开设');
    $shop_type.children('select').change(function(){
        var t = $(this), v= t.val();
        $('#new_shop').toggle();
        $('#old_shop').toggle();

        t.prev().html(v);
    });

    $brand.children('select').prev().html('自创品牌');
    $brand.children('select').change(function(){
        var t = $(this), v= t.val();
        $('#new_shop').toggle();
        $('#old_shop').toggle();

        t.prev().html(v);
    });

    $chain_type.children('select').prev().html('否');
    $chain_type.children('select').change(function(){
        var t = $(this), v= t.val();
        $('#chain').toggle();

        t.prev().html(v);
    });


}).call(space_select);
