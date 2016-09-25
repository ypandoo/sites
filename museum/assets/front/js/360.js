(function() {
  var self = this;

  this.framework = avalon.define({
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
    selected: {
      'border': '1px solid rgba(255, 0, 0, 0.4)',
      'background': 'rgba(255, 0, 0, 0.1)',
      'color': 'rgba(255, 0, 0, 0.9)',
    }
  });

  //get data via ajax
  this.switch_view = function() {};

}).call(define('space_360'));
