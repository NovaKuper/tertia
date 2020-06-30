$(document).ready(function () {

    $('#table_cont').load('/ajax/data_handler.php');

    $('#add_form').submit(function () {
        $.ajax({
            type: "GET",
            url: "/ajax/data_handler.php?action=add",
            data: $(this).serialize(),
            success: function(data){

                $('#table_cont').html(data);
                console.log(data);
            }
        });
        return false;
    });

//     $('tr:has(input)').each(function () {
//
// // var a= this.find('input').eq(0)).val();
//
//         var $(this).find("input:eq(1)").val();
//         console.log(a);
//
//     });
});