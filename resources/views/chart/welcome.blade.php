@extends("default",["title"=>"Panier::El-Gamer","css"=>"chart/welcome"])

@section("content")
    <section style="min-height: 100vh;" class="container py-5">
        <h2 id="page-title" class="pb-3">Votre Panier</h2>
        <div id="chart-products">
            @php($priceTotal = 0)
            @if(empty($chartProducts))
                <div class="alert alert-primary"><p>Votre Panier est vide</p></div>
            @else
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
                        @foreach($chartProducts as $product)
                            @php($priceTotal += $chartQuantities[$product->id] * $product->price)
                            <tr class="product-item">
                                <td><img style="max-height: 150px" src="/imgs/{{$product->image}}" class="img-fluid"/></td>
                                <td ><h4 style="min-width: 300px;">{{ $product->title }}</h4></td>
                                <td><span>{{$product->price}} DH</span></td>
                                <td><input type="number" class="form-control" min="1" step="1" value="{{$chartQuantities[$product->id]}}"></td>
                                <td><p style="min-width: 80px;" class="m-0"><span>{{$product->price*$chartQuantities[$product->id]}}</span> DH</p></td>
                                <td><button class="btn btn-outline-danger"><i class="fa fa-close"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4" CLASS="text-right">Montant a payer</td>
                            <td colspan="2">{{$priceTotal}} DH</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection
