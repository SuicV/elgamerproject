(function(){
    // requiring function file
    let funcs=require("./inc/functions");
    /* Events */
    // add default event to pagination links
    funcs.addAjaxDefault();

    // add event on submit of filter form
    $("#product-filter").on("submit",function(e){
        e.preventDefault();
        funcs.getProducts('http://el-gamer.com/produits', 1);
    });

    // add change event on prices range input
    let oldMinPrice = $("#min-price").val(), oldMaxPrice = $("#max-price").val();
    $("input[type='range']").on("change",function(e){
        maxPrice = $("#max-price");
        minPrice = $("#min-price");
        if(this.id === "min-price"){
            if(this.value <= parseFloat(maxPrice.val())){
                funcs.addPriceRange(this.value, maxPrice.val());
                oldMinPrice = this.value ;
            }else{
                this.value = oldMinPrice;
            }
        }else if(this.id === "max-price"){
            if(this.value >= parseFloat(minPrice.val())){
                funcs.addPriceRange(minPrice.val(), this.value);
                oldMaxPrice = this.value;
            }else{
                this.value = oldMaxPrice;
            }
        }
    });

    // auto completion de recherche
    $("#search").on("keyup", function(e){
        if(!$(this).val()){
            funcs.removeAutoComplition();
            return ;
        }
        if($("#auto-completion").hasClass("d-none")){
            $("#auto-completion").removeClass("d-none");
        }
        $.ajax({
            url : $("#search-form").attr("target"),
            method : "post",
            data : $("#search-form").serialize()
        }).done(function(data){
           $("#auto-completion").html(data.html);
        }).fail(function(e){
            console.log(e);
        });
    });

    $(document).on("click",function(e){
        funcs.removeAutoComplition();
    })
})($);
