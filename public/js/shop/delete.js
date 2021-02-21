$(document).ready(function () {
    $('#dynamic-table')
    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
            ajax: {
                url: "/dashboard/all/shops",
                dataSrc: 'data'
            },
            bAutoWidth: false,
            "aoColumns": [
                { data: 'id' },
                { data: 'name' },
                { data: 'address' },
                { data: 'phone' },
                /*{
                    data: null,
                    defaultContent: "<a data-edit=\'\' class=\'btn btn-success\'>Edit</a>"
                }*/
                //{ data: null, title: 'Action', wrap: true, "render": function (item) { return '<div class="btn-group"> <a href="{{ route(shop.edit, "'+item.id+'") }}" data-id="'+item.id+'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a><a data-id="\'+item.id+\'" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></div>' } },

            ],
            "aaSorting": [],


            //"bProcessing": true,
            //"bServerSide": true,
            //"sAjaxSource": "http://127.0.0.1/table.php"	,

            //,
            //"sScrollY": "200px",
            //"bPaginate": false,

            //"sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

            //"iDisplayLength": 50


            select: {
                style: 'single'
            },

        } );
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