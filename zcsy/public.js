var win = $(window),
    nav_on = null;
$(function () {
    // 导航栏控制
    (function () {
        var nav = $('#nav'),
            shop = $('#shop'),
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
        links_2.each(function (idx) {
            if (this === nav_on) return;
            this.setAttribute('idx', idx);
        });

        index_hash = getHash();
        //index_hash = parseInt(index_hash.substring(1,index_hash.Length));
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

        function getHash()
        {
            if (window.location.href.indexOf("intro") != -1)
                {return 1;}
            else if ((window.location.href.indexOf("case") != -1) )
            {
                return 2;
            }
            else if ((window.location.href.indexOf("culture") != -1))
            {
                return 3;
            }else if (window.location.href.indexOf("contact") != -1)
            {
                return 4;
            }else
            {
                return 0;
            }
        };
    }());
});


(function(){
    //定义类
    this.define = this._define = function (s) {
        return (typeof  s != 'undefined' && typeof  this[s] == 'undefined') ? this[s] = {} : (this[s] || {});
    };

		this.base_url = 'http://localhost/back/';
    this.upload_img = 'http://localhost/back/uploads/content_pic/';
    this.page_interval = 10;

    //跨域获取数据方法
    this.base_remote_data={
        ajaxjsonp:function(url,call,data,error){
            $.ajax({
                url:url,
                type:'get',
                cache:false,
                data:data,
                dataType:'jsonp',
                jsonp:'callback',
                success:function(ret) {
                    var json={};
                    if(typeof ret=='string'){
                        try{
                            json=JSON.parse(ret);
                        }
                        catch(e){

                        }
                    }
                    if(typeof ret=='object'){
                        json=ret;
                    }
                    call(json);
                },
                error:function(e){
                    if(typeof  error == 'function'){
                        error(e);
                    }
                }
            });
        },

        //ajax
        ajaxjson:function(url, call, data, error){
          $.ajax({
              url:url,
              type:'post',
              cache:false,
              data:data,
              dataType:'json',
              success:function(ret) {
                  var json={};
                  if(typeof ret=='string'){
                      try{
                          json=JSON.parse(ret);
                      }
                      catch(e){

                      }
                  }
                  if(typeof ret=='object'){
                      json=ret;
                  }
                  call(json);
              },
              error:function(e){
                  if(typeof  error == 'function'){
                      error(e);
                      console.log('通讯错误:');
                      console.log(e);
                  }
              }
          });

        }
    };

  }).call(this);
