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
                                        @if (file_exists('storage/book' . $featuredBook->id . '.pdf'))
                                            <a href="{{ asset('storage/book' . $featuredBook->id . '.pdf') }}" target="_blank" class="button is-outlined is-primary">Lees de demo</a>
                                            <a href="{{ $featuredBook->link }}" class="button is-outlined is-primary">Bekijk meer</a>
                                        @else
                                            <a href="{{ $featuredBook->link }}" class="button is-outlined is-primary wide">Bekijk meer</a>
                                        @endif
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
                {{ route('post.edit', $bookPost) }}
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
    @endauth

    <div class="container">
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
                                            <div class="button-wrap my-3">
                                                @if (file_exists('storage/book' . $book->id . '.pdf'))
                                                    <a href="{{ asset('storage/book' . $book->id . '.pdf')  }}" target="_blank" class="button is-outlined is-primary">Lees de demo</a>
                                                    <a href="{{ $book->link }}" class="button is-outlined is-primary">Bekijk meer</a>
                                                @else
                                                    <a href="{{ $book->link }}" class="button is-outlined is-primary wide">Bekijk meer</a>
                                                @endif
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
                {{ route('post.edit', $aboutPost) }}
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

    <div class="container">
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

{{-- blogs --}}
<div id="columns">
    @auth
        <a href="
            @if ($blogPost === null)
                {{ route('post.create', ['post' => 'blog text']) }}
            @else
                {{ route('post.edit', $blogPost) }}
            @endif
        ">
            <div class="edit">
                <span class="edit-icon">
                    <p>
                        <i class="far fa-edit"></i><span class="edit-text">@if ($blogPost === null) Creëer @else Pas aan @endif</span>
                    </p>
                </span>
            </div>
        </a>
    @endauth

    <div class="container">
        <section class="hero">
            <div class="hero-head has-text-centered mt-5">
                <h1 class="title is-12">
                    @if($blogPost === null)
                        Oeps!
                    @else
                        {{ $blogPost->name }}
                    @endif
                </h1>
                <p>
                    @if($blogPost === null)
                        Er is nog geen column text
                    @else
                        {{ $blogPost->description }}
                    @endif
                </p>
            </div>
            <div class="hero-body">
                @if (! $columns->isEmpty())
                <div class="columns is-multiline is-centered">
                    @foreach ($columns as $column)
                    <div class="column @if(count($columns) === 1) is-fullwidth @elseif(count($columns) === 2) is-half @else is-one-third  @endif blog-post">
                        <div class="tile is-ancestor">
                            <div class="tile is-parent">
                                <div class="tile is-child blog">
                                    <p class="subtitle">
                                        <span class="is-pulled-left">
                                            {{ $column->name }}
                                        </span>
                                        @auth
                                        <span class="is-pulled-right">
                                            <a href="{{ route('post.edit', $column) }}" class="left">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            {{-- <form action="{{ route('post.destroy', $column) }}"> --}}
                                            <span class="right">
                                                <a href="#"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('destroy-form').submit();"
                                                    class="left">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </span>
                                            <form id="destroy-form" action="{{ route('post.destroy', $column) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </span>
                                        @endauth

                                    </p>
                                    <p class="fade">{{ $column->description }}</p>
                                    <p></p>
                                    <a class="tag" href="{{ route('blog.show', $column) }}">Lees verder</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                    @auth
                        <div class="column
                            @if (count($columns) === 1 || $columns->isEmpty())
                                is-fullwidth
                            @elseif (count($columns) === 2)
                                is-half
                            @else
                                is-one-third
                            @endif
                        blog-post" onclick="window.location='{{ route('post.create', ['post' => 'blog']) }}';">
                            <div class="tile is-ancestor new-blog">
                                <div class="tile is-parent">
                                    <div class="tile is-child blog columns is-vcentered">
                                        <div class="column has-text-centered">
                                            <p class="icon"><i class="far fa-plus-square"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                @if (! $columns->isEmpty())
                </div>
                @endif
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
            {{ route('post.edit', $contactPost) }}
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

                        <div class="column mail-container">
                            @include('components._error', ['bag' => 'form-feedback'])
                            @include('components._notification')

                            <form action="{{ route('send') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="text" class="label is-full-width">Naam</label>
                                    <input name="name" type="text" class="input" placeholder="Uw naam">
                                <label for="text" class="label mt-2">E-mail adres</label>
                                    <input name="email" type="text" class="input" placeholder="Uw e-mail adres">
                                <label for="text" class="label mt-2">Onderwerp</label>
                                    <input name="subject" type="text" class="input" placeholder="Het onderwerp">
                                <label for="text" class="label mt-2">Uw bericht</label>
                                    <textarea name="text" class="textarea" name="" id="" cols="30" rows="5"  placeholder="Uw bericht"></textarea>
                                <button class="button is-outlined is-primary is-fullwidth mt-4">Verstuur uw bericht</button>
                            </form>
                        </div>

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
                    </div>
                    <div class="level-right">
                        <a href="https://www.facebook.com/rkorfmaker"><span class="icon"><i class="fab fa-facebook-f"></i></span></a>
                        <a href="mailto:ricardsrequiem@gmail.com"><span class="icon"><i class="far fa-envelope"></i></i></span></a>
                    </div>
                </footer>
            </div>
        </section>
    </div>
</div>
@endsection
