<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marking;
use Illuminate\Support\Facades\Auth;

class MarkingController extends Controller
{
    public function index()
    {
        $markings = Marking::all();
        return view('marking.index', compact('markings'));
    }

    public function create()
    {
        if (!Auth::user()->role->name === 'admin') {
            return redirect()->back();
        }

        return view('marking.create');
    }

    public function edit(Marking $marking)
    {
        if (!Auth::user()->role->name === 'admin') {
            return redirect()->back();
        }

        return view('marking.edit', compact('marking'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->role->name === 'admin') {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string',
            'disable_comments' => 'required|boolean',
            'hide_notice' => 'required|boolean',
        ]);

        Marking::create($validatedData);

        return redirect()->route('marking.index');
    }

    public function update(Request $request, Marking $marking)
    {
        if (!Auth::user()->role->name === 'admin') {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string',
            'disable_comments' => 'required|boolean',
            'hide_notice' => 'required|boolean',
        ]);

        $marking->update($validatedData);

        return redirect()->route('marking.index');
    }
}
