<?php $this->load->view("layouts/backend/base/head_top.php"); ?>

<!-- No show head home and closed tag head and open tag body-->
<?php //$this->load->view("layouts/backend/base/head_bottom.php"); ?>
</head>
<body>


<!--Body-->
<?php echo $content_for_layout; ?>
<!--/ body-->

<?php $this->load->view("layouts/backend/base/footer.php"); ?>

<?php $this->load->view("layouts/backend/base/footer_lib.php"); ?>

<script type="text/javascript">

//Star validation
$(document).ready(function() {
    $('#login_form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            user: {
                validators: {
                    notEmpty: {
                        message: 'Obligatorio! Ingrese su nombre de usuario'
                    },
                    stringLength: {
                        min: 5,
                        max: 16,
                        message: 'Ingrese entre 5 y 16 carácteres.'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Obligatorio! Ingrese su contraseña.'
                    },
                    stringLength: {
                        min: 6,
                        message: 'Ingrese al menos 6 caráteres.'
                    }
                }
            }
        }
    });
});
</script>

<?php $this->load->view("layouts/backend/base/footer_closed.php"); ?>

