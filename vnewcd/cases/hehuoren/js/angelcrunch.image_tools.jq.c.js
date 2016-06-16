/*/
/*
/* Rank: 3
/* Wap site image upload operation
/* Rely on jquery & image_upload files
/*
/*/

// Angelcrunch namespace
$.Angelcrunch = $.Angelcrunch || {};

$.Angelcrunch.ImageUploadInit = function (formChecked_fn) {
    var className = {
        file: {
            avatar: "#avatar-file",
            palyground_files: ":file.hidden",
        },
        btn: {
            file_uploader: ".image-uploader",
        },
        avatar: "#user-avatar",
        palyground_image: ".image-container",
        avatar_state: "#avatar-upload-state",
    },
    state = {
        loading:"loading",
    },
    attr = {
        image_id: "data-image-id",
        prev_file: "data-prev-file",
        crop_data: "data-crop",
        palyground_id:"data-playground-bind",

        Retrieval: function (str) {
            return "[" + str + "]";
        }
    };

    var $btn = {
        file_uploader: $(className.btn.file_uploader),
    };

    (function () {                  // About Avatar Upload
        var uploader = simple.uploader({});
        var txt = {
            common: "上传头像",
            doing: "已上传<i>00</i>%",
            failed:"上传失败, 请重新上传"
        };
        var $avatar, $avatarState, $files;
        var image_id;

        $avatar = $(className.avatar),
        $avatarState = $(className.avatar_state),
        $files = $(className.file.avatar);
        $avatar.click(function () {
            $files.click();
        });
        $files.change(function () {
            var prev_file = $(this).attr(attr.prev_file);
            if(prev_file) uploader.cancel(prev_file);
            uploader.upload(this.files);
            $(this).attr(attr.prev_file, $(this).val());
        });

        uploader.on("beforeupload", function (e, file, r) {
            $avatar.addClass(state.loading).empty();
            $avatarState.html(txt.doing);
            // Clear image id.
            $avatar.attr(attr.image_id, "");
            formChecked();
        });

        uploader.on("uploadprogress", function (e, file, loaded, total) {
            var progress = getImage_UploadProgress(loaded, total);
            $avatarState.find("i").text(progress);
        });

        uploader.on("uploadsuccess", function (e, file, r) {
            var o = r;
            if (!o.key) throw new Error("Necessary information is missing. Error code is 129837123987123.");
            image_id = o.key;
            var $img = getImage().attr("src", getImageURL(image_id, r));
            $avatar.append($img).attr(attr.image_id, o.key);
            $avatar.attr(attr.crop_data, get_crop(r));
        });

        uploader.on('uploadcomplete', function (e, file, r) {
            $avatar.find("img").load(function () {
                $(this).slideDown(function () {
                    $avatar.removeClass(state.loading);
                    $avatarState.html(txt.common);
                });
            });
            formChecked();
        });

        uploader.on('uploaderror', function (e, file, xhr, status) {
            $avatar.removeClass(state.loading);
            $avatarState.html(txt.failed);
        });

    }).call(this);                  // About Avatar Upload ENDED

    (function () {                  // About Playground Image Upload
        var txt = {
            common: "开始上传",
            doing: "<i>00</i>%",
            again:"重新上传",
            failed: "上传失败"
        };
        $btn.file_uploader.each(function () {
            var uploader = simple.uploader({});
            var $this, $playground, $image,
                $imageState, $files;
            var playground_id, image_id;

            playground_id = $(this).attr(attr.palyground_id);
            if (!playground_id) throw new Error("Necessary information is missing. Error code is 129123768123678162.");

            $playground = $(playground_id);
            $this = $(this),
            $image = $playground.find(className.palyground_image),
            $imageState = $(this),
            $files = $playground.find(className.file.palyground_files);
                        
            $this.click(function (e) {
                $files.click();
            });

            $files.change(function () {
                var prev_file = $(this).attr(attr.prev_file);
                if (prev_file) uploader.cancel(prev_file);
                uploader.upload(this.files);
                $playground.slideDown(482);
                $(this).attr(attr.prev_file, $(this).val());
            });

            uploader.on("beforeupload", function (e, file, r) {
                $image.addClass(state.loading).empty();
                $imageState.html(txt.doing);
                // Clear image id.
                $this.attr(attr.image_id, "");
                formChecked();
            });

            uploader.on("uploadprogress", function (e, file, loaded, total) {
                var progress = getImage_UploadProgress(loaded, total);
                $imageState.find("i").text(progress);
            });

            uploader.on("uploadsuccess", function (e, file, r) {
                var o = r;
                if (!o.key) throw new Error("Necessary information is missing. Error code is 129837123987123.");
                image_id = o.key;
                var $img = getImage().attr("src", getImageURL(image_id));
                $image.append($img);
                $this.attr(attr.image_id, o.key);
            });

            uploader.on('uploadcomplete', function (e, file, r) {
                $image.find("img").load(function () {
                    $(this).fadeIn(function () {
                        $image.removeClass(state.loading);
                        $imageState.html(txt.again);
                    });
                });
                formChecked();
            });

            uploader.on('uploaderror', function (e, file, xhr, status) {
                $imageState.html(txt.failed);
            });
        });

    }).call(this);                  // About Playground Image Upload ENDED


    var formChecked = function () {
        if (formChecked_fn) formChecked_fn();
    };

    var getImageURL = function (image_id, r) {
        return 'http://dn-xswe.qbox.me/' + image_id + '?imageMogr2' + (r ? "/crop/!" + get_crop(r) : "") + "/auto-orient/thumbnail/480x";
    };

    var getImage = function () {
        return $('<img src="" />').hide();
    };

    var getImage_UploadProgress = function (loaded, total) {
        var result = parseFloat(((loaded / total) * 100).toFixed(2));
        return result < 10 ? "0" + result : String(result);
    };
};

$(function () {
    //$.Angelcrunch.ImageUploadInit();
});
