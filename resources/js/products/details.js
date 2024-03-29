$(document).ready(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var getComments = require("./inc/functions").getComments;
    getComments($("input[name='p']").attr('value'),1);
    // display image product
    $("#product-image").on("click",function(){
        var img = $(this).clone();
        var element = $(`<div id="img-zoomed" style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; background: rgba(0,0,0,.4);text-align: center; overflow: scroll;">
                <div id="close" style="position: relative; height:1.5rem; left:0; right:0;font-size: 1.2rem;cursor: pointer;">
                    <i style="color: white; position: absolute; right:15px;" class="fas fa-times"></i>
                </div>
                <div margin-top:1.5rem; class="image-container"></div>
            </div>
            `);
        img.css("maxHeight" , "");
        img.css("verticalAlign" , "center");
        img.removeClass("img-fluid");
        $("body").append(element);
        element.find(".image-container").html(img);
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
            $("#statistics").html(data.rate);
            $("#success-comment-add").modal("show");
            getComments($("input[name='p']").attr('value'),1);
        }).fail(function(error){
            if(error.status === 400){
                let errors = error.responseJSON.errors;
                let fields = ["name","email","comment","rating"];
                fields.forEach( value=>{
                    if(errors.hasOwnProperty(value)){
                        let input = $(`#add-comment-form input[name='${value}'], #add-comment-form textarea[name='${value}']`);
                        input.addClass("border-danger");
                        input.parent().html(input.parent().html() + `<span class="form-error text-danger">${errors[value]}</span>`);
                    }
                });
            }
        });
    });
    // rating system
    $('#rating .fa-star').on('click', function(e){
        let stars = $('#rating .fa-star'), found = false ;
        let clicked = $(this);
        stars.each(function(index,element){
            if(found){
                $(this).removeClass("fas");
                $(this).addClass("far")
            }else {
                $(this).removeClass("far");
                $(this).addClass("fas");
            }
            if($(this).is(clicked)){
                found = true ;
                $("input[name='rating']").attr("value",index+1);
            }
            
        });
    });
});
