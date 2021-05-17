@if ($errors->any())
<div class="row">
    <div class="col-10 col-md-6 offset-1 offset-md-3 alert alert-danger text-center">
            <ul style="list-style: none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif