<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create()
    {
        return view('components.blogcreate');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'intro' => 'required|max:255',
            'slug' => 'required|unique:blogs|max:255',
            'body' => 'required',
            'image_url' => 'nullable|url|max:255',
        ]);

        // create new blog with validated data
        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->intro = $validatedData['intro'];
        $blog->slug = $validatedData['slug'];
        $blog->body = $validatedData['body'];
        $blog->image_url = $validatedData['image_url'];
        $blog->save();

        return redirect('/#blogs')->with('success', 'Blog created successfully.');
    }
}
