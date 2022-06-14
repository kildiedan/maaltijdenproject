<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
