@extends('layouts.app')

@section('content')
<div class="container form-container">
        <div class="box has-background-primary mt-3">
            <span class="pr-3">
                <a href="{{ route('home', '#news') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
            </span>
            <span class="has-text-black">
                Ga terug
            </span>
        </div>
        <div class="columns is-multiline is-centered background-is-primary news">
            @each('components._news', $news, 'newsItem')
        </div>
    </div>
@endsection
