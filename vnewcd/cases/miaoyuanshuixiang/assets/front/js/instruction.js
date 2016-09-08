(function(){
    var self = this;

    this.framework =  avalon.define({
        $id:"instruction_ctrl",
        html: '',
    });

    //get data via ajax
    this.get_detail = function(){

        var url = base_url+'Instruction/get_info';
        base_remote_data.ajaxjson(
                          url, //url
                          function(data){
                            if(data.hasOwnProperty('success')){
                                  if(data.success == 1){
                                      console.log(data);
                                      self.framework.html = data.data[0].HTML;
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

    this.get_detail();

}).call(define('space_instruction'));
