<section class="hero is-fullheight has-bg-img" @if(isset($featuredHeader)) style="background-image:url('{{ asset($featuredHeader->filepath) }}')" @endif id="home">
    <div class="hero-head mb-5">
        @include('components._error', ['bag' => 'form-feedback'])
        @include('components._notification')

        @auth
            <div class="notification has-text-centered is-primary">
                <h1 class="is-3">Je bent ingelogd!</h1>

                <h1 class="is-3">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Log uit
                    </a>
                </h1>
            </div>
            @if(isset($featuredBook))<a href="{{ route('files.create', $featuredBook) }}"><div class="edit"><span class="edit-icon"><p><i class="far fa-edit"></i><span class="edit-text"> Pas aan</span></p></span></div></a>@endif
        @endauth
    </div>
    <div class="hero-body">
        <div class="container body">
            @if(isset($featuredBook))<h1 class="title">{{ $featuredBook->name }}</h1>@endif
            <h2 class="subtitle">Ruben Korfmaker</h2>
        </div>
    </div>
    <div class="hero-foot mb-5">
        <div class="container foot">
            <span class="icon"><a href="#primary-book"><i class="fas fa-caret-down"></a></i></span>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST"
        style="display: none;">
        @csrf
    </form>
</section>
