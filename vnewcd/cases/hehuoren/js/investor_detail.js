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
