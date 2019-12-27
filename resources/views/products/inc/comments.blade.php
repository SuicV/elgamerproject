@if($comments->isEmpty())
    <div class="alert alert-warning">
        <p class="mb-0 text-center">aucune avis trouvé pour ce produit</p>
    </div>
@endif
@foreach($comments as $comment)
    <div class="comment-container">
        <div class="comment-info">
            <p class="mb-1"><span class="comment-owner">{{$comment->name}}</span>  <span class="comment-time">{{$comment->created_at}}</span></p>
        </div>
        <div class="comment-content">
            <p class="pl-4">{{$comment->comment}}</p>
        </div>
    </div>
@endforeach
