(function(){
  var self = this;

  //avalon control space
  var content_ctrl = avalon.define({
                   $id: 'content_ctrl',
                   show:{'content_detail':0, 'content_list':1},
                   list:[],
                   list_type:'',
                   show_title:'',

                   content_id: '',
                   content_title: '',
                   content_author:'',
                   content_cover:'',
                   content_text:'',
                   content_html:'',
                   content_type:'',

                   page_start: 0,
                   page_end: true,
                   prev: function(){
                     if (content_ctrl.page_start - page_interval <= 0) {
                       content_ctrl.page_start = 0;
                     }
                     else {
                       content_ctrl.page_start -= page_interval;
                     }

                     content_ctrl.page_end = false;

                     content_ctrl.get_list();
                   },
                   next: function(){
                      content_ctrl.page_start += page_interval;
                      content_ctrl.get_list();
                   },

                   isNew: true,

                   validate: {
                     onValidateAll: function (reasons) {
                       if (reasons.length) {
                          //  console.log(reasons[0].getMessage());
                           alert(reasons[0].getMessage());
                           return;
                       }

                      var submit_data = {
                              'content_id': content_ctrl.content_id,
                              'content_title':  content_ctrl.content_title,
                              'content_html':  ue.getContent(),
                              'content_text':  ue.getContentTxt(),
                              'content_author': content_ctrl.content_author,
                              'content_cover': content_ctrl.content_cover,
                              'content_type': content_ctrl.content_type
                      };

                      //Ajax
                      // console.log('Submit:提交数据');
                      // console.log(submit_data);

                      //New item
                      if (content_ctrl.isNew) {
                            var url = base_url+'Content/new_content';
                            //url call data error_call
                            base_remote_data.ajaxjson(
                              url, //url
                              function(data){
                                if(data.hasOwnProperty('success')){
                                      if(data.success == 1){
                                          // console.log(data);
                                          alert('文章发布成功！您可以继续发布文章！');
                                          content_ctrl.reset_item();
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
                          var url = base_url+'Content/update_content';
                          //url call data error_call
                          base_remote_data.ajaxjson(
                            url, //url
                            function(data){
                              if(data.hasOwnProperty('success')){
                                    if(data.success == 1){
                                        // console.log(data);
                                        alert('更新文章成功！');
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

                   modify_content:function(e){
                     content_ctrl.show['content_list'] = 0;
                     content_ctrl.show['content_detail'] = 1;
                     content_ctrl.isNew = false;
                     //get data
                     content_ctrl.content_id = content_ctrl.list[e].CONTENT_ID;
                     content_ctrl.content_title = content_ctrl.list[e].CONTENT_TITLE;
                     content_ctrl.content_author = content_ctrl.list[e].AUTHOR;
                     content_ctrl.content_publish_time = content_ctrl.list[e].PUBLISH_TIME;
                     content_ctrl.content_text = content_ctrl.list[e].CONTENT_TEXT;
                     content_ctrl.content_type = content_ctrl.list[e].CONTENT_TYPE;
                     content_ctrl.content_cover = content_ctrl.list[e].CONTENT_COVER;

                     ue.setContent(content_ctrl.list[e].CONTENT_HTML);

                     content_ctrl.item_title = '修改文章';
                   },

                   content_detail:function(){
                     content_ctrl.reset_item();
                   },

                   delete_content:function(e){
                     var url = base_url+'Content/delete_content';
                     var submit_data = {'content_id': content_ctrl.list[e].CONTENT_ID};
                     //url call data error_call
                     base_remote_data.ajaxjson(
                       url, //url
                       function(data){
                         if(data.hasOwnProperty('success')){
                               if(data.success == 1){
                                   content_ctrl.list.removeAt(e);
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
                     content_ctrl.show['content_list'] = 1;
                     content_ctrl.show['content_detail'] = 0;
                     content_ctrl.get_list();
                   },

                   get_pic_path: function(path){
                     return upload_img+path;
                   },

                   reset_item: function() {
                     content_ctrl.show['content_list'] = 0;
                     content_ctrl.show['content_detail'] = 1;
                     content_ctrl.content_title='';
                     content_ctrl.content_author='';
                     content_ctrl.content_cover='';
                     content_ctrl.content_type = '';
                     content_ctrl.isNew = true;

                     //random id for new item_name
                     content_ctrl.content_id = space_random.string(32, true, false);;
                     content_ctrl.show_title = '发布新文章';
                     ue.execCommand('cleardoc');
                   },

                   get_list:function(e){
                     var url = base_url+'Content/get_list';
                     var submit_data ={list_type:content_ctrl.list_type, page_start:content_ctrl.page_start};

                     if (typeof content_ctrl.list_type == 'undefined' || !content_ctrl.list_type) {
                       return;
                     }

                     base_remote_data.ajaxjson(
                                       url, //url
                                       function(data){
                                         if(data.hasOwnProperty('success')){
                                               if(data.success == 1 && data.data.length == page_interval){
                                                   content_ctrl.list = [];
                                                   content_ctrl.list = data.data;
                                                   content_ctrl.page_end = false;
                                               }
                                               else{
                                                  content_ctrl.list = data.data;
                                                  content_ctrl.page_end = true;
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

          list_type_change: function(e)
          {
            content_ctrl.page_start = 0;
            content_ctrl.page_end = false;
            content_ctrl.get_list(e);
          },

          get_pic_path: function(){
            return upload_img+content_ctrl.content_cover;
          },
  });


  //Init codes run once
  //content_ctrl.get_list();
  var ue = UE.getEditor('editor');

  //uploadify-progress
  var up = $('#pic_upload').Huploadify({
      auto:false,
      fileTypeExts:'*.jpg;*.jpeg;*.bmp;*.png',
      multi:false,
      formData:{id:'0'},
      fileSizeLimit:1024,
      showUploadedPercent:true,
      showUploadedSize:true,
      removeTimeout:500,
      uploader:base_url+'Item/add_pic',
      onUploadStart:function(file){
        up.settings('formData', {id: content_ctrl.content_id});
        // console.log('开始上传:'+content_ctrl.content_id);
      },
      onUploadSuccess: function(file, data, response) {
        // console.log('上传成功:');
        var obj = JSON.parse(data);
        if (obj.success==1) {
          content_ctrl.content_cover = obj.data.file_path;
          // items_ctrl.pics.push({'ITEM_ID': items_ctrl.item_id,'PIC_ID':obj.data.file_id, 'PATH': obj.data.file_path});
          // console.log(content_ctrl.content_cover);
        }

      }
    });


}).call(define('space_content'));
