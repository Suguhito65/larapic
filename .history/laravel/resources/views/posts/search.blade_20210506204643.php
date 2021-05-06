<form action="{{ route('posts.search') }}" method="get" class="input-group mb-5" style="width: 60%; margin: 0 auto">
    {{ csrf_field() }}
    <input type="text" placeholder="search" name="search" value="" class="form-control">
    <button type="submit" class="btn ml-1" style="color: #ff7a00">
        <i class="fas fa-search"></i>
    </button>
</form>

@isset($search_result)
    <h2 class="text-center mb-3">{{ $search_result}}</h2>
@endisset