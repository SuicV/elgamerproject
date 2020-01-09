@extends("default", ["title"=>"crée un compte::El-Gamer","css"=>"auth/register", "active"=>"home"])

@section("content")
    <div id="root" class="pb-5">
        <section class="jumbotron text-center" role="banner">
            <h1 class="display-4">Crée votre compte</h1>
        </section>
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h3 class="text-center double-border">formulaire d'inscription</h3>
                    <form id="login-form" action="{{ route("register.store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="#name">Nom Complet</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="#email">Adresse Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="#password">Mot de pass</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirmer le mot de pass</label>
                            <input type="password" id="cpassword" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-success w-100" type="submit">
                                <i class="far fa-paper-plane"></i><span>Crée compte</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection