<div id="products" class="row">
    @foreach($products as $product)
        <a href="{{route("produits.get",["id"=>$product->id])}}" class="px-1 col-12 col-md-4 my-3 product-container">
            <div class="product-container border h-100">
                <div class="img-product text-center">
                    <img class="img-fluid product-image" src="{{ asset("imgs/".$product->image) }}" alt="">
                </div>
                <div class="product-inf mt-2 mx-2">
                    <h5 class="product-title text-center">{{ Str::title($product->title) }}</h5>
                    <p class="product-descr">{{ Str::limit($product->description, 50, "...") }}</p>
                    <p class="product-price">Prix : <span class="proudct-price-number">{{ $product->price }} DH</span></p>
                </div>
            </div>
        </a>
    @endforeach
</div>