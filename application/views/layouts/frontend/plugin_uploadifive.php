<?php $this->load->view("layouts/frontend/plugin/head_top.php"); ?>
<!-- Add styles formvalidation -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lib/formvalidation/dist/css/formValidation.min.css">
<!--/ Add styles formvalidation -->

<!-- Add styles Uploadifive -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/uploadifive-v1.2.2-standard/uploadifive.css">
<!--/ Add styles Uploadifive -->

<?php $this->load->view("layouts/frontend/plugin/head_bottom.php"); ?>

<!--Body-->
<?php echo $content_for_layout; ?>
<!--/ Body-->

<?php $this->load->view("layouts/frontend/plugin/footer.php"); ?>

<?php $this->load->view("layouts/frontend/plugin/footer_lib.php"); ?>


<!-- Add lib form validation -->
<script src="<?php echo base_url(); ?>assets/lib/formvalidation/dist/js/formValidation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/formvalidation/dist/js/framework/bootstrap.min.js"></script>
<!--/ Add lib form validation -->

<!-- Add lib Uploadifive -->
<script src="<?php echo base_url(); ?>assets/lib/uploadifive-v1.2.2-standard/jquery.uploadifive.js" type="text/javascript"></script>
<!--/ Add lib Uploadifive -->


<!--Code javascript and PHP-->
<script>

/**
 * Uploadifive
 * Function input#image
 */
<?php $timestamp = time(); ?>

//Var JS base_url();
var base_url = '<?php echo base_url(); ?>';

$(function() {
    $('#image').uploadifive({
        'method'   : 'post',
        'auto'         : true, //Iniciar subida automaticamente
        'multi'        : false, // Subir múltiples ficheros al servidor
        'removeCompleted' : false, //Remover mensaje al subir fichero
        'queueSizeLimit' : 3, //Máximo de ficheros que puede tener en la cola a la vez
        'uploadLimit'  : 3, //máximo ficheros que pueden ser subidos
        'buttonClass'  : 'btn-success', //Clase del boton
        'fileSizeLimit' : 1024, //Tamaño máximo del fichero en KB
        'fileType'     : 'jpg|jpeg|png|gif|pdf|xls|doc|docx|xlsx|csv|txt|html', //Tipe de files
        'formData'     : {
            'timestamp' : '<?php echo $timestamp;?>',
            'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
        },
        //Function PHP File
        'uploadScript' : base_url + 'frontend/uploadifive/do_upload',
        //Progress bar
        'onProgress'   : function(file, e) {
          if (e.lengthComputable) {
              var percent = Math.round((e.loaded / e.total) * 100);
          }
          file.queueItem.find('.fileinfo').html(' - ' + percent + '%');
          file.queueItem.find('.progress-bar').css('width', percent + '%');
        },
        //Luego de completarse la subida de ficheros - ServerMsg
        'onUploadComplete' : function(file, data) {
            alert('The file ' + file.name + ' uploaded successfully.');
        },
        'onError'      : function(errorType) {
            alert('The error was: ' + errorType);
        },
        //Get name file uploaded
        'onAddQueueItem' : function(file) {
          //$('input#name').val( file.name );
        }
    });
});





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
