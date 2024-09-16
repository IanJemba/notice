<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     */
    public function store(Request $request, Notice $notice)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Create the comment
        Comment::create([
            'content' => $request->input('content'),
            'notice_id' => $notice->notice_id,
            'user_id' => Auth::id(),
        ]);

        // Redirect back to the notice view with success message
        return redirect()->route('notices.show', $notice->notice_id)->with('success', 'Comment added successfully!');
    }

    /**
     * Show the form for editing the specified comment.
     */
    public function edit($id)
    {
        // Find the comment
        $comment = Comment::findOrFail($id);

        // Return the edit view with the comment data
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified comment.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // Find the comment and update it
        $comment = Comment::findOrFail($id);
        $comment->content = $request->input('content');
        $comment->save();

        // Redirect back to the notice view with success message
        return redirect()->route('notices.show', $comment->notice_id)->with('success', 'Comment updated successfully!');
    }

    /**
     * Remove the specified comment.
     */
    public function destroy($id)
    {
        // Find the comment
        $comment = Comment::findOrFail($id);
        $notice_id = $comment->notice_id;

        // Delete the comment
        $comment->delete();

        // Redirect back to the notice view with success message
        return redirect()->route('notices.show', $notice_id)->with('success', 'Comment deleted successfully!');
    }
}
