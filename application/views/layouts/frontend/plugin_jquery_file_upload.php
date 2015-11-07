<?php $this->load->view("layouts/frontend/plugin/head_top.php"); ?>

<!-- Add styles file upload -->
<link href="<?php echo base_url(); ?>assets/lib/" type="text/css" rel="stylesheet">
<!--/ Add styles file upload -->

<?php $this->load->view("layouts/frontend/plugin/head_bottom.php"); ?>

<!--Body-->
<?php echo $content_for_layout; ?>
<!--/ Body-->

<?php $this->load->view("layouts/frontend/plugin/footer.php"); ?>

<?php $this->load->view("layouts/frontend/plugin/footer_lib.php"); ?>

<!--Code javascript and PHP-->
<script>

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

</script>
<!--/Code javascript and PHP-->


<?php $this->load->view("layouts/frontend/plugin/closed_footer.php"); ?>
