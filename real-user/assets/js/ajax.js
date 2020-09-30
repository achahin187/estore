$(function() {

    $("#some").keyup(function() {

        var someData = $('#some').val();
        var ByJson = {
            'text': someData
        };
        $.ajax({
            url: 'progres.php',
            type: 'post',
            data: ByJson,

            erroe: function() {},
            success: function(any) {
                $('.slider-area').html(any);
            }

        });
        return false;

    });
});