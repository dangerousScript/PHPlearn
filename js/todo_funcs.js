$(document).ready(function () {
    function print_todo_list() {
        $.ajax({
            url: '/phplearn/todo_func/print_todo.php',
            method: 'POST',
            success: function (data) {
                $('#todo_list').html(data);
            }
        });
    }
    // ispis liste
    print_todo_list();

    // dodavanje novog u listu
    $('#addToDo').click(function () {
        var title = $('#titleNew').val();
        var description = $('#descriptionNew').val();

        $.ajax({
            url: '/phplearn/todo_func/add_todo.php',
            method: 'POST',
            data: {title: title, description: description},
            dataType: 'text',
            success: function (data) {
                $('#print_result2').html("<div class='alert alert-success'>"+data+"</div>");
                print_todo_list();
            }
        });
    });

    // zavrsen TODO
    $(document).on('click', '#finishTodo', function () {
        var idFinish = $(this).data('id1');
        $.ajax({
            url: '/phplearn/todo_func/finish_todo.php',
            method: 'POST',
            data: {idFinish: idFinish},
            dataType: 'text',
            success: function (data) {
                $('#print_result2').html("<div class='alert alert-success'>"+data+"</div>");
                print_todo_list();
            }
        });
    });

    // cancel TODO
    $(document).on('click', '#cancelTodo', function () {
        var idCancel = $(this).data('id1');
        $.ajax({
            url: '/phplearn/todo_func/cancel_todo.php',
            method: 'POST',
            data: {idCancel: idCancel},
            dataType: 'text',
            success: function (data) {
                $('#print_result2').html("<div class='alert alert-danger'>"+data+"</div>");
                print_todo_list();
            }
        });
    });
});