@extends("default",["title"=>$product->title."::El-Gamer","css"=>"produits/details"])

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
                        <p><h5 class="d-inline">Prix : </h5><span class="number">{{$product->price}} DH</span></p>
                    </div>
                    <div class="add-to-bag">
                        <form action="{{route('chart.store')}}" method="post">
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
                            <p class="mb-0"><span>Prix :</span> <span>{{$pr->price}}DH</span></p>
                        </div>
                    </a>
                @endforeach
        </div>
        @endif
    </section>
@endsection
@section("scripts")
    <script type="text/javascript">
        $("#product-image").on("click",function(){
            var img = $(this).clone();
            var element = $(`<div id="img-zoomed" style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; background: rgba(0,0,0,.5);text-align: center; overflow: scroll;">
            <div id="close" style="position: fixed; right: 1.3rem; font-size: 1.5rem;cursor: pointer;"><i style="color: black;" class="fa fa-close"></i></div>
            </div>
            `);
            img.css("maxHeight" , "");
            img.css("verticalAlign" , "center");
            img.removeClass("img-fluid");
            element.append(img);
            $("body").append(element);
            $("body").css("overflow","hidden");
            $("#close>i").on("click", function(){
                $("body").css("overflow","scroll");

                $("#img-zoomed").remove();
            });
        });
    </script>
    @endsection
