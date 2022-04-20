$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        if($('#sidebar').hasClass( "active" )){
            $("#wrapper").css({ "overflow": "hidden" });
        }
        else $("#wrapper").css({ "overflow": "auto" });
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
var proQty = $('.pro-qty');
proQty.prepend('<span class="dec qtybtn">-</span>');
proQty.append('<span class="inc qtybtn">+</span>');
proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    $button.parent().find('input').val(newVal)
    const rowId = $button.parent().find('input').data('rowid');
    updateCart(rowId, newVal);
})
//<![CDATA[
function updateCart(rowId, qty) {
    $.ajax({
        type: "GET",
        url: "gio-hang/update",
        data: {
            rowId: rowId,
            qty: qty
        },
        success: function (response) {

            console.log(response);
            location.reload();
        },
        error: function (error) {
            alert('Lỗi')
            console.log(error);
        }

    })
}
$(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var od_id = $(this).val();
        // alert(od_id);
        // console.log(od_id);
        $.ajax({
            type: "GET",
            url: "edit_order/" + od_id,
            success: function (response) {
                console.log(response.order);
                $('#status').val(response.order.status)
                $('#full_name').val(response.order.full_name);
                $('#od_id').val(od_id);
                // $('#full_name').val(response.order.full_name);

            }
        });

    });
})