;(function(window){
	var hostName = '';
	if(document.getElementById("id-js-set-host")) {
		hostName = document.getElementById("id-js-set-host").getAttribute('host');
	} else {
		hostName = '../';
	}
	window.HOST = hostName;
})(window);

function set_cookie(cookieName, value, msToExpire, path, domain, secure, origin) {
	var expiryDate;

	if (msToExpire) {
		expiryDate = new Date();
		expiryDate.setTime(expiryDate.getTime() + msToExpire);
	}

	if ( !!origin ) {
		value = value;
	} else {
		value = window.encodeURIComponent(value);
	}

	document.cookie = cookieName + '=' + value +
		(msToExpire ? ';expires=' + expiryDate.toGMTString() : '') +
		';path=' + (path || '/') +
		(domain ? ';domain=' + domain : '') +
		(secure ? ';secure' : '');
}

function get_cookie(cookieName, origin) {
	try{
		var cookiePattern = new RegExp('(^|;)[ ]*' + cookieName + '=([^;]*)'),
			cookieMatch = cookiePattern.exec(document.cookie);
		return cookieMatch ? !!origin ? cookieMatch[2] : window.decodeURIComponent(cookieMatch[2]) : 0;
	} catch(err) {
		return '';
	}
}
(function(global, undefined) {
	var isShopApp = (function() {
		if ( typeof SWE != 'undefined' ) {
			return true;
		}

		return false;
	})();

	var User = {
		isLogged: (function() {
			if ( typeof get_cookie('OPPOSID') == 'string' && !!get_cookie('OPPOSID') ) {
				return true;
			}

			return false;
		})(),

		getCallbackURL: function() {
			var callback_url = '';
			var callback = window.location.search.match(/callback\=(.+)/);

			if( Array.isArray( callback ) ) {
				callback_url = callback[1];
			}

			return callback_url;
		},

		hasLogin: function() {
			if ( isShopApp && !User.isLogged ) {
				return false;
			}

			if ( !isShopApp && !User.isLogged ) {
				alert('尚未登录，请先登录');
				return false;
			}

			return true;
		},

		toLogin: function() {
			if ( isShopApp && !User.isLogged ) {
				var location = window.location,
					url = location.href;

				window.location.href = 'http://auth.phonemail.keke.cn/loginredirect_url=' + location.protocol + '//' + location.host + '/authorize.html?callback=' + encodeURIComponent( url );
			}

			if ( !isShopApp && !User.isLogged ) {
				window.location.href = '/login.html?callback=' + encodeURIComponent( window.location.href );
			}
		},

		login: function( successCallback, failCallback ) {
			User.fetch( '/proxy/checklogin', function(json) {
				var statusCode = json['statusCode'];

				if ( statusCode == '1' ) {
					successCallback && successCallback.call( null, json['data'] );
				}

				if ( statusCode == '0' ) {
					failCallback && failCallback.call();

					if ( isShopApp ) {
						var location = window.location,
							url = location.href;

						window.location.href = 'http://auth.phonemail.keke.cn/loginredirect_url=' + location.protocol + '//' + location.host + '/authorize.html?callback=' + encodeURIComponent( url );

						return;
					} else {
						window.location.href = '/login.html?callback=' + encodeURIComponent( window.location.href );
					}
				}
			} );
		},

		logout: function() {
			var url = window.location.href;

			window.location.href = '/proxy/logout?callback=' + encodeURIComponent( url );
		},

		fetch: function( url, data, successCallback, failCallback ) {
			var scr, handlerNameId;

			if ( typeof data === 'function' ) {
				failCallback = successCallback;
				successCallback = data;
				data = [];
			} else if ( typeof data === 'string' ) {
				data = [ data ];
			}

			handlerNameId = 'jsonpHandler_y_' + Math.floor( Math.random() + +new Date() );

			window[ handlerNameId ] = function ( response ) {
				successCallback( response );

				window[ handlerNameId ] = null;

				scr.parentNode.removeChild( scr );
			};

			scr = document.createElement( 'script' );

			scr.onerror = failCallback;

			data.push( 'callback=' + handlerNameId );

			scr.src = url + '?' + data.join( '&' );

			document.body.appendChild( scr );
		}
	};

	global.isShopApp = isShopApp;
	global.User = User;
})(this || window);

// Inner App
(function(global, undefined) {
	document.addEventListener('DOMContentLoaded', function() {
		if ( isShopApp ) {
			var footer = document.getElementById('footer');

			if ( footer ) {
				footer.style.display = 'none';
			}

			var footerWrapper = document.querySelector('.footer-wrapper');

			if ( footerWrapper ) {
				footerWrapper.style.display = 'none';
			}

			if ( document.getElementById('user-logout') ) {
				document.getElementById('user-logout').style.display = 'none';
			}

			// shopToLogin();
		}

		function shopToLogin() {

			var goLogin = document.querySelector('.topbar-right') || document.querySelector('.shopping-cart');

			if ( goLogin && !User.isLogged ) {

				goLogin.setAttribute( 'href', 'javascript:;' );

				goLogin.addEventListener( 'click', function(evt) {
						var location = window.location,
							url = location.protocol + '//' + location.host + '/user.html';

						window.location.href = 'http://auth.phonemail.keke.cn/loginredirect_url=' + location.protocol + '//' + location.host + '/authorize.html?callback=' + encodeURIComponent( url );

					evt.preventDefault();
				} );
			}
		}
	});
})(this || window);