<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;

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

    public function store(Request $request) 
    {
        $serie = Serie::create($request->all());
        $request->session()
            ->flash(
                'mgs', 
                "Sitcom {$serie->id} create: {$serie->name}"
            );
        return redirect('/series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mgs',
                "Sitcom remove"
            );    
        return redirect('/series');
    }
}