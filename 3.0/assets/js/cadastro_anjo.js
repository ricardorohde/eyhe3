let part1 = $("#part1");
let part2 = $("#part2");
let part3 = $("#part3");
let part4 = $("#part4");
let part5 = $("#part5");
let part6 = $("#part6");
let part7 = $("#part7");
let One = $("#numberOne");
let Two = $("#numberTwo");
let Three = $("#numberThree");
let Four = $("#numberFour");
let Five = $("#numberFive");
let Six = $("#numberSix");
let Seven = $("#numberSeven");

$(document).ready(function() {
    $("#cont").on("click", function() {
        if(part1.hasClass("classBlock")) {
            part1.removeClass("classBlock");
            part1.addClass("classNone");
            One.removeClass("mark");
            One.addClass("normalLast");
            part2.removeClass("classNone");
            part2.addClass("classBlock");
            Two.removeClass("normal");
            Two.addClass("mark");
        } else if(part2.hasClass("classBlock")) {
            part2.removeClass("classBlock");
            part2.addClass("classNone");
            Two.removeClass("mark");
            Two.addClass("normalLast");
            part3.removeClass("classNone");
            part3.addClass("classBlock");
            Three.removeClass("normal");
            Three.addClass("mark");
        } else if(part3.hasClass("classBlock")) {
            part3.removeClass("classBlock");
            part3.addClass("classNone");
            Three.removeClass("mark");
            Three.addClass("normalLast");
            part4.removeClass("classNone");
            part4.addClass("classBlock");
            Four.removeClass("normal");
            Four.addClass("mark");
        } else if(part4.hasClass("classBlock")) {
            part4.removeClass("classBlock");
            part4.addClass("classNone");
            Four.removeClass("mark");
            Four.addClass("normalLast");
            part5.removeClass("classNone");
            part5.addClass("classBlock");
            Five.removeClass("normal");
            Five.addClass("mark");
        } else if(part5.hasClass("classBlock")) {
            part5.removeClass("classBlock");
            part5.addClass("classNone");
            Five.removeClass("mark");
            Five.addClass("normalLast");
            part6.removeClass("classNone");
            part6.addClass("classBlock");
            Six.removeClass("normal");
            Six.addClass("mark");
        } else if(part6.hasClass("classBlock")) {
            part6.removeClass("classBlock");
            part6.addClass("classNone");
            Six.removeClass("mark");
            Six.addClass("normalLast");
            part7.removeClass("classNone");
            part7.addClass("classBlock");
            Seven.removeClass("normal");
            Seven.addClass("mark");
        } 
    });
});