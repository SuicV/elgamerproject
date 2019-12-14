@extends("default",["title"=>"Panier::El-Gamer","css"=>"chart/welcome"])

@section("content")
    <section style="min-height: 100vh;" class="container py-5">
        <h2 id="page-title" class="pb-3">Votre Panier</h2>
        <div id="chart-products">
            <div id="products-table" class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <td>Produit</td>
                            <td>Nom</td>
                            <td style="min-width: 115px;">Prix Unitaire</td>
                            <td>Quantité</td>
                            <td>Prix Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @if(empty($chartProducts))
                        <tr>
                            <td colspan="6" style="text-align: center; font-weight: 300; color: #0E3E61;">
                                <p class="mb-0">Le Panier est vide</p>
                            </td>
                        </tr>
                    @endif
                    @foreach($chartProducts as $product)
                        <tr class="product-item">
                            <td><img style="max-height: 150px" src="/imgs/{{$product->image}}" class="img-fluid"/></td>
                            <td ><h4 style="min-width: 300px;">{{ $product->title }}</h4></td>
                            <td><span>{{$product->price}} DH</span></td>
                            <td class="text-center" style="font-weight: 300; color: #A13200"><span>{{$chartQuantities[$product->id]}}</span></td>
                            <td><p style="min-width: 80px;" class="m-0"><span class="product-total-price">{{$product->price*$chartQuantities[$product->id]}}</span> DH</p></td>
                            <td>
                                <form class="remove-product-form" action="{{ route('chart') }}" method="get">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="remove-product-btn btn btn-outline-danger" data-product="{{$product->id}}"><i class="fa fa-close"></i></button></td>
                                </form>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" CLASS="text-right">Montant a payer</td>
                        <td id="total-price" colspan="2">{{session()->get("chart.totalPrice",0)}} DH</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div>
            <a href="{{route('purchase')}}" class="btn btn-success">Commander <i class="fa fa-shopping-cart"></i></a>
        </div>
    </section>
@endsection

@section("scripts")
    <script type="text/javascript">
        $(".remove-product-form").on("submit",function(e){
            e.preventDefault();
            var el = $(this);
            $.ajax({
                url : '{{ route("chart") }}/'+$(this).find(".remove-product-btn").attr("data-product"),
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
    </script>
@endsection
