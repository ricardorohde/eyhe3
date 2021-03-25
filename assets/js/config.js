$(document).ready(function(){
    let green = $("#Verde");
    let red = $("#Vermelho");
    red.on("click", function() {
        green.css("opacity","0");
        red.css("opacity","1");
    });
    green.on("click", function() {
        red.css("opacity","0");
        green.css("opacity","1");
    });

    let green1 = $("#Verde1");
    let red1 = $("#Vermelho1");
    red1.on("click", function() {
        green1.css("opacity","0");
        red1.css("opacity","1");
    });
    green1.on("click", function() {
        red1.css("opacity","0");
        green1.css("opacity","1");
    });

    let green2 = $("#Verde2");
    let red2 = $("#Vermelho2");
    red2.on("click", function() {
        green2.css("opacity","0");
        red2.css("opacity","1");
    });
    green2.on("click", function() {
        red2.css("opacity","0");
        green2.css("opacity","1");
    });
});
