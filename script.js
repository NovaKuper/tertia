$(document).ready(function () {

    $('#table_cont').load('/ajax/data_handler.php');

    $('#add_form').submit(function () {
        $.ajax({
            type: "GET",
            url: "/ajax/data_handler.php?action=add",
            data: $(this).serialize(),
            success: function(data){
                $('#add_form')[0].reset();
                $('#table_cont').html(data);
            }
        });
        return false;
    });
});