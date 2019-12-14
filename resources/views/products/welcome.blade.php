@extends('../default',["title"=>"Produits::El-Gamer","css"=>"produits/welcome"])
@section('content')
    <section role="banner"style="background :url('/imgs/nvidia-1201077_1280.jpg') no-repeat center center fixed;" class="jumbotron jumbotron-fluid d-flex">
        <div style="background: rgba(239,255,253,0.4); border-radius: 15%;" class="container align-self-center">
            <h1 id="top-banner-title" style="font-width: bold;" class="display-3 text-center">Nos Produits</h1>
            <p style="font-weight: 400;" class="lead text-center">Vous aller Trouver tous nos produit et vous pouvez les filtrer</p>
        </div>
    </section>
    <section class="container py-5">
        <aside class="row">
            <div class="col-sm-3">
                <h5>Filtrer les resultats</h5>
                <form id="product-filter" action="{{ route('produits.search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="cat">Categorie</label>
                        <select class="form-control" name="cat" id="cat">
                            <option value="-1">Tous Les Catégories</option>
                            @foreach($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach($category->subCategories()->get() as $subCat)
                                        <option value="{{ $subCat->id }}">{{ $subCat->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label for="max-price">prix maximale</label>
                        <div style="font-size:.7rem; font-weight: lighter" class="clearfix">
                            <div class="float-left">
                                <span>{{ $prices["min"] }} DH</span>
                            </div>
                            <div class="float-right">
                                <span>{{ $prices["max"] }} DH</span>
                            </div>
                        </div>
                        <input class="w-100" type="range" min="{{ $prices["min"] }}" max="{{$prices["max"]}}" name="max-price" id="max-price">
                    </div>
                    <div class="form-group mb-0">
                        <label for="min-price">prix minimume</label>
                        <div style="font-size:.7rem;font-weight: lighter;" class="clearfix">
                            <div class="float-left">
                                <span>{{ $prices["min"] }} DH</span>
                            </div>
                            <div class="float-right">
                                <span>{{ $prices["max"] }} DH</span>
                            </div>
                        </div>
                        <input class="w-100" type="range" min="{{ $prices["min"] }}" max="{{$prices["max"]}}" name="min-price" id="min-price">
                    </div>
                    <div id="price-range"></div>
                    <button type="submit" class="btn btn-success">Filtrer</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div id="products" class="row">
                    @foreach($products as $product)
                        <a href="{{route("produits.get",["id"=>$product->id])}}" class="px-1 col-12 col-md-4 my-3 product-container">
                            <div class="product-container border">
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
                <div class="row">
                    <div id="pagiantion">{{ $products->links() }}</div>
                </div>
            </div>
        </aside>
    </section>
@endsection


@section("scripts")
    <script type="text/javascript">
        (function(){
            function getHtmlProduct(product){
                return `<a href="{{ route("produits") }}/${product.id}" class="col-12 col-md-4 my-3 product-container">
                            <div class="product-container border">
                                <div class="img-product text-center">
                                    <img class="img-fluid product-image" src="{{ url("imgs") }}/${product.image}" />
                                </div>
                                <div class="product-inf mt-2 mx-2">
                                    <h5 class="product-title text-center">${product.title}</h5>
                                    <p class="product-descr">${product.description.substr(0,50)} ...</p>
                                    <p class="product-price">Prix : <span class="proudct-price-number">${product.price }DH</span></p>

                                </div>
                            </div>
                        </a>`;
            }
            function paginationLinks(min, max, selected){
                if(min === max){
                    return "";
                }
                var pagHtml = `<nav><ul class="pagination">`;
                if(min === selected){
                    pagHtml += `<li class="page-item disabled" aria-disabled="true" aria-label="« Précédent">
                    <span class="page-link" aria-hidden="true">‹</span>
                </li>`;
                }else{
                    pagHtml += `<li class="page-item" aria-disabled="true" aria-label="« Précédent">
                    <a href="{{url("produits")}}?page=${selected-1}" rel="prev" class="page-link">‹</a>
                </li>`;
                }
                for(i = min; i <= max; i++){
                    if(i === selected){
                        pagHtml += `<li class="page-item active" aria-current="page">
                                        <span class="page-link">${i}</span>
                                    </li>`;
                    }else{
                        pagHtml += `<li class="page-item">
                                        <a href="{{url('produits')}}?page=${i}" class="page-link">${i}</a>
                                    </li>`;
                    }

                }
                if(max === selected){
                    pagHtml += `<li class="page-item disabled" aria-disabled="true" aria-label="Suivant »">
                    <span class="page-link" aria-hidden="true">›</span>
                </li>`;
                }else{
                    pagHtml += `<li class="page-item" aria-disabled="true" aria-label="Suivant »">
                    <a href="{{url("produits")}}?page=${selected+1}" rel="next" class="page-link">›</a>
                </li>`;
                }

                return pagHtml;
            }

            function addPriceRange(min,max){
                $("#price-range").html(`<span>${min} DH</span> - <span>${max} DH</span>`);
            }
            var oldMinPrice = $("#min-price").val(), oldMaxPrice = $("#max-price").val();

            function getProducts(url, page){
                $.ajax({
                        method : 'POST',
                        data : $("#product-filter").serialize()+"&page="+page,
                        dataType: "json",
                        url : url,
                    }
                ).done(function(data){
                    if(data.data.length === 0){
                        $("#products").html(`<div class="alert alert-danger text-center w-100"><strong>Ooops ! </strong>Acune Produit Trouvé</div>`);
                        $("#pagiantion").html("");
                        return ;
                    }
                    var html = '';
                    data.data.forEach(function(product){
                        html += getHtmlProduct(product);
                        $("#products").html(html);
                    });
                    pagHtml = paginationLinks(1, data.last_page, data.current_page);
                    $("#pagiantion").html(pagHtml);
                    $("#pagiantion a").on("click", function(e){
                        e.preventDefault();
                        getProducts('{{url("produits")}}', parseInt(e.target.href.split("?page=")[1]))
                    });
                }).fail(function(response){
                    console.log("hello is faild");
                    console.log(response);
                });
            }

            $("#product-filter").on("submit",function(e){
                e.preventDefault();
                getProducts('{{url("produits")}}', 1);
            });
            $("input[type='range']").on("change",function(e){
                maxPrice = $("#max-price");
                minPrice = $("#min-price");
                if(this.id === "min-price"){
                    if(this.value <= parseFloat(maxPrice.val())){
                        addPriceRange(this.value, maxPrice.val());
                        oldMinPrice = this.value ;
                    }else{
                        this.value = oldMinPrice;
                    }
                }else if(this.id === "max-price"){
                    if(this.value >= parseFloat(minPrice.val())){
                        addPriceRange(minPrice.val(), this.value);
                        oldMaxPrice = this.value;
                    }else{
                        this.value = oldMaxPrice;
                    }
                }
            });
        })($);
    </script>
@endsection
