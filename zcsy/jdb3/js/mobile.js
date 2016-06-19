$(function (){
    var index = {
        Reset: function(){
            $('.flexslider').flexslider({animation: "fade"});
        },
        Introduction: function () {
            var texts       = $('.rec ul li'),
                texts_index = 0,
                texts_move;

            texts.eq(texts_index).css('opacity','1');

            setInterval(function (){
                texts.eq(texts_index).stop().animate({'opacity':'0'},1000);
                texts_index = texts_index ===  texts.length - 1 ? 0 : texts_index + 1;
                texts.eq(texts_index).stop().animate({'opacity':'1'},2000);
            },6000);
        },
        MenuControl : function(){
            var btn_menu = $('.btn_menu'),
                menu     = $('.site-menu');

            btn_menu.on('click',function (e){
                menu.toggle();
            });
        },
        MenuReset: function (){
            if(document.cookie.indexOf('user_id') == -1){
                $('#logout, #cart, #myorder, #account').hide();
            }else{
                $('#login').hide();
            }
        },
        showMessage: function (text){
            $('#messagebox').text(text).show().delay(2000).fadeOut();
        },
        lang: function(){
            if (document.cookie.indexOf('lang=') === -1 ) {
                var lang = navigator.language || navigator.userLanguage;
                if (lang.indexOf('en') === 0) {
                    window.location.href = '/locale';
                }
            };
        },
        showError: function(){
            if (window.location.href.indexOf('?is_err=1') !== -1) {
                index.showMessage('Error. Please try again.');
            }
        },
        cartFull: function(){
            if($('#cartfull').val() == 'true'){
                return $('.btn_cart').addClass('btn_cart_full');
            }else{
                return $('.btn_cart').removeClass('btn_cart_full');
            }
        },
        viewAllSub: function(){
            var subs = $("#subs");
            var allmenus = $(".allmenus");
            subs.on('click',function (e){
                if(allmenus.hasClass('min')){
                    allmenus.removeClass('min');
                    subs.text('》');
                    return;
                }else{
                    allmenus.addClass('min');
                    subs.text('《');
                    return;
                }
            });
        }
    };

    var product = {
        numberDom: $('.product .numb'),
        totalDom : $('.product .prototal b'),
        priceDom : $('.product .price b'),
        btn_plus : $('.product .plus'),
        btn_minus: $('.product .minus'),
        SucTotal: function (){
            var total = parseInt(this.priceDom.text()) * parseInt(this.numberDom.text());
            this.totalDom.text(total);
        },
        PlusNumber : function (){
            var that = this;
            that.btn_plus.on('click',function (e){
                e.preventDefault();
                that.numberDom.text(parseInt(that.numberDom.text()) + 1);
                that.SucTotal();
            });
        },
        MinusNumber: function (){
            var that = this;
            that.btn_minus.on('click',function (e){
                e.preventDefault();
                if (parseInt(that.numberDom.text()) > 1){
                    that.numberDom.text(parseInt(that.numberDom.text()) - 1);
                    that.SucTotal();
                }
            });
        }
    };
    var cart = {
        addresslist:$('.addresslist'),
        deliveryselect:$('.deliveryselect'),
        payment:$('.payment'),
        openAddressInfo: function (){
            $('body').on('click','li span.editaddress',function (e){
                e.preventDefault();
                $('.address-info').hide();
                $('.chooseaddress,.editaddress').show();
                $(this).hide();
                $(this).parent().find('.chooseaddress').hide();
                $(this).parent().find('.address-info').show();
            });

            $('body').on('click','li.addaddress span',function (e){
                e.preventDefault();
                $('.address-info').hide();
                $('.chooseaddress,.editaddress').show();
                $(this).parent().find('.address-info').show();
            });
        },
        chooseProvince: function (){
            var html = '';
            $('.addresslist').on('change','select.area[name="province"]',function (e){
                var that = this;
                $.post('/address/getcity',{province:$(this).val()},function (result){
                    for(var i = 0; i < result.city.length; i++){
                        html += '<option value="'+ result.city[i].Name +'">'+  result.city[i].Name +'</option>';
                    }
                    $(that).parent().next().children().eq(1).html(html);
                    $(that).parent().next().children().eq(1).attr('value',result.city[0].Name);

                    html = '';
                    for(var i = 0; i < result.region.length; i++){
                        html += '<option value="'+ result.region[i].Name +'">'+  result.region[i].Name +'</option>';
                    }
                    $(that).parent().next().next().children().eq(1).html(html);
                    $(that).parent().next().next().children().eq(1).attr('value',result.region[0].Name);
                    html = '';
                });
            });
        },
        chooseCity: function(){
            $('.addresslist').on('change','select.area[name="city"]',function (e){
                var that = this;
                var province = $(this).parent().prev().children().eq(1).val();
                var html=''
                $.post('/address/getregion',{province:province,city:$(this).val()},function (region){
                    for(var i = 0; i < region.length; i++){
                        html += '<option value="'+ region[i].Name +'">'+  region[i].Name +'</option>'
                    }
                    $(that).parent().next().children().eq(1).html(html);
                    cart.changeCartItems();
                    html = '';
                });
            });
        },
        saveAddress: function(){
            $('.addresslist').on('click', '.save',function (e){
                e.preventDefault();
                var adddom = $(this).parent(), data = {};

                data._id        = adddom.find('input[name="add_id"]').val() || undefined;
                data.name       = adddom.find('input[name="name"]').val();
                data.address    = adddom.find('input[name="addr"]').val();
                data.province   = adddom.find('select[name="province"]').val() || 'undefined';
                data.city       = adddom.find('select[name="city"]').val();
                data.district   = adddom.find('select[name="district"]').val();
                data.telephone  = adddom.find('input[name="tel"]').val();
                data.telephone2 = adddom.find('input[name="tel2"]').val() || 'undefined';
                data.is_inner   = adddom.find('input[name="is_inner"]').attr('checked');
                data.is_default = true;
                if (data.province == 'undefined' || !data.province){
                    index.showMessage('请填写城市信息');
                    return;
                }
                $.post('/address/upsert', data, function (result){
                    cart.changeAddress(result);
                }).error(function (err){
                    index.showMessage(err.responseText);
                });
            });
        },
        useAddress: function(){
            $('body').on('click', '.addresslist .chooseaddress', function (e){
                $(this).next().find('.save').trigger('click');
            });
        },
        deleteAddress: function (){
            $('body').on('click', '.addresslist .dele', function (e){
                e.preventDefault();
                var data = {};
                var adddom = $(this).parent();

                data._id = adddom.find('input[name="add_id"]').val() || 'undefined';
                data.is_default = adddom.parent().hasClass('select');
                $.post('/address/delete', data, function (result){
                    cart.changeAddress(result);
                });
            });
        },
        changeAddress : function(result){
            $('.addresslist').html(result.html);
            $('.address-info').hide();
            if (result.cancod) {
                $('a.yl').show();
            }else{
                $('a.yl').hide();
            }
            var hour = new Date().getHours() + 1,
                date,
                index = result.cantomorrow ? 1 : 2,
                html = result.cantoday ? '<option>today</option>' :'';
            for (; index < 7; index ++){
                date = cart.getWeekDate(index);
                html += '<option>'+ date.week + ' ' + date.day +',' + date.month +',' + date.year+'</option>';
            }
            cart.deliveryselect.html(html);
            this.changeCartItems();
        },
        resetDate: function (){ //日期
            var hour = new Date().getHours() + 1,
                date,
                cantoday = $('input[name="cantoday"]').val(),
                cantomorrow = $('input[name="cantomorrow"]').val(),
                html = cantoday == 'true' ? '<option>today</option>' :'',
                index = cantomorrow == 'true' ? 1 : 2;

            for (; index < 7; index ++){
                date = this.getWeekDate(index);
                html += '<option>'+ date.week + ' ' + date.day +',' + date.month +',' + date.year+'</option>';
            }
            this.deliveryselect.html(html);
        },
        getWeekDate: function (AddDayCount){
            var newDate     = new Date();
                // weekdayText = ['Mon','Tues','Wed','Thur','Fri','Sat','Sun'],
                // monthText   = ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];
            newDate.setDate(newDate.getDate() + AddDayCount);
            var m = newDate.getMonth()+1;
            var w = newDate.getDay();
            var y = newDate.getFullYear();
            switch (w)
            {
                case 1:
                w = 'Mon';
                break;
                case 2:
                w = 'Tues';
                break;
                case 3:
                w = 'Wed';
                break;
                case 4:
                w = 'Thur';
                break;
                case 5:
                w = 'Fri';
                break;
                case 6:
                w = 'Sat';
                break;
                case 0:
                w = 'Sun';
                break;
                default:
                w = 'Sun';
            }
            switch(m)
            {
                case 1:
                m = 'Jan';
                break;
                case 2:
                m = 'Feb';
                break;
                case 3:
                m = 'Mar';
                break;
                case 4:
                m = 'Apr';
                break;
                case 5:
                m = 'May';
                break;
                case 6:
                m = 'June';
                break;
                case 7:
                m = 'July';
                break;
                case 8:
                m = 'Aug';
                break;
                case 9:
                m = 'Sept';
                break;
                case 10:
                m = 'Oct';
                break;
                case 11:
                m = 'Nov';
                break;
                case 12:
                m = 'Dec';
                break;
                default:
                m = 'Jan';
            }
            return {
                year : y,
                month: m,
                week: w,
                day   : newDate.getDate()
            }
        },
        choosePayment: function(){
            var that = this;
            that.payment.on('click', function (e){
                e.preventDefault();
                that.payment.removeClass('selected');
                $(this).addClass('selected');
            });
        },
        addToCart: function(){
            $('.btnaddcart').on('click', function (e){
                e.preventDefault();
                if(document.cookie.indexOf('user_id') == -1){
                    $('.sign').show();
                    return false;
                }
                var item = {
                    product:{_id:$('#product_id').val()},
                    qty: parseInt($('.numbers .numb').text()),
                    is_checked : true
                }
                $.post('/mobile/addcart', {item:item}, function (result){
                    console.log(result);
                    index.showMessage('添加成功 Success');
                    return $('.btn_cart').addClass('btn_cart_full');
                });
            });
        },
        changeCartItems: function(){
            var cartItems = {
                cart_items:[],
                code:''
            };
            $('.cartlist li').each(function (){
                cartItems.cart_items.push({
                    product : {_id: $(this).find('#cart_items_id').val()},
                    qty : $(this).find('.numb').text(),
                    is_checked : true
                });
            });

            cartItems.code = $('#coupon').val();

            $.post('/cart/update', cartItems, function (result){
                if (result.msg.length !== 0) {
                    index.showMessage(result.msg);
                    return false;
                }
                var html = '';
                for(var i = 0; i < result.cart_items.length; i ++){
                    var item = result.cart_items[i];
                    item.product.name = document.cookie.indexOf('lang=en') != -1 ? item.product.name.en : item.product.name.zh;
                    var person = document.cookie.indexOf('lang=en') != -1 ? 'Person' : '人';
                    html += '<li class="clearfix"><img src="'+ item.product.cover_image +'"><div class="info ell"><a href="/mobile/product/'+ item.product._id +'" class="ell name">'+ item.product.name +'</a><input id="cart_items_id" type="hidden" value="'+ item.product._id +'"><div class="price"><span>￥<b>' + item.product.sale_price + '</b></span> / '+ person +'</div><div class="numcart clearfix"><div class="numbers"><div class="minus">-</div><div class="numb">'+ item.qty +'</div><div class="plus">+</div></div></div></div><div class="delete"></div></li>';
                }
                $('.cartlist').html(html);
                $('.cart .subtotal span').text(result.items_total);
                $('.cart .cost span').text(result.shipcost);
                $('.cart .dis span:nth-child(2)').text(result.coupon===''?0:result.coupon);
                $('#total').text(result.total);

                if ($('.cartlist li').length ==0 ) {
                    return $('.btn_cart').removeClass('btn_cart_full');
                }
            });
        },
        addQty: function(){
            var that = this;
            $('.cart').on('click','.plus',function (){
                var num = parseInt($(this).parent().find('.numb').text()) + 1;
                $(this).parent().find('.numb').text(num);
                that.changeCartItems();
            });
        },
        minusQty: function(){
            var that = this;
            $('.cart').on('click','.minus',function (){
                var num = parseInt($(this).parent().find('.numb').text()) - 1;
                num = num === 0 ? 1 : num;
                $(this).parent().find('.numb').text(num);
                that.changeCartItems();
            });
        },
        delCartItem:function(){
            var that = this;
            $('.cart').on('click','.delete',function (){
                $(this).parent().remove();
                that.changeCartItems();
            });
        },
        useCoupon:function(){
            var that = this;
            $('.cart').on('click','#coupon_use', function (){
                that.changeCartItems();
            });
        }
    };

    var sign = {
        forgotPassword:function (){
            $('#resetpassword').on('click',function (e){
                e.preventDefault();
                var mail = prompt('Your email please 请提供您的电邮:', '');
                $.post('/user/resetpwd', {mail: mail}, function (){
                    alert('Please check your email for new password. 请查收邮件, 获取新的密码.');
                }).fail(function (){
                    alert('Error. This mail address may not be correct. 错误, 请检测您的邮件地址是否正确.')
                })
            });
        },
        signupValidate: function (){
            $('#useremail').on('blur',function (e){
                $.post('/user/isnew',{email:$(this).val()},function (result){
                    if (result.isnewuser) {
                        $('.repassword').show();
                    } else {
                        $('.repassword').hide();
                    }
                });
            });
        },
        signupSubmit: function (){
            $('.getstart').on('click',function (){
                var email = $('#useremail').val(),
                    password = $('#password').val();
                if (!/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) {
                    alert('Please Type In Your E-mail Address');
                    return false;
                }
                if ( password == '') {
                    alert('Please Type In Your Password');
                    return false;
                }
                if($('#repassword').css('display') !== 'none' && password != $('#repassword').val()){
                    alert('Two passwords do not match');
                    return false;
                }
                $.post('/user/sign',{email:email,password:password, weibo:'', google:''},function (data){
                    if (data.coupon) {
                        $('.main.sign').html("<div class='dyn'></div><h6 id='new_user_coupon_login'>您获得一张新用户优惠券</h6><p>代码: "+ data.coupon.code +"</p><p>说明: "+ data.coupon.info.zh +"</p><p>到期时间: " + data.coupon.end + "</p><br/><h6>You've got a coupon.</h6><p>Coupon: "+ data.coupon.code +"</p><p>Info: "+ data.coupon.info.en +"</p><p>Expiration: " + data.coupon.end + "</p><div style='width: 70%;height: 40px;line-height: 40px;text-align: center;color: #fff;font-size: 20px;background-color: rgb(227, 0, 127);margin: 30px auto;' onclick='location.reload();'>开始购物 Get Started</div>");
                    }else{
                       location.reload();
                    }
                }).fail(function (){
                    alert('用户认证失败 User authentication failed.');
                });
            });
        },
        SignboxControl: function(){
            if (document.cookie.indexOf('user_id') == -1){
                $('.btn_cart, #cart,#myorder,#login ').on('click',function (e){
                    e.preventDefault();
                    if ($('#new_user_coupon_login').length) {
                        location.reload();
                    }
                    window.location.href="/mobile/nsign"
                });
            }
            $('.hiddensign').on('click',function (){
                $('.main.sign').hide();
            });
        },
        logOut: function(){
            $('#logout').click(function (){
                $.get('/user/logout',function (data){
                    window.location.href = data.success ? '/mobile/index' : window.location.href;
                });
            });
        }
    };
    var order = {
        checkout: function(){
            var order_checkout_clickable = true;
            $('.chkot').click(function (e){
                e.preventDefault();
                var btn = $(this);
                if (!order_checkout_clickable) {
                    return false;
                };

                order_checkout_clickable = false;
                btn.css('opacity','.2');

                if($('.cartlist li').length == 0 && $('.orderproductlist li').length==0){
                    index.showMessage('Please choose some products');
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    return false;
                }
                var el = $('.addresslist .select');
                if(el.length == 0){
                    index.showMessage('Please provide your address information.');
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    return false;
                }
                var address_box = $('.addresslist li.select .address-info');
                // var delivery_text =  $('.deliveryselect').val() == 'today' ? new Date() : new Date($('.deliveryselect').val());
                var data = {
                    order_number    : $('.odnumber span').text(),
                    code            : $('#coupon').val(),
                    payment         : $('a.payment.selected').data('type'),    //支付方式
                    address         : {
                        name        : address_box.find('input[name="name"]').val(),
                        address     : address_box.find('input[name="addr"]').val(),
                        telephone   : address_box.find('input[name="tel"]').val(),
                        district    : address_box.find('select[name="district"]').val(),
                        province    : address_box.find('select[name="province"]').val(),
                        city        : address_box.find('select[name="city"]').val()
                    },
                    delivery_date : {
                        date : $('.deliveryselect').val() == 'today' ? new Date() : new Date($('.deliveryselect').val()),//收货日期
                        time : $('#timeselect').val()
                    },
                    comment : $('.comment').val()//用户留言
                };
                if (!data.delivery_date.date || data.delivery_date.date == "undefined" ) {
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    index.showMessage('请选择送餐日期');
                    return false;
                }

                if (!data.delivery_date.time || data.delivery_date.time == "undefined" ) {
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    index.showMessage('请选择送餐时间段');
                    return false;
                }


                if (data.address.name=='undefined' || data.address.province=='undefined' || data.address.city=='undefined' || data.address.district=='undefined' || data.address.address=='undefined' || data.address.telephone=='undefined') {
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    index.showMessage('现已支持全国大部分城市, 请补充地址信息');
                    return false;
                }

                // 北京不能上午送
                if ($('#timeselect').val() === '0812' && address_box.find('select[name="province"]').val() === '北京') {
                    index.showMessage('很抱歉. 北京无法在上午配送. 请选择其他时间段.');
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    return false;
                };

                index.showMessage('Please wait...');
                var url = data.order_number.length > 1 ? '/mobile/orderpay':'/mobile/neworder';
                // console.log(data);
                $.post(url, data, function (result){
                    if (result.msg) {
                        index.showMessage(result.msg);
                        order_checkout_clickable = true;
                        btn.css('opacity','1');
                        return false;
                    }
                    if (result.err != null || result.data == 'cod') {
                        return window.location.href='/mobile/order/'+result.order_number;
                    }
                    return window.location.href = result.data;
                }).fail(function (e) {
                    order_checkout_clickable = true;
                    btn.css('opacity','1');
                    return index.showMessage('Error. Please checkout again.')
                });
            });
        }
    };

    var active = {
        submit:function(){
            $('a.submit').on('click',function(){
                // var md = new Date().toLocaleDateString();
                var someDate = new Date();
                var numberOfDaysToAdd = 1;
                someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
                someDate = someDate.toLocaleDateString()
                $(".datep").text('*您的货物会在['+someDate+']收到');
                $(".active .bk, .active .msgbox").show();
            });
            $("a.ok").on('click',function(){
                data = {
                    code:$('.code').val().toString(),
                    passport:$('.passport').val().toString(),
                    name:$('.name').val().toString(),
                    phone:$('.phone').val().toString(),
                    address:$('.addre').val().toString()
                }
                if (data.name.length == 0||data.phone.length == 0||data.address.length == 0){
                    alert("请补全信息后提交");
                    $(".active .bk, .active .msgbox").hide();
                    return false
                }
                $.post("/active",data,function(result){
                    if(result && result.err){
                        alert("今日订单已满拉～明天赶早哈～")
                    }else{
                        alert("提交成功")
                    }
                    $(".active .bk, .active .msgbox").hide();
                    // return false
                }).fail(function () {
                    alert("错误 请重试");
                });
            });
            $("a.no").on('click',function(){
                $(".active .bk, .active .msgbox").hide();
            });
        }
    }

    index.lang();
    index.Reset();
    index.Introduction();
    index.MenuReset();
    index.MenuControl();
    index.showError();
    index.cartFull();

    product.PlusNumber();
    product.MinusNumber();

    cart.openAddressInfo();
    cart.chooseProvince();
    cart.chooseCity();
    cart.resetDate();
    cart.choosePayment();
    cart.saveAddress();
    cart.deleteAddress();
    cart.addToCart();
    cart.useAddress();

    cart.addQty();
    cart.minusQty();
    cart.delCartItem();
    cart.useCoupon();

    sign.forgotPassword();
    sign.signupValidate();
    sign.signupSubmit();
    sign.SignboxControl();
    sign.logOut();

    index.viewAllSub();
    order.checkout();

    active.submit()
});
