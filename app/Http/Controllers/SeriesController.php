<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request) 
    {
        $series = Serie::query()->orderBy('name')->get();
        $mgs = $request->session()->get('mgs');
        return view('series.index', compact('series', 'mgs'));
    }

    public function create()
    {
        return view ('series.create');
    }

    public function store(SeriesFormRequest $request) 
    {
        $serie = Serie::create(['name' => $request->name]);
        $numberSeasons = $request->number_seasons;

        for ($i=0; $i <= $numberSeasons; $i++) {
            $season = $serie->seasons()->create(['number'=> $i]);

            for ($j = 1; $j <= $request->episodes_by_seasons; $j++) {
                $season->episodes()->create(['number' => $j]);
            }

        }

        $request->session()
            ->flash(
                'mgs', 
                "Sitcom {$serie->id} create: {$serie->name}"
            );
            
        return redirect()->route('show_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mgs',
                "Sitcom remove"
            );    
        return redirect()->route('show_series');;
    }
}