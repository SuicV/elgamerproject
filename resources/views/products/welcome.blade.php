@extends('../default',["title"=>"Produits::El-Gamer","css"=>"produits/welcome"])
@section('content')
    <section role="banner" class="jumbotron jumbotron-fluid d-flex">
        <div class="container align-self-center">
            <h1 id="top-banner-title" class="display-3 text-center">Nos Produits</h1>
        </div>
    </section>
    <section class="container">
        <aside class="row">
            <div class="col-sm-3">
                <ul>
                @foreach($categories as $category)
                    <li>
                        <p>{{ $category->name }}</p>
                        <ul>
                            @foreach($category->subCategories()->get() as $subCat)
                            <li>{{ $subCat->name }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    @foreach($products as $product)
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
            </div>
        </aside>
    </section>
@endsection
