$(document).ready(function() {
    $("#one").on("click", function() {
        $("#amount").css("display","flex");
        $("#method").css("display","none");
        $("#confirmation").css("display","none");
    });
    
    $("#dois").on("click", function() {
        $("#method").css("display","flex");
        $("#amount").css("display","none");
        $("#confirmation").css("display","none");
    });
    
    $("#tres").on("click", function() {
        $("#confirmation").css("display","flex");
        $("#amount").css("display","none");
        $("#method").css("display","none");
    });

    $("#credito").on("click", function() {
        $("#sobDeb").css("display","none");
        $("#sobBol").css("display","none");
        $("#sobPix").css("display","none");
        $("#sobCred").css("display","flex");
        $("#sobCred").css("opacity",0.5);
        $("a.btn").removeClass("btn-grey");
        $("a.btn").addClass("btn-blue");
        $("a.btn").attr("onclick","mostrarCred()");
    }); 
    
    
    
    $("#pix").on("click", function() {
        $("#sobDeb").css("display","none");
        $("#sobBol").css("display","none");
        $("#sobCred").css("display","none");
        $("#sobPix").css("display","flex");
        $("#sobPix").css("opacity",0.5);
        $("a.btn").removeClass("btn-grey");
        $("a.btn").addClass("btn-blue");
        $("a.btn").attr("onclick","mostrar()");
    }); 

    $("#debito").on("click", function() {
        $("#sobPix").css("display","none");
        $("#sobBol").css("display","none");
        $("#sobCred").css("display","none");
        $("#sobDeb").css("display","flex");
        $("#sobDeb").css("opacity",0.5);
        $("a.btn").removeClass("btn-grey");
        $("a.btn").addClass("btn-blue");
        $("a.btn").attr("onclick","mostrarDeb()");
    }); 
    
    $("#boleto").on("click", function() {
        $("#sobDeb").css("display","none");
        $("#sobPix").css("display","none");
        $("#sobCred").css("display","none");
        $("#sobBol").css("display","flex");
        $("#sobBol").css("opacity",0.5);
        $("a.btn").removeClass("btn-grey");
        $("a.btn").addClass("btn-blue");
        $("a.btn").attr("onclick","mostrar()");
    }); 

});

function mostrarCred() {
    document.getElementById("amount").style.display = "none";
    document.getElementById("method").style.display = "none";
    document.getElementById("confirmation").style.display = "flex";
}
function mostrarDeb() {
    document.getElementById("amount").style.display = "none";
    document.getElementById("method").style.display = "none";
    document.getElementById("confirmation").style.display = "flex";
    document.getElementById("credit").style.display = "none";
    document.getElementById("debit").style.display = "flex";
}
