@extends('layouts.app')
@section('content')

@include('components._nav')

{{-- Primary book --}}
<div>
    @auth
        <a href="
            @if ($books->isEmpty()) 
                {{ route('book.create') }} 
            @else 
                {{ route('book.index') }} 
            @endif
        ">
            <div class="edit">
                <span class="edit-icon">
                    <p>
                        <i class="far fa-edit"></i><span class="edit-text">@if ($featuredBook === null) Creëer @else Pas aan @endif</span>
                    </p>
                </span>
            </div>
        </a>
    @endauth

    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="columns is-multiline is-centered">
                    <div class="level">
                        <div class="column image-column">
                            @if(isset($featuredHeader[0]))
                                <img class="image section-image is-2by3 is-paddingless" src="{{ asset($featuredCover[0]->filepath) }}" alt="">
                            @else
                                <div class="placeholder-image has-text-centered px-5 py-5">
                                    <p>De afbeelding(en) zijn nog niet toegevoegd</p>
                                </div>
                            @endif
                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">
                                @if($books->isEmpty()) 
                                    Oeps!
                                @else
                                    {{ $featuredBook->name }}
                                @endif
                            </h1>
                                @if($books->isEmpty())
                                    <div class="text">
                                        @php 
                                            echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                        @endphp
                                    </div>
                                @else
                                    <div class="text">
                                        @php
                                            echo(
                                                nl2br(
                                                    $featuredBook->description
                                                )
                                            );
                                        @endphp
                                    </div>

                                    <div class="button-wrap my-3">
                                        <a class="button is-outlined is-primary">Lees de demo</a>
                                        <a href="{{ $featuredBook->link }}" class="button is-outlined is-primary">Koop het hier</a>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">
            </div>
        </section>
    </div>
</div>
{{-- Book list --}}
<div>
    @auth
        <a href="
            @if ($bookPost === null) 
                {{ route('post.create', ['post' => 'alle boeken']) }} 
            @else 
                {{ route('post.edit', $bookPost->id) }} 
            @endif
        ">
            <div class="edit">
                <span class="edit-icon">
                    <p>
                        <i class="far fa-edit"></i><span class="edit-text">@if ($bookPost === null) Creëer @else Pas aan @endif</span>
                    </p>
                </span>
            </div>
        </a>

        {{-- <a href="#"><div class="edit"><span class="edit-icon"><p><i class="far fa-edit"></i><span class="edit-text"> Pas aan</span></p></span></div></a> --}}
    @endauth

    <div class="container " id="section1">
        <section class="hero is-fullheight">
            <div class="hero-head">
                <div class="section has-text-centered">
                    <h1 class="title">
                        @if($bookPost === null) 
                            Oeps!
                        @else
                            {{ $bookPost->name }}
                        @endif
                    </h1>
                    <div class="text">
                        @php
                            if($bookPost === null) 
                            {
                                echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                            } 
                            else 
                            {
                                echo(
                                    nl2br(
                                        $bookPost->description
                                    )
                                );
                            }
                        @endphp
                    </div>
                </div>
                
            </div>
            <div class="hero-body px-0">
                @if ($books->isEmpty())
                    <h1 class="title">Er zijn op dit moment geen boeken</h1>
                @else
                    <div class="container">
                        <div id="intro" class="slider glide glide--ltr glide--carousel glide--swipeable">
                            <div class="slider__track glide__track" data-glide-el="track">
                            <ul class="slider__slides glide__slides">
                                @foreach($books as $book)
                                    <li class="slider__frame glide__slide {{ $loop->iteration }} image-container">
                                        <img  class="image is-4x3 carousel-image" 
                                            @if($book->files->count() > 0) 
                                                src="{{$book->files->filter(function ($value, $key)
                                                {
                                                    return strpos($value['filename'],'cover') !== false;
                                                })->first()['filepath']}}" 
                                            @endif 
                                        alt="">
                                        <div class="overlay">
                                            <div class="img-text">
                                                <h1 class="title">{{ $book->name }}</h1>
                                                <div class="overlay-text">
                                                    <p>
                                                        @php
                                                            echo(
                                                                nl2br(
                                                                    $book->description
                                                                )
                                                            )
                                                        @endphp
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="button-wrap">
                                                <a href="{{ $book->link }}" class="button is-outlined is-primary">Koop het hier</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            </div>
                            <div data-glide-el="controls">
                                <button class="slider__arrow slider__arrow--prev glide__arrow glide__arrow--prev" data-glide-dir="<">
                                    <span class="icon"><i class="fas fa-chevron-left"></i></span>
                                </button>
                                <button class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next" data-glide-dir=">">
                                    <span class="icon"><i class="fas fa-chevron-right"></i></span>
                                </button>
                            </div>
                        </div>                      
                    </div>
                @endif
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- About me --}}
<div>
    @auth
        <a href="
            @if ($aboutPost === null) 
                {{ route('post.create', ['post' => 'over mij']) }} 
            @else 
                {{ route('post.edit', $aboutPost->id) }} 
            @endif
        ">
            <div class="edit">
                <span class="edit-icon">
                    <p>
                        <i class="far fa-edit"></i><span class="edit-text">@if ($aboutPost === null) Creëer @else Pas aan @endif</span>
                    </p>
                </span>
            </div>
        </a>
    @endauth

    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="columns">
                    <div class="level">    
                        <div class="column image-column">
                            @if($postImage != null)
                                <img class=" section-image is-2by3 is-paddingless" src="{{ $postImage->filepath }}" alt="">
                            @else
                                <div class="placeholder-image has-text-centered px-5 py-5">
                                    <p>De afbeelding(en) zijn nog niet toegevoegd</p>
                                </div>
                            @endif
                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">
                                @if($aboutPost === null) 
                                    Oeps!
                                @else
                                    {{ $aboutPost->name }}
                                @endif
                            </h1>
                            <div class="text">
                                @php
                                    if($aboutPost === null) 
                                    {
                                        echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                    } 
                                    else 
                                    {
                                        echo(
                                            nl2br(
                                                $aboutPost->description
                                            )
                                        );
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- Contact --}}
<div>
    @auth
    <a href="
        @if ($contactPost === null) 
            {{ route('post.create', ['post' => 'contact']) }} 
        @else 
            {{ route('post.edit', $contactPost->id) }} 
        @endif
    ">
        <div class="edit">
            <span class="edit-icon">
                <p>
                    <i class="far fa-edit"></i><span class="edit-text">@if ($contactPost === null) Creëer @else Pas aan @endif</span>
                </p>
            </span>
        </div>
    </a>
    @endauth
    
    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="columns">
                    <div class="level">
                                            
                        <div class="column">
                            <form action="">
                                <label for="text" class="label is-full-width">Naam</label>
                                    <input type="text" class="input">
                                <label for="text" class="label mt-2">Email</label>
                                    <input type="text" class="input">
                                <label for="text" class="label mt-2">Uw bericht</label>
                                    <textarea class="textarea" name="" id="" cols="30" rows="5"></textarea>
                                <button class="button is-outlined is-primary is-fullwidth mt-4">Verstuur uw bericht</button>
                            </form>                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">
                                @if($contactPost === null) 
                                    Oeps!
                                @else
                                    {{ $contactPost->name }}
                                @endif
                            </h1>
                            <div class="text">
                                @php
                                    if($contactPost === null) 
                                    {
                                        echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                    } 
                                    else 
                                    {
                                        echo(
                                            nl2br(
                                                $contactPost->description
                                            )
                                        );
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">
                <footer class="footer has-text-centered level">
                    <div class="level-left">
                        @guest
                            <p>Bent u de eigenaar? Log <a class="has-text-primary" href="{{ route('login') }}">hier</a>  dan in.</p>
                        @endguest
                    </div>
                    <div class="level-right">
                        <a href="#"><span class="icon"><i class="fab fa-facebook-f"></i></span></a>
                        <a href="#"><span class="icon"><i class="far fa-envelope"></i></i></span></a>
                    </div>
                </footer>
            </div>
        </section>
    </div>
</div>
@endsection
