(function() {
  var self = this;

  self.list = [];
  self.list_index = 0;

  self.framework = avalon.define({
    $id: "sd-list",
    items_list: [],
    data: {
      'id': '',
      'name': '',
      'video': '',
      'description': '',
      'path': ''
    },
    video_path: '',
    item_is_topten: 0,
    video_path: '',

    audio_cn: '',
    audio_zw: '',
    play_cn: false,
    _play_cn: function() {
      if (self.framework.play_cn == true) {
        self.framework.play_cn = false;
        audio.pause();
      } else {
        self.framework.play_cn = true;
        audio.play();
        audio2.pause();
      }
    },
    play_tibet: false,
    _play_tibet: function() {
      if (self.framework.play_tibet == true) {
        self.framework.play_tibet = false;
        audio2.pause();
      } else {
        self.framework.play_tibet = true;
        audio2.play();
        audio.pause();
      }
    },

    play_video: function() {
      // $('.popup').show();
      $('.popup').slideDown(200, function() {});
      $('.bk').show(0, function() {
        $(this).css('opacity', 0.7)
      });
    },

    close_video: function() {
      $('.bk').css('opacity', 0);
      setTimeout(function() {
        $('.bk').hide();
      }, 400);
      $('.popup').hide();
      window.video.pause();
    },
    get_pic_path: function(e) {
      return self.get_pic_path(e);
    },
    get_pic_url_path: function(e) {
      return 'url(' + e + ')';
    },
    direct_to_list_path: function() {
      window.location.href = base_url + 'pages/view/item_list';
    },
    direct2map: function() {
      window.location.href = base_url + 'Navi/view_pc/' + self.framework
        .items_list[0].ITEM_POSITION;
    }
  });


  self.get_pic_path = function(path) {
    return upload_img + path;
  }

  //get data via ajax
  self.get_list = function() {
    var item_id = $('#item_id').attr('data-id');
    if (!item_id) {
      alert('数据错误！');
      return;
    }
    var url = base_url + 'Item/get_items_with_pic_all';
    var submit_data = {
      'item_id': item_id
    };
    base_remote_data.ajaxjson(
      url, //url
      function(data) {
        if (data.hasOwnProperty('success')) {
          if (data.success == 1) {
            // console.log(data);
            // console.log('获取列表及图片成功！');
            self.list = self.framework.items_list = data.data;

            self.framework.video_path = upload_video + self.framework.items_list[
                0]
              .ITEM_VIDEO;
            self.framework.audio_cn = upload_audio + self.framework.items_list[
              0].ITEM_AUDIO_CN;
            self.framework.audio_zw = upload_audio + self.framework.items_list[
              0].ITEM_AUDIO_TIBET;
            self.framework.item_is_topten = parseInt(self.framework.items_list[
              0].ITEM_IS_TOPTEN);

            //self.btn_display(0);

            self.run_slick();

            if (self.framework.item_is_topten) {
              self.add_audio_node();
              self.add_audio_node_zw();
              self.add_video_node();
            }

          } else {
            alert(data.message);
          }
        } else {
          alert('返回值错误!');
        }
      },
      submit_data,
      function() {
        alert('网络错误!');
      });
  };

  self.get_list();

  self.add_audio_node = function() {
    var url = self.framework.audio_cn;
    window.audio = document.createElement("audio");
    var source = document.createElement("source");
    window.audio.id = "audio";
    source.type = "audio/mpeg";
    source.src = url;
    source.autoplay = "autoplay";
    window.audio.addEventListener("ended", function() {
      window.audio.play();
    }, false);
    window.audio.appendChild(source);
  }

  self.add_audio_node_zw = function() {
    var url = self.framework.audio_zw;
    window.audio2 = document.createElement("audio");
    var source2 = document.createElement("source");
    window.audio2.id = "audio2";
    source2.type = "audio/mpeg";
    source2.src = url;
    source2.autoplay = "autoplay";
    window.audio2.addEventListener("ended", function() {
      window.audio2.play();
    }, false);
    window.audio2.appendChild(source2);
  }

  self.add_video_node = function() {
    window.video = document.getElementById('video');
    var source = document.createElement('source');
    // source.type = "video/mp4";
    source.setAttribute('src', self.framework.video_path);
    window.video.appendChild(source);
  }


  self.run_slick = function() {
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      focusOnSelect: true,
      arrows: true,
      //centerMode:true,
      infinite: true,
    });
  }


  //audio.play();
  // //    关闭音乐
  // var musicBtn = $("#musicDiv");
  // var musicStop = $("#musicDiv .musicStop");
  // var musicOn = $("#musicDiv .musicOn");
  // musicBtn.tap(function() {
  //     if (audio.paused) {
  //         musicOn.show();
  //         musicStop.hide();
  //         audio.play();
  //     } else {
  //         musicOn.hide();
  //         musicStop.show();
  //         audio.pause();
  //     }
  // });

}).call(define('view_sd'));
