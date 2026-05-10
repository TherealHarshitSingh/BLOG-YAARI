<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:1000',
        ]);

        Comment::create([
            'blog_id' => $id,
            'user_id' => Auth::id(),
            'text'    => $request->text,
        ]);

        return redirect()->route('blogs.show', $id)->with('success', 'Comment added!');
    }
}