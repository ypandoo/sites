
//协议同意按钮状态切换
(function(){
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
}).call(define('view_agreement_checkbox'));

//消息通知
(function(){
    var $n = $('.notification');

    this.show = function(text,isalter){
        $n.fadeIn().children('.txt').html(text);
        if(!!isalter){
            $n.removeClass('red').addClass('green');

        }
        else{
            $n.removeClass('green').addClass('red');
        }
        setTimeout(function(){$n.fadeOut();},3000);
    };
}).call(define('view_notification'));


//短信验证
(function(){
    var self = this,
        $phone  = $('#phone'),
        $verify = $('#verify-code'),
        $verify_btn = $('#verify-btn'),
        send_time = 0,
        timer = 0,
        btn_lock = false;

    this.btn_active = function(){
        if(base_regex().phone.test($phone.val())){
            $verify_btn.removeClass('disable');
        }
        else{
            $verify_btn.addClass('disable');
        }
    };
    this.send_sms = function(){
        //view_notification.show('信息已发送');
        self.already_sent();
    };

    this.already_sent = function(){
        $phone.prop('disabled',true);
        btn_lock = true;
        $verify.prop('disabled',false);
        send_time = new Date().getTime();
        timer && clearInterval(timer);
        timer = setInterval(function(){
            var down = 60-(new Date().getTime() - send_time)/1000;

            if(down>=0){
                $verify_btn.html(Math.floor(down)+' s');
            }
            else{
                $phone.prop('disabled',false);
                $verify_btn.html('重新发送');
                clearInterval(timer);
                btn_lock = false;
            }

        },500);
    };
    $verify_btn.touchtap(self.send_sms);
    setInterval(self.btn_active,300);
}).call(define('view_verify'));

/*//注册原因 弹窗
(function(){
    if($_GET.hasOwnProperty('message') && $_GET.hasOwnProperty('title')){
        var $reason =   $('#regist-reason'),
            $content=   $reason.children('.content'),
            $title  =   $content.children('h3'),
            $msg    =   $content.children('h4'),
            $close  =   $reason.find('.yesiknow'),
            $portrait=$reason.find('img');
        $reason.show();
        $msg.html(decodeURIComponent($_GET.message));
        $title.html(decodeURIComponent($_GET.title));
        if($_GET.hasOwnProperty('portrait') && $_GET.portrait!=''){
            $portrait.attr('src',decodeURIComponent($_GET.portrait));
        }
        $close.touchtap(function(){
            $reason.fadeOut(100);
        });
    }
}).call(define('view_reason'));*/

/*注册成功弹窗*/
(function(){
    var $success = $('#regist-success'),
        $close   = $success.children('.close');
    this.show = function(){
        $success.fadeIn(200);
    };
    $close.touchtap(function(){$success.fadeOut(100);});
}).call(define('view_success'));


//表单
(function(){
    var self    =  this,
        $user   = $('#user-name'),
        $phone  = $('#phone'),
        $verify = $('#verify-code'),
        $verify_btn = $('#verify-btn'),
        $pwd    = $('#pwd'),
        $pwd_eye       = $pwd.next(),
        $pwdrepeat     = $('#pwdrepeat'),
        $pwdrepeat_eye = $pwdrepeat.next(),
        $submit        = $('#submit-btn');

    this.form = function(){
        return {
            phone:$phone.val(),
            code:$verify.val(),
            name:$user.val(),
            password:$pwd.val(),
            password_:$pwdrepeat.val(),
            from:0
        }
    };

    this.btn_active = function(){
        var form = self.form();
        return (base_regex().phone.test(form.phone) && form.code != '' && form.name != '' && form.password.length>=6 && form.password_.length>=6 && view_agreement_checkbox.checked)?$submit.addClass('active'):$submit.removeClass('active');
    };

    this.submit_form = function(){
       $submit.hasClass('active') && self.regist();
    };

    this.regist = function(){

        //view_notification.show('注册失败请重试');
         view_success.show();
    };


    $submit.touchtap(self.submit_form);
    $pwd_eye.on('touchstart mousedown',function(){$pwd.attr('type','text')});
    $pwd_eye.on('touchend mouseup',function(){$pwd.attr('type','password')});
    $pwdrepeat_eye.on('touchstart mousedown',function(){$pwdrepeat.attr('type','text')});
    $pwdrepeat_eye.on('touchend mouseup',function(){$pwdrepeat.attr('type','password')});
    setInterval(self.btn_active,300);
}).call(define('view_form'));