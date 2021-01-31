$(document).ready(function () {
    $formDelete = $('#formDelete');
    $formDelete.on('submit', sendData);

    $modalDelete = $('#modalDelete');
    $('[data-delete]').on('click', openModal)
});

var $formDelete;
var $modalDelete;

function openModal() {
    var id = $(this).data('delete');
    var name = $(this).data('name');
    var address = $(this).data('address');
    var phone = $(this).data('phone');

    // Si es input se usa .val()
    $modalDelete.find('[id=id_shop]').val(id);
    // Si es cualquier otra etiqueta se usa .html
    $modalDelete.find('[id=nameDelete]').html(name);
    $modalDelete.find('[id=addressDelete]').html(address);
    $modalDelete.find('[id=phoneDelete]').html(phone);

    $modalDelete.modal('show');
}

function sendData() {
    event.preventDefault();
    // Obtener la URL
    var deleteUrl = $formDelete.data('url');
    $.ajax({
        url: deleteUrl,
        method: 'POST',
        data: new FormData(this),
        processData:false,
        contentType:false,
        success: function (data) {
            console.log(data);
            if (data != "") {
                for ( var property in data )  {
                    $.toast({
                        text:data[property],
                        showHideTransition: 'slide',
                        bgColor: '#D15B47',
                        allowToastClose: false,
                        hideAfter: 4000,
                        stack: 10,
                        textAlign: 'left',
                        position: 'top-right',
                        icon: 'error',
                        heading: 'Error'
                    })
                }
            } else {
                $.toast({
                    text: 'Tienda eliminada correctamente.',
                    showHideTransition: 'slide',
                    bgColor: '#629B58',
                    allowToastClose: false,
                    hideAfter: 4000,
                    stack: 10,
                    textAlign: 'left',
                    position: 'top-right',
                    icon: 'success',
                    heading: 'Éxito'
                });
                $modalDelete.modal('hide');
                setTimeout( function () {
                    location.reload();
                }, 4000 )
            }
        }
    });
}