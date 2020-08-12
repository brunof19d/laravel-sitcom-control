<?php

namespace App\Services;

use App\Serie;

class CreatorSerie
{
    public function createSerie(string $nameSerie, int $numberSeason, int $numberEpisode) : Serie
    {
        $serie = Serie::create(['name' => $nameSerie]);
        $numberSeasons = $numberSeason;

        for ($i = 0; $i <= $numberSeasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);

            for ($j = 1; $j <= $numberEpisode; $j++) {
                $season->episodes()->create(['number' => $j]);
            }
        }
        return $serie;
    }
}
