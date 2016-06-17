//NAV
$(function(){
  var NavMenuStatus = {
    openNavMenu: function(){
      $('.js-open-menu').addClass("isopen");
      $('.main-menu').show();
    },
    closeNavMenu: function(){
      $('.js-open-menu').removeClass("isopen");
      $('.main-menu').hide();
    },
  };

  $('.js-open-menu').on('click',function(e) {
    e.preventDefault();
    if (!$(this).hasClass("isopen")) {
      if ($('.js-open-user').hasClass('isopen')) NavMenuStatus.closeNavUserMenu();
      if ($('.nav-sub-menu').hasClass('isopen')) NavMenuStatus.closeNavSubMenu();
      NavMenuStatus.openNavMenu();
    }else{
      NavMenuStatus.closeNavMenu();
      if ($('.nav-sub-menu .relative').html() != '') NavMenuStatus.openNavSubMenu();
    }
    return false;
  });

  $('.js-open-user').on('click',function(e){
    e.preventDefault();
    window.location.href ="shopping-cart.html";
    return false;
  });

});