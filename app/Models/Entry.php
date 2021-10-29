<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel5Helpers\Uuid\UuidModel;

class Entry extends UuidModel
{
    protected $table = 'entries';

    public $languages = [
        'english' => 'English',
        'afrikaans' => 'Afrikaans',
        'sesotho' => 'SeSotho',
        'isizulu' => 'isiZulu',
        'isixhosa' => 'isiXhosa',
        'sepedi' => 'Sepedi',
    ];

    public $interestsList = [
        'music' => 'Music',
        'movies' => 'Movies',
        'going_out' => 'Going Out',
        'drinking' => 'Drinking',
        'cars' => 'Cars',
        'drawing' => 'Drawing',
        'music_production' => 'Music Production',
        'spirituality' => 'Spirituality',
        'youtube' => 'Youtube',
        'programming' => 'Programming'
    ];
}
