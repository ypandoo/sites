(function($){
	$.fn.banner = function(agr){ 
		var $imgli = $(this).find('.bst-banner-img li');
		var num = $imgli.length;
		var htmlindex = '<ul class="bst-banner-index">';
		for(i=1;i<=num;i++){
			if(i==1)
				htmlindex += '<li class="active"></li>';
			else
				htmlindex += '<li></li>';
			if(i==num)
				htmlindex += '</ul>';
		}
		$(this).append(htmlindex);
		
		$imgli.eq(0).addClass('current');
		if(typeof callback == 'function')
			callback();
		$(this).swipe({
			swipeLeft:
				function(){switchBanner(1);},
			swipeRight:
				function(){switchBanner(-1);},
			excludedElements: ""
		});
		var imgul = $(this).find('.bst-banner-img');

		var $indexli = $(this).find('.bst-banner-index li');
		var isAnimating = false;
		function switchBanner(wd){
			if(isAnimating)
				return;
			isAnimating = true;
			var from = wd == 1 ? 'ratateFromRight' : 'ratateFromLeft';
			var to = wd == 1 ? 'ratateToLeft' : 'ratateToRight';
			var cur = imgul.find('.current').index();
			$imgli.eq(cur).addClass(to);
			var ani = cur + wd == num ? 0 : cur + wd;
			$imgli.eq(ani).addClass(from);
			setTimeout(function(){
				$imgli.eq(cur).removeClass();
				$imgli.eq(ani).removeClass().addClass('current');
				isAnimating = false;
				if(typeof agr.callback == 'function')
					agr.callback();
				},600);
			$indexli.eq(ani).addClass('active').siblings().removeClass('active');
			};
		if(agr.delay)	
			setInterval(function(){switchBanner(1);},agr.delay);
		if(typeof agr.callback == 'function')
					agr.callback();
		return $(this);
	}
	$.fn.tab = function(callback){
		$(this).find('.bst-tab-menu li').click(function(){
			$(this).addClass('active').siblings().removeClass('active');
			$('.bst-tab-cont li').eq($(this).index()).addClass('active').siblings().removeClass('active');
			});
		return $(this);	
	}
	$.fn.album = function(arg){
		var $this = $(this);
		var distance = arg.numDistance*$this.find('li').width();
		if($this.find('li').length <= 1)
			return;
		function switchPhoto(wd){
			if(wd == -1)
				$this.find('ul').animate({left:-distance},500,function(){
					$this.find('li').first().insertAfter($this.find('li').last());
					$this.find('ul').css('left',0);
				});
			else{
				$this.find('li').last().insertBefore($this.find('li').first());
				$this.find('ul').css('left',-distance).animate({left:0},500);
				}			
		}
		$this.swipe({
			swipeLeft:
				function(){switchPhoto(-1);},
			swipeRight:
				function(){switchPhoto(1);}
		});
	}
	$.fn.history = function(n){
		$(this).click(function(){history.go(n);})
		}
	//ad function
	$.fn.bst_onlyClass = function(className){
		$(this).addClass(className).siblings().removeClass(className);
		return $(this);
	}
	window.onscroll=function(){
		if(!$(window).scrollTop() == 0)
			$('.backup').addClass('op1');
		else
			$('.backup').removeClass('op1');
	}	
})(jQuery);
function isFloat(num){ return (num + '').indexOf('.') != -1 ? true : false; }
String.prototype.format=function(){ 
  if(arguments.length==0) return this; 
  for(var s=this, i=0; i<arguments.length; i++) 
	s=s.replace(new RegExp("\\{"+i+"\\}","g"), arguments[i]); 
  return s; 
}
String.prototype.bst_toArray = function(){
	var arr = this.split('|,|');
	return arr;
}
Array.prototype.bst_toString = function(){
	var str = this.join('|,|');
	return str;
}
//自定义checkbox
$('.mycheckbox').on('click',function(){
	$(this).toggleClass('checked');
	if($('.mycheckbox').length == $('.mycheckbox.checked').length)
		$('.checkAll').addClass('checked');
	else
		$('.checkAll').removeClass('checked');
});
$('.checkAll').click(function(){
	$(this).toggleClass('checked');
	if($(this).hasClass('checked'))
		$('.mycheckbox').addClass('checked');
	else
		$('.mycheckbox').removeClass('checked');
});
//自定义rideoButton
$('.myradio').on('click',function(){
	var isChecked = $(this).hasClass('checked') ? true : false;
	$('.myradio[data-inputname='+$(this).data('inputname')+'],.addressitem').removeClass('checked');
	if(!isChecked){
		$(this).addClass('checked');
		$('input[data-inputname='+$(this).data('inputname')+']').val($(this).data('value')); 
		//
		$(this).closest('.addressitem').addClass('checked');
	}
	else{
		$('input[data-inputname='+$(this).data('inputname')+']').val('');
		//
		$(this).closest('.addressitem').removeClass('checked');
	}
});


