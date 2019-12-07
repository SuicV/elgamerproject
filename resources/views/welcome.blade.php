@extends("default", ["title"=>"Home::El-Gamer","css"=>"welcome"])
@section('content')
    <section role="banner" class="jumbotron jumbotron-fluid d-flex">
        <div class="container align-self-center">
            <h1 id="top-banner-title" class="display-3 text-center">El-Gamer<span>vos assure</span></h1>
            <div class="row">
                <div class="text-center col-md-4 quality-element">
                    <h4>Produit</h4>
                </div>
                <div class="text-center col-md-4 quality-element">
                    <h4>livrison</h4>
                </div>
                <div class="text-center col-md-4 quality-element">
                    <h4>service</h4>
                </div>
            </div>
            <p class="lead text-right mt-3">
                <a class="btn btn-lg" href="{{ route("produits") }}" role="button"><i class="fa fa-desktop"></i> voir nos produits</a>
            </p>
        </div>
    </section>
    <section class="container pb-5">
        <div class="row justify-content-center">
            <h3 id="latest-products-title" class="double-border">Nos Dernière Produits</h3>
        </div>
        <div class="row pt-3">
        @foreach($latestProduct as $product)
            <div class="col-12 col-md-4 my-3">
                <div class="product-container border">
                    <div class="img-product text-center">
                        <img class="img-fluid product-image" src="{{ asset("imgs/".$product->image) }}" alt="">
                    </div>
                    <div class="product-inf mt-2 mx-2">
                        <h5 class="product-title text-center">{{ Str::title($product->title) }}</h5>
                        <p class="product-descr">{{ Str::limit($product->description, 50, "...") }}</p>
                        <p class="product-price"><span class="proudct-price-number">{{ $product->price }}</span> <span class="product-price-currency">DH</span></p>
                    </div>
                </div>
            </div>

        @endforeach
        </div>
    </section>
@endsection
