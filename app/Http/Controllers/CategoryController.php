<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
}
