;(function($){
 	$.fn.extend({
		"myScroll":function(o){
			o=$.extend({
				speed:3000,
				speed1:800,
				prevId:'prev',
				nextId:'next',
				direction:"left",
				visible:3
			},o);
		 var ul=$('ul',this);
		 var height=$('ul li',this).height();
		 var dis=($('ul li',this).css('marginRight')).replace('px','');
		 var width=$('ul li',this).width()+Number(dis);
		 var size =$('ul li',this).size();
		 
		 function move(){
			ul.stop(true,true).animate({marginTop:-height+'px'},{duration:800,easing:'easeOutExpo',complete:bgAnimate});
		 };
		 function bgAnimate(){
		 	ul.css({marginTop:'0px'}).find('li:first').appendTo(ul);		 
		 }
		 function move1(){
			ul.stop(true,true).animate({marginLeft:-width+'px'},{duration:800,easing:'easeOutExpo',complete:startAnimate});
		 };
		 function startAnimate(){
		 	ul.css({marginLeft:'0px'}).find('li:first').appendTo(ul);														   
		 }
		 if(size>o.visible){
			 if(o.direction=='up'){
				 var MyMar=setInterval(move,o.speed);
				 $(this).hover(function(){
					 clearInterval(MyMar);						  
				 },function(){
					 MyMar=setInterval(move,o.speed);	
				 });
				 
				 $('#'+o.nextId).click(function(){
					 move();
				 });
				 $('#'+o.prevId).click(function(){
						ul.css({marginTop:-height+'px'}).find('li:last').prependTo(ul);
						ul.stop(true,true).animate({marginTop:'0px'},{duration:800,easing:'easeOutExpo'});
				 });
			 }
			 if(o.direction=='left'){
				var MyMar1=setInterval(move1,o.speed);
	
				$(this).hover(function(){
					clearInterval(MyMar1);						  
				},function(){
					MyMar1=setInterval(move1,o.speed);	
				});
			
			
				$('#'+o.nextId).click(move1);
				$('#'+o.prevId).click(function(){
						ul.css({marginLeft:-width+'px'}).find('li:last').prependTo(ul);
						ul.stop(true,true).animate({marginLeft:'0px'},{duration:800,easing:'easeOutExpo'});
						return false;
				});
			 }
		 }
		 }		
	});
	
})(jQuery);