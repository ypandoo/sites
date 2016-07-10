
(function(){
    var self = this;

    this.list = [];
    this.list_index = 0;

    this.framework =  avalon.define({
        $id:"sd-list",
        items_list:[],
        data:{'id':'',
              'name': '',
              'video':'',
              'description': '',
              'path': ''},
        get_pic_path: function(e){
            return self.get_pic_path(e);
        },
        get_pic_url_path: function(e){
            return 'url('+e+')';
        },
        direct_to_list_path: function(){
           window.location.href = base_url + 'pages/view/item_list';
        }
    });


    this.get_pic_path = function(path){
      return upload_img+path;
    }

    //get data via ajax
    this.get_list = function(){
        var item_id = $('#item_id').attr('data-id');
        if(!item_id)
        {
          alert('数据错误！');
          return;
        }
        var url = base_url+'Item/get_items_with_pic_all';
        var submit_data = {'item_id':item_id};
        base_remote_data.ajaxjson(
                          url, //url
                          function(data){
                            if(data.hasOwnProperty('success')){
                                  if(data.success == 1){
                                      console.log(data);
                                      console.log('获取列表及图片成功！');
                                      self.list = self.framework.items_list = data.data;
                                      //self.btn_display(0);
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

    this.get_list();

}).call(define('view_sd'));
