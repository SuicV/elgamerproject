@extends("user.default", ["title"=>"Mes Information::El-Gamer","css"=>"user/dashboard"])
@section('content')
    <section class="jumbotron text-center" role="banner">
        <h4 class="display-4">Changer Vos information</h4>
    </section>
    <section class="container pb-5">
        <div class="row">
            <div class="col-md-7">
                <form action="{{ route('dashboard.store') }}" method="post">
                    <p>Information Générale</p>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom Complet</label>
                        <input type="text" value="{{ Auth::user()->name }}" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-success disabled">Changer</button>
                    </div>
                </form>
                <form action="{{ route('dashboard.store') }}" method="post">
                    <p>changer le password</p>
                    @csrf
                    <div class="form-group">
                        <label for="oldpassword">Ancien Mot de pass</label>
                        <input type="password" name="old_password" id="oldpassword" class="form-control">
                    </div>
                    <div class="from-group">
                        <label for="password">Nouvel mot de pass</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmation de mot de pass</label>
                        <input type="password" name="password_confirmation" id="password_confiramtion" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger disabled">Changer le mot de pass</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <form action="{{ route('dashboard.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="image">image de profile</label>
                        <input type="file"name="image" id="image" class="d-none">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection