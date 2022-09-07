<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_1',
        'player_2',
        'year',
        'tournament',
        'rules',
        'round',
        'winner',
        'result',
        'type',
        'draw_url',
        'score_player_1',
        'score_player_2',
    ];

    protected $casts = [
        'year' => 'datetime',
    ];



}
