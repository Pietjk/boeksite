<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Book;
use App\Models\Post;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new book resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookcreate(Book $book, Request $request)
    {
        return view('files.bookcreate', compact('book'));
    }

    /**
     * Show the form for creating a new post resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postcreate(Post $post, Request $request)
    {
        return view('files.postcreate', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bookstore(Request $request, Book $book, Post $post)
    {
        if ($request->hasFile('bookCover')) 
        {
            if ($request->file('bookCover')->isValid()) {
                $validated = $request->validateWithBag('form-feedback', [
                    'bookCover' => 'image', 'max:2048'
                ]);

                $name = strtolower(str_replace(' ', '', $book->id . 'cover'));
                $request->bookCover->storeAs('public', $name.".png");
                $url = Storage::url($name.".png");
                
                File::whereFilename($name)->delete();

                $file = File::create([
                    'filename' => $name,
                    'filepath' => $url,
                    'book_id' => $book->id,
                    'type' => 'cover'
                ]);
            }
        }

        if ($request->hasFile('bookHeader')) 
        {
            if ($request->file('bookHeader')->isValid()) {
                $validated = $request->validateWithBag('form-feedback', [
                    'bookHeader' => 'image', 'max:2048'
                ]);

                $name = strtolower(str_replace(' ', '', $book->id . 'header'));
                $request->bookHeader->storeAs('public', $name.".png");
                $url = Storage::url($name.".png");
                
                File::whereFilename($name)->delete();

                $file = File::create([
                    'filename' => $name,
                    'filepath' => $url,
                    'book_id' => $book->id,
                    'type' => 'header'
                ]);
            }
        }
        
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function poststore(Request $request, Post $post)
    {
        if ($request->hasFile('post')) 
        {
            if ($request->file('post')->isValid()) {
                $validated = $request->validateWithBag('form-feedback', [
                    'post' => 'image', 'max:2048'
                ]);
                $name = strtolower(str_replace(' ', '', $post->id . 'post'));
                $request->post->storeAs('public', $name.".png");
                $url = Storage::url($name.".png");
                
                File::whereFilename($name)->delete();

                $file = File::create([
                    'filename' => $name,
                    'filepath' => $url,
                    'type' => 'post' 
                ]);
            }
        }
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
