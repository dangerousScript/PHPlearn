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
    <link href="/listusers/css/font-awesome.min.css" rel="stylesheet">
    <link href="/listusers/css/bootstrap.min.css" rel="stylesheet">
    <link href="/listusers/css/custom.css" rel="stylesheet">
    <link href="/listusers/css/bootstrap-datetimepicket.css" rel="stylesheet">
    <link href="/listusers/css/bootstrap-select.min.css" rel="stylesheet">
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
            </ul>       
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="p-b">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createUserModal" disabled>Add user</button>
            </li>
        </ul>

        <!-- list of users -->
        <span id="print_result"></span>     <!-- ispisemo uspesnu/neuspesnu poruku nakon akcije -->
        <div id="list_users"></div>         <!-- ako ima user-a izlistamo ih sve -->
        <!-- end of list -->
    </div>

    <!-- scripte za obradu podataka iz db -->
    <script type="text/javascript">
        $(document).ready(function () {
            function fetch_data() {
                $.ajax({
                    url: "select.php",
                    method: "POST",
                    success: function (data) {
                        $('#list_users').html(data);
                    }
                });
            }
            fetch_data(); /* poziv f-je */
        });
    </script>
    <!-- kraj za scripte -->
</body>
</html>