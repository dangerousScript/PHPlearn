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
    <link href="/phplearn/css/font-awesome.min.css?v=1536827640" rel="stylesheet">
    <link href="/phplearn/css/bootstrap.min.css" rel="stylesheet">
    <link href="/phplearn/css/custom.css" rel="stylesheet">
    <link href="/phplearn/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/phplearn/css/custom-table.css" rel="stylesheet">
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
                <li><a href="/phplearn/">Users</a></li>
                <li><a href="/phplearn/todo_list.php">Create ToDo List</a></li>
                <li class="active"><a href="/phplearn/services.php">Services</a></li>
                <li><a href="/phplearn/new_order.php">New Order</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="p-b">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCategoryModal">Add category</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createServiceModal">Add service</button>
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
                                $getservices = "SELECT * FROM tbl_services WHERE category_id = '".$rows['id']."' ORDER BY id DESC";
                                $result_services = mysqli_query($connect, $getservices);
                                echo '
                                    <tr style="background-color: #899dd6;">
                                        <td colspan="9"><strong>' . $rows['name'] .'</strong> ';
                                        if ($rows['status'] == 0) {
                                            echo '<span class="badge">Disabled</span>';
                                        } else {
                                            echo '<span class="badge">Enabled</span>';
                                        }
                                    echo '</td>
                                    </tr>';
                                    if (mysqli_num_rows($result_services) > 0) {
                                        while($rows_services = mysqli_fetch_array($result_services)) {
                                            /* TODO: izmeniti service type u text */                                            
                                           echo '
                                                <tr>
                                                    <td>'.$rows_services['id'].'</td>
                                                    <td>'.$rows_services['service_name'].'</td>
                                                    <td>'.$rows_services['service_type'].'</td>
                                                    <td>'.$rows_services['provider'].'</td>
                                                    <td>'.number_format($rows_services['service_rate'], 2, '.', '').'</td>
                                                    <td>'.$rows_services['min_quantity'].'</td>
                                                    <td>'.$rows_services['max_quantity'].'</td>
                                                    <td>'.$rows_services['status'].'</td>
                                                </tr>';
                                        }
                                    }
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

    <!-- category modal -->
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

    <!-- services modal -->
    <div class="modal fade" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add service</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-group__service-name">Service name <span class="badge">English US</span></label>
                        <input class="form-control" type="text" id="serviceName" require>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category_select">
                            <?php
                                require_once 'functions/config.php';
                                $sqlquery = "SELECT * FROM tbl_category ORDER BY id DESC";
                                $result = mysqli_query($connect, $sqlquery);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Service type</label>
                        <select class="form-control" id="type_select">
                            <option value="0">Default</option>
                            <option value="1">Custom Comments</option>
                            <option value="2">Mentions</option>
                            <option value="3">Package</option>
                            <option value="4">Comment Likes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Provider</label>
                        <input class="form-control" type="text" id="my_provider" require>
                    </div>

                    <div class="form-group">
                        <label>Rate per 1000</label>
                        <input class="form-control" type="number" id="rate_service" min="0" step="0.001" require>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Min order</label>
                                <input type="number" id="min_qua" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Max order</label>
                                <input type="number" id="max_qua" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-group__service-name">Description <span class="badge">English US</span></label>
                        <textarea class="form-control" id="service_description" rows="7"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary has-spinner" name="addService" id="addService" data-dismiss="modal">Add service</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="js/services_func.js"></script>
</body>
</html>
