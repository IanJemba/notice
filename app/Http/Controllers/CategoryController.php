<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    function store(CategoryRequest $request)
    {
        $request->validated();

        $title = $request['title'];
        $description = $request['description'];

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

    function update(CategoryRequest $request, Category $category)
    {
        $request->validated();

        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->save();

        return redirect('/categories');
    }

    function destroy(Category $category)
    {
        if (auth::user()->role != 'admin') {
            abort(403);
        }

        if ($category->notices->count() > 0) {
            return back()->with('error', 'Category cannot be deleted as it has notices');
        }

        $category->delete();
        return redirect('/categories');
    }
}
