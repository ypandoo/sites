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

//登录
(function(){
    var $account=$('#account'),
        $pwd=$('#pwd'),
        $btn=$('#subbmit-btn');

    this.login_check=function(){
        return $account.val() != "" && $pwd.val().length >= 6;
    };

    this.login_active=function(){
        if (login_check()){
            $btn.addClass('active');
        }
        else {
            $btn.removeClass('active');
        }
    };

    //do login
    this.login_action=function(){
        if(!login_check())return false;
        view_notification.show('登录成功', 1);
    };

    $pwd.pressenter(login_action);
    $btn.touchtap(login_action);

    setInterval(function(){login_active();},300);
}).call(this);


//找回密码成功提示
(function(){
    var self = this,
        $box = $('#forget-success'),
        $close = $box.children('.close'),
        $h3 = $box.children('h3'),
        $h6 = $box.children('h6'),
        $btn = $box.children('.btn-group').children('a');
    this.mail = function(){
        $box.fadeIn(100);
        $h3.html('验证邮件已发送');
        $h6.show().html('请前往邮箱验证');
        if($_GET.hasOwnProperty('source')){
            $btn.attr('href',decodeURIComponent($_GET.source)).html('返回登录前页面');
        }
        else{
            $btn.attr('href','javascript:location.reload()').html('重新登陆');
        }
    };
    this.phone = function(){
        $box.fadeIn(100);
        $h3.html('密码已重置并登录');
        if($_GET.hasOwnProperty('source')){
            $btn.attr('href',decodeURIComponent($_GET.source)).html('返回登录前页面');
        }
        else{
            $btn.attr('href','http://angelcrunch.com').html('返回首页');
        }
    };
    $close.touchtap(function(){
        location.reload();
    });
}).call(define('forget_success_view'));

