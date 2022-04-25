$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $(document).on('click', '.editbtn', function() {
        var od_id = $(this).val();
        // alert(od_id);
        // console.log(od_id);
        $.ajax({
            type: "GET",
            url: "edit_order/" + od_id,
            success: function(response) {
                console.log(response.order);
                $('#status').val(response.order.status)
                $('#full_name').val(response.order.full_name);
                $('#od_id').val(od_id);
                // $('#full_name').val(response.order.full_name);

            }
        });
       
    });
})