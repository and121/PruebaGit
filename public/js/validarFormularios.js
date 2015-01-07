
$('#crear-Usuario').bootstrapValidator({
    	message: 'Este campo no es valido.',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
        	nombre: {
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede ser vacío.'
                    }
                }
            },
            apellido: {
                validators: {
                    notEmpty: {
                         message: 'Este campo no puede ser vacío.'
                    }
                }
            },
            email:{
            	validators: {
                    notEmpty: {
                         message: 'Este campo no puede ser vacío.'
                    },
                    emailAddress: {
                        message: 'No es una dirección de email valida.'
                    }
                }
            },
           	password: {
                validators: {
                    notEmpty: {
                        message: 'Este campo no puede ser vacío.'
                    },
                    different: {
                        field: 'nombre',
                        message: 'La contraseña no puede ser igual que el nombre'
                    },
                    stringLength: {
                    	min: 6,
                        message: 'La contraseña debe ser mayor 6 caracteres'
                    },
                }
            },
            password_confirmation: {
                validators: {
                    notEmpty: {
                       message: 'Este campo no puede ser vacío.'
                    },
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas no son identicas'
                    },
                    different: {
                        field: 'nombre',
                        message: 'La contraseña no puede ser igual que el nombre'
                    },
                    stringLength: {
                    	min: 6,
                        message: 'La contraseña debe ser mayor 6 caracteres'
                    },
                }
            },
		}
	});	        