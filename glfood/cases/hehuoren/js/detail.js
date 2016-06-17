//Base_view
(function(){
    var self  = this,
        $noti = $('.notification'),
        $bk   = $('.bk');

    this.bk = {
        show:function(){
            $bk.show(0,function(){$bk.css('opacity',0.7);});
        },
        hide:function(){
            $bk.css('opacity',0);
            setTimeout(function(){$bk.hide()},100);
        }
    };

    this.notification = {
        show:function(text,isalter){
            $noti.fadeIn().children('.txt').html(text);
            if(!!isalter){
                $noti.removeClass('red').addClass('green');

            }
            else{
                $noti.removeClass('green').addClass('red');
            }
            setTimeout(function(){$noti.fadeOut();},3000);
        },
        hide:function(){
            $noti.fadeOut();
        }
    };

}).call(define('base_view'));

/*标题控制*/
(function(){
    var self = this;
    this.avalon_title_control = avalon.define("title-controller", function (vm) {
         vm.toggle_content=function(id){
            if ($('#'+id).is(':visible')) 
            {
                $('#em_'+id).css("background-image", "url(img/arrow_up.png)");  
                $('#'+id).fadeOut();
            }
            else
            {
                $('#em_'+id).css("background-image", "url(img/arrow_down.png)");  
                $('#'+id).fadeIn();
            }
        };
    });
}).call(define('title-space'));

//发送投资意向
(function(){
    var self = this,
        $intention=$('#send-intention'),
        $box = $('#common-notice-box'),
        $close=$box.children('.close');

    $intention.touchtap(function(){
        $box.fadeIn();
    },200);

    $close.touchtap(function(){$box.hide();});

}).call(_define('intention_controll'));


//Shop-block
(function(){
    
    var self = this,
        $block=$('#block'),
        $block1=$('#block1'),
        $block2=$('#block2'),
        $block3=$('#block3'),
        $box = $('#common-notice-box'),
        $close=$box.children('.close');

    $block.touchtap(function(){
        $box.fadeIn();
    },200);

    $block1.touchtap(function(){
        $box.fadeIn();
    },200);

    $block2.touchtap(function(){
        $box.fadeIn();
    },200);

    $block3.touchtap(function(){
        $box.fadeIn();
    },200);

    $close.touchtap(function(){$box.hide();});

}).call(define('qa_controll'));


//分享二维码
(function(){
    
    var self = this,
        $share=$('#share-wechat'),
        $box = $('#common-notice-box'),
        $close=$box.children('.close');

    $share.touchtap(function(){
        $box.fadeIn();
    },200);

    $close.touchtap(function(){$box.hide();});

}).call(define('qa_controll'));

//关注
(function(){
    var self = this,
        $follow = $('#follow-btn'),
        has_follow = false;
    this.follow = function(){
        $follow.addClass('active');
        has_follow = true;
    };
    this.unfollow = function(){
        $follow.removeClass('active');
        has_follow = false
    };
    this.do_follow = function(){
        self.follow();
        base_view.notification.show('关注成功');

    };
    this.do_unfollow = function(){
        self.unfollow();
        base_view.notification.show('取消关注');

    };
    $follow.touchtap(function(){
      return has_follow?self.do_unfollow():self.do_follow();
    })
}).call(define('follow_controll'));