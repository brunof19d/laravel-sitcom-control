<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Services\CreatorSerie;
use App\Services\RemoverSerie;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{

    public function __construct()   
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $mgs = $request->session()->get('mgs');
        return view('series.index', compact('series', 'mgs'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CreatorSerie $createSerie)
    {
        $serie = $createSerie->createSerie($request->name, $request->number_seasons, $request->episodes_by_seasons);

        $request->session()
            ->flash(
                'mgs',
                "Sitcom {$serie->id} create: {$serie->name}"
            );

        return redirect()->route('show_series');
    }

    public function destroy(Request $request, RemoverSerie $removeSerie)
    {
        $nameSerie = $removeSerie->removeSerie($request->id);

        $request->session()
            ->flash(
                'mgs',
                "Sitcom successfully removed"
            );
        return redirect()->route('show_series');;
    }

    public function editName(int $id, Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
}
