<?php

namespace App\Services;

use App\Serie;
use App\Season;
use App\Episode;
use Illuminate\Support\Facades\DB;

class RemoverSerie
{
    public function removeSerie(int $serieId): string
    {
        $nameSerie = '';
        DB::transaction(function () use ($serieId, &$nameSerie) {
            $serie = Serie::find($serieId);
            $nameSerie = $serie->name;
            $this->removeSeasons($serie);
            $serie->delete();
        });
        return $nameSerie;
    }

    private function removeSeasons(Serie $serie): void
    {
        $serie->seasons->each(function (Season $season) {
            $this->removeEpisodes($season);
        });
    }

    private function removeEpisodes(Season $season)
    {
        $season->episodes()->each(function (Episode $episode) {
            $episode->delete();
        });
    }
}
