<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
         'seasonId' => $season->id
         ]);
    }

    public function viewcheck(Season $season, Request $request)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(
            function (Episode $episode) use($watchedEpisodes) {
                $episode->view = in_array(
                    $episode->id, 
                    $watchedEpisodes
                );
            } 
        );
        $season->push();
    }
}
