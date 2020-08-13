<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CreatorSerie
{
    public function createSerie(string $nameSerie, int $numberSeasons, int $numberEpisode): Serie
    {
        $serie = null;
        DB::beginTransaction();
        $serie = Serie::create(['name' => $nameSerie]);
        $this->makeSeasons($numberSeasons, $numberEpisode, $serie);
        DB::commit();

        return $serie;
    }

    public function makeSeasons(int $numberSeasons, int $numberEpisode, Serie $serie)
    {
        for ($i = 0; $i <= $numberSeasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            $this->makeEpisodes($numberEpisode, $season);
        }
    }

    public function makeEpisodes(int $numberEpisode, \Illuminate\Database\Eloquent\Model $season): void
    {
        for ($j = 1; $j <= $numberEpisode; $j++) {
            $season->episodes()->create(['number' => $j]);
        }
    }
}
