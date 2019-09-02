// search field in index.html.twig

module.export = require("functions");


function emptyForm() {
    document.getElementById("zoeken").reset();
}


$(document).ready(function(){
    
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            
        });
    });
});


// flash message
setTimeout(function() {
    $('.flash-success').fadeOut('slow');
}, 5000); // <-- time in milliseconds



console.log("Functions loaded");