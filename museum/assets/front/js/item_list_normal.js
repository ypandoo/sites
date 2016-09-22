(function(){
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
                   $id: 'items_ctrl',
                   data:[],
                   sort: 0,
                   page_start: 0,
                   show_more: false,

                   get_pic_path: function(path){
                     return upload_img+path;
                   },
                   get_detail_link : function(e){
                     window.location.href = base_url+'item/view/'+e;
                   },
                   get_detail_link_pc : function(e){
                     return base_url+'item/view_pc/'+e;
                   },

                   get_content_text: function(e){
                     return e.substr(0, 45)+'...';
                   },

                   get_items_with_pic:function(){
                     var url = base_url+'Item/get_items_normal_with_pic';
                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                               if(data.success == 1){
                                                  //  console.log(data);
                                                  //  console.log('获取列表及图片成功！');
                                                   for (var i = 0; i < data.data.length; i++) {
                                                    items_ctrl.data.push(data.data[i]);
                                                   }

                                                   //长度大与interval 就加到起始位置
                                                   if (data.data.length == page_interval) {
                                                     items_ctrl.page_start += data.data.length;
                                                     //show more
                                                     items_ctrl.show_more  = true;
                                                   }
                                                   else {
                                                     items_ctrl.show_more  = false;
                                                   }
                                                  //  console.log('page_start:'+items_ctrl.page_start);

                                               }
                                               else{
                                                   alert(data.message);
                                               }
                                           }
                                         else {
                                           alert('返回值错误!');
                                         }
                                     },
                                     {'page_start': items_ctrl.page_start},
                                     function()
                                     {
                                       alert('网络错误!');
                                     });
                   }
  });


  //Init codes run once
  items_ctrl.get_items_with_pic();

}).call(define('space_view_items'));
