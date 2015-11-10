/*jslint unparam: true */
/*global window, $ */
$(function () {
	'use strict';
	// Change this to the location of your server-side upload handler:
	var url = context.url + '/plugin_jquery_file_upload/upload_image_perfil' ;
	$('#fileupload').fileupload({
		url: url,
		dataType: 'json',
		autoUpload: true,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		maxNumberOfFiles: 1,
		done: function (e, data) {
			if (typeof(data.result.files.error) == 'undefined') {
				$('#fileupload').attr('disabled', 'disabled');
				$('#fileupload').parent().addClass('disabled');				
				$('#userfileLength').val(1);
				//
				$.each(data.result.files, function (index, file) {
					$('<p/>').text(file.name).appendTo('#files');
				});
			} else {
				alert(data.result.files.error);
			}

	},
	progressall: function (e, data) {
	    var progress = parseInt(data.loaded / data.total * 100, 10);
	    $('#progress .progress-bar').css(
	        'width',
	        progress + '%'
	    );
	}
	}).prop('disabled', !$.support.fileInput)
	.parent().addClass($.support.fileInput ? undefined : 'disabled');


	// 02
	$('#fileupload').fileupload({
		url: url,
		dataType: 'json',
		autoUpload: true,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		maxNumberOfFiles: 2,
		done: function (e, data) {
			if (typeof(data.result.files.error) == 'undefined') {
				$('#fileupload').attr('disabled', 'disabled');
				$('#fileupload').parent().addClass('disabled');				
				$('#userfileLength').val(1);
				//
				$.each(data.result.files, function (index, file) {
					$('<p/>').text(file.name).appendTo('#files');
				});
			} else {
				alert(data.result.files.error);
			}

	},
	progressall: function (e, data) {
	    var progress = parseInt(data.loaded / data.total * 100, 10);
	    $('#progress .progress-bar').css(
	        'width',
	        progress + '%'
	    );
	}
	}).prop('disabled', !$.support.fileInput)
	.parent().addClass($.support.fileInput ? undefined : 'disabled');


});
