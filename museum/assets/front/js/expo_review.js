(function(){
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
                   $id: 'expo_list_ctrl',
                   list:[],
                   sort: 0,
                   page_start: 0,
                   show_more: false,

                   get_pic_path: function(path){
                     return upload_img+path;
                   },
                   get_detail_link : function(e){
                     window.location.href = base_url+'content/view/'+items_ctrl.list[e].CONTENT_ID;
                   },

                   get_detail_link_pc : function(e){
                     window.location.href = base_url+'content/view_expo_review/'+items_ctrl.list[e].CONTENT_ID;
                   },

                   get_content_text: function(e){
                     return e.substr(0, 48)+'...';
                   },

                   get_cover:function(e){
                     return items_ctrl.get_pic_path(items_ctrl.list[e].CONTENT_COVER);
                   },

                   get_content_by_type:function(){
                     var url = base_url+'Content/get_list';
                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                           if(data.success == 1 ){
                                               for (var i = 0; i < data.data.length; i++) {
                                                items_ctrl.list.push(data.data[i]);
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
                                           }
                                         else {
                                           alert('返回值错误!');
                                         }
                                     }},
                                     {'list_type': '展览回顾',
                                      'page_start': items_ctrl.page_start},
                                     function()
                                     {
                                       alert('网络错误!');
                                     });
                   }
  });


  //Init codes run once
  items_ctrl.get_content_by_type();

}).call(define('space_new_expo_list'));
