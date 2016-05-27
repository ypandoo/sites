
//消息通知
(function () {
    var $n = $('.notification');

    this.show = function (text, isalter) {
        $n.fadeIn().children('.txt').html(text);
        if (!!isalter) {
            $n.removeClass('red').addClass('green');

        }
        else {
            $n.removeClass('green').addClass('red');
        }
        setTimeout(function () {
            $n.fadeOut();
        }, 3000);
    };
}).call(_define('view_notification'));
//数据获取
(function () {
    var self = this;
    this.get = function (url, call, data) {
        base_remote_data.ajaxjsonp(url, call, data, function () {
            view_notification.show('网络错误')
        });
    };
    this.request = function (url, call, data) {
        self.get(url, call, $.extend({uid: account_info.id, access_token: account_info.token}, data));
    }
}).call(_define('data_model'));
//个人信息
(function () {
    var self = this;
    this.framework = avalon.define("profile", function (vm) {
        vm.data = {};
    });
    this.get_info = function (call) {
        data_model.request(api.user_info, function (data) {
            call(data)
        }, {});
    };
    this.show_info = function (data) {
        if (data.avatar_small) {
            data.link = base_protocol + data.id + '.' + base_host;
            data.region = '';
            self.framework.data = data;
            region_view.get_list(data.cityid || data.regionid);
        }
    };
    self.get_info(self.show_info);
}).call(_define('profile_view'));
//头像上传
(function () {
    var self = this,
        $avatar = $('#avatar'),
        $img = $avatar.children('img'),
        $progress = $avatar.children('.process'),
        $input = $('#upload-input'),
        uploader = simple.uploader({});
    this.avatar = '';
    //进度条显示
    this.progress = {
        start: function () {
            if ($input[0].files && $input[0].files[0]) {
                $progress.addClass('active');
            }
            self.progress.during(5, 100);
        },
        during: function (loaded, total) {

        },
        success: function (url) {
            data_model.request(page_config.api.avatar, function (data) {
                if (data.success) {
                    $img.attr('src', url);
                    $img.load(function () {
                        $progress.removeClass('active');
                        view_notification.show('设置成功', true);
                    });
                }
                else {
                    $progress.removeClass('active');
                    view_notification.show(data.message || '设置失败');
                }

            }, {avatar: self.avatar});
            return self.progress.during(100, 100), $progress.removeClass('grey');
        }
    };
    //创建图片URL
    this.create_url = function (id, option) {
        return 'http://dn-xswe.qbox.me/' + id + '?imageMogr2' + (option ? "/crop/!" + get_crop(option) : "") + "/auto-orient/thumbnail/480x";
    };
    //初始化
    uploader.on("beforeupload", function (e, file, r) {

    });
    //进行中
    uploader.on("uploadprogress", function (e, file, loaded, total) {

    });
    //成功
    uploader.on("uploadsuccess", function (e, file, r) {
        if (r.hasOwnProperty('key')) {
            self.avatar = r.key;
            self.progress.success(self.create_url(r.key, r));
        }
        else {
            view_notification.show('上传失败');
        }
    });
    //完成
    uploader.on('uploadcomplete', function (e, file, r) {

    });
    //错误
    uploader.on('uploaderror', function (e, file, xhr, status) {
        view_notification.show('上传失败');
    });
    //执行上传
    $input.change(function () {
        var prev_file = $(this).attr('exist-file');
        if (prev_file) {
            uploader.cancel(prev_file);
        }
        self.progress.start();
        uploader.upload(this.files);
        $(this).attr('exist-file', $(this).val());
    });
}).call(_define('avatar_view'));

//信息条目修改 常规
(function () {
    var self = this,
        $cancel = $('.cancel'),
        $edit = $('.edit'),
        $save = $('.save'),
        $input = $('.input-basic');

    this.name = function (text, ele) {
        if(text == ''){
            return view_notification.show('不能为空');
        }
        data_model.request(page_config.api.name, function (data) {
            if (data.success) {
                view_notification.show('保存成功', true);
                ele.removeClass('active').prev('input').blur().prop('disabled', true);
                profile_view.framework.data.name = text;
            }
            else {
                view_notification.show('保存失败');
            }
        }, {name: text});
    };
    this.company = function (text, ele) {
        data_model.request(page_config.api.company, function (data) {
            if (data.success) {
                view_notification.show('保存成功', true);
                ele.removeClass('active').prev('input').blur().prop('disabled', true);
                profile_view.framework.data.firmname = text;
            }
            else {
                view_notification.show('保存失败');
            }
        }, {com: text});
    };
    this.title = function (text, ele) {
        data_model.request(page_config.api.title, function (data) {
            if (data.success) {
                view_notification.show('保存成功', true);
                ele.removeClass('active').prev('input').blur().prop('disabled', true);
                profile_view.framework.data.title = text;
            }
            else {
                view_notification.show('保存失败');
            }
        }, {title: text});
    };
    $edit.touchtap(function () {
        var p = $(this).parent('.handle'),
            i = p.prev('input');
        p.addClass('active');
        i.prop('disabled', false).data('before', i.val());

    }, 350);
    $cancel.touchtap(function () {
        var p = $(this).parent('.handle'),
            i = p.prev('input');
        p.removeClass('active');
        i.blur().prop('disabled', true).val(i.data('before'));
    }, 350);
    $save.touchtap(function () {
        var p = $(this).parent('.handle'),
            type = p.data('type');
        if (self.hasOwnProperty(type)) {
            self[type](p.prev('input').val(), p);
        }
    }, 350);
    $input.on('keypress', function (e) {
        var t = $(this),
            p = t.next(),
            type = p.data('type');
        if (e.keyCode == 13 && self.hasOwnProperty(type)) {
            self[type](p.prev('input').val(), p);
        }
    });
}).call(_define('item_view'));
//条目信息修改 个人简介
(function () {
    var self = this,
        $cancel = $('.att-cancel'),
        $edit = $('.att-edit'),
        $save = $('.att-save');

    this.summary = function (text, call) {
        data_model.request(page_config.api.summary, function (data) {
            if (data.success) {
                view_notification.show('保存成功', true);
                call();
            }
            else {
                view_notification.show('保存失败');
            }
        }, {summary: text});
    };
    $edit.touchtap(function () {
        var p = $(this).parent('.handle'),
            t = $('#' + p.data('type'));
        p.addClass('active');
        t.addClass('active').prop('disabled', false).focus().data('before', t.val());
    }, 350);
    $cancel.touchtap(function () {
        var p = $(this).parent('.handle'),
            t = $('#' + p.data('type'));
        p.removeClass('active');
        t.blur().removeClass('active').prop('disabled', true).val(t.data('before'));
    }, 350);
    $save.touchtap(function () {
        var p = $(this).parent('.handle'),
            type = p.data('type'),
            t = $('#' + p.data('type'));
        if (self.hasOwnProperty(type)) {
            self[type](t.val(), function () {
                p.removeClass('active');
                t.blur().removeClass('active').prop('disabled', true);
            });
        }
    }, 350);
}).call(_define('item_view'));
//条目信息修改 手机号码绑定
(function(){
    var self        = this,
        $pwd        = $('#bind-pwd'),
        $phone      = $('#bind-phone'),
        $verify_btn = $('#bind-verify-btn'),
        $verify_code= $('#bind-verify-code'),
        $submit_btn = $('#bind-submit-btn'),
        $pwd_eye       = $pwd.next(),
        send_time = 0,
        timer = 0,
        btn_lock = false;

    this.form = function(){
        return {
            'password':$pwd.val(),
            'phone':$phone.val(),
            'captcha':$verify_code.val()
        }
    };
    this.check_form = function(){
        var form = self.form();
        return (form.password.length>=6 && base_regex().phone.test(form.phone) && form.captcha != '');
    };
    this.check_verify = function(){
        var form = self.form();
        return (form.password.length>=6 && base_regex().phone.test(form.phone));
    };
    this.verify_btn_active = function(active){
        if(active){
            $verify_btn.prop('disabled',false).removeClass('disable');
        }
        else{
            $verify_btn.prop('disabled',true).addClass('disable');
        }
    };
    this.submit_btn_active = function(active){
        return !!active ? $submit_btn.addClass('active') : $submit_btn.removeClass('active');
    };
    this.submit_verify = function(){
        $phone.blur();
        if(self.check_verify() && !btn_lock){
            data_model.request(page_config.api.verify,function(data){
                if(data.success){
                    self.already_sent();
                }
                else{
                    view_notification.show(data.message || '操作失败');
                }
            },self.form());
        }
    };
    this.already_sent = function(){
        $phone.prop('disabled',true);
        $verify_btn.prop('disabled',true).addClass('disable');
        $verify_code.prop('disabled',false);
        btn_lock = true;
        send_time = new Date().getTime();
        timer && clearInterval(timer);
        timer = setInterval(function(){
            var down = 60-(new Date().getTime() - send_time)/1000;

            if(down>=0){
                $verify_btn.html(Math.floor(down)+' s');
            }
            else{
                $phone.prop('disabled',false);
                $verify_btn.prop('disabled',false).removeClass('disable');
                $verify_btn.html('重新发送');
                clearInterval(timer);
                btn_lock = false;
            }

        },500);
    };
    this.form_event = function(){
        self.check_verify() ? self.verify_btn_active(true) : self.verify_btn_active(false);
        return self.check_form() ? self.submit_btn_active(true) : self.submit_btn_active(false);
    };
    this.submit_form = function(){
        if(self.check_form()){
            data_model.request(page_config.api.bind,function(data){
                if(data.success){
                    view_notification.show('绑定手机号成功');
                    profile_view.framework.data.phone = $phone.val();
                }
                else{
                    view_notification.show(data.message || '绑定失败',true);
                }
            },self.form());
        }
    };
    setInterval(self.form_event,300);
    $pwd_eye.on('touchstart mousedown',function(){$pwd.attr('type','text')});
    $pwd_eye.on('touchend mouseup',function(){$pwd.attr('type','password')});
    $submit_btn.touchtap(self.submit_form);
    $verify_btn.touchtap(self.submit_verify);
}).call(_define('bind_view'));
//条目信息修改 修改密码
(function () {
    var self = this,
        $old = $('#pwd-old'),
        $old_eye = $old.next(),
        $new = $('#pwd-new'),
        $new_eye = $new.next(),
        $repeat = $('#pwd-repeat'),
        $repeat_eye = $repeat.next(),
        $submit = $('#submit-change');

    this.form = function (empty) {
        return !!empty ? ($old.val(''), $new.val(''), $repeat.val('')) : {
            old_pwd: $old.val(),
            new_pwd: $new.val(),
            new_pwd_: $repeat.val()
        }
    };
    this.check = function () {
        return $old.val().length >= 6 && $new.val().length >= 6 && $repeat.val().length >= 6;
    };
    this.active = function () {
        if (self.check()) {
            $submit.addClass('active');
        }
        else {
            $submit.removeClass('active');
        }
    };
    $submit.touchtap(function () {
        if (self.check()) {
            data_model.request(page_config.api.change, function (data) {
                if (data.success) {
                    self.form(true);
                    view_notification.show('修改成功', true);
                    history.go(-1);
                }
                else {
                    view_notification.show(data.message || '修改成功');
                }
            }, self.form());
        }
    });
    setInterval(self.active, 300);
    $old_eye.on('touchstart mousedown', function () {
        $old.attr('type', 'text')
    });
    $old_eye.on('touchend mouseup', function () {
        $old.attr('type', 'password')
    });
    $new_eye.on('touchstart mousedown', function () {
        $new.attr('type', 'text')
    });
    $new_eye.on('touchend mouseup', function () {
        $new.attr('type', 'password')
    });
    $repeat_eye.on('touchstart mousedown', function () {
        $repeat.attr('type', 'text')
    });
    $repeat_eye.on('touchend mouseup', function () {
        $repeat.attr('type', 'password')
    });
}).call(_define('item_view'));
//条目信息修改 选择区域
(function () {
    var self = this,
        ori_list = [],
        list = [],
        province = [],
        city = [],
        act_province = 0,
        active = 4295034880;

    this.framework = avalon.define("region", function (vm) {
        vm.province = [];
        vm.city = [];
    });
    this.input = function () {
        if (active > 0) {
            profile_view.framework.data.region = self.get_name(active);
        }
    };
    this.get_name = function (id) {
        var l = list.length, p = '', c = '';
        for (var i = 0; i < l; i++) {
            if (list[i].id == id) {
                p = list[i].parentid.length > 9 ? list[i].ancestornames : '';
                c = list[i].name;
            }
        }
        return p + ' ' + c;
    };
    this.get_active = function () {
        return active;
    };
    this.update = function (id) {
        active = id;
        self.init();
    };
    this.init = function () {
        list = ori_list.concat();
        self.active_func();
        self.devide();
        self.render();
    };
    this.active_func = function (act) {
        var l = list.length;
        if (active && !act) {
            for (var i = 0; i < l; i++) {
                if (list[i].id == active) {
                    list[i].active = true;
                    if (list[i].parentid.length > 9) {
                        act_province = list[i].parentid;
                        self.active_func(list[i].parentid);
                    }
                    else {
                        act_province = active;
                    }
                }
                else {
                    list[i].active = false;
                }
            }
        }
        if (act) {
            for (var i = 0; i < l; i++) {
                if (list[i].id == act) {
                    list[i].active = true;
                }
            }
        }

    };
    this.devide = function () {
        var l = list.length;
        province = [];
        city = [{
            parentid: act_province,
            name: '不限',
            id: act_province,
            active: act_province == active
        }];
        for (var i = 0; i < l; i++) {
            if (list[i].parentid.length < 10 && list[i].id.length >= 10) {
                province.push(list[i]);
            }
            if (list[i].parentid.length == 10 && active && list[i].parentid == act_province) {
                city.push(list[i]);
            }
        }
    };
    this.render = function () {
        self.framework.province = province;
        self.framework.city = city;
    };
    this.get_list = function (id) {
        active = parseInt(id) > 100 ? parseInt(id) : active;
        //本地缓存
        if (!base_local_data.getdata('china_region_data_v1')) {
            data_model.get(page_config.api.region_list, function (data) {
                if (data.list) {
                    ori_list = data.list;
                    self.init();
                    self.input();
                    base_local_data.savedata('china_region_data_v1', data.list);
                }
            });
        }
        else {
            ori_list = base_local_data.getdata('china_region_data_v1');
            self.init();
            self.input();
        }
    };
}).call(_define('region_view'));
//条目信息修改 选择区域 逻辑
(function () {
    var self = this,
        $region = $('#region'),
        $left = $region.children('.content').children('.left'),
        $right = $region.children('.content').children('.right'),
        $submit = $('#submit-region'),
        lst = 0,
        lsx = 0,
        lsy = 0,
        rst = 0,
        rsx = 0,
        rsy = 0;

    this.tap_left = function (id) {
        region_view.update(id);
    };
    this.tap_right = function (id) {
        region_view.update(id);
    };
    this.submit = function () {
        data_model.request(page_config.api.region, function (data) {
            if (data.success) {
                view_notification.show(data.message || '设置成功', true);
                region_view.input();
                history.go(-1);
            }
            else {
                view_notification.show(data.message || '设置失败')
            }
        }, {region: region_view.get_active()});
    };
    $left.delegate("li", "touchstart", function (e) {
        lsx = e.originalEvent.touches[0].pageX;
        lsy = e.originalEvent.touches[0].pageY;
        lst = new Date().getTime();
    });
    $left.delegate("li", "touchend", function (e) {
        var event = e.originalEvent.changedTouches[0], move = Math.pow(event.pageX - lsx, 2) + Math.pow(event.pageY - lsy, 2), o = new Date().getTime();
        if (o - lst < 150 && move < 81) {
            self.tap_left($(this).data('id'));
        }
    });
    $right.delegate("li", "touchstart", function (e) {
        rsx = e.originalEvent.touches[0].pageX;
        rsy = e.originalEvent.touches[0].pageY;
        rst = new Date().getTime();
    });
    $right.delegate("li", "touchend", function (e) {
        var event = e.originalEvent.changedTouches[0], move = Math.pow(event.pageX - rsx, 2) + Math.pow(event.pageY - rsy, 2), o = new Date().getTime();
        if (o - rst < 150 && move < 81) {
            self.tap_right($(this).data('id'));
        }
    });
    $submit.touchtap(self.submit);

}).call(_define('region_view'));
//子侧栏控制
(function () {
    var self = this,
        h = $(window).height(),
        $main = $('#main-page'),
        $change = $('#change-pwd'),
        $region = $('#region'),
        $phone  = $('#change-phone'),
        $region_content = $region.children('.content'),
        sta = $();

    this.style_syn = function () {
        $region_content.css('height', ($(window).height() - 100) + 'px');
    };
    this.main_hide = function () {
        $main.css('height', h + 'px').animate({'margin-left': -100 + '%'}, 400);
    };
    this.main_show = function () {
        $main.css('height', 'auto').animate({'margin-left': 0 + '%'}, 400);
    };
    this.slide_change = function () {
        return self.main_hide(), $change.addClass('active');
    };
    this.slide_region = function () {
        return self.style_syn(), self.main_hide(), $region.addClass('active');
    };
    this.slide_phone = function () {
        return self.main_hide(), $phone.addClass('active');
    };
    this.slide_back = function () {
        return self.main_show(), setTimeout(function () {
            sta.removeClass('active')
        }, 400);
    };
    this.router = function () {
        var type = '';
        if (base_hash.getdata('child')) {
            type = base_hash.getdata('child');
            if (type == 'change') {
                sta = self.slide_change();
            }
            else if (type == 'region') {
                sta = self.slide_region();
            }
            else if(type == 'phone'){
                sta = self.slide_phone();
            }
        }
        else {
            self.slide_back();
        }
    };
    $region[0].addEventListener('touchmove', function (e) {
        var nh = $(window).height();
        if (nh != h) {
            style_syn();
        }
    }, false);
    window.onhashchange = self.router;
    location.hash = '';
}).call(_define('item_view'));