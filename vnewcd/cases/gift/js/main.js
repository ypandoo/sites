/**
 * @desc 微信分享接口，前端示例
 */
(function ($) {
    var WX_SIGNATURE_API = '../api.php';

    var bootstrap = function () {
        $.ajax({
            url: WX_SIGNATURE_API,
            data: {
                url: location.href.split('#')[0],
                type: "signature"
            },
            dataType: "json"
       })
        .success(function(result) {
            if(result.code != 0)
            {
                //alert(result.code);
                 return;
            }
            
            configWeixin(result.data);
        })
        .error(function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        })
    };

    var setupWeixinShare = function (message) {
            wx.onMenuShareTimeline(message);
            wx.onMenuShareAppMessage(message);
            wx.onMenuShareQQ(message);
            wx.onMenuShareWeibo(message);
            wx.onMenuShareQZone(message);
    };

    var configWeixin = function (options) {
        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: options.appId, // 必填，公众号的唯一标识
            timestamp: options.timestamp, // 必填，生成签名的时间戳
            nonceStr: options.nonceStr, // 必填，生成签名的随机串
            signature: options.signature,// 必填，签名，见附录1
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareQZone'
            ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
    };

    wx.ready(function () {
        setupWeixinShare({
            title: '男人的内心有颗坚硬的水煮蛋', // 分享标题
            desc: '男人的内心有颗坚硬的水煮蛋', // 分享描述
            link: 'http://www.vnewcd.com/weixinapi/yinhun/', // 分享链接
            imgUrl: 'http://www.vnewcd.com/weixinapi/yinhun/images/logo.png', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                window.location.href='result.html';
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
    });

    bootstrap();
})(jQuery);