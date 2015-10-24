
/**
 * Function contact form all site center column
 */
$(document).ready(function() {
    $('#formContacto').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {/*
           nombres: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            edad: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            direccion: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            ciudad: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            celular: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            interes: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
            mensaje: {
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            }*/
        }
    })
    .on('err.field.fv', function(e, data) {
    // $(e.target)  --> The field element
    // data.fv      --> The FormValidation instance
    // data.field   --> The field name
    // data.element --> The field element

    // Hide the messages
    data.element
        .data('fv.messages')
        .find('.help-block[data-fv-for="' + data.field + '"]').hide();
    })
    .on('success.form.fv', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
            fv    = $(e.target).data('formValidation');

        //Serialize form
        var form_serialize = $("#formContacto").serialize();

        $.ajax({
            beforeSend: function () {

            },
            cache: false,
            type: "POST",
            dataType: "json",
            url: "home/send_form_contact_all_site",
            data: form_serialize + "&id=" + Math.random(),
            success: function (response) {

                if (response.respuesta == true) {
                    alert(response.mensaje);
                }

                if (response.respuesta == false) {
                    alert(response.mensaje);
                }

            },
            error: function () {
                alert('ERROR GENERAL DEL SISTEMA, INTENTELO MAS TARDE');
            }
        });

        // Then submit the form as usual
        //fv.defaultSubmit();
    });;
});
