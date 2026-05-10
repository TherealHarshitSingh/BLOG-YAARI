<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Home page - show all blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('blogs.index', compact('blogs'));
    }

    // Show single blog
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $comments = $blog->comments()->with('user')->latest()->get();
        return view('blogs.show', compact('blog', 'comments'));
    }

    // Show create form
    public function create()
    {
        return view('blogs.create');
    }

    // Save new blog
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'content'           => 'required',
            'category'          => 'required',
            'published_date'    => 'required|date',
            'image'             => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'content'           => $request->content,
            'category'          => $request->category,
            'other_category'    => $request->other_category,
            'published_date'    => $request->published_date,
            'image'             => $imagePath,
            'upvotes'           => 0,
            'user_id'           => Auth::id(),
        ]);

        return redirect()->route('my.posts')->with('success', 'Blog created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id !== Auth::id()) {
            abort(403);
        }
        return view('blogs.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id !== Auth::id()) {
            abort(403);
        }

        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'content'           => $request->content,
            'category'          => $request->category,
            'other_category'    => $request->other_category,
            'published_date'    => $request->published_date,
            'image'             => $imagePath,
        ]);

        return redirect()->route('my.posts')->with('success', 'Blog updated successfully!');
    }

    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->user_id !== Auth::id()) {
            abort(403);
        }
        $blog->delete();
        return redirect()->route('my.posts')->with('success', 'Blog deleted successfully!');
    }

    // My posts with metrics
    public function myPosts()
    {
        $blogs = Blog::where('user_id', Auth::id())->latest()->get();
        return view('blogs.my-posts', compact('blogs'));
    }

    // Upvote blog
    public function upvote($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('upvotes');
        return response()->json(['upvotes' => $blog->upvotes]);
    }

    // AJAX Filter
    public function filter(Request $request)
    {
        $query = Blog::query();

        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->date) {
            $query->whereDate('published_date', $request->date);
        }

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->latest()->get();
        return response()->json($blogs);
    }
}