/*
 * $Id
*/
/*
 * Copyright (c) 2009 QIHAN Corporation
 * Owner: Corporate Webmaster (NUS_N_NIWWW)
 * Documentation is available at https://w3.tap.qihan.com/w3ki04/display/cwt/qihancommon.js
*/
/*
 * jQuery JavaScript Library v1.4.2
 * http://jquery.com/
 *
 * Copyright 2010, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 * Copyright 2010, The Dojo Foundation
 * Released under the MIT, BSD, and GPL Licenses.
 *
 * Date: Sat Feb 13 22:33:48 2010 -0500
 */
/*
 * @license 
 * jQuery Tools 1.2.5 Scrollable - New wave UI design
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * 
 * http://flowplayer.org/tools/scrollable.html
 *
 * Since: March 2008
 * Date:    Wed Sep 22 06:02:10 2010 +0000 
 */
(
 function(B)
  {
	 B.tools=B.tools||{version:"1.2.5"};
	 B.tools.scrollable=
	 {
		 conf:
		  {
			 activeClass:"p-active",
			 circular:false,
			 clonedClass:"cloned",
			 disabledClass:"p-disabled",
			 easing:"swing",
			 initialIndex:0,
			 item:null,
			 items:".p-home-banner",
			 keyboard:true,
			 mousewheel:false,
			 next:".p-top-qh-next",
			 prev:".p-top-qh-prev",
			 speed:1200,
			 vertical:false,
			 touch:true,
			 wheelSpeed:0
			}
		};
      function D(I,G)
	   {
		  var F=parseInt(I.css(G),10);
		  if(F)
		  {return F}
		  var H=I[0].currentStyle;
		  return H&&H.width&&parseInt(H.width,10)
		}
		function E(F,H){var G=B(H);return G.length<2?G:F.parent().find(H)}
		var C;
		function A(P,O)
		{
			var H=navigator.platform.match(/iPad/i)!=null;
			var R=0;
			var Q=this,G=P.add(Q),F=P.children(),N=0,J=O.vertical;
			if(!C){C=Q}
			if(F.length>1)
			{F=B(O.items,P)}
			B.extend
			(
			  Q,
			  {
				 getConf:function(){return O},
				 getIndex:function(){return N},
				 getSize:function(){return Q.getItems().size()},
				 getNaviButtons:function(){return I.add(K)},
				 getRoot:function(){return P},
				 getItemWrap:function(){return F},
				 getItems:function(){return F.children(O.item).not("."+O.clonedClass)},
				 move:function(T,S){return Q.seekTo(N+T,S)},
				 next:function(S){if(!H){if(R>=100){return }}return Q.move(1,S)},
				 prev:function(S){return Q.move(-1,S)},
				 begin:function(S){return Q.seekTo(0,S)},
				 end:function(S){return Q.seekTo(Q.getSize()-1,S)},
				 focus:function(){C=Q;return Q},
				 addItem:function(S)
				 {
					 S=B(S);
				     if(!O.circular){F.append(S)}
				     else
				     {
					 F.children("."+O.clonedClass+":last").before(S);
                     F.children("."+O.clonedClass+":first").replaceWith(S.clone().addClass(O.clonedClass))
				     }
				    G.trigger("onAddItem",[S]);return Q
				  },
				 seekTo:function(T,Y,V)
				 {
					 if(!H)
					 {
						 if(R>=100){api.stop()}
					   }
					 if(!T.jquery){T*=1}
					 if(O.circular&&T===0&&N==-1&&Y!==0){return Q}
					 if(!O.circular&&T<0||T>Q.getSize()||T<-1){return Q}
					 var W=T;
					 if(T.jquery)
					 {T=Q.getItems().index(T)}
					 else{W=Q.getItems().eq(T)}
					 var X=B.Event("onBeforeSeek");
					 if(!V)
					 {
						 var Z=Q.getRoot().parent().attr("id");
						 if(Z&&Z=="p-top-main")
						 {
							 var S=3300;
							 if(Q.getIndex()=="0")
							 {
								 B("#p-banner-1.p-selected-view h1").animate({left:"-"+S+"px"},{queue:false,duration:1800})
                              }
							 if(Q.getIndex()=="1")
							 {
								 B("#p-banner-2.p-selected-view h2").animate({left:"-"+S+"px"},{queue:false,duration:1800})
							  }
							 if(Q.getIndex()=="2"){B("#p-banner-3.p-selected-view h2").animate({left:"-"+S+"px"},{queue:false,duration:1800})}
						 }
						 G.trigger(X,[T,Y]);
						 if(X.isDefaultPrevented()||!W.length){return Q}
					  }
					 var U=J?{top:-W.position().top}:{left:-W.position().left};
					 B("#p-top-banner .p-banner1-1-1 h1,#p-top-banner .p-banner1-1-1 h2").css("left","0px");

					 N=T;
					 W.siblings().removeClass("p-selected-view");
                     W.addClass("p-selected-view");
					 if(jQuery(".p-alternate.p-selected-view").length)
					  {jQuery("#p-news-feed-inner").addClass("p-alternate")}
					 else{jQuery("#p-news-feed-inner").removeClass("p-alternate")}
					 C=Q;
					 if(Y===undefined)
					 {Y=O.speed}
					 F.animate
					 (
					   U,Y,O.easing,
					   V||function()
					   {
						  G.trigger("onSeek",[T]);
						  B("#p-top-banner .p-banner1-1-1 h1,#p-top-banner .p-banner1-1-1 h2").css("left","0px");
						  if(!H)
						  {
							  if(R>=100)
							  {api.stop();return }
							}
						 }
					   );
					 return Q
				  }
				}
			   );
			  B.each
			   (
				["onBeforeSeek","onSeek","onAddItem"],
				function(T,S)
				 {
					if(B.isFunction(O[S]))
					{
						B(Q).bind(S,O[S])
                      }
					 Q[S]=function(U)
					 {
						 if(U){B(Q).bind(S,U)}
						 return Q
					  }
					}
				  );
			   if(O.circular)
			   {
				   var M=Q.getItems().slice(-1).clone().prependTo(F),L=Q.getItems().eq(1).clone().appendTo(F);
				   M.add(L).addClass(O.clonedClass);
				   Q.onBeforeSeek
				   (
					function(U,S,T)
					 {
						 if(U.isDefaultPrevented()){return }
						 if(S==-1)
						 {
							 Q.seekTo(M,T,function(){Q.end(0)});
							 return U.preventDefault()
						  }
						 else
						  {
							  if(S==Q.getSize())
							  {
								  Q.seekTo(L,T,function(){R++;Q.begin(0)})
							   }
						   }
						}
					 );
				   Q.seekTo(0,0,function(){})
				 }
				 var I=E(P,O.prev).click(function(){Q.prev()}),
				 K=E(P,O.next).click(function(){Q.next()});
				 if(!O.circular&&Q.getSize()>1)
				  {
					 Q.onBeforeSeek
					 (
					   function(T,S)
					    {
							setTimeout
							(
							  function()
							   {
								 if(!T.isDefaultPrevented())
								  {
									  I.toggleClass(O.disabledClass,S<=0);
									  K.toggleClass(O.disabledClass,S>=Q.getSize()-3)
									}
								  },1
								 )
							}
						  );
					  if(!O.initialIndex)
					  {I.addClass(O.disabledClass)}
					 }
					if(O.mousewheel&&B.fn.mousewheel)
					 {
						 P.mousewheel
						 (
						   function(S,T)
						    {
								if(O.mousewheel)
								 {
									 Q.move(T<0?1:-1,O.wheelSpeed||50);
									 return false
								  }
							 }
							)
						 }
					 if(O.keyboard)
					  {
						  B(document).bind
						   (
							 "keydown.scrollable",
							 function(S)
							  {
								 if(!O.keyboard||S.altKey||S.ctrlKey||B(S.target).is(":input"))
								  {return }
								  if(O.keyboard!="static"&&C!=Q){return }
								  var T=S.keyCode;
								  if(J&&(T==38||T==40))
								   {
									   Q.move(T==38?-1:1);
									   return S.preventDefault()
									 }
								  if(!J&&(T==37||T==39))
								   {
									   Q.move(T==37?-1:1);
									   return S.preventDefault()
									 }
								}
							   )
						  }
					 if(O.initialIndex)
					  {
						Q.seekTo(O.initialIndex,0,function(){})
					   }
		  }
		  
		  B.fn.scrollable=function(F)
		   {
			   var G=this.data("scrollable");
			   if(G){return G}
			   F=B.extend({},B.tools.scrollable.conf,F);
			   this.each
			    (
				 function()
				  {
					  G=new A(B(this),F);
					  B(this).data("scrollable",G)
				   }
				 );
				return F.api?G:this
			 }
	}
 )
(jQuery);


/*
 * @license 
 * jQuery Tools 1.2.5 / Scrollable Autoscroll
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * 
 * http://flowplayer.org/tools/scrollable/autoscroll.html
 *
 * Since: September 2009
 * Date:    Wed Sep 22 06:02:10 2010 +0000 
 */
(function(B){var A=B.tools.scrollable;
A.autoscroll={conf:{autoplay:true,interval:3000,autopause:true}};B.fn.autoscroll=function(D){if(typeof D=="number"){D={interval:D}}var E=B.extend({},A.autoscroll.conf,D),C;this.each(function(){var F=B(this).data("scrollable");if(F){C=F}var H,G=true;F.play=function(){if(H){return }G=false;H=setInterval(function(){F.next()},E.interval)};F.pause=function(){H=clearInterval(H)};F.stop=function(){F.pause();G=true};if(E.autopause){F.getRoot().add(F.getNaviButtons()).hover(F.pause,F.play)}if(E.autoplay){F.play()
}});return E.api?C:this}})(jQuery);
/*
 * @license 
 * jQuery Tools 1.2.5 / Scrollable Navigator
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 *
 * http://flowplayer.org/tools/scrollable/navigator.html
 *
 * Since: September 2009
 * Date:    Wed Sep 22 06:02:10 2010 +0000 
 */
(function(B){var A=B.tools.scrollable;A.navigator={conf:{navi:".p-top-qh-nav",naviItem:null,activeClass:"p-active",indexed:false,idPrefix:null,history:false}};function C(D,F){var E=B(F);return E.length<2?E:D.parent().find(F)
}B.fn.navigator=function(E){if(typeof E=="string"){E={navi:E}}E=B.extend({},A.navigator.conf,E);var D;this.each(function(){var G=B(this).data("scrollable"),K=E.navi.jquery?E.navi:C(G.getRoot(),E.navi),J=G.getNaviButtons(),N=E.activeClass,H=E.history&&B.fn.history;if(G){D=G}G.getNaviButtons=function(){return J.add(K)};function M(P,O,Q){if(B(P).hasClass("p-active")||B("#p-top-banner .p-bannerqh").is(":animated")){return false}G.seekTo(O);if(H){if(location.hash){location.hash=P.attr("href").replace("#","")
}}else{return Q.preventDefault()}}function F(){return K.find(E.naviItem||"> *")}function L(O){var Q=O+1;var P=B("<"+(E.naviItem||"a")+"/>").click(function(R){M(B(this),O,R)}).attr({href:"#"+O,onclick:"bannerqh.event({'pEV' : 'track', 'pEvAction' : 'plink', 'pEvLinktitle' : 'ls"+Q+"', 'pEvSection' : 'ls"+Q+"'});"}).mouseenter(function(){bannerqh.event({pEV:"track",pEvAction:"phover",pEvLinktitle:"ls"+Q,pEvSection:"ls"+Q})});if(O===0){P.addClass(N)}if(E.indexed){P.text(O+1)}if(E.idPrefix){P.attr("id",E.idPrefix+O)
}return P.appendTo(K)}if(F().length){F().each(function(O){B(this).click(function(P){M(B(this),O,P)})})}else{B.each(G.getItems(),function(O){L(O)})}G.onBeforeSeek(function(P,O){setTimeout(function(){if(!P.isDefaultPrevented()){var Q=F().eq(O);if(!P.isDefaultPrevented()&&Q.length){F().removeClass(N).eq(O).addClass(N)}}},1)});function I(O,Q){var P=F().eq(Q.replace("#",""));if(!P.length){P=F().filter("[href="+Q+"]")}P.click()}G.onAddItem(function(P,O){O=L(G.getItems().index(O));if(H){O.history(I)}});
if(H){F().history(I)}});return E.api?D:this}})(jQuery);(function(C){var A=function(D,E){this.target=C(D);this.touch=E;this.startX=this.currentX=E.screenX;this.startY=this.currentY=E.screenY;this.eventType=null};A.latestTap=null;A.prototype.move=function(D){this.currentX=D.screenX;this.currentY=D.screenY};A.prototype.process=function(){var D=this.currentX-this.startX;var E=this.currentY-this.startY;if(D==0&&E==0){this.checkForDoubleTap()}else{if(Math.abs(E)>Math.abs(D)){this.eventType=E>0?"swipedown":"swipeup";
this.target.trigger("swipe",[this])}else{this.eventType=D>0?"swiperight":"swipeleft";this.target.trigger("swipe",[this])}}this.target.trigger(this.eventType,[this]);this.target.trigger("touch",[this])};A.prototype.checkForDoubleTap=function(){if(A.latestTap){if((new Date()-A.latestTap)<400){this.eventType="doubletap"}}if(!this.eventType){this.eventType="tap"}A.latestTap=new Date()};var B=function(D){D.bind("touchstart",this.touchStart);D.bind("touchmove",this.touchMove);D.bind("touchcancel",this.touchCancel);
D.bind("touchend",this.touchEnd)};B.prototype.touchStart=function(D){var E=this;B.eachTouch(D,function(F){B.touches[F.identifier]=new A(E,F)})};B.prototype.touchMove=function(D){B.eachTouch(D,function(F){var E=B.touches[F.identifier];if(E){E.move(F)}})};B.prototype.touchCancel=function(D){B.eachTouch(D,function(E){B.purge(E,true)})};B.prototype.touchEnd=function(D){B.eachTouch(D,function(E){B.purge(E)})};B.touches={};B.purge=function(F,D){if(!D){var E=B.touches[F.identifier];if(E){E.process()}}delete B.touches[F.identifier]
};B.eachTouch=function(D,G){var D=D.originalEvent;var E=D.changedTouches.length;for(var F=0;F<E;F++){G(D.changedTouches[F])}};C.fn.addSwipeEvents=function(D){new B(this);if(D){this.bind("touch",D)}return this}})(jQuery);jQuery.fn.handleSwipes=function(){return this.each(function(){var A=jQuery(this).data("scrollable");A.getRoot().addSwipeEvents().bind("swipeleft",function(){A.next()}).bind("swiperight",function(){A.prev()})})};