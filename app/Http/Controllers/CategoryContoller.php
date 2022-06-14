<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    public function index()
    {
        $categories = category::all();
        return $categories;
    }
}
