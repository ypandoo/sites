(function() {
  var self = this;

  //avalon control space
  var items_ctrl = avalon.define({
    $id: 'items_ctrl',
    data: [],
    sort: 0,

    get_pic_path: function(path) {
      return upload_img + path;
    },
    get_detail_link: function(e) {
      window.location.href = base_url + 'item/view/' + e;
    },
    get_detail_link_pc: function(e) {
      return base_url + 'item/view_pc/' + e;
    },

    get_content_text: function(e) {
      return e.substr(0, 45) + '...';
    },

    get_items_with_pic: function() {
      var url = base_url + 'Item/get_items_topten_with_pic';
      base_remote_data.ajaxjson(
        url, //url
        function(data) {
          if (data.hasOwnProperty('success')) {
            if (data.success == 1) {
              //  console.log(data);
              //  console.log('获取列表及图片成功！');
              items_ctrl.data = data.data;
              // items_ctrl.run_slick();
            } else {
              alert(data.message);
            }
          } else {
            alert('返回值错误!');
          }
        },
        '',
        function() {
          alert('网络错误!');
        });
    }
  });



  // items_ctrl.run_slick = function() {
  //   $('.banner-top').slick({
  //     adaptiveHeight: false,
  //     slidesToShow: 1,
  //     dots: true,
  //     arrows: true,
  //     autoplay: true,
  //     autoplaySpeed: 2000,
  //   });
  // }

  //Init codes run once
  items_ctrl.get_items_with_pic();

}).call(define('space_view_items'));
