@extends('layout')

@section('header')
Episodes
@endsection
 
@section('content')

@include ('message', ['mgs' => $mgs])

<form action="/seasons/{{ $seasonId }}/episodes/viewcheck" method="POST">
    @csrf
<ul class="list-group">
    @foreach ($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episodes {{ $episode->number}}
        <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" {{ $episode->view ? 'checked' : '' }}>
        </li>
    @endforeach
</ul>

<button class="btn btn-primary mt-2 mb-2">Save</button>
</form>
@endsection