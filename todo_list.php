<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo List</title>
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
                <li class="active"><a href="/phplearn/todo_list.php">Create ToDo List</a></li>
                <li><a href="/phplearn/services.php">Services</a></li>
                <li><a href="/phplearn/new_order.php">New Order</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- content -->
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="p-b">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTODOModal">Create new ToDo</button>
            </li>
        </ul>
        <!-- list of users -->
        <span id="print_result2"></span>     <!-- ispisemo uspesnu/neuspesnu poruku nakon akcije -->
        <div id="todo_list"></div>         <!-- ako ima user-a izlistamo ih sve -->
        <!-- end of list -->
    </div>

    <!-- create TODO Modal -->
    <div class="modal fade" id="createTODOModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add TODO</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <input class="form-control" type="text" id="titleNew" require>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea id="descriptionNew" class="form-control custom-width" rows="3" required="required"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary has-spinner" name="addToDo" id="addToDo" data-dismiss="modal">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- show descripiton Modal -->
    <div class="modal fade" id="showDescriptionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Description</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea id="print_description" class="form-control custom-width" rows="3">
                        </textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary has-spinner" name="addToDo" id="addToDo" data-dismiss="modal" disabled>Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- scripte za obradu podataka iz db -->
    <script src="js/todo_funcs.js"></script>
    <!-- kraj za scripte -->
</body>
</html>