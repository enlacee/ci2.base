
<?php $this->load->view("layouts/backend/base/head_top.php"); ?>

<?php $this->load->view("layouts/backend/base/head_bottom.php"); ?>

<!--Body-->
<?php echo $content_for_layout; ?>
<!--End body-->

<?php $this->load->view("layouts/backend/base/footer.php"); ?>

<?php $this->load->view("layouts/backend/base/footer_lib.php"); ?>

<script type="text/javascript" src="/assets/backend/lib/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

//Star validation
$(document).ready(function() {
    $('#form').formValidation({
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
                        message: 'Obligatorio!'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Ingrese entre 6 y 20 carácteres.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Obligatorio!'
                    },
                    emailAddress: {
                        message: 'La dirección de correo no es válida.'
                    }
                }
            },
            pais: {
                validators: {
                    notEmpty: {
                        message: 'Obligatorio!'
                    }
                }
            },
            sexo: {
                validators: {
                    notEmpty: {
                        message: 'Obligatorio!'
                    }
                }
            },
            'opciones[]': {
                validators: {
                    notEmpty: {
                        message: 'Obligatorio'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Seleccione una opción'
                    }
                }
            }
        }
    });
});

//Start editor HTLM
tinymce.init({
    selector: "#description"
 });
</script>

<?php $this->load->view("layouts/backend/base/footer_closed.php"); ?>