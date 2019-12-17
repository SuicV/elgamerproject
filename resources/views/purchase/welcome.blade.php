@extends("default",["title"=>"Commander vos produits::El-gamer","css"=>"purchase/welcome"])
@section("content")
    <section role="banner" class="jumbotron jumbotron-fluid d-flex">
        <div class="container align-self-center">
            <h1 id="top-banner-title" style="font-width: bold;" class="display-3 text-center">Compléter la commande</h1>
        </div>
    </section>
    <section class="container pb-5">
        <div class="command-title">
            <p>Vous devez compléter la formulaire au-dessous pour confirmer votre achat, un code de vente sera générer et ce dernier que vous devez envoyer avec le vairment banquaire</p>
            <p>en cas de probleme vous pouvez nos contacter par cette <a href="{{route("contact-us")}}">formulaire</a></p>
        </div>
        @if(count($errors))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Woops ! il y a des error dans vos information</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route("purchase")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="fullName">Nom Complete</label>
                <input value="{{ old("fullName") }}" type="text" name="fullName" id="fullName" class="form-control" placeholder="Nom et Prénom">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ old('email') }}" type="text" name="email" id="email" class="form-control" placeholder="test@testdomain.com" >
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input value="{{ old('telephone') }}" type="text" class="form-control" id="telephone" name="phone" placeholder="0612345678">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input value="{{old('address')}}" type="text" class="form-control" id="address" name="address" placeholder="Marrakech Boulivarde Abde El-karim El-khatabi FST">
            </div>
            <div class="form-group">
              <label for="rib">RIB de votre compte bancaire</label>
              <input value="{{old('rib')}}" type="text" name="rib" id="rib" class="form-control" placeholder="RIB">
            </div>
            <div class="form-group text-right">
                <button class="btn btn-outline-success">Confirmé L'achate</button>
            </div>
        </form>
    </section>
@endsection
