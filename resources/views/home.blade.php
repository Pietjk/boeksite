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
                        <i class="far fa-edit"></i><span class="edit-text">@if ($aboutPost->isEmpty()) Creëer @else Pas aan @endif</span>
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
                            <img class="image is-2by3 is-paddingless" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">
                                @if($books->isEmpty()) 
                                    Oeps!
                                @else
                                    {{ $featuredBook[0]->name }}
                                @endif
                            </h1>
                            <div class="text">
                                @php
                                    if($books->isEmpty()) 
                                    {
                                        echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                    } 
                                    else 
                                    {
                                        echo(
                                            nl2br(
                                                $featuredBook[0]->description
                                            )
                                        );
                                    }
                                @endphp
                            </div>
                            <div class="button-wrap my-3">
                                <a class="button is-outlined is-primary">Lees de demo</a>
                                <a href="{{ $featuredBook[0]->link }}" class="button is-outlined is-primary">Koop het hier</a>
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
{{-- Book list --}}
<div>
    @auth
        <a href="#"><div class="edit"><span class="edit-icon"><p><i class="far fa-edit"></i><span class="edit-text"> Pas aan</span></p></span></div></a>
    @endauth

    <div class="container " id="section1">
        <section class="hero is-fullheight" id="#slide-1">
            <div class="hero-body">
                <div class="container">
                    <div id="intro" class="slider glide glide--ltr glide--carousel glide--swipeable">
                        <div class="slider__track glide__track" data-glide-el="track">
                          <ul class="slider__slides glide__slides">
                            <li class="slider__frame glide__slide 1">
                                <img  class="image carousel-image" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                                {{-- <p class="image-text">Ricards Requim</p> --}}
                            </li>
                            <li class="slider__frame glide__slide 2">
                                <img  class="image carousel-image" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                                {{-- <p class="image-text">Cantor</p> --}}
                            </li>
                            <li class="slider__frame glide__slide 3">
                                <img  class="image carousel-image" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                                {{-- <p class="image-text">Laura</p> --}}
                            </li>
                            <li class="slider__frame glide__slide 4">
                                <img  class="image carousel-image" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                                {{-- <p class="image-text">Sinp</p> --}}
                            </li>
                            <li class="slider__frame glide__slide 5">
                                <img  class="image carousel-image" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                                {{-- <p class="image-text">Arie 2</p> --}}
                            </li>
                          </ul>
                        </div>
                        <div data-glide-el="controls">
                          <button class="slider__arrow slider__arrow--prev glide__arrow glide__arrow--prev" data-glide-dir="<">
                          <i class="fas fa-arrow-left"></i>
                          </button>
                          <button class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next" data-glide-dir=">">
                          <i class="fas fa-arrow-right"></i>
                          </button>
                        </div>
                        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
                          <button class="slider__bullet glide__bullet" data-glide-dir="=0"></button>
                          <button class="slider__bullet glide__bullet" data-glide-dir="=1"></button>
                          <button class="slider__bullet glide__bullet" data-glide-dir="=2"></button>
                          <button class="slider__bullet glide__bullet glide__bullet--active" data-glide-dir="=3"></button>
                          <button class="slider__bullet glide__bullet" data-glide-dir="=4"></button>
                          
                        </div>
                      </div>                      
                </div>
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- About me --}}
<div>
    @auth
        <a href="
            @if ($aboutPost->isEmpty()) 
                {{ route('post.create', ['post' => 'over mij']) }} 
            @else 
                {{ route('post.edit', $aboutPost[0]->id) }} 
            @endif
        ">
            <div class="edit">
                <span class="edit-icon">
                    <p>
                        <i class="far fa-edit"></i><span class="edit-text">@if ($aboutPost->isEmpty()) Creëer @else Pas aan @endif</span>
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
                            <img class="image is-2by3 is-paddingless" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">
                                @if($aboutPost->isEmpty()) 
                                    Oeps!
                                @else
                                    {{ $aboutPost[0]->name }}
                                @endif
                            </h1>
                            <div class="text">
                                @php
                                    if($aboutPost->isEmpty()) 
                                    {
                                        echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                    } 
                                    else 
                                    {
                                        echo(
                                            nl2br(
                                                $aboutPost[0]->description
                                            )
                                        );
                                    }
                                @endphp
                            </div>
                            <div class="button-wrap my-3">
                                <button class="button is-outlined is-primary">Lees de demo</button>
                                <button class="button is-outlined is-primary">Koop het hier</button>
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
        @if ($contactPost->isEmpty()) 
            {{ route('post.create', ['post' => 'contact']) }} 
        @else 
            {{ route('post.edit', $contactPost[0]->id) }} 
        @endif
    ">
        <div class="edit">
            <span class="edit-icon">
                <p>
                    <i class="far fa-edit"></i><span class="edit-text">@if ($contactPost->isEmpty()) Creëer @else Pas aan @endif</span>
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
                                @if($contactPost->isEmpty()) 
                                    Oeps!
                                @else
                                    {{ $contactPost[0]->name }}
                                @endif
                            </h1>
                            <div class="text">
                                @php
                                    if($contactPost->isEmpty()) 
                                    {
                                        echo('Het lijkt erop dat er hier op dit moment nog geen content is');
                                    } 
                                    else 
                                    {
                                        echo(
                                            nl2br(
                                                $contactPost[0]->description
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
                <footer class="footer level">
                    <div class="level-left"></div>
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