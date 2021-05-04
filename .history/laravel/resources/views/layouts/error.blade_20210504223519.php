@if ($errors->any())
    <div class="alert alert-danger" style="width: 70%">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif