
/*jslint unparam: true, regexp: true */
/*global window, $ */
var counterClient = 0;
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
        var url = context.url + '/plugin_jquery_file_upload/upload_image_perfil',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary my-btn-upload')
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
        autoUpload:false,
        //dropZone: '#dropZone',
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true,

    }).on('fileuploadadd', function (e, data) {
        var maxFiles = $(this).fileupload().attr('maxFiles');

        if (counterClient + 1 > maxFiles) {
            $(this).fileupload('disable')
                .prop('disabled', true)
                .parent().css('opacity','.65');
            return;
        } else {
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
                //data.submit();
            });
            counterClient++;
        }
        

        // trigger click for upload file
        $(".my-btn-upload").trigger( "click" );
    }).on('fileuploadprocessalways', function (e, data) {
        if (typeof(data.context) == 'undefined') return;
        
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
                        .attr('data-delete-url', file.url_delete)
                        .attr('href', 'javascript:void(0)')
                        .attr('onclick', 'javascript:deleteFile(this)');
                    $(data.context.children()[index]).parent().append(linkDelete);
                }

            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    });


    // -----------------------------------------------------
    // FILE (2)
    // -----------------------------------------------------
    var filesCounter = 0;
    $('#dnifile').fileupload({
        url: context.url + '/plugin_jquery_file_upload/upload_image_dni',
        dataType: 'json',
        done: function (e, data) { console.log('data.result.files', data.result.files)
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.file_name).appendTo('#dnifile-files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#dnifile-progress .progress-bar').css(
                'width',
                progress + '%'
            );
        },
        add: function(e, data) {
            var maxFiles = $(this).fileupload().attr('maxFiles');
            if (filesCounter + 1 > maxFiles) {
                $(this).fileupload('disable')
                    .prop('disabled', true)
                    .parent().css('opacity','.65');
                return;
            }

            data.submit();
            filesCounter = filesCounter + 1;
        },
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    //end
});


// functiones
/**
* Delete image
*/
function deleteFile(self) {
    event.preventDefault();
    var url_delete = self.getAttribute('data-delete-url');
    if ( url_delete !== null) {
        $.get( url_delete, function( data ) {
            if (data == 'true') {
                removeImage();
            } else {
                alert("error in sever");
                removeImage();
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
    $('#avatarfile').fileupload('enable')
        .prop('disabled', false)
        .parent().css('opacity','');
    counterClient--;
}


// submit Form
$('#enviar').click(function(){ alert("click enviar")
    var url = context.url + '/plugin_jquery_file_upload/index';
    $.post( url, $('#form').serialize() ,function( data ) {
        console.log('data', data)
    });
});