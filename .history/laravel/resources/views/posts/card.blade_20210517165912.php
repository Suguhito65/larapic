<div class="col-md-4">
    <div class="card mb-5 shadow">
        <div class="card-header text-center text-white" style="background: linear-gradient(45deg, #ffa500, #f00, #ffa500)">
            ID {{ $post->id }}
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
                <i class="fas fa-tag"></i><strong> タグ</span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}" class="text-dark btn">
                        {{ $tag->tag_name }}
                    </a>
                @endforeach
            </div>
            <div class="row justify-content-around card-footer bg-transparent pt-4">
                @guest
                    <div>
                        <a href="{{ route('login') }}" class="btn">
                            <i class="far fa-heart" style="color: #ee82ee"></i> {{ $post->likes->count() }}
                        </a>
                    </div>
                @else
                    <like
                        :post-id="{{ json_encode($post->id) }}"
                        :user-id="{{ json_encode($userAuth->id) }}"
                        :default-Liked="{{ json_encode($post->defaultLiked($post, $userAuth->id)) }}"
                        :default-Count="{{ json_encode(count($post->likes)) }}"
                    ></like>
                @endguest
                <div class="btn" style="cursor: default">
                    <i class="far fa-comment-alt text-primary"></i> {{ $post->comments->count() }}
                </div>
                <div>
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn">
                        <i class="fas fa-pen text-success"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>