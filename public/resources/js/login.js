'use strict'

/* --- External functions ---*/
function imprimir (titulo, mensaje, tipo) {
    Swal.fire({
        icon: tipo,
        title: titulo,
        text: mensaje,
        allowOutsideClick: false,
    });
}

function validarEmail(valor) {
    const re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return re.test( valor );
}

$(document).ready(() => {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* --- Loader --- */

    $('.loader').fadeOut('slow/400/fast', () => {
        $('body').removeClass('hidden');
        $('.page-footer').css('bottom', '0');
    });

  /* -- Formulario de Login Part 1 -- */

    $( '#login1' ).submit(event => {

        event.preventDefault( );

		if ($('#email').val() == '')
            imprimir( '¡Ups!', '¡El email es obligatorio!', 'error' );
        else if ($('#password').val() == '')
            imprimir( '¡Ups!', '¡La contraseña no es válida!', 'error' );
		else {
            //validamos el email
            if ( !validarEmail( $( '#email' ).val( ) ) ) {
                imprimir( '¡Ups!', 'El email introducido no es valido' , 'error' );
                return;
            }

            let data = {
                email: $('#email').val(),
                password: $('#password').val(),
            };

            $.ajax({
                url: $('#login1').attr('action'),
                type: 'POST',
                dataType: 'json',
                data: data
            })
            .done( response => {
                window.location.href = `${response.url}`;
            })
            .fail( jqXHR => {
                console.log(jqXHR);
                if (jqXHR.status == 401)
                    imprimir('¡Ups!', jqXHR.responseJSON.message, 'error');
                else
                    imprimir('¡Ups!', 'Ha ocurrido un error desconocido', 'error');
            });
		}
	});

    /* -- Mostrar contraseña -- */

    let visible = false;

    $('#icon').click((event) => {
        if (visible) {
            $( this ).html( '<i class="fas fa-eye"></i>' );
            $( '#password' ).attr( 'type', 'password' );
            visible = false;
        }
        else {
            $( this ).html( '<i class="fas fa-eye-slash"></i>' );
            $( '#password' ).attr( 'type', 'text' );
            visible = true;
        }
    });

});
