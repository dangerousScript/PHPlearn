$(document).ready(function () {
    $('#addCategory').click(function () {
        var categoryName = $('#categoryNew').val();

        $.ajax({
            url: '/phplearn/neworder_funcs/create_category.php',
            method: 'POST',
            data: {categoryName: categoryName},
            dataType: 'text',
            success: function (data) {
                $('#print_result3').html("<div class='alert alert-success'>"+data+"</div>");
                $(location).attr('href', '/phplearn/services.php');
            }
        });
    });

    $('#addService').click(function () {
        var servicename = $('#serviceName').val();
        var categoryId = document.getElementById("category_select").value;
        var serviceType = document.getElementById("type_select").value;
        var provider = $('#my_provider').val();
        var price = $('#rate_service').val();
        var min_qua = $('#min_qua').val();
        var max_qua = $('#max_qua').val();
        var serviceDescription = $('#service_description').val();

        $.ajax({
            url: '/phplearn/neworder_funcs/create_service.php',
            method: 'POST',
            data: { servicename: servicename, categoryId: categoryId,
                    serviceType: serviceType, provider: provider,
                    price: price, min_qua: min_qua, max_qua: max_qua,
                    serviceDescription: serviceDescription},
            dataType: 'text',
            success: function (data) {
                $('#print_result3').html("<div class='alert alert-success'>"+data+"</div>");
                $(location).attr('href', '/phplearn/services.php');
            }
        });
    });

    $(document).on('click', '#show_description_serv', function () {
        var id_show_description = $(this).data('id1');
        $('#showDescriptionServiceModal').modal('show');

        $.ajax({
            url: '/phplearn/neworder_funcs/show_service_description.php',
            method: 'POST',
            data: {id_show: id_show_description},
            dataType: 'text',
            success: function (data) {
                $('#print_description_serv').html(data);
            }
        });
    });
});