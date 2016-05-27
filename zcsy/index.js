var win = $(window),
    nav_on = null;
$(function() {
    // banner 切换
    (function() {
        var banner = $('#banner'),
            pic_c  = banner.find('.pics'),
            pics   = pic_c.children(),
            idx_c  = banner.find('.idxs'),
            idxs   = idx_c.children(),
            btns   = banner.find('.btns a'),
            prev   = btns.filter('.prev'),
            next   = btns.filter('.next'),

            len    = pics.length,
            idx    = 0,
            prev_i = -1,
            max_i  = len - 1,
            curr_p = pics.eq(idx),
            curr_i = idxs.eq(idx),
            delay  = 5000,
            timeout = -1;

        /*var index_hash = location.hash || 0;
        idx = parseInt(index_hash.substring(1,index_hash.Length));
        curr_i = idxs.eq(idx);
        curr_i.addClass('on');
        auto();
        idxs.hover(hover);*/

        win.on('load', function() {
            idx_recu(0, 1500/len, function() {
                setTimeout(function() {
                    curr_i.addClass('on');
                    auto();
                }, 300);
                idxs.hover(hover);
            });
            banner.hover(function() {
                // prev.stop().fadeIn(300);
                // next.stop().fadeIn(300);
                btns.addClass('on');
            }, function() {
                btns.removeClass('on');
                // prev.stop().fadeOut(300);
                // next.stop().fadeOut(300);
            });
            prev.on('click', function() {fade(idx===0? idx=max_i:--idx)});
            next.on('click', function() {fade(idx===max_i? idx=0:++idx)});
        });

        function fade(idx) {
            clearTimeout(timeout);
            prev_i = idx;
            curr_p.stop(false,true).fadeOut(300);
            curr_p = pics.eq(idx).stop(false,true).fadeIn(300);
            curr_i.removeClass('on');
            curr_i = idxs.eq(idx).addClass('on');
            auto();
        }
        function hover(){
            idx = $(this).index();
            if (idx === prev_i) return;
            fade(idx);
        }
        function idx_recu(idx, delay, func) {
            temp = idxs.eq(idx);
            if (temp.length) {
                temp.css('margin-top',0).fadeIn(500);
                setTimeout(function() {
                    idx_recu(idx+1, delay, func);
                }, delay);
            } else {
                func();
                return;
            }
        }
        function auto() {
            timeout = setTimeout(function() {
                fade(idx===max_i? idx=0: ++idx);
            }, delay);
        }
    }());


    // 二级栏目 下拉
    (function() {
        win.on('load', function() {
            var lis = $('#nav li'),
                on  = $(nav_on),
                lis_1 = lis.filter(':not(.more)'),
                lis_2 = lis.filter('.more'),
                subNav = $('#subNav'),
                subitem = subNav.find('.item'),

                n  = $(),
                li = n,
                item = n,
                link = n,

                teimeout = -1,
                opened = false;

            lis_2.hover(function() {
                link.removeClass('on');
                item.removeClass('on');
                li = $(this);
                link = li.find('a').addClass('on');
                item = subitem.eq(li.index()-1);
                item.addClass('on');
                opened = true;
            }, none);

            subNav.hover(open, close);
            $('#header').hover(none, function() {
                timeout = setTimeout(close, 100);
            });
            lis_1.hover(close, none);

            function open() {
                //clearTimeout(timeout);
                if (opened) {
                    on.removeClass('on');
                    link.addClass('on');
                }
            }
            function close() {
                on.addClass('on');
                link.removeClass('on');
                item.removeClass('on');
                opened = false;
            }
            function none() {};
        });
    }());
    win.on('load', function() {
    })

});

