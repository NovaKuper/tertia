$('#table_cont tr.element').click(function () {
    $.ajax({
        type: 'GET',
        url: '/ajax/data_handler.php?action=del&row_id=' + $(this).attr('row_id'),
        success: function (data) {
            $('#table_cont').html(data);
            $('#float_notice').hide();
        }
    });
    return false;
});

$("#table_cont tr.element").mouseover(
    function (pos) {
        $.ajax({
            type: 'GET',
            url: '/ajax/data_handler.php?action=notice&row_id=' + $(this).attr('row_id'),
            success: function (data) {
                $('#float_notice').html(data).show().css('left', (pos.pageX + 10) + 'px').css('top', (pos.pageY + 10) + 'px');
            }
        });
        return false;
    }
).mouseleave(function () {
    $('#float_notice').hide();
});
