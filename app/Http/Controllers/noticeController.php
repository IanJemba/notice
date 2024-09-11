<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // Display a listing of notices
    public function index()
    {
        $notices = Notice::all();
        return view('notices.index', compact('notices'));
    }

    // Show the form for creating a new notice
    public function create()
    {
        return view('notices.create');
    }

    // Store a newly created notice in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        Notice::create($validatedData);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully');
    }

    // Display the specified notice
    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    // Show the form for editing the specified notice
    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    // Update the specified notice in storage
    public function update(Request $request, Notice $notice)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $notice->update($validatedData);

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully');
    }

    // Remove the specified notice from storage
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully');
    }
}
