@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-primary" role="alert">
        <p class="mb-0">{{ session()->get('message') }}</p>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        <p class="mb-0">{{ session()->get('error') }}</p>
    </div>
@endif