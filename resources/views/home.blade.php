@extends('layouts.app')
@section('content')
<main>

    @include('components._scroll')

    @include('components._nav')

    {{-- Primary book --}}
    <div id="primary-book">
        @auth @include('components._section_edit', $data = ['content' => [1 => $featuredBook], 'route' => [1 => route('book.create'), 2 => route('book.index')]]) @endauth

        <div class="container">
            <section class="hero is-fullheight">
                <div class="hero-body">
                    <div class="columns is-multiline is-centered">
                        <div class="level">
                            <div class="column image-column">
                                @if(isset($featuredHeader))
                                    <img class="image section-image is-2by3 is-paddingless" src="{{ asset($featuredCover->filepath) }}" alt="">
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
    <div id="book-list">
        @auth @include('components._section_edit', $data = ['content' => [1 => $bookPost], 'route' => [1 => route('post.create', ['post' => 'alle boeken', 'order' => 1])]]) @endauth

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
    <div id="about-me">
        @auth @include('components._section_edit', $data = ['content' => [1 => $aboutPost], 'route' => [1 => route('post.create', ['post' => 'over mij', 'order' => 2])]]) @endauth

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

    {{-- News --}}
    <div id="news">
        @auth @include('components._section_edit', $data = ['content' => [1 => $newsPost], 'route' => [1 => route('post.create', ['post' => 'nieuws', 'order' => 6])]]) @endauth

        <div class="container">
            <section class="hero">
                <div class="hero-head has-text-centered mt-5">
                    <div class="section has-text-centered">
                        <h1 class="title">
                            @if($newsPost === null)
                                Oeps!
                            @else
                                {{ $newsPost->name }}
                            @endif
                        </h1>
                        <div class="text">
                            @php
                                if($newsPost === null)
                                {
                                    echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                }
                                else
                                {
                                    echo(
                                        nl2br(
                                            $newsPost->description
                                        )
                                    );
                                }
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="hero-body">
                    <div class="columns is-multiline is-centered background-is-primary news">
                        <div class="column is-half has-text-black">
                            <div class="news-item">
                                <div class="news-header py-3">
                                    <h3 class="subtitle">Lorem ipsum dolor sit amet consectetur.</h3>
                                    <hr>
                                </div>
                                <div class="news-body">
                                    <div class="is-clearfix ">
                                        <img class="is-pulled-left image mr-4" src="" alt="">

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae expedita qui laborum, quam alias tempora molestias eum odio modi enim pariatur sint atque reprehenderit maiores minus necessitatibus officia assumenda laudantium quibusdam provident. Sequi recusandae iste asperiores obcaecati distinctio, odit doloremque totam perspiciatis?</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae expedita qui laborum, quam alias tempora molestias eum odio modi enim pariatur sint atque reprehenderit maiores minus necessitatibus officia assumenda laudantium quibusdam provident. Sequi recusandae iste asperiores obcaecati distinctio, odit doloremque totam perspiciatis?</p>

                                    </div>
                                </div>
                                <div class="news-footer">
                                    <hr class="mb-3">
                                    Lorem, ipsum dolor.
                                </div>
                            </div>
                        </div>

                        @auth
                            <div class="button-wrap column is-12">
                                <a href="{{ route('news.index') }}" class="button wide is-outlined is-primary">
                                    Nieuws beheren
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Blogs --}}
    <div id="columns">
        @auth @include('components._section_edit', $data = ['content' => [1 => $blogPost], 'route' => [1 => route('post.create', ['post' => 'column', 'order' => 4])]]) @endauth

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
                                                <a href="{{ route('column.edit', $column) }}" class="left">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <span class="right">
                                                    <a href="#"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('destroy-form' + {{ $column->id }}).submit();"
                                                        class="left">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </span>

                                                <form id="{{'destroy-form' . $column->id}}" action="{{ route('column.destroy', $column) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                            @endauth

                                        </p>
                                        <p class="fade">{{ $column->description }}</p>
                                        <p></p>
                                        <a class="tag" href="{{ route('column.show', $column) }}">Lees verder</a>
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
                            blog-post" onclick="window.location='{{ route('column.create') }}';">
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

    {{-- Reviews --}}
    <div id="reviews">
        @auth @include('components._section_edit', $data = ['content' => [1 => $reviewPost], 'route' => [1 => route('post.create', ['post' => 'review text', 'order' => 5])]]) @endauth

        <div class="container">
            <section class="hero">
                <div class="hero-head has-text-centered mt-5">
                    <h1 class="title is-12">
                        @if($reviewPost === null)
                            Oeps!
                        @else
                            {{ $reviewPost->name }}
                        @endif
                    </h1>
                    <p>
                        @if($reviewPost === null)
                            Er is nog geen review text
                        @else
                            {{ $reviewPost->description }}
                        @endif
                    </p>
                </div>
                <div class="hero-body">
                    <div class="columns is-multiline is-centered">
                        @foreach ($chosenReviews as $review)
                            <div class="column reviews
                                @if (count($chosenReviews) === 1) is-full
                                    @elseif (count($chosenReviews) === 2) is-half
                                    @elseif (count($chosenReviews) === 3) is-one-third
                                    @elseif (count($chosenReviews) === 4) is-4
                                @endif
                                @if ($loop->iteration === 4 && $loop->last) is-12 @endif
                            ">
                                <div class="tile is-ancestor">
                                    <div class="tile is-parent">
                                        <div class="tile is-child review @if ($review->books->name === 'Ricards requiem') rr @elseif($review->books->name === 'Cantor') cantor @elseif($review->books->name === 'Laura') laura @elseif($review->books->name === 'Sinp') sinp @endif">
                                            <p>{{$review->books->name}}</p>
                                            <hr class="my-2">
                                            <p class="subtitle">
                                                <span class="is-pulled-left">
                                                    {{ $review->name }}:
                                                </span>
                                                <span class="is-pulled-right tag is-medium">
                                                    {{ ($review->score === null) ? 'N/A' : $review->score }}
                                                </span>
                                            </p>
                                            <p class="fade">{{ $review->description }}</p>
                                            <p></p>
                                            <a class="tag" href="{{ route('review.show', $review) }}">Lees verder</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @auth
                            <div class="button-wrap column is-12">
                                <a href="{{ route('review.index') }}" class="button wide is-outlined is-primary">
                                    Reviews beheren
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- Contact --}}
    <div id="contact">
        @auth @include('components._section_edit', $data = ['content' => [1 => $contactPost],'route' => [1 => route('post.create', ['post' => 'contact', 'order' => 3])]]) @endauth

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
                                    @honeypot
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
</main>
@endsection
