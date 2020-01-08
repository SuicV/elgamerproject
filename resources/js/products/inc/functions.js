function animateScroll(parent, to){
    $(parent).animate({
        scrollTop : $(to).offset().top-60
    },1000);
}
/**
 * @function addPriceRange
 * @desc display selected prices
 * @param {Integer} min min value
 * @param {Integer} max max value
 * */
export function addPriceRange(min,max){
    $("#price-range").html(`<span>${min} DH</span> - <span>${max} DH</span>`);
}

/**
 * @function getProducts
 * @desc function to get filtered products with ajax and inject them in products section
 * @param {string} url page to call with ajax
 * @param page pagination page
 * */
export function getProducts(url, page){
    $.ajax({
            method : "POST",
            data : $("#product-filter").serialize()+"&page="+page,
            dataType: "json",
            url : url,
        }
    ).done(function(data){
        if(data.count == 0){
            $("#products").html(`<div class="alert alert-danger text-center w-100"><strong>Ooops ! </strong>Acune Produit Trouvé</div>`);
            $("#pagiantion").html("");
            return ;
        }
        $("#products").html(data.html);
        $("#pagiantion").html(data.links);
        animateScroll("html","#products");
        $("#pagiantion a").on("click", function(e){
            e.preventDefault();
            getProducts('http://el-gamer.com/produits', parseInt(e.target.href.split("?page=")[1]))
        });
    }).fail(function(response){
        alert("Ooops un erreur occure");
    });
}

/**
 * @function addAjaxDefault
 * @desc function to add click event to pagination links
 * */
export function addAjaxDefault(){

    $("#pagiantion a").on("click", function(e){
        e.preventDefault();
        $.ajax({
            method : "GET",
            url : 'http://el-gamer.com/produits?page='+parseInt(e.target.href.split("?page=")[1]),

        }).done(function(data){
            $("#products").html(data.html);
            $("#pagiantion").html(data.links);
            animateScroll("html","#products");
            addAjaxDefault();
        }).fail(function(response){
            console.error("getting products is fails");
        })
    });
}

export function removeAutoComplition(){
    $("#auto-completion").addClass("d-none");
    $("#auto-completion").children().remove();
}

export function getComments(product,page){
    $.ajax({
        method:"post",
        url : "/comment/"+product,
        data: {'page':page},
    }).done(function(data){
        $("#comments-section").html(data.html);
        $("#comments-section .links a").on("click", function(e){
            e.preventDefault();
            getComments($("input[name='p']").attr("value"), parseInt(e.target.href.split("?page=")[1]));
            animateScroll("html", $("#comments-section"))
        })
    }).fail(function(error){
        alert("un erreur occure");
    })
}