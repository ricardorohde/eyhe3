$(document).ready(function() {
    if(screen.width > 768) {
        $("#verPerfil").on("click", function() {
            $("#cardMain").css("display","none");
            $("#cardPerfil").toggle();
        });
    
        $("#close").on("click", function() {
            $("#cardPerfil").css("display","none");
        });
    
        $("#close1").on("click", function() {
            $("#cardMain").css("display","none");
            $("#cardCartao").css("display","none");
        });
    
        $("#close2").on("click", function() {
            $("#cardPag").css("display","none");
        });
    
        $("#reenviar").on("click", function() {
            if(document.getElementById("cardPerfil").style.display == "block") {
                document.getElementById("cardPerfil").style.display = "none";
            }
            $("#cardMain").toggle();
            $("#cardCartao").toggle();
        });
    
        $("#pagCred").on("click",function() {
            $("#cardPag").toggle();
        });    
    
    }
    if(screen.width < 768) {
        $("#verPerfil").on("click", function() {
            $("#cardChat").css("display","none");
            $("#cardPerfil").css("display","block");
        });

        $("#reenviar").on("click", function() {
            $("#cardChat").css("display","none");
            $("#cardCartao").css("display","block");
            $("#cardMain").css("display","block");
        });

        $("#pagCred").on("click", function() {
            $("#cardCartao").css("display","none");
            $("#cardPag").css("display","block");
        });

        $("#close").on("click", function() {
            $("#cardChat").css("display","block");
            $("#cardPerfil").css("display","none");
        });

        $("#close1").on("click", function() {
            $("#cardChat").css("display","flex");
            $("#cardCartao").css("display","none");
            $("#cardMain").css("display","none");
        });
        
        $("#close2").on("click", function() {
            $("#cardPag").css("display","none");
            $("#cardCartao").css("display","block");
        });
    }
});