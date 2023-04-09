<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main', [
            'blogs' => Blog::orderBy('created_at', 'desc')->paginate(6)
        ]);
    }
    public function show(Blog $blog)
    {
        return view('components.showblog', [
            'blog' => $blog
        ]);
    }
}
