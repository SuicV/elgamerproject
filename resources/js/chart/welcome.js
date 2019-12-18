$(document).ready(function(){
    $(".remove-product-form").on("submit",function(e){
        e.preventDefault();
        var el = $(this);
        $.ajax({
            url : 'http://el-gamer.com/panier/'+$(this).find(".remove-product-btn").attr("data-product"),
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
            $("#total-price").text(sumPrices+" DH");
            $("#pannier-sum").text(sumPrices+" DH")
        }).fail(function(response){
            console.log("Erreur Occure");
        });
    });
});
