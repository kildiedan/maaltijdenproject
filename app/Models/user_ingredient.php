<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['ingredient_id', 'user_id', 'amount'];
}
