//选择行业页面显示及文本内容
(function(){
  var $bk=$('.bk');
  choose_project_display={
      show:function(id){
          $('#'+id).slideDown(200,function(){});
          $bk.show(0,function(){$(this).css('opacity',0.7)});
      },
      hide:function(id){
          $('#'+id).slideUp(200,function(){});
          $bk.css('opacity',0);
          setTimeout(function(){$bk.hide();},400);
      },
      close_popup:function(){
          $('.popup').slideUp(200,function(){});
          $bk.css('opacity',0);
          setTimeout(function(){$bk.hide();},400);
      }
  }

  var self = this;
  // this.invite = avalon.define('industry-select', function (vm) {
  this.invite_ctrl = avalon.define('invite_ctrl', function (vm) {

      vm._type_sel0 = 1;
      vm._type_sel1 = 0;
      vm.invite = function(id){
        choose_project_display.show(id);
      };

      vm.close_project = function(id){
        choose_project_display.hide(id);
      }

      vm.close_popup = function(id){
        choose_project_display.close_popup(id);
      }

      vm.share_friend = function() {
        $("#share_friend").show();
        var $bk=$('.bk');
        $bk.show(0,function(){$(this).css('opacity',0.7)});
      }

      vm.share_friend_close = function() {
        $("#share_friend").hide();
        var $bk=$('.bk');
        $bk.css('opacity',0);
        setTimeout(function(){$bk.hide();},400);
      }

      vm.type_sel = function(e){
        if (e==0) {
          vm._type_sel0 = 1;
          vm._type_sel1 = 0;
        }
        else{
          vm._type_sel0 = 0;
          vm._type_sel1 = 1;
        }
      }
  });


}).call(_define('space_invite'));
