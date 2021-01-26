<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class ContentController extends Controller
{
    public function index(Posts $posts)
    {

        $aboutPost = $posts->whereOrder(1)->get();
        $contactPost = $posts->whereOrder(2)->get();

        return view('home', compact('aboutPost', 'contactPost'));
    }
}
// 'firstPost', 'secondPost', 'thirdPost'