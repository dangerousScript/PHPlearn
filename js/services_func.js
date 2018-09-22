$(document).ready(function () {
    $('#addCategory').click(function () {
        var categoryName = $('#categoryNew').val();

        $.ajax({
            url: '/listusers/neworder_funcs/create_category.php',
            method: 'POST',
            data: {categoryName: categoryName},
            dataType: 'text',
            success: function (data) {
                $('#print_result3').html("<div class='alert alert-success'>"+data+"</div>");
                $(location).attr('href', '/listusers/services.php');
            }
        });
    });
});