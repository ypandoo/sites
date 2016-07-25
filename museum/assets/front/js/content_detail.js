(function(){
    var self = this;

    self.contents = {'新展快讯': ['New Exhibitions', 'new_expo'],
                     '基本陈列': ['Routine Exhibitions', 'basic'],
                     '展览回顾': ['Exhibitions Review', 'expo_review'],
                     '西博动态': ['News', 'dynamic'],
                     '新馆建设': ['New Contructions', 'construction'],
                     '藏品保护': ['Antiquities Protection', 'protect'],
                     '西博课堂': ['Knowledge Share', 'lesson'],
                    };

    self.framework =  avalon.define({
        $id:"sd-list",
        content_id:'',
        content_html: '',
        content_time:'',
        content_title:'',
        content_type:'',
        author: '',

        get_pic_url_path: function(e){
            return 'url('+e+')';
        },
        direct_to_list_path: function(){
           window.location.href = base_url + 'pages/view/new_expo';
        },
        get_type_link: function(){
           window.location.href = base_url + 'pages/view/'+self.contents[self.framework.content_type][1];
        },

        get_content_name_en: function(){
            //var detail = self.contents[e][0];
            if (self.framework.content_type == '') {
              return '';
            }

            return  self.contents[self.framework.content_type][0];
        }

    });

    //get data via ajax
    this.get_detail = function(){
        var content_id = $('#content_id').attr('data-id');
        if(!content_id)
        {
          alert('数据错误！');
          return;
        }

        var url = base_url+'Content/get_content_detail';
        var submit_data = {'content_id':content_id};
        base_remote_data.ajaxjson(
                          url, //url
                          function(data){
                            if(data.hasOwnProperty('success')){
                                  if(data.success == 1){
                                      console.log(data);
                                      console.log('获取列表及图片成功！');
                                      //self.list = self.framework.items_list = data.data;
                                      //self.info(0);
                                      //self.btn_display(0);
                                      self.framework.item_id = data.data[0].CONTENT_ID;
                                      self.framework.content_html = data.data[0].CONTENT_HTML;
                                      self.framework.content_title = data.data[0].CONTENT_TITLE;
                                      self.framework.author = data.data[0].AUTHOR;
                                      self.framework.content_type = data.data[0].CONTENT_TYPE;
                                      self.framework.content_time = data.data[0].PUBLISH_TIME;
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
    };

    this.get_detail();

}).call(define('space_content_detail'));
