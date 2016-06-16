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
        $pwdnew     = $('#pwdnew'),
        $pwdnew_eye = $pwdnew.next(),
        $submit        = $('#submit-btn');

    this.form = function(){
        return {
            phone:$phone.val(),
            code:$verify.val(),
            name:$user.val(),
            password:$pwd.val(),
            password_:$pwdrepeat.val(),
            passwordnew:$pwdnew.val(),
            from:0
        }
    };

    this.btn_active = function(){
        var form = self.form();
        return (form.password.length>=6 && form.password_.length>=6 && form.passwordnew.length>=6)
        ?$submit.addClass('active'):$submit.removeClass('active');
    };

    this.submit_form = function(){
       $submit.hasClass('active') && self.regist();
    };

    this.regist = function(){

        view_notification.show('修改成功', 1);
         //view_success.show();
    };


    $submit.touchtap(self.submit_form);
    $pwd_eye.on('touchstart mousedown',function(){$pwd.attr('type','text')});
    $pwd_eye.on('touchend mouseup',function(){$pwd.attr('type','password')});
    $pwdrepeat_eye.on('touchstart mousedown',function(){$pwdrepeat.attr('type','text')});
    $pwdrepeat_eye.on('touchend mouseup',function(){$pwdrepeat.attr('type','password')});
    $pwdnew_eye.on('touchstart mousedown',function(){$pwdrepeat.attr('type','text')});
    $pwdnew_eye.on('touchend mouseup',function(){$pwdrepeat.attr('type','password')});


    setInterval(self.btn_active,300);
}).call(define('view_form'));