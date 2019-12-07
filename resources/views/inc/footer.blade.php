@section("footer")
  <footer id="main-footer" class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4 class="footer-section-title">Location</h4>
          <div class="mapouter" style="width:100%; heigth:800px">
            <div class="gmap_canvas" style="width:100%;">
              <iframe style="width=100%;heigth:100%;" id="gmap_canvas" src="https://maps.google.com/maps?q=fst%20marrakech&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0"
               scrolling="yes" marginheight="0" marginwidth="0"></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h4 class="footer-section-title">Informations</h4>
          <ul class="list-style-none">
            <li><a href="">Method de payment</a></li>
            <li><a href="">Nos Regle</a></li>
            <li><a href="">Proccess de payment</a></li>
            <li><a href="">A propos</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h4 class="footer-section-title">Contacter nous</h4>
          <form action="{{ route('contact-us') }}" method="get">
            <div class="form-group">
              <input type="text" name="nom" id="contact-name" class="form-control" placeholder="Nom">
            </div>
            <div class="form-group">
              <input type="email" name="email" id="contact-email" class="form-control" placeholder="email">
            </div>
            <button type="submit" class="btn btn-primary">Continue</button>
          </form>
        </div>
      </div>
    </div>
  </footer>
@show