$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // remove product
    $(".remove-product-form").on("submit",function(e){
        e.preventDefault();
        var el = $(this);
        $.ajax({
            url : '/panier/'+$(this).find(".remove-product-btn").attr("data-product"),
            method: "DELETE",
            data : $(this).serialize()
        }).done(function(data){
            el.parent().parent().remove();
            var sumPrices = 0 ;
            $(".product-total-price").each(function(index, element){

                if(!isNaN(parseInt($(element).text()))){
                    sumPrices += parseInt($(element).text());
                }
            });
            if(sumPrices === 0){
                $("#products-table table tbody").html(`<tr>
                        <td colspan="6" style="text-align: center; font-weight: 300; color: #0E3E61;">
                            <p class="mb-0">Le Panier est vide</p>
                        </td>
                    </tr>`);
            }
            $("#total-price, #pannier-sum").text(sumPrices+" DH");
        }).fail(function(response){
            console.log("Erreur Occure");
        });
    });
    // change quantity of product
    $(".controleProduct").on("click", function(){
        var el = $(this);
        var input = el.parent().find("input[type='number']");
        var old = parseInt(input.val());
        
        if(el.text()=="+"){
            input.val(old+1)
        }else if(el.text() =="-" && old > 1){
            input.val(old-1)
        }
        var unitPrice = parseInt(el.parent().parent().find(".unit-price").text());
        if(parseInt(input.val())>= 1){
            $.ajax({
                url :"/panier",
                method :"post",
                data : {"quantity":input.val(),"product_id":el.parent().find("input[name='p']").val()}
            }).done(function(data){
                console.log(data)
                $("#total-price, #pannier-sum").text(data.totalPrice+" DH")
                el.parent().parent().find(".product-total-price").text(unitPrice * input.val())
            }).fail(function(){
                input.val(old)
            });
        }
    })
});
