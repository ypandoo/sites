(function() {
  var Self = this;

  Self.current = 0;
  Self.expo_arr = [{
    'expo_name': '博物馆外立面',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'pic1': 'bwg1.jpg',
    'pic2': 'bwg2.jpg'
  }, {
    'expo_name': '史前文化展',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'pic1': 'sq1.jpg',
    'pic2': 'sq2.jpg'
  }, {
    'expo_name': '地方与祖国关系史陈列',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'pic1': 'gx1.jpg',
    'pic2': 'gx2.jpg'
  }, {
    'expo_name': '二十一度唐卡展',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'pic1': 'sq1.jpg',
    'pic2': 'sq2.jpg'
  }, {
    'expo_name': '西藏民俗文化展',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'pic1': 'sq1.jpg',
    'pic2': 'sq2.jpg'
  }, {
    'expo_name': '西藏佛教艺术展',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'btn1_pic': 'sq1.jpg',
    'btn2_pic': 'sq2.jpg'
  }, {
    'expo_name': '藏族戏剧用品展',
    'btn1_name': '全景图1',
    'btn2_name': '全景图2',
    'pic1': 'sq1.jpg',
    'pic2': 'sq2.jpg'
  }, ];

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
    qj1: true,
    qj2: false,

    zl1: true,
    zl2: false,
    zl3: false,
    zl4: false,
    zl5: false,
    zl6: false,
    zl7: false,

    switch_view: function(id) {
      switch (parseInt(id)) {
        case 1:
          Self.framework.qj1 = true;
          Self.framework.qj2 = false;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.expo_arr[
              Self.current]['pic1'],
          });
          break;
        case 2:
          Self.framework.qj1 = false;
          Self.framework.qj2 = true;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.expo_arr[
              Self.current]['pic2'],
          });
          break;
        default:
          Self.framework.qj1 = true;
          Self.framework.qj2 = false;
          $("#myPano").pano({
            img: base_url + 'assets/front/img/360/' + Self.expo_arr[
              Self.current]['pic1'],
          });
      }
    },

    switch_expo: function(id) {
      Self.framework.clear_sel_expo();
      Self.current = parseInt(id) - 1;
      switch (parseInt(id)) {
        case 1:
          Self.framework.zl1 = true;
          break;
        case 2:
          Self.framework.zl2 = true;
          break;
        case 3:
          Self.framework.zl3 = true;
          break;
        case 4:
          Self.framework.zl4 = true;
          break;
        case 5:
          Self.framework.zl5 = true;
          break;
        case 6:
          Self.framework.zl6 = true;
          break;
        case 7:
          Self.framework.zl7 = true;
          break;
        default:
          Self.framework.zl1 = true;
      }
      Self.framework.switch_view(1);
    },

    clear_sel_expo: function() {
      Self.framework.zl1 = Self.framework.zl2 = Self.framework.zl3 =
        Self.framework.zl4 = Self.framework.zl5 = Self.framework.zl6 =
        false;
    }

  });


  jQuery(document).ready(function($) {
    Self.framework.switch_expo(1);
  });


}).call(define('space_360'));
