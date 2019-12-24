@extends('../default',["title"=>"Produits::El-Gamer","css"=>"produits/welcome", "active"=>"products"])
@section('content')
    <section role="banner" class="jumbotron jumbotron-fluid d-flex">
        <div style="background: rgba(239,255,253,0.4); border-radius: 15%;" class="container align-self-center">
            <h1 id="top-banner-title" style="font-width: bold;" class="display-3 text-center">Nos Produits</h1>
            <p style="font-weight: 400;" class="lead text-center">Vous aller Trouver tous nos produit et vous pouvez les filtrer</p>
        </div>
    </section>
    <section class="container py-5">
        <div class="row">
            <aside class="col-12 col-sm-5 col-md-3">
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
                        <input class="range w-100" type="range" value="{{ $prices['max'] }}"min="{{ $prices["min"] }}" max="{{$prices["max"]}}" name="max-price" id="max-price">
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
                        <input class="range w-100" value="{{ $prices['min'] }}" type="range" min="{{ $prices["min"] }}" max="{{$prices["max"]}}" name="min-price" id="min-price">
                    </div>
                    <div id="price-range"></div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-outline-primary w-100">Filtrer</button>
                    </div>
                </form>
            </aside>
            <article class="col-12 col-sm-7 col-md-9">
                @include('products/inc/display_products', ["products"=>$products])
                <div class="row justify-content-center">
                    <div id="pagiantion">{{ $products->links() }}</div>
                </div>
            </article>
        </div>
    </section>
@endsection

@section("scripts")
    <script src="{{mix('js/products/welcome.js')}}" type="text/javascript"></script>
    @endsection