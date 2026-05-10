<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalBlogs = Blog::count();
        $totalUsers = \App\Models\User::count();
        $totalComments = \App\Models\Comment::count();
        return view('admin.index', compact('totalBlogs', 'totalUsers', 'totalComments'));
    }

    public function blogs()
    {
        $blogs = Blog::with('user')->latest()->get();
        return view('admin.blogs', compact('blogs'));
    }

    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted!');
    }
}