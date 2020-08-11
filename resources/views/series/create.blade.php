@extends('layout')

@section('header')
Add sitcom
@endsection
 
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="col col-2">
            <label for="number_seasons">Number of seasons</label>
            <input type="number" class="form-control" name="number_seasons" id="name">
        </div>
        <div class="col col-2">
            <label for="episodes_by_seasons">Episodes by seasons</label>
            <input type="number" class="form-control" name="episodes_by_seasons" id="name">
        </div>
    </div>
    <button class="btn btn-primary mt-2">New series</button>
</form>

@endsection