$(document).ready(function(){
    $('#pesquisa').focus();
});

// (b) jquery ajax autocomplete implementation
$(document).ready(function() {
    // tell the autocomplete function to get its data from our php script
    $('#pesquisa').autocomplete({
        source: "../painel/engine/autocomplete2.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#pesquisa").val(ui.item.label);
        }
    });
});