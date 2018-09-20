<?php
    require_once '../functions/config.php';

    $output = '';

    $sqlquery = "SELECT * FROM tbl_todo ORDER BY id DESC";
    $result = mysqli_query($connect, $sqlquery);

    $output .= '
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>';

    if (mysqli_num_rows($result) > 0) {
        $output .= '<tbody>';
        while ($row = mysqli_fetch_array($result)) {
            if ($row['status'] == 0) { // pending
                $output .= '
                <tr class="pending">
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>Pending</td>
                    <td colspan="2" style="width: 50px;"><button class="btn btn-xs btn-default" id="finishTodo" data-id1="'. $row['id'] .'">Finish</button>&nbsp;<button class="btn btn-xs btn-warning" id="cancelTodo" data-id1="'. $row['id'] .'">Cancel</button></td>
                </tr>';
            } else if ($row['status'] == 1) {
                $output .= '
                <tr class="completed">
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>Completed</td>
                    <td colspan="2" style="width: 50px;"><button class="btn btn-xs btn-default" disabled>Finish</button>&nbsp;<button class="btn btn-xs btn-warning" disabled>Cancel</button></td>
                </tr>';
            } else {
                $output .= '
                <tr class="canceled">
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>Canceled</td>
                    <td colspan="2" style="width: 50px;"><button class="btn btn-xs btn-default" disabled>Finish</button>&nbsp;<button class="btn btn-xs btn-warning" disabled>Cancel</button></td>
                </tr>';
            }
        }
        $output .= '</tbody>';
    } else {
        $output .= '
        <tbody>
            <tr>
                <td colspan="4">TODO list is empty.</td>
            </tr>
        </tbody>';
    }

    $output .= '</table>';
    echo $output;