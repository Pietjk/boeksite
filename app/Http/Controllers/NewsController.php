<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            'link' => ['nullable', 'string', 'active_url'],
            'image' => ['image','max:200'],
        ]);

        if (isset($validated['image'])) {
            unset($validated['image']);
            $path = $request->file('image')->store('news', 'public');
            $validated['image_path'] = 'storage/'.$path;
        }

        News::Create($validated);
        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $news = News::all()->sortByDesc('created_at');
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validateWithBag('form-feedback', [
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3'],
            'link' => ['nullable', 'string', 'active_url'],
            'image' => ['image','max:200'],
            'delete_image' => ['nullable']
        ]);


        $image = str_replace('storage/', '', $news->image_path);

        if (isset($validated['delete_image'])) {
            Storage::disk('public')->delete($image);
            $validated['image_path'] = null;
        }

        if (isset($validated['image'])) {
            Storage::disk('public')->delete($image);
            unset($validated['image']);
            $path = $request->file('image')->store('news', 'public');
            $validated['image_path'] = 'storage/'.$path;
        }

        $news->update($validated);
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $image = str_replace('storage/', '', $news->image_path);
        if (isset($image)) {
            Storage::disk('public')->delete($image);
        }
        $news->delete();
        return back();
    }
}
