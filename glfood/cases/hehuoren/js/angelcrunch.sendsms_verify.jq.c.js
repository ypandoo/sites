/*/
/*
/* Rank: 3
/* Wap site send SMS verify operation
/* Rely on jquery & image_upload files
/*
/*/

// Angelcrunch namespace
$.Angelcrunch = $.Angelcrunch || {};

// SMS Verify Code
$.Angelcrunch.SMS_Verify = $.Angelcrunch.SMS_Verify || {};
$.Angelcrunch.SMS_Verify.settings = {
    Ajax: {
        Ajax_SMS: "",
        Ajax_verify_code: ""
    },
    verify_code_len: 6,
    txt: {
        btn: {
            common: "验证",
            pass: "验证成功",
            waiting: "<i>60</i>秒",
            again: "重新验证"
        },
        verify_failed: "验证码错误"
    },
    state : {
        disable: "disable",
        checking: "checking",
        again:"again-js",
        active: "active"
    },
    attr : {
        disabled: "disabled",
        Retrieval: function (str) {
            return "[" + str + "]";
        }
    },
    $input: {
        phone: "",
        verify_code: "",
    },
    $btn: {
        SMS: "",
    },
    $notification: ""
};

$.Angelcrunch.SMS_Verify.init = function (formChecked_fn) {
    var settings = $.Angelcrunch.SMS_Verify.settings;
    var verify_code_len = settings.verify_code_len;
    var txt = settings.txt,
        state = settings.state,
        attr = settings.attr;
    var I = {
        Ajax_SMS: settings.Ajax.Ajax_SMS,
        Ajax_verify_code: settings.Ajax.Ajax_verify_code,
        current_mobile: ""
    };
    var $input = settings.$input,
        $btn = settings.$btn,
        $notification = settings.$notification;


    $input.phone.change(function () {
        var _value = $(this).val().trim();
        var regex = $.Angelcrunch.regexStr.phone;
        if (!regex.test(_value)) {
            $input.verify_code.addClass(state.disable);
        }
    })
    .keyup(function () {
        var _value = $(this).val().trim();
        var regex = $.Angelcrunch.regexStr.phone;
        if (regex.test(_value)) {
            if (_value == I.current_mobile) {
                $btn.SMS.text(txt.btn.pass).addClass(state.disable);
                $input.verify_code.attr(attr.disabled, attr.disabled);
            } else {
                if (!$btn.SMS.hasClass(state.checking)) {
                    $btn.SMS.text(txt.btn.common).removeClass(state.disable);
                }
            }
        }
        else {
            $btn.SMS.addClass(state.disable);
        }
    })


    $input.verify_code
    .keyup(function () {
        var _value = $(this).val().trim();
        var len = verify_code_len,
            url = I.Ajax_verify_code.url,
            basic_data = I.Ajax_verify_code.basic_data,
                  type = "jsonp";
        var _data = $.extend(true, {}, basic_data);
        _data[$input.phone.attr("name")] = $input.phone.val();
        _data[$input.verify_code.attr("name")] = _value;

        if (_value.length == len) {     // Verify Code Ajax
            $.post(url, _data, function (data) {
                if (data.success) {
                    $input.verify_code.attr(attr.disabled, attr.disabled);
                    $btn.SMS.text(txt.btn.pass).addClass(state.disable).removeClass(state.again + " " + state.checking);
                    I.current_mobile = $input.phone.val();
                    formChecked();
                }
                else
                    $notification.notificationToggle(data.message);
            }, type);
        } else;
    })

    $btn.SMS.click(function () {    // SMS Ajax
        if ($(this).hasClass(state.disable)) return;
        I.current_mobile = "";
        var url = I.Ajax_SMS.url,
            basic_data = I.Ajax_SMS.basic_data,
            type = "jsonp";
        var _data = $.extend(true, {}, basic_data);
        _data[$input.phone.attr("name")] = $input.phone.val();

        $.post(url, _data, function (data) {
            if (data.success) {
                if (!$btn.SMS.hasClass(state.again))
                    $input.verify_code.removeAttr(attr.disabled).val("");
                $btn.SMS.html(txt.btn.waiting).addClass(state.checking + " " + state.disable);
                changeTime();
            } else
                $notification.notificationToggle(data.message);
        }, type);
    });

    var timehandle;
    var changeTime = function () {
        clearInterval(timehandle);
        timehandle = setInterval(function () {
            var time = parseInt($btn.SMS.find("i").text());
            time--;
            time = time < 10 && time > 0 ? "0" + time : time;
            if (time <= 0)
                cancelTimeChanged();
            else
                $btn.SMS.find("i").text(time);
        }, 1000);
    };

    var cancelTimeChanged = function () {
        clearInterval(timehandle);
        $btn.SMS.text(txt.btn.again).removeClass(state.checking);

        var _value = $input.phone.val().trim();
        var regex = $.Angelcrunch.regexStr.phone;
        if (!regex.test(_value)) {
            $btn.SMS.addClass(state.disable);
            $input.verify_code.attr(attr.disabled, attr.disabled);
        } else
            $btn.SMS.removeClass(state.disable).addClass(state.again);
    }

    var formChecked = function () {
        if (formChecked_fn) formChecked_fn();
    };


    // Initialization
    $input.phone.val("");
    $input.verify_code.attr(attr.disabled, attr.disabled).val("");
    $btn.SMS.addClass(state.disable);
};              // About SMS Verify Code ENDED

$(function () {
    //$.Angelcrunch.ImageUploadInit();
});