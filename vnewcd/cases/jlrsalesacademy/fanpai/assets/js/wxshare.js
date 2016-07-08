$(function () {
    var appId = '',
        imgUrl = "http://app.vstokes.com/innisfree/assets/img/wxshare.jpg",
        link = "http://app.vstokes.com/innisfree/index.html",
        title = htmlDecode("发现大豆神仙水，100个悦诗风吟Green Box 翻不停！"),
        desc = htmlDecode("在韩国拥有超高人气的innisfree发酵豆焕活精华露9月全新上市啦！我正在为获得大豆神仙水Green Box而努力，快点击链接为我应援，和我一起来参加吧！"),
        fakeid = "";
    _WXShare(imgUrl, 640, 320, title, desc, link, '');

    function htmlDecode(str) {
        return str
            .replace(/&#39;/g, '\'')
            .replace(/<br\s*(\/)?\s*>/g, '\n')
            .replace(/&nbsp;/g, ' ')
            .replace(/&lt;/g, '<')
            .replace(/&gt;/g, '>')
            .replace(/&quot;/g, '"')
            .replace(/&amp;/g, '&');
    }

    /*******************************
     * Author:Mr.Rock
     * Description:微信分享通用代码
     * 使用方法：_WXShare('分享显示的LOGO','LOGO宽度','LOGO高度','分享标题','分享描述','分享链接','微信APPID(一般不用填)');
     *******************************/
    function _WXShare(img, width, height, title, desc, url, appid) {
        //初始化参数
        img = img || 'http://a.zhixun.in/plug/img/ico-share.png';
        width = width || 100;
        height = height || 100;
        title = title || document.title;
        desc = desc || document.title;
        url = url || document.location.href;
        appid = appid || '';
        //微信内置方法
        function _ShareFriend() {
            WeixinJSBridge.invoke('sendAppMessage', {
                'appid': appid,
                'img_url': img,
                'img_width': width,
                'img_height': height,
                'link': url,
                'desc': desc,
                'title': title
            }, function (res) {
                _report('send_msg', res.err_msg);
            })
        }
        function _ShareTL() {
            WeixinJSBridge.invoke('shareTimeline', {
                'img_url': img,
                'img_width': width,
                'img_height': height,
                'link': url,
                'desc': desc,
                'title': title
            }, function (res) {
                _report('timeline', res.err_msg);
            });
        }

        function _ShareWB() {
            WeixinJSBridge.invoke('shareWeibo', {
                'content': desc,
                'url': url
            }, function (res) {
                _report('weibo', res.err_msg);
            });
        }

        // 当微信内置浏览器初始化后会触发WeixinJSBridgeReady事件。
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            // 发送给好友
            WeixinJSBridge.on('menu:share:appmessage', function (argv) {
                _ShareFriend();
            });
            // 分享到朋友圈
            WeixinJSBridge.on('menu:share:timeline', function (argv) {
                _ShareTL();
            });
            // 分享到微博
            WeixinJSBridge.on('menu:share:weibo', function (argv) {
                _ShareWB();
            });
        }, false);
    }
});