$(document).ready(function(e){
    // display image product
    $("#product-image").on("click",function(){
        var img = $(this).clone();
        var element = $(`<div id="img-zoomed" style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; background: rgba(0,0,0,.5);text-align: center; overflow: scroll;">
            <div id="close" style="position: fixed; right: 1.3rem; font-size: 1.5rem;cursor: pointer;"><i style="color: black;" class="fa fa-close"></i></div>
            </div>
            `);
        img.css("maxHeight" , "");
        img.css("verticalAlign" , "center");
        img.removeClass("img-fluid");
        element.append(img);
        $("body").append(element);
        $("body").css("overflow-y","hidden");
        $("#close>i").on("click", function(){
            $("body").css("overflow-y","scroll");

            $("#img-zoomed").remove();
        });
    });
    // add to chart
    $("#add-chart-form").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            url : e.target.action,
            method : "POST",
            data : $(this).serialize()
        }).done(function(data){
            $("#success-chart-add").modal("show");
            $("#pannier-sum").text(data.totalPrice+" DH");
        }).fail(function(response){
            alert("Erreur");
        });
    });
    // add comment with ajax
    $("#add-comment-form").on("submit", function(e){
        e.preventDefault();
        $("#add-comment-form input:not([type='hidden']), #add-comment-form textarea").removeClass('border-danger');
        $("#add-comment-form span[class*='form-error']").remove();
        $.ajax({
            url : e.target.action,
            method : "POST",
            data : $(this).serialize()
        }).done(function(data){
            console.log(data);
            $("#comments-section").html(data.html);
        }).fail(function(error){
            if(error.status === 400){
                let errors = error.responseJSON.errors;
                let fields = ["name","email","comment"];
                fields.forEach((value)=>{
                    if(errors.hasOwnProperty(value)){
                        let input = $(`#add-comment-form input[name='${value}'], #add-comment-form textarea[name='${value}']`);
                        input.addClass("border-danger");
                        input.parent().html(input.parent().html() + `<span class="form-error text-danger">${errors[value]}</span>`);
                    }
                });
            }
        });
    });
});
