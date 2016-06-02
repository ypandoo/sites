(function(){
    //定义类
    this.define = this._define = function (s) {
        return (typeof  s != 'undefined' && typeof  this[s] == 'undefined') ? this[s] = {} : (this[s] || {});
    };

		this.base_url = 'http://localhost/museum/';
    this.upload_img = 'http://localhost/museum/uploads/img/';

    //跨域获取数据方法
    this.base_remote_data={
        ajaxjsonp:function(url,call,data,error){
            $.ajax({
                url:url,
                type:'get',
                cache:false,
                data:data,
                dataType:'jsonp',
                jsonp:'callback',
                success:function(ret) {
                    var json={};
                    if(typeof ret=='string'){
                        try{
                            json=JSON.parse(ret);
                        }
                        catch(e){

                        }
                    }
                    if(typeof ret=='object'){
                        json=ret;
                    }
                    call(json);
                },
                error:function(e){
                    if(typeof  error == 'function'){
                        error(e);
                    }
                }
            });
        },

        //ajax
        ajaxjson:function(url, call, data, error){
          $.ajax({
              url:url,
              type:'post',
              cache:false,
              data:data,
              dataType:'json',
              success:function(ret) {
                  var json={};
                  if(typeof ret=='string'){
                      try{
                          json=JSON.parse(ret);
                      }
                      catch(e){

                      }
                  }
                  if(typeof ret=='object'){
                      json=ret;
                  }
                  call(json);
              },
              error:function(e){
                  if(typeof  error == 'function'){
                      error(e);
                      console.log('通讯错误:');
                      console.log(e);
                  }
              }
          });

        }
    };

  }).call(this);

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
		this.int=function(min,max){
			//因为floor是向下取整，所以max+1才能取到Max的最大值
			return Math.floor(min+Math.random()*((max+1)-min));
		}

		/**
		 * 随机数-浮点数
		 * @param {Object} min 最小值
		 * @param {Object} max 最大值
		 * @param {Object} precision 精度
		 */
		this.float=function(min,max,precision){
			return new Number(min+Math.random()*(max-min)).toFixed(precision);
		}

		/**
		 * 生成随机字符串
		 * @param {Object} length 长度
		 * @param {Object} containNumber 是否包含数字
		 * @param {Object} upperCase 转大写？
		 */
		this.string=function(length,containNumber,upperCase){
			var chars=['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
			var target=[];
			var min=0,max=61;

			if(!containNumber)min=10;
			for(var i=0;i<length;i++){
				target[i]=chars[Math.floor(min+Math.random()*((max+1)-min))];
			}

			return upperCase?target.join("").toUpperCase():target.join("");
		}
}).call(define('space_random'));
