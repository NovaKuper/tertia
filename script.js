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
        var $this = $(this),
            nav = $this.attr('nav');

        $('thead th').attr('nav', '');
        if (nav == 'ASC'){
            nav = 'DESC';
            $this.attr('nav', 'DESC');
        } else if (nav == 'DESC') {
            nav = '';
            $this.attr('nav', '');
        } else {
            nav = 'ASC';
            $this.attr('nav', 'ASC');
        }

        $.ajax({
            type: 'GET',
            url: '/ajax/data_handler.php?action=sort&col_id=' + $this.attr('col_id') + '&nav=' + nav,
            success: function (data) {
                $('#table_cont').html(data);
            }
        });
        return false;
    });

});