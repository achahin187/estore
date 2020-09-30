$(function() {
    $("#some").keyup(function() {
        var someData = $("#some").val();
        var ByJson = {
            text: someData,
        };
        $.ajax({
            url: "progres.php",
            type: "post",
            data: ByJson,

            erroe: function() {},
            success: function(any) {
                $(".slider-area").html(any);
            },
        });
        return false;
    });
});

$(document).ready(function() {
    $("#btn").click(function() {
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            url: "login.php",
            method: "post",
            data: { name: username, pass: password },
            success: function(r) {
                window.location(r);
            },
        });

        return false;
    });
});