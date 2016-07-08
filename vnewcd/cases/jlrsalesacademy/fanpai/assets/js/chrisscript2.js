$(document).ready(function () {
    getinnisfreeuserip();

    //获取代言人，显示对应图片
    var spokesman = Request('spokesman');
    if (spokesman) {
        $('.spokesmanbg').attr('src', 'assets/img/gift_'+spokesman+'.png');
    }

    var flag = 0;
    var abc = new Array();
    $("#prize li").each(function () {
        var p = $(this);
        p.click(function () {
            flag++;
            p.unbind('click');
            if (flag <= 3) {
                $.ajax({
                    url: 'data.php',
                    type: "POST",
                    data: "spokesman=" + spokesman + "&wz=" + $(this).attr('id') + "&abc=" + abc,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status == false) {
                            window.location.href = 'guanzhu2.html';
                            return false;
                        } else if (data.status == 'invite') {
                            window.location.href = 'invitation1.html';
                        } else if (data.status == 'weekend') {
                            window.location.href = 'attached.html?time=weekend';
                        } else if (data.status == 'night') {
                            window.location.href = 'attached.html?time=night';
                        } else {
                            var prize = data.yes['prize']; //抽中的奖项
                            p.flip({
                                direction: 'rl', //翻动的方向rl：right to left
//                            content: prize, //翻转后显示的内容即奖品
                                color: '#f1f1e8',  //背景色
                                onEnd: function () { //翻转结束
                                    p.css({"font-size": "22px", "line-height": "100px"});
                                    p.css('background', 'url("assets/img/card/x_' + prize + '.jpg")');
                                    p.css('background-size', '100%');
                                    p.addClass("r"); //标记中奖方块的id
//                                    if (flag == 3) {
//                                        $("#viewother").show(); //显示查看其他按钮
//                                        $("#prize li").unbind('click').css("cursor", "default").removeAttr("title");
//                                    }
                                    if (data.yes['rid'] != 2 && data.yes['rid'] != 3 && data.yes['rid'] != 4) {
                                        //判断如果返回为1（小绿盒），跳转到提交信息页
                                        if (data.yes['rid'] == 1) {
                                            window.location.href = 'information.html';
                                        } else {
//                                            if (data.yes['sum'] == 3) {
//                                                window.location.href = 'invitation.html';
//                                            } else {
                                                $('#giftgif').attr('src', '');
                                                $('#giftjpg').attr('src','');
                                                $('#giftjpg').attr('src', 'assets/img/card/' + prize + '.jpg');
                                                if (prize == 'qd2' || prize == 'qd3' || data.yes['rid'] == '5' || data.yes['rid'] == '6') {
                                                    $('#giftgif').attr('src', '');
                                                    $('#giftgif').attr('src', 'assets/img/card/' + prize + '.gif');
                                                    $('#giftgif').show();
                                                } else {
                                                    $('#giftgif').attr('src', '');
                                                    $('#giftgif').hide();
                                                }
                                                $.fancybox(
                                                    {
                                                        href: '#card',
                                                        afterClose: function () {
                                                            if (data.yes['sum'] == 3 || data.yes['sum'] == 4) {
                                                                showother(data.yes['sum']);
                                                            }
                                                        }
                                                    }
                                                );
//                                            }
                                        }
                                    } else {
                                        if (data.yes['flag'] == 'win') {
                                            window.location.href = 'information.html';
                                        } else {
//                                            if (data.yes['sum'] == 3) {
//                                                window.location.href = 'invitation.html';
//                                            } else {
                                                $('#giftgif').attr('src', '');
                                                $('#giftjpg').attr('src','');
                                                $('#giftjpg').attr('src', 'assets/img/card/' + prize + '-' + data.yes['flag'] + '.jpg');
                                                $.fancybox(
                                                    {
                                                        href: '#card',
                                                        afterClose: function () {
                                                            if (data.yes['sum'] == 3 || data.yes['sum'] == 4) {
                                                                showother(data.yes['sum']);
                                                            }
                                                        }
                                                    }
                                                );
//                                            }
                                        }
                                    }
                                }
                            });
                            abc.push(data.yes['rid']);
                            $("#data").data("nolist", data.no); //保存未中奖信息
                        }
                    }
                });
            }
        });
    });
});

function showother(sum){
    var mydata = $("#data").data("nolist"); //获取数据
    var mydata2 = eval(mydata);//通过eval()函数可以将JSON转换成数组

    $("#prize li").not($('.r')).each(function(index){
        var pr = $(this);
        pr.flip({
            direction:'bt',
            color: '#f1f1e8',  //背景色
//            content:mydata2[index], //奖品信息（未抽中）
            onEnd:function(){
                if(mydata2[index]=='1' || mydata2[index]=='2'){
                    mydata2[index]=Request('spokesman')+mydata2[index];
                }
                pr.css('background', 'url("assets/img/card/x_' + mydata2[index] + '.jpg")');
                pr.css('background-size', '100%');
            }
        });
    });
    $("#data").removeData("nolist");
    if(sum==3){
        setTimeout("window.location.href = 'invitation.html';",4000);
    }else if(sum==4){
        setTimeout("window.location.href = 'guanzhu.html';",4000);
    }
}

//判断用户当天是否已经中过奖，如果中过，则将首页的进入翻牌页面去除
function ifwintoday() {
    $.ajax({
        url: 'ifwin.php',
        dataType: "JSON",
        success: function (data) {
            if (data.status == false) {
                $('#ifwin').removeClass('m-page');
            }
        }
    });
}

//获取用户ip
function getinnisfreeuserip() {
    $.ajax({
        url: 'getip.php',
        dataType: "JSON",
        success: function (data) {
            if (data.status == false) {
                getinnisfreeuserip();
            }
        }
    });
}

//选择代言人显示高亮
function choosseone(spokesman) {
    $('.xz_icon').removeClass('hover');
    $('#' + spokesman).addClass('hover');
    $('#chooseone').val(spokesman);
}

//参与翻牌游戏
function choosesubmit() {
    var chooseone = $('#chooseone').val();
    if (!chooseone) {
        alert('请选择一位代言人！')
        return false;
    }
    $.ajax({
        url: 'saveuserchoose.php',
        type: "POST",
        data: "spokesman=" + chooseone,
        dataType: "JSON",
        success: function (data) {
            if (data.status == true) {
                window.location.href = 'gift.html?spokesman=' + chooseone;
            } else if (data.status == 'weekend') {
                window.location.href = 'attached.html?time=weekend';
            } else if (data.status == 'night') {
                window.location.href = 'attached.html?time=night';
            } else if (data.status == 'nochance') {
                window.location.href = 'guanzhu2.html';
            }
            return false;
        }
    });
}

//获取用户收集卡牌数
function getKeySum() {
    $.ajax({
        url: 'getkeys.php',
        dataType: "JSON",
        success: function (data) {
            $('#getkeysum').html(data.sum);
        }
    });
}

//获取用户已翻出牌显示
function getUserCard() {
    $.ajax({
        url: 'getusercard.php',
        dataType: "JSON",
        success: function (data) {
            $.each(data, function (index, item) {
                if(item.prize=='1' || item.prize=='2'){
                    item.prize=Request('spokesman')+item.prize;
                }
                $('#' + item.location).css('background', 'url("assets/img/card/x_' + item.prize + '.jpg")');
                $('#' + item.location).css('background-size', '100%');
                $('#' + item.location).addClass('r');
                $('#' + item.location).unbind('click');
            });
        }
    });
}



function Request(strName) {
    var strHref = location.href;
    var intPos = strHref.indexOf("?");
    var strRight = strHref.substr(intPos + 1);
    var arrTmp = strRight.split("&");
    for (var i = 0; i < arrTmp.length; i++) {
        var arrTemp = arrTmp[i].split("=");
        if (arrTemp[0].toUpperCase() == strName.toUpperCase())
            return arrTemp[1];
    }
    return "";
}