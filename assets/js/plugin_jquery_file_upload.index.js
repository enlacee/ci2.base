
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
        var url = context.url + '/plugin_jquery_file_upload/upload_image_perfil',
        counterClient = 0,
        counterServer = 0,
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#avatarfile').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        maxNumberOfFiles: 1,
        limitConcurrentUploads:1,
        //dropZone: '#dropZone',
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#avatarfile-files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);

            // Extra
            // upload file with one Event
            $(".btn-primary").trigger( "click" );
            counterClient++;
            if ($('#avatarfileLength').val() == 1) {
                $('#avatarfile').attr('disabled', 'disabled');
                $('#avatarfile').parent().addClass('disabled');               
            }

        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#avatarfile-progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index]).wrap(link);

                if (file.url_delete) {
                    var linkDelete = $('<a>')
                        .text('delete')
                        //.prop('href', '#')
                        .attr('data-delete-url', file.url_delete)
                        .attr('href', 'javascript:void(0)')
                        .attr('onclick', 'javascript:deleteFile(this)');
                    $(data.context.children()[index]).parent().append(linkDelete);
                }

            console.log('counterServer', counterServer)
            counterServer++;
            console.log('counterServer', counterServer)
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
                // extra
                var linkDelete = $('<a>')
                    .text('delete')
                    .attr('href', 'javascript:void(0)')
                    .attr('onclick', 'javascript:deleteFile(this)');
                $(data.context.children()[index]).parent().append(linkDelete);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


// functiones
function deleteFile(self) {
    event.preventDefault();
    var url_delete = self.getAttribute('data-delete-url');
    console.log('url_delete', url_delete);
    if ( url_delete !== null) {
        $.get( url_delete, function( data ) {
            if (data == 'true') {
                removeImage();
            } else {
                alert("error in sever")
            }
        });
    } else {
        removeImage();
    }


    function removeImage() {
        self.parentNode.innerHTML = '';
        $('#avatarfile').removeAttr('disabled');
        $('#avatarfile').parent().removeClass('disabled');
    }

}


