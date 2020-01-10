<header class="container">
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
</header>
<nav class="navbar navbar-expand-sm navbar-dark navbar-bg">
    <div class="container">
        <div class="container px-0">
            <a class="navbar-brand" href="{{ route('home') }}">El-Gamer</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><span>Information</span><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span>Achats</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}"><span>Déconnecter</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>