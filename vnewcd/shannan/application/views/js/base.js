(function() {
  //定义类
  this.define = this._define = function(s) {
    return (typeof s != 'undefined' && typeof this[s] == 'undefined') ?
      this[s] = {} : (this[s] || {});
  };


  // this.base_url = 'http://127.0.0.1/';
  // this.upload_img = 'http://127.0.0.1/uploads/img/';
  // this.upload_video = 'http://127.0.0.1/uploads/video/';
  // this.upload_audio = 'http://127.0.0.1/uploads/audio/';

  this.page_interval = 10;
}).call(this);


(function(){
  var device = {
    Android: function() {
        return navigator.userAgent.match(/Android/i) ? true : false;
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i) ? true : false;
    },
    iOS: function() {
        return navigator.userAgent.match(/iPad|iPod|iPhone/i) ? true : false;
    },
    iphone: function(){
        return navigator.userAgent.match(/iPhone/i) ? true : false;
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) ? true : false;
    },
    any: function() {
        return (device.Android() || device.BlackBerry()  || device.Windows() || device.iOS());
    }
};

var prefix = (function () {
    var styles = window.getComputedStyle(document.documentElement, ''),
      pre = (Array.prototype.slice
        .call(styles)
        .join('')
        .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
      )[1],
      dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
      var result = {
      dom: dom,
      lowercase: pre,
      css: '-' + pre + '-',
      js: pre[0].toLowerCase() + pre.substr(1)
    };
    if(result.dom=='MS')
    {
      result.js = 'MS';
    }
    return result;
  })();

  function isWeixin(){
      var ua = navigator.userAgent.toLowerCase();
      if(ua.match(/MicroMessenger/i)=="micromessenger") {
          return true;
      } else {
          return false;
      }
  }
}).call(define('Device'));

/**
 * 随机数操作
 * Random.js*/
(function(){
  // var Random = Random = Random || {};

  /**
   * 随机数-整数
   * @param {Object} min 最小值
   * @param {Object} max 最大值
   */
  this.int = function(min, max) {
    //因为floor是向下取整，所以max+1才能取到Max的最大值
    return Math.floor(min + Math.random() * ((max + 1) - min));
  }

  /**
   * 随机数-浮点数
   * @param {Object} min 最小值
   * @param {Object} max 最大值
   * @param {Object} precision 精度
   */
  this.float = function(min, max, precision) {
    return new Number(min + Math.random() * (max - min)).toFixed(precision);
  }

  /**
   * 生成随机字符串
   * @param {Object} length 长度
   * @param {Object} containNumber 是否包含数字
   * @param {Object} upperCase 转大写？
   */
  this.string = function(length, containNumber, upperCase) {
    var chars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b',
      'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o',
      'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B',
      'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
      'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];
    var target = [];
    var min = 0,
      max = 61;

    if (!containNumber) min = 10;
    for (var i = 0; i < length; i++) {
      target[i] = chars[Math.floor(min + Math.random() * ((max + 1) - min))];
    }

    return upperCase ? target.join("").toUpperCase() : target.join("");
  }
}).call(define('Random'));
