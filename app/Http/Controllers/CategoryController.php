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

    function create()
    {
        return view('categories.create');
    }

    function store()
    {
        $category_data = request()->all();

        $title = $category_data['title'];
        $description = $category_data['description'];

        $category = new Category();
        $category->title = $title;
        $category->description = $description;
        $category->save();

        return redirect('/categories');
    }

    function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    function update(Category $category)
    {
        $category->title = request('title');
        $category->description = request('description');
        $category->save();

        return redirect('/categories');
    }

    function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }
}
