@extends('layout')

@section('header')
Sitcom Control
@endsection
 
@section('content')
@if(!empty($mgs))
<div class="alert alert-success">
    {{ $mgs }}
</div>
@endif
<a href="/series/create" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach ($series as $serie)

        <li class="list-group-item">{{ $serie->name }}

            <form action="/series/remove/{{ $serie->id}}" method="POST" onsubmit="return confirm('Are you sure want to remove {{ addslashes( $serie->nome )}}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Remove</button>
            </form>
            
        </li>
        
    @endforeach
</ul>
@endsection

