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
    <link href="/listusers/css/custom-table.css" rel="stylesheet">
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
                <li><a href="/listusers/">Users</a></li>
                <li><a href="/listusers/todo_list.php">Create ToDo List</a></li>
                <li><a href="/listusers/services.php">Services</a></li>
                <li class="active"><a href="/listusers/new_order.php">New Order</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <span id="order_result"></span>     <!-- ispisemo uspesnu/neuspesnu poruku nakon akcije -->
                <div class="well">
                    <!-- list of services & categories -->
                    <form action="neworder_funcs/create_order.php" action="post" id="order-form">
                        <div class="form-group">
                            <label for="order-category" class="control-label">Category</label>
                            <select class="form-control" id="order-category" name="order-category">
                            <?php
                                require_once 'functions/config.php';
                                $sqlquery = "SELECT * FROM tbl_category WHERE status = 1 ORDER BY id DESC";
                                $result = mysqli_query($connect, $sqlquery);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- end of list -->
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src=""></script>
</body>
</html>