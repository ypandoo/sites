var win = $(window),
    nav_on = null;
$(function () {
    // 导航栏控制
    (function () {
        var nav = $('#nav'),
            shop = $('#shop'),
            // search_box = shop.find('#searchbox'),
            // search_btn = shop.find('.btn-search')[0],
            lis = nav.children(),
            lis_1 = lis.filter(':not(.more)'),
            lis_2 = lis.filter('.more'),
            links = lis.children(),
            links_1 = lis_1.children(),
            links_2 = lis_2.children(),
            subNav = $('#subNav'),
            subitem = $('#subNav').find('.item'),
            prev_item = $(),
            spans = links.children(),
            offs = spans.filter('.off'),
            ons = spans.filter('.on'),
            sbs = spans.filter('.slideBlock'),

            hei = links.eq(0).height(),
            len = lis.length,

            // 记录当前
            link_page = null,
            link_curr = null,

            timeout = -1;

        // 初始化当前链接
        href = location.href.replace(/[_\d]{1,2}\./, '.');      // 静态页面用
        // href = location.href,                                   // 程序用
        // for (var i = 0; i < len; i++) {
        //     link_page = links.eq(i);
        //     if (href.indexOf(link_page.attr('href').replace(/(?:_\d)?\..*/, '')) > 0) {    // 静态页面用
        //         // if (href.indexOf(link_page.attr('href').replace(/(?:_\d)?\..*/, '')) > 0) {    // 程序用
        //         control(nav_on = link_curr = link_page = link_page[0], false);
        //         delete i;
        //         break;
        //     }
        // }
        links_2.each(function (idx) {
            if (this === nav_on) return;
            this.setAttribute('idx', idx);
        });
        // if (i === len) {
        //     if (href.indexOf('/user') >= 0) {
        //         control(nav_on = link_curr = link_page = links.eq(5)[0], false);
        //     } else {
        //         control(nav_on = link_curr = link_page = links.eq(0)[0], false);
        //     }
        // }

        index_hash = getHash();
        index_hash = parseInt(index_hash.substring(1,index_hash.Length));
        link_page = links.eq(index_hash)[0];
        control(nav_on = link_curr = link_page, false);

        if (index_hash != 0)
            $("#index1").removeClass('on');



        win.on('load', function () {
            // 鼠标指向, 链接高亮
            links_1.hover(function () { control(this, false) }, none);
            links_2.hover(function () { control(this, true) }, none);
            // 鼠标离开导航栏, 恢复当前页面高亮
            nav.hover(none, function () {
                timeout = setTimeout(function () {
                    control(link_page, true);
                }, 10);
            });
            subNav.hover(function () {
                clearTimeout(timeout);
            }, function () {
                index_hash = getHash();
                link_page = links.eq(index_hash)[0];
                control(link_page, true);
                idx = parseInt(link_page.getAttribute('idx'));
                prev_item = subitem.eq(idx).removeClass('on');
            });
        });

        function control(elem, flag, idx) {
            link_curr.className = "";
            elem.className = "on";
            link_curr = elem;
            prev_item.removeClass('on');
            if (flag) {
                idx = parseInt(elem.getAttribute('idx'));
                prev_item = subitem.eq(idx).addClass('on');
                // search_box.hide();
                // search_btn.className = "btn-search";
            }
        }
        function none() { }


        // 2015.06.09 修改搜索, 添加语言
        /*var subitem_search = subitem.filter('.search'),
            subitem_langs = subitem.filter('.langs');
        shop.find('.btn-search').hover(function () {
            prev_item.removeClass('on');
            prev_item = subitem_search.addClass('on');
        }, none);
        shop.find('.btn-lang').hover(function () {
            prev_item.removeClass('on');
            prev_item = subitem_langs.addClass('on');
        }, none);
        shop.hover(none, function () {
            timeout = setTimeout(function () {
                prev_item.removeClass('on');
            }, 300);
        });*/
    }());

    // 搜索按钮
    /*function () {
        var sup = $('#header'),
            btn = sup.find('.btn-search'),
            box = sup.find('#searchbox'),
            timeout = -1,
            delay = 1000;

        btn.hover(open, autoFade);
        box.on('focus', function () {
            clearTimeout(timeout);
        }).on('blur', function () {
            autoFade();
        });

        function open() {
            clearTimeout(timeout);
            btn.addClass('on');
            box.stop(false, true).fadeIn(300);
        }

        function close() {
            btn.removeClass('on');
            box.stop(false, true).fadeOut(300);
        }

        function autoFade() {
            timeout = setTimeout(function () {
                close();
            }, delay);
        }
    }());*/

    // placeholder 处理
    /*(function () {
        // 情况1，如果浏览器支持 placeholder，则优先使用默认。
        var input = document.createElement("input");
        input.type = "text";
        if ("placeholder" in input) return;

        // 情况2，如果没有任何标签使用 placeholder，则不做任何处理。
        var inputs = $("*[placeholder]"),
            val = "";
        if (!inputs.length) return;

        // 情况3，对于不支持 placeholder 属性的元素进行预加载和事件挂载。
        inputs
            .each(function () {
                input = $(this);
                input.val(input.attr("placeholder"));
            })
            .on("focus", focus)
            .on("blur", blur)
            .on("change", change);

        // 处理函数
        function focus() {
            input = $(this);
            val = input.val();
            if (val && (val !== input.attr('placeholder'))) return;
            else input.val("");
        }
        function blur() {
            // input.val(input.attr("placeholder"));
            val = input.val();
            if (val && (val !== input.attr('placeholder'))) {
                return;
            } else {
                input.val(input.attr("placeholder"));
            }
        }
        function change() {
            if (input.val()) {
                input.off("focus").off("blur");
            } else {
                input.on("focus", focus).on("blur", blur);
            }
        }
    })();

    // 法律声明 & 网站地图 唤出
    (function () {
        var copyright = $('#copyright'),
            btn_legal = copyright.find('.legal'),
            btn_map = copyright.find('.sitemap'),
            mask = $('#mask'),
            wraps = mask.find('.wrap'),
            legal = wraps.filter('#legal'),
            map = wraps.filter('#sitemap'),
            curr = $(),
            body = $(document.body),
            m_left = (win.width() - body.width()) / 2;
        win.on('resize', function () {
            m_left = (win.width() - body.width()) / 2;
            body.css('margin-left', m_left);
        });

        btn_legal.on('click', function () { open(legal); });
        btn_map.on('click', function () { open(map); });
        mask.on('click', close);

        function open(elem) {
            mask.show()
            curr = elem.animate({ 'right': 0 }, 189);
            body.stop().animate({ 'margin-left': m_left - 378 }, 189);
        }
        function close() {
            curr.stop().animate({ 'right': -378 }, 189, function () {
                mask.hide();
            });
            body.stop().animate({ 'margin-left': m_left }, 189);
        }
        // wraps.on('click', function (e) {
        //     if (e && e.stopPropagation) {
        //         e.stopPropagation();
        //     } else window.event.cancelBubble = true;
        //     // return false;
        // });
    }());*/
    // 调整高度
    /*(function () {
        var copyright = $('#copyright'),
            hei = $('html').height() - $('body').height();
        if (hei <= 0) return;
        copyright.find('.g-wrap div').height(37 + hei);
    }());*/
});


function getHash()
{
    if ((window.location.href.indexOf("intro") != -1) 
        {return 1;}
    else if ((window.location.href.indexOf("case") != -1) )
    {
        return 2;
    }
    else if ((window.location.href.indexOf("culture") != -1) 
         )
    {
        return 3;
    }else if (window.location.href.indexOf("contact") != -1) 
    {
        return 4;
    }else
    {
        return 0;
    }
}