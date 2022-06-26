<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
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
        'result'
    ];

    protected $casts = [
        'year' => 'date'
    ];



}
