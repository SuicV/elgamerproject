@if( $products->isEmpty())
    <div class="row">
        <div class="col-12 text-center text-dander pt-2">
            <p>Ooops Aucune produit trouvé</p>
        </div>
    </div>
@endif
@foreach($products as $product)
    <a href="{{ route("produits.get",["id"=>$product->id]) }}" class="row border-bottom pt-1" style="text-decoration: none;">
        <div class="col-12 col-md-10">
            <h5 class="product-title">{{ $product->title }}</h5>
        </div>
        <div class="col-12 col-md-2 text-center px-0">
            @if($product->discount)
                <p><span class="product-price-discount">{{ $product->price }} DH</span> <span class="proudct-price-number">{{ $product->discount->price }} DH</span></p>
                @else
                <p><span class="proudct-price-number">{{ $product->price }} DH</span></p>

            @endif
        </div>
    </a>
    @endforeach
