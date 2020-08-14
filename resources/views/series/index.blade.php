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
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="name-serie-{{$serie->id}}">{{$serie->name}}</span>
            <div class="input-group w-50" hidden id="input-name-serie-{{$serie->id}}">
                <input type="text" class="form-control" value="{{$serie->name}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editSerie({{$serie->id}})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>
            <span class="d-flex">
                <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                    <i class="fas fa-edit"></i>
                </button>
                <a href="/series/{{ $serie->id }}/seasons" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form action="/series/remove/{{ $serie->id}}" method="POST" onsubmit="return confirm('Are you sure want to remove {{ addslashes( $serie->name )}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button>
                </form>
            </span>
        </li>
    @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const nameSerieEl = document.getElementById(`name-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-name-serie-${serieId}`);
        if (nameSerieEl.hasAttribute('hidden')) {
            nameSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nameSerieEl.hidden = true;
        }
    }

    function editSerie(serieId) {
        let formData = new FormData();
        const name = document.querySelector(`#input-name-serie-${serieId} > input`).value;
        const token = document.querySelector(`input[name="_token"]`).value;
        formData.append('name', name);
        formData.append('_token', token);
        const url = `/series/${serieId}/editname`;
        fetch(url, {method: 'POST',body: formData}).then(() => {
            toggleInput(serieId);
            document.getElementById(`name-serie-${serieId}`).textContent = name;
        });
    }
</script>

@endsection

