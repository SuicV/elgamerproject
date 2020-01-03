@extends("default",["title"=>$product->title."::El-Gamer","css"=>"produits/details","active"=>"products"])
@section("content")
    <section class="container py-5">
        <div id="product-selected">
            <h2 class="title">{{$product->title}}</h2>
            <div class="row">
                <div class="image col-md-6 col-sm-12 col-12">
                    <img id="product-image" src="/imgs/{{$product->image}}" style="max-height: 400px;" class="img-fluid">
                </div>
                <div class="information col-md-6 col-sm-12 col-12">
                    <div class="category">
                        <p><h5 class="d-inline">Categorie : </h5><span style="text-transform: lowercase; font-weight: 300; color: #A13200;">{{ $product->category->parentCategory->name }} ( {{ $product->category->name }} )</span></p>
                    </div>
                    <div class="price">
                    <p>
                        <h5 class="d-inline">Prix : </h5>
                        <span @if($product->discount) style="color:gray; text-decoration:line-through;" @endif class="number">{{$product->price}} DH</span>
                        @if($product->discount) <span class="number"> {{$product->discount->price}} DH </span>@endif
                    </p>
                    </div>
                    <div class="add-to-bag">
                        <form id="add-chart-form" action="{{route('chart.store')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{$product->id}}" />
                            <div class="form-group text-center">
                                <label for="#quantity">Quantité :</label>
                                <input class="ml-2 w-25 form-control d-inline" id="quantity" type="number" value="1" min="1" step="1" name="quantity">
                                <button type="submit" class="btn btn-outline-success ml-2"><i class="fa fa-shopping-bag"></i> Ajouter Au Panier</button>
                            </div>
                        </form>
                    </div>
                    <div class="description">
                        <header>
                            <h5>Description</h5>
                        </header>
                        <article>
                            <p>{{$product->description}}</p>
                        </article>
                    </div>
                    @if($product->attributes)
                    <div class="attributes">
                        <h5>Fiche Technique</h5>
                        <table class="table table-striped">
                            @foreach($product->attributes as $attr => $value)
                                <tr>
                                    <td class="attr">{{$attr}}</td>
                                    <td class="valu">{{$value}}</td>
                                </tr>
                            @endforeach
                        </table>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if(!$migthLove->isEmpty())
        <div>
            <h3 class="mb-2"><span style="color:#0E3E61; font-weight: bold;" class="mr-2">Produits que vous pouvez</span><i class="text-danger fa fa-heart"></i></h3>
        </div>
        <div id="products-might-liked" class="row text-center mb-5">
                @foreach($migthLove as $pr)
                    <a href="{{ route("produits.get",["id"=>$pr->id]) }}" class="col-md-4 col-sm-2 col-12 border p-3 product-migth-like" style="max-width:250px">
                        <div class="proudct-m-l-image">
                            <img style="max-height: 150px;" class="img-fluid" src="/imgs/{{$pr->image}}">
                        </div>
                        <div class="product-m-l-title">
                            <h5>{{ $pr->title }}</h5>
                            <p class="mb-0"><span>Prix :</span> <span @if($pr->discount) style="color:gray; text-decoration:line-through;" @endif>{{$pr->price}}DH</span>
                                @if($pr->discount)
                                    <span>{{$pr->discount->price}} DH</span>
                                @endif
                            </p>
                        </div>
                    </a>
                @endforeach
        </div>
        @endif
        <section>
            <div id="comments">
                <h4 class="comments-banner">Avis du clients :</h4>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12 add-comment">
                        <h5 class="add-comment-title">Ajouter votre avis</h5>
                        <form id="add-comment-form" action="{{route("comments.store")}}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" value="{{ $product->id }}" name="p" >
                            <div class="form-group">
                                <label for="name">Nom complet :</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="nom complet" />
                            </div>
                            <div class="form-group">
                                <label for="email">adresse email :</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="email" />
                            </div>
                            <div class="form-group" id="rating">
                                <label for="#">rating :</label>
                                <div class="d-inline-block w-100 text-center">
                                    <span class="pr-1"><i class="fas fa-star"></i></span>
                                    <span class="pr-1"><i class="fas fa-star"></i></span>
                                    <span class="pr-1"><i class="fas fa-star"></i></span>
                                    <span class="pr-1"><i class="fas fa-star"></i></span>
                                    <span><i class="far fas fa-star"></i></span>
                                </div>
                                <input type="hidden" value="5" name="rating">
                            </div>
                            <div class="form-group">
                                <label for="comment">commentaire :</label>
                                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control">Commentaire</textarea>
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn btn-outline-primary w-100"><i class="fa fa-paper-plane"></i> Ajouter</button>
                            </div>
                        </form>
                    </div>
                    <div id="comments-section" class="col-md-8 col-sm-12 col-12">
                        @include("products.inc.comments",["comments"=>$product->comments->reverse()])
                    </div>
                </div>
            </div>

        </section>
    </section>
    @include("products.inc.modals")
@endsection
@section("scripts")
    <script src="{{mix('js/products/details.js')}}" type="text/javascript"></script>
    @endsection
