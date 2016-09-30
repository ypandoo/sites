(function() {
  var self = this;
  //avalon control space
  var items_ctrl = avalon.define({
    $id: 'items',
    show: {
      'item_detail': 0,
      'item_list': 1
    },
    data: [],
    item_id: '',
    item_name: '',
    item_title: '',
    item_position: '',
    item_is_topten: 0,
    video: '',
    audio_cn: '',
    audio_tibet: '',
    isNewItem: true,
    item_priority: 0,
    item_description: '',
    pics: [],
    page_start: 0,
    page_end: false,
    prev: function() {
      if (items_ctrl.page_start - page_interval <= 0) {
        items_ctrl.page_start = 0;
      } else {
        items_ctrl.page_start -= page_interval;
      }

      items_ctrl.page_end = false;

      items_ctrl.get_items();
    },
    next: function() {
      items_ctrl.page_start += page_interval;
      items_ctrl.get_items();
    },
    validate: {
      onValidateAll: function(reasons) {
          if (reasons.length) {
            console.log(reasons[0].getMessage());
            alert(reasons[0].getMessage());
            return;
          }

          if (items_ctrl.pics.length == 0) {
            alert('请至少上传一张图片!');
            return;
          }

          var submit_data = {
            'id': items_ctrl.item_id,
            'item_name': items_ctrl.item_name,
            'video': items_ctrl.video,
            'audio_cn': items_ctrl.audio_cn,
            'audio_tibet': items_ctrl.audio_tibet,
            'item_priority': items_ctrl.item_priority,
            'item_description': ue.getContent(),
            'pics': items_ctrl.pics,
            'item_position': items_ctrl.item_position,
            'item_is_topten': items_ctrl.item_is_topten ? 1 : 0
          };

          //Ajax
          console.log('Submit:提交数据');
          console.log(submit_data);

          //New item
          if (items_ctrl.isNewItem) {
            var url = base_url + 'Item/save_item';
            //url call data error_call
            base_remote_data.ajaxjson(
              url, //url
              function(data) {
                if (data.hasOwnProperty('success')) {
                  if (data.success == 1) {
                    console.log(data);
                    alert('新增珍品成功！您可以继续增加珍品');
                    items_ctrl.reset_item();
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
          } else {
            var url = base_url + 'Item/update_item';
            //url call data error_call
            base_remote_data.ajaxjson(
              url, //url
              function(data) {
                if (data.hasOwnProperty('success')) {
                  if (data.success == 1) {
                    console.log(data);
                    alert('更新珍品成功');
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
          } //End else

        } //End onValidateAll
    }, //End validate

    modify_item: function(e) {
      items_ctrl.show['item_list'] = 0;
      items_ctrl.show['item_detail'] = 1;
      items_ctrl.isNewItem = false;
      //get data
      items_ctrl.item_id = items_ctrl.data[e].ITEM_ID;
      items_ctrl.item_name = items_ctrl.data[e].ITEM_NAME;

      items_ctrl.video = items_ctrl.data[e].ITEM_VIDEO;
      items_ctrl.audio_cn = items_ctrl.data[e].ITEM_AUDIO_CN;
      items_ctrl.audio_tibet = items_ctrl.data[e].ITEM_AUDIO_TIBET;
      items_ctrl.item_position = items_ctrl.data[e].ITEM_POSITION;

      items_ctrl.item_priority = items_ctrl.data[e].ITEM_PRIORITY;
      items_ctrl.item_is_topten = parseInt(items_ctrl.data[e].ITEM_IS_TOPTEN);
      ue.setContent(items_ctrl.data[e].ITEM_DESCRIPTION);
      //get pics
      items_ctrl.get_pics(items_ctrl.item_id);
      items_ctrl.item_title = '修改珍品信息';
    },

    item_detail: function() {
      items_ctrl.reset_item();
    },

    delete_item: function(e) {
      var url = base_url + 'Item/delete_item';
      var submit_data = {
        'item_id': items_ctrl.data[e].ITEM_ID
      };
      //url call data error_call
      base_remote_data.ajaxjson(
        url, //url
        function(data) {
          if (data.hasOwnProperty('success')) {
            if (data.success == 1) {
              items_ctrl.data.removeAt(e);
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
    },

    view_list: function() {
      items_ctrl.show['item_list'] = 1;
      items_ctrl.show['item_detail'] = 0;
      items_ctrl.get_items();
    },

    get_pics: function(item_id) {
      var url = base_url + 'Item/get_pics';
      var submit_data = {
        item_id: item_id
      };
      //url call data error_call
      base_remote_data.ajaxjson(
        url, //url
        function(data) {
          if (data.hasOwnProperty('success')) {
            if (data.success == 1) {
              console.log(data);
              items_ctrl.pics = data.data;
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
    },

    delete_pic: function(e) {
      var url = base_url + 'Item/delete_pic';
      var submit_data = {
        'pic_id': items_ctrl.pics[e].PIC_ID
      };
      //url call data error_call
      base_remote_data.ajaxjson(
        url, //url
        function(data) {
          if (data.hasOwnProperty('success')) {
            if (data.success == 1) {
              items_ctrl.pics.removeAt(e);
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
    },

    get_pic_path: function(path) {
      return upload_img + path;
    },

    reset_item: function() {
      items_ctrl.show['item_list'] = 0;
      items_ctrl.show['item_detail'] = 1;
      items_ctrl.pics = [];
      items_ctrl.video = '';
      items_ctrl.audio_cn = '';
      items_ctrl.audio_tibet = '';
      items_ctrl.item_position = '';
      items_ctrl.priority = 0;
      items_ctrl.isNewItem = true;
      items_ctrl.item_is_topten = 0;

      //random id for new item_name
      items_ctrl.item_id = space_random.string(32, true, false);;
      items_ctrl.item_name = '';
      items_ctrl.item_title = '增加新的珍品';
      ue.execCommand('cleardoc');
    },

    get_items: function() {
      var url = base_url + 'Item/get_items';
      var submit_data = {
        'page_start': items_ctrl.page_start
      };
      base_remote_data.ajaxjson(
        url, //url
        function(data) {
          if (data.hasOwnProperty('success')) {
            if (data.success == 1 && data.data.length ==
              page_interval) {
              items_ctrl.data = data.data;
              items_ctrl.page_end = false;
            } else {
              items_ctrl.data = data.data;
              items_ctrl.page_end = true;
            }
          } else {

            alert('获取数据错误!');
          }
        },
        submit_data,
        function() {
          alert('网络错误!');
        });
    }
  });


  //Init codes run once
  items_ctrl.get_items();

  //uploadify-progress
  var up = $('#pic_upload').Huploadify({
    auto: false,
    fileTypeExts: '*.jpg;*.jpeg;*.bmp;*.png',
    multi: true,
    formData: {
      id: '0'
    },
    fileSizeLimit: 1024,
    showUploadedPercent: true,
    showUploadedSize: true,
    removeTimeout: 500,
    uploader: base_url + 'Item/add_pic',
    onUploadStart: function(file) {
      up.settings('formData', {
        id: items_ctrl.item_id
      });
      console.log('开始上传:' + items_ctrl.item_id);
    },
    onUploadSuccess: function(file, data, response) {
      console.log('上传成功:');
      var obj = JSON.parse(data);
      if (obj.success == 1) {
        items_ctrl.pics.push({
          'ITEM_ID': items_ctrl.item_id,
          'PIC_ID': obj.data.file_id,
          'PATH': obj.data.file_path
        });
        console.log(items_ctrl.pics);
      }

    }
  });

  var up_video = $('#video_upload').Huploadify({
    auto: false,
    fileTypeExts: '*.ogg;*.ogv;*.mp4;*.webm',
    multi: false,
    formData: {
      id: '0'
    },
    fileSizeLimit: 25240,
    showUploadedPercent: true,
    showUploadedSize: true,
    removeTimeout: 500,
    uploader: base_url + 'Item/add_video',
    onUploadStart: function(file) {
      up_video.settings('formData', {
        id: items_ctrl.item_id
      });
      console.log('开始上传:' + items_ctrl.item_id);
    },
    onUploadSuccess: function(file, data, response) {
      var obj = JSON.parse(data);
      console.log('上传完成:' + data);
      if (obj.success == 1) {
        items_ctrl.video = obj.data.file_name;
        console.log(items_ctrl.video);
      }
    }
  });

  var up_audio_cn = $('#audio_cn_upload').Huploadify({
    auto: false,
    fileTypeExts: '*.mp3;*.aac',
    multi: false,
    formData: {
      id: '0'
    },
    fileSizeLimit: 10240,
    showUploadedPercent: true,
    showUploadedSize: true,
    removeTimeout: 500,
    uploader: base_url + 'Item/add_audio_cn',
    onUploadStart: function(file) {
      up_audio_cn.settings('formData', {
        id: items_ctrl.item_id
      });
      console.log('开始上传:' + items_ctrl.item_id);
    },
    onUploadSuccess: function(file, data, response) {
      var obj = JSON.parse(data);
      console.log('上传完成:' + data);
      if (obj.success == 1) {
        items_ctrl.audio_cn = obj.data.file_name;
        console.log(items_ctrl.audio_cn);
      }
    }
  });

  var up_audio_tibet = $('#audio_tibet_upload').Huploadify({
    auto: false,
    fileTypeExts: '*.mp3;*.aac;*.wav',
    multi: false,
    formData: {
      id: '0'
    },
    fileSizeLimit: 10240,
    showUploadedPercent: true,
    showUploadedSize: true,
    removeTimeout: 500,
    uploader: base_url + 'Item/add_audio_tibet',
    onUploadStart: function(file) {
      up_audio_tibet.settings('formData', {
        id: items_ctrl.item_id
      });
      console.log('开始上传:' + items_ctrl.item_id);
    },
    onUploadSuccess: function(file, data, response) {
      var obj = JSON.parse(data);
      console.log('上传完成:' + data);
      if (obj.success == 1) {
        items_ctrl.audio_tibet = obj.data.file_name;
        console.log(items_ctrl.audio_tibet);
      }
    }
  });

  var ue = UE.getEditor('editor');


}).call(define('space_items'));
