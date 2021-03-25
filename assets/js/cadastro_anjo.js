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
            //if($.trim($("#name").val()) == "") {
              //  alert("preencha todos os campos");}
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
                $("#cont").css("display","none");
                $("#enviar").css("display","block");
            } 
        });
        $(One).on("click", function() {
            part1.removeClass("classNone");
            part1.addClass("classBlock");
            One.removeClass("normalLast");
            One.addClass("mark");
            $("#enviar").css("display","none");
            $("#cont").css("display","block");
            part2.addClass("classNone");
            part3.addClass("classNone");
            part4.addClass("classNone");
            part5.addClass("classNone");
            part6.addClass("classNone");
            part7.addClass("classNone");
            Two.removeClass("mark");
            Three.removeClass("mark");
            Four.removeClass("mark");
            Five.removeClass("mark");
            Six.removeClass("mark");
            Seven.removeClass("mark");
            Two.addClass("normalLast");
            Three.addClass("normalLast");
            Four.addClass("normalLast");
            Five.addClass("normalLast");
            Six.addClass("normalLast");
            Seven.addClass("normalLast");
        });
        
        $(Two).on("click", function() {
            part2.removeClass("classNone");
            part2.addClass("classBlock");
            Two.removeClass("normalLast");
            Two.addClass("mark");
            $("#enviar").css("display","none");
            $("#cont").css("display","block");
            part1.addClass("classNone");
            part3.addClass("classNone");
            part4.addClass("classNone");
            part5.addClass("classNone");
            part6.addClass("classNone");
            part7.addClass("classNone");
            One.removeClass("mark");
            Three.removeClass("mark");
            Four.removeClass("mark");
            Five.removeClass("mark");
            Six.removeClass("mark");
            Seven.removeClass("mark");
            One.addClass("normalLast");
            Three.addClass("normalLast");
            Four.addClass("normalLast");
            Five.addClass("normalLast");
            Six.addClass("normalLast");
            Seven.addClass("normalLast");
        });

        $(Three).on("click", function() {
            part3.removeClass("classNone");
            part3.addClass("classBlock");
            Three.removeClass("normalLast");
            Three.addClass("mark");
            $("#enviar").css("display","none");
            $("#cont").css("display","block");
            part1.addClass("classNone");
            part2.addClass("classNone");
            part4.addClass("classNone");
            part5.addClass("classNone");
            part6.addClass("classNone");
            part7.addClass("classNone");
            One.removeClass("mark");
            Two.removeClass("mark");
            Four.removeClass("mark");
            Five.removeClass("mark");
            Six.removeClass("mark");
            Seven.removeClass("mark");
            One.addClass("normalLast");
            Two.addClass("normalLast");
            Four.addClass("normalLast");
            Five.addClass("normalLast");
            Six.addClass("normalLast");
            Seven.addClass("normalLast");
        });
        
        $(Four).on("click", function() {
            part4.removeClass("classNone");
            part4.addClass("classBlock");
            Four.removeClass("normalLast");
            Four.addClass("mark");
            $("#enviar").css("display","none");
            $("#cont").css("display","block");
            part1.addClass("classNone");
            part2.addClass("classNone");
            part3.addClass("classNone");
            part5.addClass("classNone");
            part6.addClass("classNone");
            part7.addClass("classNone");
            One.removeClass("mark");
            Two.removeClass("mark");
            Three.removeClass("mark");
            Five.removeClass("mark");
            Six.removeClass("mark");
            Seven.removeClass("mark");
            One.addClass("normalLast");
            Two.addClass("normalLast");
            Three.addClass("normalLast");
            Five.addClass("normalLast");
            Six.addClass("normalLast");
            Seven.addClass("normalLast");
        });
        
        $(Five).on("click", function() {
            part5.removeClass("classNone");
            part5.addClass("classBlock");
            Five.removeClass("normalLast");
            Five.addClass("mark");
            $("#enviar").css("display","none");
            $("#cont").css("display","block");
            part1.addClass("classNone");
            part2.addClass("classNone");
            part4.addClass("classNone");
            part3.addClass("classNone");
            part6.addClass("classNone");
            part7.addClass("classNone");
            One.removeClass("mark");
            Two.removeClass("mark");
            Four.removeClass("mark");
            Three.removeClass("mark");
            Six.removeClass("mark");
            Seven.removeClass("mark");
            One.addClass("normalLast");
            Two.addClass("normalLast");
            Four.addClass("normalLast");
            Three.addClass("normalLast");
            Six.addClass("normalLast");
            Seven.addClass("normalLast");
        });
        
        $(Six).on("click", function() {
            part6.removeClass("classNone");
            part6.addClass("classBlock");
            Six.removeClass("normalLast");
            Six.addClass("mark");
            $("#enviar").css("display","none");
            $("#cont").css("display","block");
            part1.addClass("classNone");
            part2.addClass("classNone");
            part4.addClass("classNone");
            part5.addClass("classNone");
            part3.addClass("classNone");
            part7.addClass("classNone");
            One.removeClass("mark");
            Two.removeClass("mark");
            Four.removeClass("mark");
            Five.removeClass("mark");
            Three.removeClass("mark");
            Seven.removeClass("mark");
            One.addClass("normalLast");
            Two.addClass("normalLast");
            Four.addClass("normalLast");
            Five.addClass("normalLast");
            Three.addClass("normalLast");
            Seven.addClass("normalLast");
        });

        $(Seven).on("click", function() {
            part7.removeClass("classNone");
            part7.addClass("classBlock");
            Seven.removeClass("normalLast");
            Seven.addClass("mark");
            $("#cont").css("display","none");
            $("#enviar").css("display","block");
            part1.addClass("classNone");
            part2.addClass("classNone");
            part4.addClass("classNone");
            part5.addClass("classNone");
            part6.addClass("classNone");
            part3.addClass("classNone");
            One.removeClass("mark");
            Two.removeClass("mark");
            Four.removeClass("mark");
            Five.removeClass("mark");
            Six.removeClass("mark");
            Three.removeClass("mark");
            One.addClass("normalLast");
            Two.addClass("normalLast");
            Four.addClass("normalLast");
            Five.addClass("normalLast");
            Six.addClass("normalLast");
            Three.addClass("normalLast");
        });
});

