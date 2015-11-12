/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = context.url + '/plugin_jquery_file_upload/upload_base' ;
    $('#userfile').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxNumberOfFiles: 1,
        dropZone: '#dropZone',
        done: function (e, data) {
            if (typeof(data.error) == 'undefined') {
                $('#userfile').attr('disabled', 'disabled');
                $('#userfile').parent().addClass('disabled');               
                $('#userfileLength').val(1);
                //
                $.each(data.upload_data, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#files');
                });
            } else {
                alert(data.error);
            }

    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress1 .progress-bar').css(
            'width',
            progress + '%'
        );
    }
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');


});