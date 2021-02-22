$(document).ready(function () {
    $formCreate = $('#formCreate');
    $formCreate.on('submit', sendData)
});

var $formCreate;

function activateTemplate(id) {
    var t = document.querySelector(id);
    return document.importNode(t.content, true);
}

function renderTemplateItem(image, id, name, unitPrice) {

    var clone = activateTemplate('#template-item');
    var url = document.location.origin;
    var url_image = url + '/images/products/'+image;
    clone.querySelector("[data-setbg]").setAttribute('data-setbg', url_image) ;
    clone.querySelector("[data-heart]").setAttribute('href', url+'/product/heart/'+id);
    clone.querySelector("[data-cart]").setAttribute('href', url+'/product/cart/'+id);
    clone.querySelector("[data-name]").innerHTML = name;
    clone.querySelector("[data-name]").setAttribute('href', url+'/product/detail/'+id);
    clone.querySelector("[data-price]").innerHTML = unitPrice;

    $('#body-items').append(clone);

    // Esto se puso para que actualicemos el set background de las imagenes
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

}

function sendData() {
    event.preventDefault();
    // Obtener la URL
    var createUrl = $formCreate.data('url');
    $.ajax({
        url: createUrl,
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
                    text: 'Tienda registrada correctamente.',
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
                setTimeout( function () {
                    location.reload();
                }, 4000 )
            }
        }
    });
}