(function(){
    this.page_config={
        api_create:this.base_mobile+'v4/startup/new',
        default_param:{
            uid:account_info.id,
            access_token:account_info.token
        }
    };
    //命名空间
    this.space_uploader = {};
    this.space_select   = {};
    this.space_industry = {};
    this.space_framework= {};
    this.space_create   = {};
    log.type = 'create';
}).call(this);
//如果未登陆跳转注册
(function(){
    /*if(!account_info.is_login){
        var linkparam={
            source:location.href,
            title:'创建项目',
            message:'请先注册或登录天使汇账户。',
            portrait:'//dn-xswe.qbox.me/13065529?imageMogr2/crop/!690x690a0a0/thumbnail/200x'
        };
        location.href='http://auth.angelcrunch.com/reg'+base_create_param(linkparam);
    }*/
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

//数据获取
(function(){
    this.page_remote_data_syn=function(url,call,data){
        base_remote_data.ajaxjsonp(url,function(data){
            call(data);
        },$.extend(true,page_config.default_param,data),function(){view_notification.show('网络错误');});
    };
}).call(this);

//头像上传
(function(){
    var $trigger = $('#upload-trigger'),
        $input   = $('#upload-input'),
        $progress= $('#upload-progress'),
        $img     = $trigger.children('img'),
        uploader   = simple.uploader({});


    this.get_img_url=function(id, option){
        return 'http://dn-xswe.qbox.me/' + id + '?imageMogr2' + (option ? "/crop/!" + get_crop(option) : "") + "/auto-orient/thumbnail/480x";
    };
    //进度条显示
    this.progress={
        show:function(loaded,total){
            return $progress.show().css('height',parseFloat(((loaded / total) * 100).toFixed(0))+'%');
        },
        hide:function(){
            return $progress.hide().css('height',0);
        }
    };
    //结果显示
    this.view_upload={
        start:function(){
            $img.hide().attr('src','');
        },
        success:function(src){
            $img.attr('src',src);
        },
        done:function(){
            $img.show();
        }
    };
    //返回存储ID
    this.upload_img_id='';

    $input.change(function(){
        var prev_file = $(this).attr('exist-file');
        if(prev_file){
            uploader.cancel(prev_file);
            space_uploader.view_upload.start();
        }
        uploader.upload(this.files);
        $(this).attr('exist-file', $(this).val());
    });
    //初始化
    uploader.on("beforeupload", function (e, file, r) {
        space_uploader.progress.show(5,100);
    });
    //进行中
    uploader.on("uploadprogress", function (e, file, loaded, total) {
        space_uploader.progress.show(loaded*0.9,total);
    });
    //成功
    uploader.on("uploadsuccess", function (e, file, r) {
        if(r.hasOwnProperty('key')){
            space_uploader.upload_img_id = r.key;
            space_uploader.view_upload.success(space_uploader.get_img_url(r.key,r))
        }
        else{
            view_notification.show('上传失败');
        }
    });
    //完成
    uploader.on('uploadcomplete', function (e, file, r) {
        $img.load(function(){
            space_uploader.progress.show(100,100);
            space_uploader.view_upload.done(space_uploader.get_img_url(r.key,r));
            space_uploader.progress.hide();
        })
    });
    //错误
    uploader.on('uploaderror', function (e, file, xhr, status) {
        view_notification.show('上传失败');
    });
}).call(space_uploader);

//选择阶段 职位
(function(){
    var $select_stage = $('#select-stage'),
        $select_position = $('#select-position'),
        stage_list=[
            '请选择所属阶段',
            '概念阶段',
            '研发阶段',
            '正式发布',
            '已有收入',
            '已有用户'
        ];
    space_select.result={
        stage:'',
        position:''
    };
    $select_stage.children('select').change(function(){
        var v = $(this).val(), p = stage_list.hasOwnProperty(v)?stage_list[v]:stage_list[0];
        space_select.result.stage=v;
        if(v != 0)$(this).prev().html(p);
    });
    $select_position.children('select').change(function(){
        var t = $(this), v= t.val();
        if(v != 0)t.prev().html(v);
        space_select.result.position = v;
    });

}).call(space_select);

//选择行业页面显示及文本内容
(function(){
    var $head   = $('#header'),
        $box    = $('#industry-choose'),
        $items  = $('#item-container');

    this.view_box={
        show:function(){
            $head.css('position','fixed');
            $box.animate({top:0+'%'},150,'linear',function(){
                $items.hide();
            });
        },
        hide:function(){
            $items.show();
            $head.css('position','static');
            $box.animate({top:100+'%'},150,'linear');
        }
    };
    //APP内嵌 隐藏头部 选择框大小调整
    if(base_status.isapp){
        $box.css('margin-top',0);
    }
    //由其它页面跳转
    if($_GET.hasOwnProperty('source')){
        $items.children('.page-title').children('h1').html('请首先创建项目');
    }
}).call(space_industry);

//获取行业列表
(function(){
    this.list=[];
    page_remote_data_syn(api.industry_list,function(data){
        if(data.hasOwnProperty('list')){
            space_framework.industry.list = space_industry.list = data.list;
            space_framework.industry.second_level=space_framework.second_level();
        }
    })
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

//创建项目
(function(){

    var $name        = $('#form-name'),
        $one         = $('#form-one'),
        $desc        = $('#form-desc'),
        $stage       = $('#select-stage').children('select'),
        $position    = $('#select-position').children('select'),
        $agree       = $('.mentos-container'),
        $submit      = $('#subbmit-btn');

    this.form_content=function() {
        return {
            ico: space_uploader.upload_img_id,
            com_name: $name.val(),
            stage: $stage.val(),
            tag_list: space_framework.input_selected.join(','),
            description: $desc.val(),
            description_short: $one.val(),
            my_title: $position.val()
        };
    };
    this.form_check=function(){

        var content=space_create.form_content();

        if(!!content.com_name && !!content.ico && !!content.tag_list && !!content.description && !!content.description_short &&  !!content.my_title && content.stage!=0 && $agree.hasClass('checked')){
            $submit.addClass('active');
            return true;
        }
        else{
            $submit.removeClass('active');
            return false;
        }

    };
    this.submit=function(){
        page_remote_data_syn(page_config.api_create,function(data){
            if(data.hasOwnProperty('success')){
                if(data.success){
                    if($_GET.hasOwnProperty('source')){
                        location.href=decodeURIComponent($_GET.source).split('?')[0]+base_create_param({com_id:data.com_id,time:$.now(),com_name:space_create.form_content().com_name});
                    }
                    else{
                        space_create.view_result.show();
                    }
                }
                else{
                    view_notification.show(data.message);
                }
            }
        },space_create.form_content());
    };
    $submit.touchtap(function(){
        if(space_create.form_check()){
            space_create.submit();
        }
    });
    setInterval(space_create.form_check,300);
}).call(space_create);

//创建完成
(function(){
    var $close      = $('.yesiknow'),
        $layout     = $('#create-result');
    this.view_result={
        show:function(){
            $layout.fadeIn(100);
        },
        hide:function(){
            $layout.hide();
            location.reload();
        }
    };
    $close.touchtap(function(){space_create.view_result.hide();});
}).call(space_create);

//过渡 协议同意
(function () {
    var self = this,
        $btn = $('#agreement-checkbox'),
        $class = $btn.children('.mentos-container');

    this.checked = false;
    this.active = function(){
        $class.addClass('checked');
        self.checked = true;
    };
    this.unactive = function(){
        $class.removeClass('checked');
        self.checked = false;
    };
    $btn.touchtap(function(){
        self.checked?self.unactive():self.active();
    });
}).call({});