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
                            <td >
                                <h4 class="product-title" style="min-width: 300px;">
                                    <a href="{{route('produits.get',["id"=>$product->id])}}">{{ $product->title }}</a>
                                </h4>
                            </td>
                            <td><span class="unit-price">{{$product->getPrice()." DH"}}</span></td>
                            <td class="text-center" style="font-weight: 300; color: #A13200; min-width:170px;">
                                <button class="btn btn-outline-warning controleProduct" style="font-weight:bold;">-</button>
                                <input type="hidden" name="p" value="{{ $product->id }}">
                                <input style="width:50px;" min="1" step="1" type="number" value="{{$chartQuantities[$product->id]}}" />
                                <button class="btn btn-outline-success controleProduct" style="font-weight:bold;">+</button>
                            </td>
                            <td><p style="min-width: 80px;" class="m-0"><span class="product-total-price">{{$product->getPrice()*$chartQuantities[$product->id]}}</span> DH</p></td>
                            <td>
                                <form class="remove-product-form" action="{{ route('chart') }}" method="get">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="remove-product-btn btn btn-outline-danger" data-product="{{$product->id}}"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
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
    <script src='{{ mix("js/chart/welcome.js") }}'type="text/javascript"></script>
@endsection
