(function() {
  var Self = this;

  Self.current = 0;
  Self.pic1 = '3.jpg';
  Self.pic2 = '2.jpg';
  Self.pic3 = '1.jpg';

  Self.framework = avalon.define({
    $id: "t_ctrl",
    item: {
      'float': 'left',
      'width': '28%',
      'margin': '1%',
      'border': '1px solid rgba(255, 245, 245, 0.2)',
      'background': 'rgba(0, 0, 0, 0.0980392)',
      'color': 'rgba(255, 255, 255, 1)',
      'height': '32px',
      'text-align': 'center',
      'font-size': '12px',
      'padding-top': '6px',
      'border-radius': '5px',
      'line-height': '25px'
    },
    selected_css: {
      'border': '1px solid rgba(255, 0, 0, 0.4)',
      'background': 'rgba(255, 0, 0, 0.1)',
      'color': 'rgba(255, 0, 0, 0.9)',
    },
    qj1: false,
    qj2: true,
    qj3: false,

    show1: true,
    show2: false,
    show3: true,

    switch_view: function(id) {
      switch (parseInt(id)) {
        case 1:
          Self.framework.qj1 = true;
          Self.framework.qj2 = false;
          Self.framework.qj3 = false;
          Self.framework.show1 = true;
          Self.framework.show2 = false;
          Self.framework.show3 = false;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.pic1,
          });
          break;
        case 2:
          Self.framework.qj1 = false;
          Self.framework.qj2 = true;
          Self.framework.qj3 = false;
          Self.framework.show1 = false;
          Self.framework.show2 = true;
          Self.framework.show3 = false;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.pic2,
          });
          break;
        case 3:
          Self.framework.qj1 = false;
          Self.framework.qj2 = false;
          Self.framework.qj3 = true;
          Self.framework.show1 = false;
          Self.framework.show2 = false;
          Self.framework.show3 = true;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.pic3,
          });
          break;
        default:
          Self.framework.qj1 = false;
          Self.framework.qj2 = true;
          Self.framework.qj3 = false;
          Self.framework.show1 = false;
          Self.framework.show2 = true;
          Self.framework.show3 = false;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.pic2,
          });
      }
    },

  });

  //get data via ajax
  /* jshint jquery: true */
  jQuery(document).ready(function($) {
    Self.framework.switch_view(2);
  });


}).call(define('space_360'));
