<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'chosen', 'recipe'];

    public function ingredients()
    {
        return $this->belongsToMany(ingredients::class);
    }
}
