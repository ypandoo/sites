(function() {
  var Self = this;

  Self.framework = avalon.define({
    $id: "t_ctrl",
    item: {
      'float': 'left',
      'width': '31%',
      'margin': '1%',
      'border': '1px solid rgba(0, 0, 0, 0.2)',
      'background': 'rgba(0, 0, 0, 0.1)',
      'color': 'rgba(0, 0, 0, 0.2)',
      'height': '32px',
      'text-align': 'center',
      'font-size': '12px',
      'padding-top': '6px',
      'border-radius': '5px'
    },
    selected_css: {
      'border': '1px solid rgba(255, 0, 0, 0.4)',
      'background': 'rgba(255, 0, 0, 0.1)',
      'color': 'rgba(255, 0, 0, 0.9)',
    },
    selected_mainfloor: true,
    selected_2f: false,
    selected_3f: false,
    switch_view: function(id) {
      if (id == 'main_floor') {
        if (Self.framework.selected_mainfloor) {
          return;
        }
        Self.framework.clear_select();
        Self.framework.selected_mainfloor = !Self.framework.selected_mainfloor;
        $("#myPano").pano({
          img: base_url + 'assets/front/img/demo_photo.jpg'
        });
      } else if (id == '2f') {
        if (Self.framework.selected_2f) {
          return;
        }
        Self.framework.clear_select();
        Self.framework.selected_2f = !Self.framework.selected_2f;
        $("#myPano").pano({
          img: base_url + 'assets/front/img/banner1.jpg'
        });
      } else if (id == '3f') {
        if (Self.framework.selected_3f) {
          return;
        }
        Self.framework.clear_select();
        Self.framework.selected_3f = !Self.framework.selected_3f;
        $("#myPano").pano({
          img: base_url + 'assets/front/img/banner2.jpg'
        });
      }

    },
    clear_select: function() {
      Self.framework.selected_mainfloor = false;
      Self.framework.selected_2f = false;
      Self.framework.selected_3f = false;
    }

  });

  //get data via ajax
  // this.switch_view = function() {};

}).call(define('space_360'));
