<div id="products">
@for ($i = 0; $i < $products->count()/3; $i++)
    <div class="row">
    @foreach($products->slice($i*3,3) as $product)
            <a href="{{route("produits.get",["id"=>$product->id])}}" class="px-1 col-12 col-md-4 my-3 product-container">
                <div class="product-container border h-100">
                    <div class="img-product text-center">
                        <img class="img-fluid product-image" src="{{ asset("imgs/".$product->image) }}" alt="">
                    </div>
                    <div class="product-inf mt-2 mx-2">
                        <h5 class="product-title text-center">{{ Str::title($product->title) }}</h5>
                        <p class="product-descr">{{ Str::limit($product->description, 50, "...") }}</p>
                        <p class="product-price">Prix : 
                            @if($product->discountprice) 
                                <span class="proudct-price-number product-price-discount">{{ $product->price }} DH</span>
                                <span class="proudct-price-number">
                                    {{ $product->discountprice}} DH
                                </span>
                            @else
                                <span class="proudct-price-number">{{ $product->price }} DH</span>
                            @endif 
                        
                        </p>
                    </div>
                </div>
            </a>
    @endforeach
    </div>
@endfor
</div>
