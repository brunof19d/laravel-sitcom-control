@extends('layout')

@section('header')
Sitcom Control
@endsection
 
@section('content')
<a href="#" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item">{{ $serie->name }}</li>
    @endforeach
</ul>
@endsection

