@extends('default', ["title" => "Contacter-nous::El-Gamer", "css"=>"contact", "active"=>'contact'])
@section('content')
    <section role="banner" class="jumbotron jumbotron-fluid d-flex">
        <div class="container align-self-center">
            <h1 id="top-banner-title" class="display-3 text-center">Contactez-Nous</h1>
            <p class="lead mt-3">vous avez des question des problemes dans notre service ou des idées a partagé dans le domain de gaiming, partager le avec nous</p>
        </div>
    </section>
    <section class="container mb-4">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Formulaire de Contact</h4>
                <form action="{{ route('contact-us.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" value="{{ Request::get('nom')}}" name="name" id="name" class="form-control" placeholder="Nom" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ Request::get('email') }}" class="form-control" name="email" id="email"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="Subject">Sujet</label>
                        <input type="text" name="subject" id="Subject" class="form-control" placeholder="Sujet" >
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="3">Message</textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> Envoyer</button>
                </form>
            </div>
            <aside class="col-md-6">
                <h4 class="text-center">Nos Contact</h4>
                <ul>
                    <li><i class="fas fa-mobile pr-2"></i>Mobile : 06-1548-6448</li>
                    <li><i class="fa fa-phone pr-2"></i>Service de clients : 06-1548-6448</li>
                    <li><i class="fas fa-envelope pr-2"></i>Email : contact@elgamer.com</li>
                </ul>
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
                @if(session()->has("success"))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session("success") }}</strong>
                    </div>
                @endif
            </aside>
        </div>
    </section>
@endsection
