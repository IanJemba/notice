<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marking;

class MarkingController extends Controller
{
    public function index()
    {
        $markings = Marking::all();
        return view('marking.index', compact('markings'));
    }

    public function create()
    {
        return view('marking.create');
    }

    public function edit(Marking $marking)
    {
        return view('marking.edit', compact('marking'));
    }
}
