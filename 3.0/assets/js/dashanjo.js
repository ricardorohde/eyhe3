$(document).ready(function(){
    $("#verde").on('click', function() {
        $("#vermelho").css("opacity","0");
        $("#verde").css("opacity","1");
        $("#on").html("Status: Online");
    });
    $("#vermelho").on('click', function() {
        $("#verde").css("opacity","0");
        $("#vermelho").css("opacity","1");
        $("#on").html("Status: Offline");
    });

    $("#green").on('click', function() {
        $("#red").css("opacity","0");
        $("#green").css("opacity","1");
        $("#online").html("Status: Online");
    });
    $("#red").on('click', function() {
        $("#green").css("opacity","0");
        $("#red").css("opacity","1");
        $("#online").html("Status: Offline");
    });
});

$("#py4").on("click", function() {
    $("#latest").toggle();
});

$("#timeClose").on("click", function() {
    $(".dica").css("display","none");
});