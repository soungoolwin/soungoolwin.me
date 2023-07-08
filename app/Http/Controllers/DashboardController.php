<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function createblog()
    {
        return view('dashboard.blogcreate');
    }
    public function storeblog(Request $request)
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
    public function showblogstable()
    {
        return view('dashboard.showblogstable', [
            'blogs' => Blog::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
    public function editblog(Blog $blog)
    {
        return view('dashboard.blogedit', [
            'blog' => $blog
        ]);
    }
    public function updateblog(Blog $blog, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'intro' => 'required|max:255',
            'slug' => 'required|max:255',
            'body' => 'required',
            'image_url' => 'nullable|url|max:255',
        ]);
        $blog->fill($validatedData);
        $blog->save();
        return redirect('/dashboard/blogs/showall');
    }
}
