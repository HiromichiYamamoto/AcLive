$(function() {

    //アバター写真の選択・表示
    $(".avater_up").click(function() {
        var target = $(this).attr('id');
        if($("#avatar").val() == ""){
            $('#avatar_file').click();
        }else{
            if(!confirm('この画像を削除しますか？')){
                return false; // キャンセル
            }else{
                execDelete(target)
            }
        }
    });

    $('.uploadFile').on("change", function(){
        var file = $(this).prop('files')[0];
        var fr = new FileReader();
        $("#avatar_change").css('background-image', 'none');
        fr.onload = function() {
            $('#avatar_change').css('background-image', 'url(' + fr.result + ')');
        };
        fr.readAsDataURL(file);
    });

    $('.uploadFile').on("change", function(){
        var file = this.files[0];
        if(file != null) {
            execUpload($(this).attr('id').replace('_file',''));
        }
    });

    function execUpload(target) {
        var fd = new FormData();
        fd.append("file", $("#" + target + "_file").prop("files")[0]);
        fd.append("img_type", "user");
        fd.append("action", "upload");
        $.ajax({
            url  : "/image/upload",
            type : "POST",
            data : fd,
            cache       : false,
            contentType : false,
            processData : false,
            dataType    : "json",

            // 送信前
            // beforeSend: function(xhr, settings) {
            //     $('#avatar').hide();  // 編集ボタン非表示(二重送信を防止)
            //     $('#avatar_image').addClass('loading'); // ローダー画像を追加
            // },
            // 通信成功時の処理
            success: function(result, textStatus, xhr) {
                if (result.RESULT_STATUS == '1') {
                    $('#' + target + '_filename').val(result.RESULT.FILENAME);
                    $('#avatar_change_form').submit();
                }
                else {
                    alert(result.RESULT_MESSAGE);
                    $('#avatar').show();
                    $('#avatar_image').removeClass('loading');
                }
            },
            // 通信失敗時の処理
            // error: function(xhr, textStatus, error) {
            //     $('#avatar').show();
            //     $('#avatar_image').removeClass('loading');
            // }
        });
    }

    function execDelete(target) {

        var fd = new FormData();
        fd.append("filename", $("#" + target + "_filename").val());
        fd.append("img_type", "user");
        fd.append("action", "delete");

        $.ajax({
            url  : "/image/upload",
            type : "POST",
            data : fd,
            cache       : false,
            contentType : false,
            processData : false,
            dataType    : "json",

            // 通信成功時の処理
            success: function(result, textStatus, xhr) {
                if (result.RESULT_STATUS == '1') {
                    $('#avatar_filename').val("");
                    $('#avatar_change_form').submit();
                }
                else {
                    alert(result.RESULT_MESSAGE);
                    $('#avatar').show();
                    $('#avatar_image').removeClass('loading');
                }
            },
            // 通信失敗時の処理
            error: function(xhr, textStatus, error) {
                $('#avatar').show();
                $('#avatar_image').removeClass('loading');
            }

        });
    }
});
