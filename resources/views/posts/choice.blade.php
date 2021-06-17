@extends('layouts.app')

@section('content')
<div class="container form-container">
    <div class="panel is-primary">
        <div class="panel-heading">
            <span>
                Wil je een afbeelding aanmaken?
            </span>
        </div>
        <div class="panel-block">
            <div class="columns is-multiline">
                <div class="column is-12">
                    <div class="button-wrap my-3">
                        <a href="{{ route('postfiles.create', $post) }}" class="button is-outlined is-primary">Ja</a>
                        <a href="{{ route('home', '#about-me') }}" class="button is-outlined is-primary">Nee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
