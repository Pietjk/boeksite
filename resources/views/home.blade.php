@extends('layouts.app')
@section('content')

@include('components._nav')

{{-- Primary book --}}
<div class="even">
    @auth
        <a href="#"><div class="edit"><span class="edit-icon"><p><i class="far fa-edit"></i><span class="edit-text"> Pas aan</span></p></span></div></a>
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
                            <h1 class="title">hallo</h1>
                            <div class="text">

                               
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
{{-- Book list --}}
<div class="uneven">
    @auth
        <a href="#"><div class="edit"><span class="edit-icon"><p><i class="far fa-edit"></i><span class="edit-text"> Pas aan</span></p></span></div></a>
    @endauth

    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="slider center">
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                    </div>
                  </div>
            </div>
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- About me --}}
<div class="even">
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
<div class="uneven">
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