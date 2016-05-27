$(function() {


var div  = document.createElement('div'),
    div2 = document.createElement('div'),
    para = document.createElement('p'),
    div_style = div.style,
    para_style = para.style;
    
    div.id = "temp_info";
    
para.style.background='url(http://test.reenoo.net/temporaries/img/close.png) no-repeat right center';
div_style.left = '0px';
div_style.position = 'absolute';
div_style.bottom  = '-75px';
div_style.zIndex = 2147483647;
div_style.width = '100%';
//div_style.background = 'url(http://test.reenoo.net/temporaries/img/close.jpg) no-repeat 80% center';
div_style.backgroundColor = '#e84e42';
div_style.cursor = 'pointer';

div2.style.margin = '0 auto';
div2.style.padding = '15px';
div2.style.paddingLeft = '63px';
div2.style.width = '1040px';
div2.style.height= '100%';
div2.style.background = 'url(http://test.reenoo.net/temporaries/img/warning_icon.png) no-repeat left center';


para_style.margin  = '0px';
para_style.fontSize = '12px';
para_style.fontWeight = 'bold';
para_style.lineHeight = '22px';
para_style.color = '#ffe8cc';

para.innerHTML = '万科不对外举办任何收费性质的招聘、培训活动，如果收到任何可疑的招聘、培训信息<br>可通过网站发布的官方渠道进行核实或举报.'

var body  = document.body,
    $body = $(body),
    $div  = $(div),
    flag  = true,
    hei   = 0,
    banner = document.getElementById("banner");

div2.appendChild(para);
div.appendChild(div2);


//$body.css('position', 'relative').animate({'margin-top':$div.height()});
$(window).on('resize', function() {
    //hei = flag? $div.height(): 0;
    //$body.animate({'margin-top':hei});
});

$(div).animate({bottom:'0'},500);

$div.on('click', function() {
	//flag = false;
   //$(div).hide(500);
   //$(body).animate({'margin-top':0});
   $(div).animate({bottom:'-75px'},500);
});

setTimeout(function(){
  $(div).animate({bottom:'-75px'},500);
},10000);


});