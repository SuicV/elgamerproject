@section("modals")
    <section>
        <div class="modal fade" id="success-chart-add" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Panier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Le Produit a bien été ajouter</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuer le  shopping</button>
                        <a href="{{route('chart')}}" type="button" class="btn btn-primary">Aller au panier</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@show
