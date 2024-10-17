<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RusCity extends Model
{

    protected $table = 'rus_cities';

    protected $fillable = [
        'city'
    ];
}
