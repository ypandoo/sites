(function(){
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
                   $id: 'expo_list_ctrl',
                   list:[],
                   sort: 0,

                   get_pic_path: function(path){
                     return upload_img+path;
                   },
                   get_detail_link : function(e){
                     window.location.href = base_url+'content/view/'+items_ctrl.list[e].CONTENT_ID;
                   },

                   get_content_text: function(e){
                     return e.substr(0, 45)+'...';
                   },

                   get_content_by_type:function(){
                     var url = base_url+'Content/get_list';
                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                               if(data.success == 1){
                                                   console.log(data);
                                                   console.log('获取列表及图片成功！');
                                                   items_ctrl.list = data.data;
                                               }
                                               else{
                                                   alert(data.message);
                                               }
                                           }
                                         else {
                                           alert('返回值错误!');
                                         }
                                     },
                                     {'list_type': '新展快讯'},
                                     function()
                                     {
                                       alert('网络错误!');
                                     });
                   }
  });


  //Init codes run once
  items_ctrl.get_content_by_type();

}).call(define('space_new_expo_list'));
