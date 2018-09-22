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
                <li class="active"><a href="/listusers/services.php">Services</a></li>
                <li><a href="/listusers/new_order.php">New Order</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="p-b">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCategoryModal">Add category</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createServiceModal" disabled>Add service</button>
                <li class="pull-right p-b">
                    <div class="input-group" style="width: 350px;">
                        <input type="text" class="form-control" id="querySearch" placeholder="Search">
                        <span class="input-group-btn">
                             <button type="submit" class="btn btn-default" id="find_user"><span class="fa fa-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                </li>
            </li>
        </ul>

        <!-- list of users -->
        <span id="print_result3"></span>     <!-- ispisemo uspesnu/neuspesnu poruku nakon akcije -->
        <div id="list_services">
            <table class="table">
                <thead>
                    <th></th>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Type</th>
                    <th>Provider</th>
                    <th>Rate</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        require_once 'functions/config.php';
                        $sqlquery = "SELECT * FROM tbl_category ORDER BY id DESC";
                        $result = mysqli_query($connect, $sqlquery);
                        $row = mysqli_num_rows($result);

                        if ($row > 0) {
                            echo '<tbody>';
                            while ($rows = mysqli_fetch_array($result)) {
                                echo '
                                    <tr style="background-color: #899dd6;">
                                        <td colspan="10"><strong>' . $rows['name'] .'</strong> ';
                                        if ($rows['status'] == 0) {
                                            echo '<span class="badge">Disabled</span>';
                                        } else {
                                            echo '<span class="badge">Enabled</span>';
                                        }
                                    echo '</td>
                                    </tr>';
                            }

                            echo '</tbody>';
                        } else {
                            echo '<tr><td colspan="10">Categories not found!</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- end of list -->
    </div>

    <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add category</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-group__service-name">Category name <span class="badge">English US</span></label>
                        <input class="form-control" type="text" id="categoryNew" require>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary has-spinner" name="addCategory" id="addCategory" data-dismiss="modal">Add category</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="js/services_func.js"></script>
</body>
</html>