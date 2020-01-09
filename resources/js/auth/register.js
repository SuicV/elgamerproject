$(document).ready(function($){
    $("#register-form").on("submit", function(e){
        e.preventDefault();
        $(this).find("input").removeClass("border-danger")
        $(this).find("span.error").remove()
        $.ajax({
            url: "/inscription",
            method :"post",
            data: $(this).serialize()
        }).done(function(data){
            console.log(data);
        }).fail(function(errors){
            var errorsJson = JSON.parse(errors.responseText)
            fields = ["password","name","email","password_confirmation"]
            fields.forEach(field => {
                if( errorsJson.hasOwnProperty(field)){
                    let input = $("#register-form input[name='"+field+"']");
                    input.addClass("border-danger");
                    input.parent().html(input.parent().html() +
                    "<span class='error text-danger'>"+errorsJson[field][0]+"</span>")
                }
            });
        })
    })
});