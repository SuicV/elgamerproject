
/**
 * @function getHtmlProduct
 * @desc create an html text for products got from ajax request
 * @param products array of products
 * @return {string} html text of products
 * */
export function getHtmlProduct(products){
    let html = '';
    products.forEach(function(product){
        html += `<a href="http://el-gamer.com/produits/${product.id}" class="col-12 col-md-4 my-3 product-container">
                            <div class="product-container border">
                                <div class="img-product text-center">
                                    <img class="img-fluid product-image" src="http://el-gamer.com/imgs/${product.image}" />
                                </div>
                                <div class="product-inf mt-2 mx-2">
                                    <h5 class="product-title text-center">${product.title}</h5>
                                    <p class="product-descr">${product.description.substr(0,50)} ...</p>
                                    <p class="product-price">Prix : <span class="proudct-price-number">${product.price }DH</span></p>

                                </div>
                            </div>
                        </a>`;
    });
    return html ;
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
 * @function paginationLinks
 * @desc function to generate html for pagination links
 * @param {Integer} min minimum page
 * @param {Integer} max maximal page
 * @param {Integer} selected selected page
 * @return {string} html to inject
 * */
export function paginationLinks(min, max, selected){
    if(min === max){
        return "";
    }
    let pagHtml = `<nav><ul class="pagination">`;
    if(min === selected){
        pagHtml += `<li class="page-item disabled" aria-disabled="true" aria-label="« Précédent">
                    <span class="page-link" aria-hidden="true">‹</span>
                </li>`;
    }else{
        pagHtml += `<li class="page-item" aria-disabled="true" aria-label="« Précédent">
                    <a href="http://el-gamer.com/produits?page=${selected-1}" rel="prev" class="page-link">‹</a>
                </li>`;
    }
    for(let i = min; i <= max; i++){
        if(i === selected){
            pagHtml += `<li class="page-item active" aria-current="page">
                                        <span class="page-link">${i}</span>
                                    </li>`;
        }else{
            pagHtml += `<li class="page-item">
                                        <a href="http://el-gamer.com/produits?page=${i}" class="page-link">${i}</a>
                                    </li>`;
        }

    }
    if(max === selected){
        pagHtml += `<li class="page-item disabled" aria-disabled="true" aria-label="Suivant »">
                    <span class="page-link" aria-hidden="true">›</span>
                </li>`;
    }else{
        pagHtml += `<li class="page-item" aria-disabled="true" aria-label="Suivant »">
                    <a href="http://el-gamer.com/produits/?page=${selected+1}" rel="next" class="page-link">›</a>
                </li>`;
    }

    return pagHtml;
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
        if(data.data.length === 0){
            $("#products").html(`<div class="alert alert-danger text-center w-100"><strong>Ooops ! </strong>Acune Produit Trouvé</div>`);
            $("#pagiantion").html("");
            return ;
        }
        $("#products").html(getHtmlProduct(data.data));
        $("#pagiantion").html(paginationLinks(1, data.last_page, data.current_page));
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
            $("#products").html(getHtmlProduct(data.data));
            $("#pagiantion").html(paginationLinks(1, data.last_page, data.current_page));
            addAjaxDefault();
        }).fail(function(response){
            console.log(response);
            console.error("getting products is fails");
        })
    });
}
