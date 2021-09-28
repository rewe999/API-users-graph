<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("user")->get();

        return view("posts", [
            "posts" => $posts,
        ]);
    }
}
