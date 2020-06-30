$(document).ready(function () {

    $('#table_cont').load('/ajax/data_handler.php');

    $('#add_form').submit(function () {
        $.ajax({
            type: "GET",
            url: "/ajax/data_handler.php?action=add",
            data: $(this).serialize(),
            success: function (data) {
                $('#add_form')[0].reset();
                $('#table_cont').html(data);
            }
        });
        return false;
    });

    $('table thead th').click(function () {
        $.ajax({
            type: 'GET',
            url: '/ajax/data_handler.php?action=sort&col_id=' + $(this).attr('col_id'),
            success: function(data){
                console.log(data);
                $('#table_cont').html(data);
            }
        });
        return false;
    });

});