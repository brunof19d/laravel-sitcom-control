<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Season extends Model
{
    public $timestamps = false;
    protected $fillable = ['number'];
    
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        return $this->belongTo(Serie::class);
    }

    public function getEpisodesView(): Collection 
    {
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->view;
        });
    }
    

}
