@if ($errors->any())
    <div class="alert alert-danger text-center">
    <ul style="list">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif