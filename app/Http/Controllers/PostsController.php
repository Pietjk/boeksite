<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $currentPost = $request->post;
        return view('posts.create', compact('currentPost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('form-feedback', [
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3'],
            'type' => ['required', 'string']
        ]);

        unset($validated['type']);

        if ($request->type === "over mij") 
        {
            $order = 1;
        } 
        elseif ($request->type === "contact")
        {
            $order = 2;
        }

        Post::create($validated + ['order' => $order]);

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $validated = $request->validateWithBag('form-feedback', [
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3']
        ]);

        $post->update($validated);

        return redirect('/');
    }
}
