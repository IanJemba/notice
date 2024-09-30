<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marking;

class MarkingController extends Controller
{
    public function index()
    {
        $markings = Marking::all();
        return view('markings.index', compact('markings'));
    }

    public function create()
    {
        return view('markings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'color' => 'required',
        ]);

        Marking::create($request->all());

        return redirect()->route('markings.index');
    }

    public function edit(Marking $marking)
    {
        return view('markings.edit', compact('marking'));
    }

    public function update(Request $request, Marking $marking)
    {
        $request->validate([
            'title' => 'required',
            'color' => 'required',
        ]);

        $marking->update($request->all());

        return redirect()->route('markings.index');
    }

    public function destroy(Marking $marking)
    {
        $marking->delete();

        return redirect()->route('markings.index');
    }
}
