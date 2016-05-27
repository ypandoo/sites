pHPSetupFunction=function(){	
	jQuery("#p-top-banner .p-bannerqh").css("width","20000em");
	jQuery.easing.custom=function(N,O,M,Q,P){
		if(O==0){return M}
		if(O==P){return M+Q}
		if((O/=P/2)<1){return Q/2*Math.pow(2,8*(O-1))+M}
		return Q/2*(-Math.pow(2,-10*--O)+2)+M
	};
	jQuery("#p-top-banner .p-top-qh-pane,#p-top-banner .p-top-qh-pane .p-home-banner").width(jQuery("#p-top-banner").width());

	var L=navigator.platform.match(/iPad/i)!=null;

	if(L){
		var K=jQuery("#p-top-banner .p-top-qh-pane").scrollable({easing:"custom",speed:1200,circular:true}).navigator().handleSwipes()
	}else{
		var K=jQuery("#p-top-banner .p-top-qh-pane").scrollable({easing:"custom",speed:1200,circular:true}).navigator().autoscroll({interval:5000})
	}
	
	window.api=K.data("scrollable");

	jQuery(".p-top-qh-nav a").append('<div class="p-top-qh-view"><div class="p-banner-small-alt"></div></div>');
	
	var E=jQuery("#p-top-main #p-banner-1 img:first").attr("alt");
	var H=jQuery("#p-banner-1 p em:first").clone();
	
	jQuery("span",H).remove();
	
	jQuery(".p-top-qh-nav a:nth-child(1) .p-top-qh-view").addClass("p-banner-small-1").children("div.p-banner-small-alt").prepend('<span class="p-banner-small-1"></span><h2>'+E+"</h2><p>"+H.text()+"</p>");
	
	var C=jQuery("#p-top-main #p-banner-2 img:first").attr("alt");
	var G=jQuery("#p-banner-2 p em:first").clone();
	
	jQuery("span",G).remove();
	jQuery(".p-top-qh-nav a:nth-child(2) .p-top-qh-view").addClass("p-banner-small-2").children("div.p-banner-small-alt").prepend('<span class="p-banner-small-2"></span><h2>'+C+"</h2><p>"+G.text()+"</p>");
	
	var B=jQuery("#p-top-main #p-banner-3 img:first").attr("alt");
	var D=jQuery("#p-banner-3 p em:first").clone();

	jQuery("span",D).remove();
	jQuery(".p-top-qh-nav a:nth-child(3) .p-top-qh-view").addClass("p-banner-small-3").children("div.p-banner-small-alt").prepend('<span class="p-banner-small-3"></span><h2>'+B+"</h2><p>"+D.text()+"</p>");
	
	if(jQuery.browser.msie){
		
		jQuery(".p-top-qh-nav a:nth-child(1)").mouseenter(function(){
			jQuery(this).children().children("div.p-banner-small-alt").css("display","block")
		}).mouseleave(function(){
			jQuery(this).children().children("div.p-banner-small-alt").css("display","none")
		});
		
		jQuery(".p-top-qh-nav a:nth-child(2)").mouseenter(function(){
			jQuery(this).children().children("div.p-banner-small-alt").css("display","block")
		}).mouseleave(function(){
			jQuery(this).children().children("div.p-banner-small-alt").css("display","none")
		});
		
		jQuery(".p-top-qh-nav a:nth-child(3)").mouseenter(function(){
			jQuery(this).children().children("div.p-banner-small-alt").css("display","block")
		}).mouseleave(function(){
			jQuery(this).children().children("div.p-banner-small-alt").css("display","none")
		})
		
	}else{
		
		jQuery(".p-top-qh-nav a:nth-child(1)").mouseenter(function(){
			jQuery(this).children().children("div.p-banner-small-alt").stop(true,true).fadeIn("fast")
		}).mouseleave(function(){
			jQuery(this).children().children("div.p-banner-small-alt").stop(true,true).fadeOut("fast")
		});
		
		jQuery(".p-top-qh-nav a:nth-child(2)").mouseenter(function(){
			jQuery(this).children().children("div.p-banner-small-alt").stop(true,true).fadeIn("fast")
		}).mouseleave(function(){
			jQuery(this).children().children("div.p-banner-small-alt").stop(true,true).fadeOut("fast")
		});
		
		jQuery(".p-top-qh-nav a:nth-child(3)").mouseenter(function(){
			jQuery(this).children().children("div.p-banner-small-alt").stop(true,true).fadeIn("fast")
		}).mouseleave(function(){
			jQuery(this).children().children("div.p-banner-small-alt").stop(true,true).fadeOut("fast")
		})
	}
		   
	var I;
	jQuery(window).resize(function(){

		if(!L){
			if(I){
				clearTimeout(I);
				I=null
			}
		}
		
		if(jQuery("#p-top-banner .p-bannerqh").is(":not(animated)")){
			if(!L){
				api.stop()
			}
			var O=-jQuery("#p-top-banner").width();
			var M=-jQuery("#p-top-banner").width()*2;
			var P=-jQuery("#p-top-banner").width()*3;
			var N=-jQuery("#p-top-banner").width()*298;
			var Q=-jQuery("#p-top-banner").width()*299;
			
			if(jQuery("#p-top-banner #p-banner-1").hasClass("p-selected-view")){
				jQuery("#p-top-banner .p-bannerqh").css("left",O)
			}if(jQuery("#p-top-banner #p-banner-2").hasClass("p-selected-view")){
				jQuery("#p-top-banner .p-bannerqh").css("left",M)
			}if(jQuery("#p-top-banner #p-banner-3").hasClass("p-selected-view")){
				jQuery("#p-top-banner .p-bannerqh").css("left",P)
			}
			
			jQuery("#p-top-banner .p-top-qh-pane,#p-top-banner .p-top-qh-pane .p-home-banner").width(jQuery("#p-top-banner").width());
			
			if(!L){
				I=setTimeout
				(function(){api.play()},1000)
			}
		}
		
	});

};

jQuery(pHPSetupFunction);

