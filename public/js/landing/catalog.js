$(document).ready(function () {

    $.get('/landing/get/products/', function (resp) {
        console.log(resp);
        $products = resp;
        $.each(resp, function (key, product) {
            renderTemplateProducts(product.id, product.name, product.unit_price, product.images[0].image, product.categories[0]);
        })
    });

    //$(document).on('click', '[data-image]', );
});

var $products;

function renderTemplateProducts(idProduct, nameProduct, priceProduct, imageProduct, categoryProduct) {
    var clone = activateTemplate('#template-product');

    var url = document.location.origin;
    var url_image = url + '/images/product/'+imageProduct;
    clone.querySelector("[data-heart]").setAttribute('data-heart', idProduct) ;
    clone.querySelector("[data-detail]").setAttribute('href', url+'/product/detail/'+idProduct);
    clone.querySelector("[data-image]").setAttribute('src', url_image);
    clone.querySelector("[data-name]").innerHTML = nameProduct;
    clone.querySelector("[data-price]").innerHTML = priceProduct;
    clone.querySelector("[data-category]").innerHTML = categoryProduct;

    $('#body-products').append(clone);


}

function activateTemplate(id) {
    var t = document.querySelector(id);
    return document.importNode(t.content, true);
}
