//选择行业页面显示及文本内容
(function(){
  var $bk=$('.bk');
  choose_project_display={
      show:function(){
          $('#projects').slideDown(200,function(){});
          $bk.show(0,function(){$(this).css('opacity',0.7)});
      },
      hide:function(){
          $('#projects').slideUp(200,function(){});
          $bk.css('opacity',0);
          setTimeout(function(){$bk.hide();},400);
      }
  }

  var self = this;
  // this.invite = avalon.define('industry-select', function (vm) {
  this.invite_ctrl = avalon.define('invite_ctrl', function (vm) {

      vm._type_sel0 = 1;
      vm._type_sel1 = 0;
      vm.invite = function(){
        choose_project_display.show();
      };

      vm.close_project = function(){
        choose_project_display.hide();
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
