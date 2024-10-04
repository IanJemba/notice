<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $query = Notice::query();

        // If a search term is present, filter by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // If a category is selected, filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $notices = $query->get(); // Get the filtered notices
        $categories = Category::all(); // Fetch all categories for the dropdown

        $notices = $notices->sortByDesc('created_at');
        return view('notices.index', compact('notices', 'categories'));
    }


    // Show the form for creating a new notice
    public function create()
    {
        $categories = Category::all(); // Get all categories
        $users = User::all();

        // check if logged in
        if (!Auth::check()) {
            return redirect()->route('notices.index')->with('error', 'You must be logged in to create a notice');
        }

        return view('notices.create', compact('categories', 'users'));
    }

    // Store a newly created notice in storage
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // verify if user is logged in
        if (!Auth::check()) {
            return redirect()->route('notices.index')->with('error', 'You must be logged in to create a notice');
        }

        // Automatically set the logged-in user as the author
        $validatedData['user_id'] = Auth::id();


        // Create a new notice
        $notice = Notice::create($validatedData);
        $notice->markings()->sync(1);

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
        $categories = Category::all(); // Get all categories
        $users = User::all();

        if (Auth::id() !== $notice->user_id) {
            return redirect()->route('notices.show', $notice->notice_id)->with('error', 'You do not have permission to edit this notice');
        }

        return view('notices.edit', compact('notice', 'categories', 'users'));
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

        if (Auth::id() !== $notice->user_id) {
            return redirect()->route('notices.show', $notice->notice_id)->with('error', 'You do not have permission to edit this notice');
        }

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

    public function marking_update(Request $request, Notice $notice)
    {
        if (!isset($request['marking_id'])) {
            $request['marking_id'] = [1]; // Default to unmarked
        }
        $notice->markings()->sync($request['marking_id']);

        // Redirect back to the notice page with a success message
        return redirect()->route('notices.show', $notice->notice_id)->with('success', 'Marking updated successfully');
    }
}
