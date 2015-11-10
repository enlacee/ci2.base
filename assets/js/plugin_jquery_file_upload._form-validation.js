
/**
 * Formvalidation
 * Validamos el formulario
 */
$(function() {
  $("#form")
	.formValidation({
      framework: 'bootstrap',
      icon: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          names: {
              validators: {
                  notEmpty: {
                      message: 'The name name is required'
                  }
              }
          },
          email: {
              validators: {
                  notEmpty: {
                      message: 'The email address is required'
                  },
                  emailAddress: {
                      message: 'The input is not a valid email address'
                  }
              }
          },
          image: {
              validators: {
                  notEmpty: {
                      message: 'The Image is required'
                  }
              }
          },
          'dni[]': {
              validators: {
                  notEmpty: {
                      message: 'The DNI is required'
                  }
              }
          },
          'documents[]': {
              validators: {
                  notEmpty: {
                      message: 'The Documents name is required'
                  }
              }
          }
      }
  })
  .on('success.form.fv', function(e) {
      // Prevent form submission
      e.preventDefault();

      var $form    = $(e.target),
          formData = new FormData(),
          params   = $form.serializeArray(),
          files    = $form.find('[name="uploadedFiles"]')[0].files;

      $.each(files, function(i, file) {
          // Prefix the name of uploaded files with "uploadedFiles-"
          // Of course, you can change it to any string
          formData.append('uploadedFiles-' + i, file);
      });

      $.each(params, function(i, val) {
          formData.append(val.name, val.value);
      });

      $.ajax({
          url: $form.attr('action'),
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          type: 'POST',
          success: function(result) {

          }
      });
  });
});
