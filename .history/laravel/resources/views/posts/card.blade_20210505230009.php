<div class="card mb-5">
    <div class="card-header text-center bg-dark text-white">
        <span class="font-weight-bold">ID　</span>{{ $post->id }}
    </div>
    <div class="card-body">
        <div class="card-title">
            <i class="fas fa-user-circle"></i><span class="font-weight-bold"> 投稿者</span>
            <a href="{{ route('users.show', $post->user_id) }}" class="text-dark btn">
                {{ $post->user->name }}
            </a>
        </div>
        <div class="card-title text-break">
            <i class="fas fa-comment-dots"></i>
            <span class="font-weight-bold"> 投稿</span>　{{ $post->body }}
        </div>
        <div class="card-title">
            <i class="fas fa-tag"></i><span class="font-weight-bold"> タグ</span>
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="text-dark btn">
                    {{ $tag->tag_name }}
                </a>
            @endforeach
        </div>
        <div class="row justify-content-around card-footer bg-transparent pt-4">
            @if($post->is_liked_by_auth_user())
                <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn">
                    <i class="fas fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                </a>
            @else
                <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn">
                    <i class="far fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                </a>
            @endif
            {{ $post->comment->count }}
            <div>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-success">詳細</a>
            </div>
        </div>
        
    </div>
</div>