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
<a href="{{route('form_create_serie')}}" class="btn btn-dark mb-2"><i class="fas fa-plus"></i> Add series</a>

<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $serie->name }}
            <span class="d-flex">
                <a href="/series/{{ $serie->id }}/seasons" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form action="/series/remove/{{ $serie->id}}" method="POST" onsubmit="return confirm('Are you sure want to remove {{ addslashes( $serie->nome )}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
                </form>
            </span>
        </li>
    @endforeach
</ul>
@endsection

