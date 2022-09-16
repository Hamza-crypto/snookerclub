<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentFrames extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'score_player_1',
        'score_player_2',
        'break_run_player_1',
        'break_run_player_2',
        'increment_in_score',
    ];
}
