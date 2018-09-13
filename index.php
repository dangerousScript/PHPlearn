<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users list</title>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/listusers/css/font-awesome.min.css?v=1536827640" rel="stylesheet">
    <link href="/listusers/css/bootstrap.min.css" rel="stylesheet">
    <link href="/listusers/css/custom.css" rel="stylesheet">
    <link href="/listusers/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- navigation bar -->
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul id="w1" class="nav navbar-nav">
                <li class="active"><a href="/listusers/">Users</a></li>
                <li><a href="/listusers/todo_list.php">Create ToDo List</a></li>
            </ul>       
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="p-b">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createUserModal">Add user</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addBalanceModal">Add balance</button>
                <li class="pull-right p-b">
                    <div class="input-group" style="width: 350px;">
                        <input type="text" class="form-control" id="querySearch" placeholder="Search users">
                        <span class="input-group-btn">
                             <button type="submit" class="btn btn-default" id="find_user"><span class="fa fa-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                </li>
            </li>
        </ul>

        <!-- list of users -->
        <span id="print_result"></span>     <!-- ispisemo uspesnu/neuspesnu poruku nakon akcije -->
        <div id="list_users"></div>         <!-- ako ima user-a izlistamo ih sve -->
        <!-- end of list -->
    </div>

    <!-- create user Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add user</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input class="form-control" type="text" id="usernameNew" require>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="text" id="emailNew" require>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Skype</label>
                        <input class="form-control" type="text" id="skypeNew">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="password" id="passwordNew" require>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary has-spinner" name="addUser" id="addUser" data-dismiss="modal">Add user</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- add balance Modal -->
    <div class="modal fade" id="addBalanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add balance</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input class="form-control" type="text" id="usernameBalance" require>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Amount</label>
                        <input class="form-control" type="text" id="amountBalance" require>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary has-spinner" name="addBalance" id="addBalance" data-dismiss="modal">Add balance</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- scripte za obradu podataka iz db -->
    <script type="text/javascript">
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
    </script>
    <!-- kraj za scripte -->
</body>
</html>