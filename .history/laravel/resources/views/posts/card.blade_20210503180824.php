<div class="card mb-5">
    <div class="card-header text-center bg-secondary">
        <a href="{{ route('users.show', $post->user_id) }}" class="text-white btn">
            <span class="font-weight-bold">投稿者：</span>{{ $post->user->name }}
        </a>
    </div>
    <div class="card-body">
        <p class="card-title"><span class="font-weight-bold">内容：</span>{{ $post->body }}</p>
        <div class="card-title">
            <span class="font-weight-bold">タグ：</span>
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="text-dark btn">
                    #{{ $tag->tag_name}}
                </a>
            @endforeach
        </div>
        <div class="row card-footer bg-transparent pt-3">
            @if($post->is_liked_by_auth_user())
                <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="btn">
                    <i class="fas fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                </a>
            @else
                <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn">
                    <i class="far fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                </a>
            @endif
            <div class="text-center">
            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="card-link btn btn-success mb-3">詳細</a>
            </div>
        </div>
        
    </div>
</div>