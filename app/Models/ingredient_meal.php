<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient_meal extends Model
{
    use HasFactory;
    protected $fillable = ['meal_id', 'ingredient_id', 'amount'];
}
