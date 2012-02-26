
// Form labels hiden bij input

$(document).ready(function(){
 
    $("form input")
        .bind("focus.labelFx", function(){
            $(this).prev().hide();
        })
        .bind("blur.labelFx", function(){
            $(this).prev()[!this.value ? "show" : "hide"]();
        })
        .trigger("blur.labelFx");
});





