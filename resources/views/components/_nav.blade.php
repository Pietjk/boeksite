<section class="hero is-fullheight has-bg-img">
    @auth
    <div class="hero-head has-text-centered mb-5">
        <div class="notification is-success" id="notification">
            <h1 class="is-3">Je bent ingelogd!</h1>

            <h1 class="is-3">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Log uit
                </a>
            </h1>
        </div>
        <a href=""><div class="edit"><span class="edit-icon"><p><i class="far fa-edit"></i><span class="edit-text"> Pas aan</span></p></span></div></a>
    </div>
    @endauth
    <div class="hero-body">
        <div class="container body">
            <h1 class="title">Ricards  Requiem</h1>
            <h2 class="subtitle">Ruben Korfmaker</h2>
        </div>
    </div>
    <div class="hero-foot mb-5">
        <div class="container foot">
            <span class="icon"><a href="#section1"><i class="fas fa-caret-down"></a></i></span>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST"
        style="display: none;">
        @csrf
    </form>
</section>