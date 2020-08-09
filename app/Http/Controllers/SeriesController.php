<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request) {
        $series = Serie::all();

        return view('series.index', compact('series'));

    }

    public function create()
    {
        return view ('series.create');
    }

    public function store(Request $request) 
    {
        $name = $request->name;
        $serie = Serie::create([
            'name' => $name
        ]);
        
        echo "Sitcom with ID {$serie->id} create: {$serie->name}";

    }


}