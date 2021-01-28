<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ContentController extends Controller
{
    public function index(Post $post)
    {

        $aboutPost = $post->whereOrder(1)->get();
        $contactPost = $post->whereOrder(2)->get();

        return view('home', compact('aboutPost', 'contactPost'));
    }
}
// 'firstPost', 'secondPost', 'thirdPost'