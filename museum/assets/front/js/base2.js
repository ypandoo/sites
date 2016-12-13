// JavaScript Document
function setFont(){
		$('html').css('font-size',$(window).width()/640*100);
	}
	setFont();
	$(window).resize(setFont);

if($(window).width()/$(window).height() > 640/1092)
	$('.bg').css('background-size','100% auto');

$('.cwdj a').click(function(){
	var url = $(this).data('url') + ' #result';
	$('.alertDiv').fadeIn(400);
	$('.alertDiv').load(url,function(){
		$('.photobox ul').width($('.photobox li').length * 100 + '%');
		$('.photobox').album({numDistance:1});
		});
	});
$('.alertDiv').on('click','.closeBtn,.closeBtn2',function(){
	$('.alertDiv').fadeOut(400);
	});
if($('.storelist').length){
	var fixmp = $('.storelist li').length * $('.storelist li').height();
	$('.storelist').height($(window).height() - $('.storelist').offset().top);
	$('.storelist li').on('click',function(){
		$('.details-box').find('h3').text($(this).find('h3').text());
		var pstr = $(this).find('span').text().length > 84 ? $(this).find('span').text().substr(0,84)+'...' : $(this).find('span').text();
		$('.details-box').find('p').text(pstr);
		$('.details-box').find('img').attr('src',$(this).find('img').attr('src'));
		})
	$('.storelist li').eq(0).click();
	$('.storelist a').on('click',function(){
		$('.alertDiv').fadeIn(400);
		$('.storebox').find('h3').text($(this).closest('li').find('h3').text());
		$('.storebox').find('h4').text($(this).closest('li').find('h4').text());
		$('.storebox').find('img').attr('src',$(this).closest('li').find('img').attr('src'));
		$('.storebox').find('p').text($(this).closest('li').find('span').text());
		});
}
if($('.oneslide').length != 0){
    setInterval(oneslide,3000);
    $('.oneslide').click(function(){
         $('.alertDivFd').fadeIn(300);
    });
    $('.closeBtn').click(function(){
        $('.alertDivFd').fadeOut(300);
    });
    $('.photobox ul').html($('.oneslide ul').html());
    $('.photobox ul').width($('.photobox li').length * 100 + '%');
    $('.photobox').album({numDistance:1});
 }
if($('.yuanimg').length != 0){
    setInterval(oneslide,3000);
    $('.yuanimg').click(function(){
         $('.alertDivFd').fadeIn(300);
    });
    $('.closeBtn').click(function(){
        $('.alertDivFd').fadeOut(300);
    });
    $('.photobox ul').html($('.yuanimg ul').html());
    $('.photobox ul img').each(function(){
        $(this).attr('src',$(this).attr('data-src'))
    })
    $('.photobox ul').width($('.photobox li').length * 100 + '%');
    $('.photobox').album({numDistance:1});
 }
function oneslide(){
    var i =  $('.oneslide li.current').index() + 1;
    i = i >= $('.oneslide li').length ? 0 : i;
    $('.oneslide li').eq(i).addClass('current').siblings().removeClass('current');
}
$(window).scroll(function(){
    var p = 'center '+$(document).scrollTop()+'px';
    $('.bg').css('background-position',p);
});
