<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Notice $notice)
    {

 
        $request->validate([
            'content' => 'required|string|max:500',
        ]);


        Comment::create([
            'content' => $request->input('content'),
            'notice_id' => $notice->notice_id,
            'user_id' => Auth::id(),
        ]);

        // Redirect back to the notice view with success message
        return redirect()->route('notices.show', $notice->notice_id)->with('success', 'Comment added successfully!');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        // Return the edit view with the comment data
        return view('comments.edit', compact('comment'));
    }

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

    public function destroy($id)
    {
        // Find the comment
        $comment = Comment::findOrFail($id);
        $notice_id = $comment->notice_id;

        $comment->delete();

        return redirect()->route('notices.show', $notice_id)->with('success', 'Comment deleted successfully!');
    }
}
