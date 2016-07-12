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


// //获取行业列表
// (function(){
//     this.list=[];
//
//     data_list=[{child:["移动电商","测试"],name:"移动互联网"},{child:["火锅","连锁经营"],name:"餐饮娱乐"}];
//
//     space_framework.industry.list = space_industry.list = data_list;
//     space_framework.industry.second_level=space_framework.second_level();
//
// }).call(space_industry);


/*标题控制*/
(function(){
    var self = this;
    this.avalon_title_control = avalon.define("title-controller", function (vm) {
         vm.toggle_content=function(id){
                $('#btn_invistor'+id).fadeOut();
                $('#cancel-btn'+id).fadeOut();
                $('#invistor'+(parseInt(id)+1)).fadeIn();
        };
    });
}).call(define('title-space'));


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


}).call(space_select);


(function(){
  var spectality = avalon.define({
                  $id: "spectality-controller",
                  item0:false,click0: function() {spectality.item0 = !spectality.item0;},
                  item1:false,click1: function() {spectality.item1 = !spectality.item1;},
                  item2:false,click2: function() {spectality.item2 = !spectality.item2;},
                  item3:false,click3: function() {spectality.item3 = !spectality.item3;},
                  item4:false,click4: function() {spectality.item4 = !spectality.item4;},
                  item5:false,click5: function() {spectality.item5 = !spectality.item5;},
                  item6:false,click6: function() {spectality.item6 = !spectality.item6;},
                  item7:false,click7: function() {spectality.item7 = !spectality.item7;},
                  item8:false,click8: function() {spectality.item8 = !spectality.item8;},
                  item9:false,click9: function() {spectality.item9 = !spectality.item9;},

              });
var area = avalon.define({
                $id: "area-controller",
                item0:false,click0: function() {area.item0 = !area.item0;},
                item1:false,click1: function() {area.item1 = !area.item1;},
                item2:false,click2: function() {area.item2 = !area.item2;},
                item3:false,click3: function() {area.item3 = !area.item3;},
                item4:false,click4: function() {area.item4 = !area.item4;},
                item5:false,click5: function() {area.item5 = !area.item5;},
                item6:false,click6: function() {area.item6 = !area.item6;},
                item7:false,click7: function() {area.item7 = !area.item7;},
                item8:false,click8: function() {area.item8 = !area.item8;},
                item9:false,click9: function() {area.item9 = !area.item9;},

            });

}).call(define('space_mulselect'));
