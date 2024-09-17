<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    // Display a listing of the notices
    public function index()
    {
        $notices = Notice::all();  // Fetch all notices
        return view('notices.index', compact('notices'));
    }

    // Show the form for creating a new notice
    public function create()
    {
        $categories = Category::all(); // Get all categories
        $users = User::all();

        return view('notices.create', compact('categories', 'users'));
    }

    // Store a newly created notice in storage
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',  
            'category_id' => 'required|exists:categories,id',  
        ]);

        // Create a new notice
        Notice::create($validatedData);

        // Redirect to the notices index page with success message
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
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',  // Ensure user exists
            'category_id' => 'required|exists:categories,id',  // Ensure category exists
        ]);

        // Update the notice
        $notice->update($validatedData);

        // Redirect to the notices index page with success message
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully');
    }

    // Remove the specified notice from storage
    public function destroy(Notice $notice)
    {
        // Delete the notice
        $notice->delete();

        // Redirect to the notices index page with success message
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully');
    }
}
