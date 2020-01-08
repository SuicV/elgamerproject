@extends("default", ["title"=>"Home::El-Gamer","css"=>"welcome", "active"=>"home"])
@section('content')
    <section role="banner" class="jumbotron jumbotron-fluid d-flex">
        <div class="filter"></div>
        <div style="z-index: 1000;" class="container align-self-center">
            <h1 id="top-banner-title" class="display-3 text-center">El-Gamer<span>vos assure</span></h1>
            <div class="row">
                <div class="text-center col-md-4 px-1 py-2 border-right quality-element">
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <p>Prouduits de bon qualité</p>
                </div>
                <div class="text-center col-md-4 px-1 py-2 border-right quality-element">
                    <div class="icon">
                        <i class="fas fa-parachute-box"></i>
                    </div>
                    <p>livraison avec durée resonable</p>
                </div>
                <div class="text-center col-md-4 px-1 py-2 quality-element">
                    <div class="icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <p>service client disponible 7j/24h</p>
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
            @include("products/inc/display_products",["products"=>$products])
        </div>
    </section>
@endsection
