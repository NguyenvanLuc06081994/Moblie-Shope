$(document).ready(function () {
    $('.update-product-cart').change(function () {
        let qtyNew = $(this).val();
        let idProduct = $(this).attr('data-id');
        let origin = location.origin;
        console.log(origin)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/carts/update-to-cart/' + idProduct,
            method: 'POST',
            data: {
                qty: qtyNew
            },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                let data = result.productUpdate;
                $('#product-subtotal-' + idProduct).html(data.totalPrice . toLocaleString () + ' VNĐ')
                $('#total-price-cart').html('<strong>' + result.totalPriceCart . toLocaleString () + ' VNĐ' + '</strong>')
            },

        })
    })
})




