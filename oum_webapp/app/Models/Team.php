<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Team extends Model
{
    protected $fillable = ['name', 'category_id'];
    

   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

  
}