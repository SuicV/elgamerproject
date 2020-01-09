@section('header')
	<section class="container">
		<div class="row py-2">
			<div class="col-12 col-sm-6">
				<ul class="inline-list m-0 p-0" id="h-social-links">
					<li><a href="#"><i class="top-header-icons fab fa-facebook-square"></i></a></li>
					<li><a href="#"><i class="top-header-icons fab fa-twitter-square"></i></a></li>
					<li><a href="#"><i class="top-header-icons fab fa-instagram"></i></a></li>
					<li><a href="#" class="text-dark"><i class="top-header-icons fa fa-map"></i></a></li>
				</ul>
			</div>
			<div class="col-12 col-sm-6 text-right">
				<ul class="inline-list p-0 m-0">
					<li class="d-block d-md-inline"><i class="top-header-icons fa fa-mobile"></i><span>Mobile <span class="phone-number">06-5489-96</span></span></li>
					<li class="d-block d-md-inline"><i class="top-header-icons fa fa-phone"></i><span>Service de client <span class="phone-number">06-5489-96</span></span></li>
				</ul>
			</div>
		</div>
	</section>
	<nav class="navbar navbar-expand-sm navbar-dark navbar-bg">
		<div class="container px-0">
			<a class="navbar-brand" href="{{ route('home') }}">El-Gamer</a>
			<div class="navbar-toggler d-lg-none" role="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
					aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-drop-button"></span>
				<span class="navbar-drop-button"></span>
				<span class="navbar-drop-button"></span>
			</div>
			<div class="collapse navbar-collapse justify-content-between" id="collapsibleNavId">
				<div></div>
				<ul class="navbar-nav mt-2 mt-lg-0">
					<li class="nav-item @if($active == 'home' ){{'active'}} @endif">
						<a class="nav-link" href="{{ route('home') }}">Acceuil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @if($active == 'products' ){{'active'}} @endif " href="{{ route('produits') }}">Produits</a>
					</li>
                    <li class="nav-item">
                        <a class="nav-link @if($active == 'contact' ){{'active'}} @endif " href="{{ route('contact-us') }}">Contactez-nous</a>
                    </li>
				</ul>
				<div>
					<div class="d-inline dropdown">
						<button class="btn text-light" type="button" id="user-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  <i class="fas fa-user-alt"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="user-dropdown-button">
							@guest
								<a class="dropdown-item" href="{{ route("register.get") }}" >crée un compte</a>
								<a class="dropdown-item" href="{{ route("login.get") }}" >se connecter</a>
							@endguest
						</div>
					</div>
					@auth
						
					@endauth
                    <a id="chart-link" class="nav-link" href="{{route('chart')}}"><span class="text-light"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <span id="pannier-sum">{{session()->get("chart.totalPrice",0)}} DH</span></span></a>
				</div>
			</div>
		</div>
	</nav>
@show
