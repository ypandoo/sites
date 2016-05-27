(function(){
    var self = this;

    this.framework =  avalon.define({
        $id:"navi_ctrl",
        navi_code:'',
        navi_html: '',
        navi_name:'',
        list: [],
        selected: '',

        get_pic_url_path: function(e){
            return 'url('+e+')';
        },
        direct_to_list_path: function(){
           window.location.href = base_url + 'pages/view/new_expo';
        },
        switch_navi: function () {
          self.list_display.show();
        },
        swith_to_selected:  function (e) {
          self.framework.navi_code = self.framework.list[e].NAVI_CODE;
          self.framework.navi_html = self.framework.list[e].NAVI_HTML;
          self.framework.navi_name = self.framework.list[e].NAVI_NAME;
          self.list_display.hide();
        },

    });

    this.list_display={
      show:function(){
          var $current = $('#navi_list');
          var $bk=$('.bk');
          $current.children('ul').slideDown(200,function(){sta=true});
          $current.children('span').css('position','absoute');
          $bk.show(0,function(){$(this).css('opacity',0.7)});
      },
      hide:function(){
          var $current = $('#navi_list');
          var $bk=$('.bk');
          $current.children('ul').slideUp(200,function(){sta=false});
          $bk.css('opacity',0);
          setTimeout(function(){$bk.hide();},400);
      }
  };

    //get data via ajax
    this.get_list = function(){
        var url = base_url+'Navi/get_items';
        base_remote_data.ajaxjson(
                          url, //url
                          function(data){
                            if(data.hasOwnProperty('success')){
                                  if(data.success == 1){
                                      self.framework.list = data.data;
                                      self.framework.navi_code = data.data[0].NAVI_CODE;
                                      self.framework.navi_html = data.data[0].NAVI_HTML;
                                      self.framework.navi_name = data.data[0].NAVI_NAME;

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
    };

    self.get_list();

}).call(define('space_navi'));
