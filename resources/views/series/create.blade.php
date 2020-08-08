@extends('layout')

@section('header')
Add sitcom
@endsection
 
@section('content')

<form method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <button class="btn btn-primary">Add</button>
</form>

@endsection