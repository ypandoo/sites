/**
 * Created by DeaN on 2015/8/3.
 */
(function enterSite($,window){


    //createjs.Ticker.addEventListener('tick',updateStage);

    $(".loading").fadeIn();
    var urls=[
        "img/bg.jpg",
        "img/bg2.jpg",
        "img/bg3.jpg",
        "img/bg4.jpg",

        "img/card1_1.jpg",
        "img/card1_2.jpg",
        "img/card1_3.jpg",
        "img/card2_1.jpg",
        "img/card2_2.jpg",
        "img/card2_3.jpg",
        "img/card3_1.jpg",
        "img/card3_2.jpg",
        "img/card3_3.jpg",
        "img/card4_1.jpg",
        "img/card4_2.jpg",
        "img/card4_3.jpg",
        "img/card5_1.jpg",
        "img/card5_2.jpg",
        "img/card5_3.jpg",

        "img/q1.png",
        "img/q2.png",
        "img/q3.png",
        "img/q4.png",
        "img/q5.png",

        "img/ptext1.png",
        "img/ptext2.png",
        "img/ptext3.png",

        "img/rtext1.png",
        "img/rtext2.png",
        "img/rtext3.png",
        "img/rtext4.png",

        // "img/dash_top.png",
        // "img/logo_buick.png",
        // "img/logo_ele.png",
        // "img/cover/back.jpg",
        // "img/cover/btn_play.png",
        // "img/cover/btn_rule.png",
        // "img/cover/copy.png",
        // "img/cover/title-0.png",
        // "img/cover/title-1.png",
        // "img/game/a1.png",
        // "img/game/back.jpg",
        // "img/game/green.png",
        // "img/game/know.png",
        // "img/game/select.png",
        // "img/game/stop.png",
        // "img/game/white.png",
        // "img/game/tip-0.png",
        // "img/game/tip-1.png",
        // "img/game/tip-2.png",
        // "img/game/tip-3.png",
        // "img/game/tip-4.png",
        // "img/intro1/1.png",
        // "img/intro1/back.jpg",
        // "img/intro1/copy.png",
        // "img/intro2/2.png",
        // "img/intro2/back.jpg",
        // "img/intro2/copy.png",
        // "img/intro3/3.png",
        // "img/intro3/copy.png",
        // "img/intro4/back.jpg",
        // "img/intro4/copy.png",
        // "img/intro4/copy_b.png",
        // "img/intro4/tuan.png",
    ];
    var preload = new createjs.LoadQueue();
    preload.addEventListener('progress',onProgress);
    preload.addEventListener('complete',onComplete);
    preload.addEventListener('error',onError);

    preload.loadManifest(urls);
    var step=0;
    function onProgress(evt){
        var p = parseInt(evt.loaded*100);
        $(".per").text(p+"%");
        var nextStep = 1+Math.min(parseInt(p/10),5);
        if(nextStep>step){
            step = nextStep;
            if(step==2){
                $(".loading .bian").show();
            }
            //var frame = Math.floor(skin.currentAnimationFrame);
            //skin.gotoAndPlay("step"+step);
        }

    }
    function onComplete(evt){
        // $(".wrap").load("main.html",function(){
            // $(document).ready(function(){
            //     checkReady();
            // })
        // });
        $(".loading").fadeOut();
    }

    function checkReady(){
        if(this.readyTimeout) clearTimeout(this.readyTimeout);
        if(window.site&&window.site.init&&$(window).height()>$(window).width()) {
            window.site.init();
            $(".loading").fadeOut(500,function(){
                //createjs.Ticker.removeEventListener('tick',updateStage);
                //skin.stop()
                //skin = null;
                $(this).remove();
            });
        }else{
            console.log("wait");
            this.readyTimeout = setTimeout(checkReady,500);
        }
    }
    function onError(evt){
        console.log("error");
    }
})(jQuery,window);
