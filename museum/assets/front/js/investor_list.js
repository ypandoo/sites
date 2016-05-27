(function(){
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
                   $id: 'items_ctrl',
                   data:[],
                   sort: 0,

                   get_pic_path: function(path){
                     return upload_img+path;
                   },
                   get_detail_link : function(e){
                     return base_url+'item/view/'+e;
                   },

                   get_items_with_pic:function(){
                     var url = base_url+'Item/get_items_with_pic';
                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                               if(data.success == 1){
                                                   console.log(data);
                                                   console.log('获取列表及图片成功！');
                                                   items_ctrl.data = data.data;
                                               }
                                               else{
                                                   alert(data.message);
                                               }
                                           }
                                         else {
                                           alert('返回值错误!');
                                         }
                                     },
                                     '',
                                     function()
                                     {
                                       alert('网络错误!');
                                     });
                   }
  });


  //Init codes run once
  items_ctrl.get_items_with_pic();

}).call(define('space_view_items'));
