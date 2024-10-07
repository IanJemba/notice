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
        if (!Auth::user()->role === 'admin') {
            return redirect()->back();
        }

        return view('marking.create');
    }

    public function edit(Marking $marking)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->back();
        }

        return view('marking.edit', compact('marking'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->back();
        }

        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string'
        ]);

        $validatedData['disable_comments'] = $request->has('disable_comments') ? true : false;
        $validatedData['hide_notice'] = $request->has('hide_notice') ? true : false;

        Marking::create($validatedData);

        return redirect()->route('markings.index');
    }

    public function update(Request $request, Marking $marking)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'color' => 'required|string'
        ]);

        $validatedData['disable_comments'] = $request->has('disable_comments') ? true : false;
        $validatedData['hide_notice'] = $request->has('hide_notice') ? true : false;

        $marking->update($validatedData);

        return redirect()->route('markings.index');
    }

    public function destroy(Marking $marking)
    {
        if (!Auth::user()->role === 'admin') {
            return redirect()->back();
        }

        $marking->delete();

        return redirect()->route('markings.index');
    }
}
