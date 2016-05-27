(function(){
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
                   $id: 'items',
                   show:{'item_detail':0, 'item_list':1},
                   data:[],
                   item_code: '',
                   item_name: '',
                   item_html: '',
                   item_title:'',
                   isNewItem: true,

                   validate: {
                     onValidateAll: function (reasons) {
                       if (reasons.length) {
                           console.log(reasons[0].getMessage());
                           alert(reasons[0].getMessage());
                           return;
                       }

                      var submit_data = {
                              'item_code': items_ctrl.item_code,
                              'item_name':  items_ctrl.item_name,
                              'item_html': ue.getContent(),
                      };

                      //Ajax
                      console.log('Submit:提交数据');
                      console.log(submit_data);

                      //New item
                      if (items_ctrl.isNewItem) {
                            var url = base_url+'Navi/save_item';
                            //url call data error_call
                            base_remote_data.ajaxjson(
                              url, //url
                              function(data){
                                if(data.hasOwnProperty('success')){
                                      if(data.success == 1){
                                          console.log(data);
                                          alert('新增珍品成功！您可以继续增加导航信息！');
                                          items_ctrl.reset_item();
                                      }
                                      else{
                                          alert(data.message);
                                      }
                                  }
                                else {
                                  alert('返回值错误!');
                                }
                            },
                            submit_data,
                            function()
                            {
                              alert('网络错误!');
                            });
                      }else{
                          var url = base_url+'Navi/update_item';
                          //url call data error_call
                          base_remote_data.ajaxjson(
                            url, //url
                            function(data){
                              if(data.hasOwnProperty('success')){
                                    if(data.success == 1){
                                        console.log(data);
                                        alert('更新导航信息成功！');
                                    }
                                    else{
                                        alert(data.message);
                                    }
                                }
                              else {
                                alert('返回值错误!');
                              }
                          },
                          submit_data,
                          function()
                          {
                            alert('网络错误!');
                          });
                        }//End else

                     }//End onValidateAll
                   },//End validate

                   modify_item:function(e){
                     items_ctrl.show['item_list'] = 0;
                     items_ctrl.show['item_detail'] = 1;
                     items_ctrl.isNewItem = false;

                     //get data
                     items_ctrl.item_code = items_ctrl.data[e].NAVI_CODE;
                     items_ctrl.item_name = items_ctrl.data[e].NAVI_NAME;
                     ue.setContent(items_ctrl.data[e].NAVI_HTML);
                     items_ctrl.item_title = '修改导航信息';
                   },

                   item_detail:function(){
                     items_ctrl.reset_item();
                   },

                   delete_item:function(e){
                     var url = base_url+'Navi/delete_item';
                     var submit_data = {'navi_code': items_ctrl.data[e].NAVI_CODE};
                     //url call data error_call
                     base_remote_data.ajaxjson(
                       url, //url
                       function(data){
                         if(data.hasOwnProperty('success')){
                               if(data.success == 1){
                                   items_ctrl.data.removeAt(e);
                               }
                               else{
                                   alert(data.message);
                               }
                           }
                         else {
                           alert('返回值错误!');
                         }
                     },
                     submit_data,
                     function()
                     {
                       alert('网络错误!');
                     });
                   },

                   view_list:function(){
                     items_ctrl.show['item_list'] = 1;
                     items_ctrl.show['item_detail'] = 0;
                     items_ctrl.get_items();
                   },

                   get_pic_path: function(path){
                     return upload_img+path;
                   },

                   reset_item: function() {
                     items_ctrl.show['item_list'] = 0;
                     items_ctrl.show['item_detail'] = 1;
                     items_ctrl.item_code='';
                     items_ctrl.item_name='';
                     items_ctrl.isNewItem = true;
                     items_ctrl.item_title = '增加导航信息';
                     ue.execCommand('cleardoc');
                   },

                   get_items:function(){
                     var url = base_url+'Navi/get_items';
                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                               if(data.success == 1){
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
  items_ctrl.get_items();

  var ue = UE.getEditor('editor');


}).call(define('space_items'));
