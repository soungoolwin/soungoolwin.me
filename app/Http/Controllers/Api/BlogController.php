<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(6);
        return response()->json($blogs);
    }
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }
}
