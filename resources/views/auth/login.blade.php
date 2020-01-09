@extends("default", ["title"=>"crée un compte::El-Gamer","css"=>"auth/register", "active"=>"home"])
@section("content")
    <section role="banner" class="jumbotron">
        <h2 class="display-4 text-center">se connecter ici</h2>
    </section>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <form action="{{ route('login.attempt') }}" method="post">
                    @csrf
                    <div class="from-group">
                        <label for="email">adresse email</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de pass</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-success w-100" type="submit"><i class="fas fa-paper-plan"></i> Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection