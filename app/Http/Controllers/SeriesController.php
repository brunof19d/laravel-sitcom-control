<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request) {
        $series = [
            'House',
            'Lost',
            'Dark'
        ];

        return view('series.index', compact('series'));

    }

    public function create()
    {
        return view ('series.create');
    }

    public function store(Request $request) 
    {
        $name = $request->name;
        $serie = new Serie();
        $serie->name = $name;
        var_dump($serie->save());
    }


}