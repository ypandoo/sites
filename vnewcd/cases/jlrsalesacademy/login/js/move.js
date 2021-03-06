/**
 * 动画封装工具类
 */
(function(exports) {
	var current = getComputedStyle || currentStyle, map = {
		top : "px",
		bottom : "px",
		left : "px",
		right : "px",
		width : "px",
		height : "px",
		"font-size" : "px",
		margin : "px",
		"margin-top" : "px",
		"margin-bottom" : "px",
		"margin-left" : "px",
		"margin-right" : "px",
		padding : "px",
		"padding-top" : "px",
		"padding-bottom" : "px",
		"padding-left" : "px",
		"padding-right" : "px"
	};
	exports.move = function(selector) {
		return new Move(move.select(selector));
	}, exports.move.version = "0.0.2", move.defaults = {
		duration : 500
	}, move.ease = {
		"in" : "ease-in",
		out : "ease-out",
		"in-out" : "ease-in-out",
		snap : "cubic-bezier(0,1,.5,1)"
	}, move.select = function(selector) {
		return document.getElementById(selector)
				|| document.querySelectorAll(selector)[0];
	};
	function EventEmitter() {
		this.callbacks = {};
	}
	EventEmitter.prototype.on = function(event, fn) {
		(this.callbacks[event] = this.callbacks[event] || []).push(fn);
		return this;
	},
	EventEmitter.prototype.emit = function(event) {
		var args = Array.prototype.slice.call(arguments, 1), callbacks = this.callbacks[event], len;
		if (callbacks) {
			len = callbacks.length;
			for ( var i = 0; i < len; ++i)
				callbacks[i].apply(this, args);
		}
		return this;
	}, exports.Move = function Move(el) {
		if (!(this instanceof Move))
			return new Move(el);
		EventEmitter.call(this), this.el = el, this._props = {},
				this._rotate = 0, this._transitionProps = [],
				this._transforms = [], this
						.duration(move.defaults.duration);
	}, Move.prototype = new EventEmitter,
	Move.prototype.constructor = Move,
	Move.prototype.transform = function(transform) {
		this._transforms.push(transform);
		return this;
	}, Move.prototype.skew = function(x, y) {
		y = y || 0;
		return this.transform("skew(" + x + "deg, " + y + "deg)");
	}, Move.prototype.skewX = function(n) {
		return this.transform("skewX(" + n + "deg)");
	}, Move.prototype.skewY = function(n) {
		return this.transform("skewY(" + n + "deg)");
	}, Move.prototype.translate = Move.prototype.to = function(x, y) {
		y = y || 0;
		return this.transform("translate(" + x + "px, " + y + "px)");
	}, Move.prototype.translateX = Move.prototype.x = function(n) {
		return this.transform("translateX(" + n + "px)");
	}, Move.prototype.translateY = Move.prototype.y = function(n) {
		return this.transform("translateY(" + n + "px)");
	}, Move.prototype.scale = function(x, y) {
		y = null == y ? x : y;
		return this.transform("scale(" + x + ", " + y + ")");
	}, Move.prototype.scaleX = function(n) {
		return this.transform("scaleX(" + n + ")");
	}, Move.prototype.scaleY = function(n) {
		return this.transform("scaleY(" + n + ")");
	}, Move.prototype.rotate = function(n) {
		return this.transform("rotate(" + n + "deg)");
	}, Move.prototype.ease = function(fn) {
		fn = move.ease[fn] || fn || "ease";
		return this.setVendorProperty("transition-timing-function", fn);
	}, Move.prototype.duration = function(n) {
		n = this._duration = "string" == typeof n ? parseFloat(n) * 1e3
				: n;
		return this.setVendorProperty("transition-duration", n + "ms");
	}, Move.prototype.delay = function(n) {
		n = "string" == typeof n ? parseFloat(n) * 1e3 : n;
		return this.setVendorProperty("transition-delay", n + "ms");
	}, Move.prototype.setProperty = function(prop, val) {
		this._props[prop] = val;
		return this;
	}, Move.prototype.setVendorProperty = function(prop, val) {
		this.setProperty("-webkit-" + prop, val), this.setProperty(
				"-moz-" + prop, val), this.setProperty("-ms-" + prop,
				val), this.setProperty("-o-" + prop, val);
		return this;
	}, Move.prototype.set = function(prop, val) {
		this.transition(prop), "number" == typeof val && map[prop]
				&& (val += map[prop]), this._props[prop] = val;
		return this;
	}, Move.prototype.add = function(prop, val) {
		var self = this;
		return this.on("start", function() {
			var curr = parseInt(self.current(prop), 10);
			self.set(prop, curr + val + "px");
		});
	}, Move.prototype.sub = function(prop, val) {
		var self = this;
		return this.on("start", function() {
			var curr = parseInt(self.current(prop), 10);
			self.set(prop, curr - val + "px");
		});
	}, Move.prototype.current = function(prop) {
		return current(this.el).getPropertyValue(prop);
	}, Move.prototype.transition = function(prop) {
		if (!this._transitionProps.indexOf(prop))
			return this;
		this._transitionProps.push(prop);
		return this;
	}, Move.prototype.applyProperties = function() {
		var props = this._props, el = this.el;
		for ( var prop in props)
			props.hasOwnProperty(prop)
					&& el.style.setProperty(prop, props[prop], "");
		return this;
	},
	Move.prototype.move = Move.prototype.select = function(selector) {
		this.el = move.select(selector);
		return this;
	}, Move.prototype.then = function(fn) {
		if (fn instanceof Move)
			this.on("end", function() {
				fn.end();
			});
		else if ("function" == typeof fn)
			this.on("end", fn);
		else {
			var clone = new Move(this.el);
			clone._transforms = this._transforms.slice(0), this
					.then(clone), clone.parent = this;
			return clone;
		}
		return this;
	}, Move.prototype.pop = function() {
		return this.parent;
	}, Move.prototype.end = function(fn) {
		var self = this;
		this.emit("start"), this._transforms.length
				&& this.setVendorProperty("transform", this._transforms
						.join(" ")), this.setVendorProperty(
				"transition-properties", this._transitionProps
						.join(", ")), this.applyProperties(), fn
				&& this.then(fn), setTimeout(function() {
			self.emit("end");
		}, this._duration);
		return this;
	};
})(this)