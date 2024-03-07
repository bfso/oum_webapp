<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
=======
    protected $fillable = ['name', 'category_id'];
>>>>>>> origin/features/19-navbar_gameoperations

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}