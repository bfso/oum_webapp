<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchDay extends Model
{
    protected $fillable = ['date', 'venue_id']; // Füge 'date' zum $fillable-Array hinzu

}
