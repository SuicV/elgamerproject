<div class="row justify-content-center">
    <div class="col-12 col-sm-4 col-md-4 text-center rate">
        @php($rate = round($product->comments->avg('rating'),1))
        @php($commentsCount = $product->comments->count())
        <h2 class="rate-number">{{ $rate }} <span>/5</span></h2>
        <div class="rate-stars">
            @for($i = 1 ; $i<=5 ; $i++)
                @if($i <= round($rate))
                    <i class="fas fa-star"></i>
                @else
                    <i class="far fa-star"></i>
                @endif
            @endfor
        </div>
        <div class="rate-totale">{{ $commentsCount }} <i class="far fa-user"></i></div>
    </div>
    <div class="col-12 col-sm-5 col-md-5 stat-rate">
        @for($i=5; $i >= 1; $i--)
            @php($rateCount = $product->comments->where('rating','=',$i)->count())
            <div class="star">
                <span>{{$i}} <i class="fas fa-star"></i> ({{$rateCount}})</span>
                <progress class="w-75" min="0" value="{{ $rateCount }}" max="{{ $commentsCount }}"></progress>
            </div>
        @endfor
    </div>
</div>