<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'birth_place',
        'image'
    ];
    protected $casts = [
        'dob' => 'date',
    ];
}
