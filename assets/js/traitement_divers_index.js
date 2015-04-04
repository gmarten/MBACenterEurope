$(document).ready(function(){

    $("#slider-form-error").hide();

    /* Contact form */
    $("#slider-form").submit(function(event) {
        event.preventDefault();

        if($("#slider-name").val()=="" || $("#slider-email").val()=="" || $("#slider-phone").val()=="")
        {
            $("#slider-form-error").show();
        }
        else
        {
            $("#slider-form-error").hide();
            $("#slider-form")[0].submit();
        }
    });
});