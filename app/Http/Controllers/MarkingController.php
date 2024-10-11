<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkingRequest;
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

    public function store(MarkingRequest $request)
    {
        $request->validated();

        $request['disable_comments'] = $request->has('disable_comments') ? true : false;
        $request['hide_notice'] = $request->has('hide_notice') ? true : false;
        Marking::create($request->all());

        return redirect()->route('markings.index');
    }

    public function update(MarkingRequest $request, Marking $marking)
    {
        $request->validated();
        $request['disable_comments'] = $request->has('disable_comments') ? true : false;
        $request['hide_notice'] = $request->has('hide_notice') ? true : false;

        $marking->update($request->all());

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
