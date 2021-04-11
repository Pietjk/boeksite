<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Book;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book, Request $request)
    {
        return view('files.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        if ($request->hasFile('bookCover')) {
            if ($request->file('bookCover')->isValid()) {
                $validated = $request->validateWithBag('form-feedback', [
                    'bookCover' => 'image', 'max:2048'
                ]);

                $name = strtolower(str_replace(' ', '', $book->name . 'cover'));
                $request->bookCover->storeAs('/public', $name.".png");
                $url = Storage::url($name.".png");
                
                File::whereFilename($name)->delete();

                $file = File::create([
                    'filename' => $name,
                    'filepath' => $url,
                    'book_id' => $book->id,
                ]);
            }
        }

        if ($request->hasFile('bookHeader')) 
        {
            if ($request->file('bookHeader')->isValid()) {
                $validated = $request->validateWithBag('form-feedback', [
                    'bookHeader' => 'image', 'max:2048'
                ]);

                $name = strtolower(str_replace(' ', '', $book->name . 'header'));
                $request->bookHeader->storeAs('/public', $name.".png");
                $url = Storage::url($name.".png");
                
                File::whereFilename($name)->delete();

                $file = File::create([
                    'filename' => $name,
                    'filepath' => $url,
                    'book_id' => $book->id,
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
