$(document).ready(function () {
    function fetch_data() {
        $.ajax({
            url: "/listusers/functions/select.php",
            method: "POST",
            success: function (data) {
                $('#list_users').html(data);
            }
        });
    }
    fetch_data(); /* poziv f-je */
    $(document).on('click', '#btn_active', function () {
        var id = $(this).data('id1');
        if (confirm('Are you sure you want to active this user?')) {
            $.ajax({
                url: '/listusers/functions/active.php',
                method: 'POST',
                data: {id_active: id},
                dataType: 'text',
                success: function (data) {
                    $('#print_result').html("<div class='alert alert-success'>"+data+"</div>");
                    fetch_data();
                }
            });
        }
    });

    $(document).on('click', '#btn_suspend', function () {
        var id = $(this).data('id1');
        if (confirm('Are you sure you want to suspend this user?')) {
            $.ajax({
                url: '/listusers/functions/suspend.php',
                method: 'POST',
                data: {id_suspend: id},
                dataType: 'text',
                success: function (data) {
                    $('#print_result').html("<div class='alert alert-danger'>"+data+"</div>");
                    fetch_data();
                }
            });
        }
    });

    $('#addUser').click(function () {
        var username_new = $('#usernameNew').val();
        var email_new = $('#emailNew').val();
        var skype_new = $('#skypeNew').val();
        var password_new = $('#passwordNew').val();

        $.ajax({
            url: '/listusers/functions/add_user.php',
            method: 'POST',
            data: {username: username_new, email: email_new, skype: skype_new, password: password_new},
            dataType: 'text',
            success: function (data) {
                $('#print_result').html("<div class='alert alert-success'>"+data+"</div>");
                fetch_data();
            }
        });
    });

    $('#find_user').click(function () {
        var search = $('#querySearch').val();

        $.ajax({
            url: '/listusers/functions/find_user.php',
            method: 'POST',
            data: {search: search},
            dataType: 'text',
            success: function (data) {
                $('#list_users').html(data);
            }
        });
    });

    $('#addBalance').click(function () {
        var amount = $('#amountBalance').val();
        var username = $('#usernameBalance').val();

        $.ajax({
            url: '/listusers/functions/add_balance.php',
            method: 'POST',
            data: {amount: amount, username: username},
            dataType: 'text',
            success: function (data) {
                $('#print_result').html("<div class='alert alert-success'>"+data+"</div>");
                fetch_data();
            }
        });
    });

    $(document).on('click', '#show_active', function () {
        $.ajax({
            url: '/listusers/functions/show_active.php',
            method: 'POST',
            success: function (data) {
                $('#list_users').html(data);
            }
        });
    });

    $(document).on('click', '#show_all', function () {
        fetch_data();
    });

    $(document).on('click', '#show_suspended', function () {
        $.ajax({
            url: '/listusers/functions/show_suspended.php',
            method: 'POST',
            success: function (data) {
                $('#list_users').html(data);
            }
        });
    });
});