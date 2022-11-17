
$('.send_save_employees').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");

    event.preventDefault();
    if( $('#email-lists li').length > 0 || $("#tabla_destinatarios [type=checkbox]").is(':checked') ){
        Swal.fire({
            title: '¿Estás seguro que deseas guardar y enviar el personal sorteado?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#144578',
            cancelButtonColor: '#144578',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: '<H1 class="blue_tps font_25" ><i class="fa-solid fa-paper-plane me-2"></i>Enviando el personal sorteado.</H1>',
                    showConfirmButton:false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                });
            }
        });
    }
    else{
        Swal.fire({
            icon: 'error',
            title: '<h1 class="blue_tps font_25" >Debes seleccionar o ingresar al menos un Destinatario.</h1>',
        });
    }
});

$('.delete_users').click(function(event) {
    var form2 =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro que deseas Eliminar a este Usuario?',
        text: 'Se eliminará al usuario de forma permanente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#144578',
        cancelButtonColor: '#144578',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            form2.submit();
        }
    })
});

$(function(){
    $("#email-addresses").multiEmails();
});

$("form").keypress(function(e){
    if(e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
})
