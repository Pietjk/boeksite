@extends('layouts.app')
@section('content')
<section class="hero is-fullheight is-gradient">
    <div class="hero-body">
        <div class="">
            <p class="title">
                Demo
            </p>
            <p class="subtitle">
                De demo pagina is op dit moment nog onder constructie
            </p>
                <a href="{{ route('home') }}" class="button is-outlined">Ga terug</a>
        </div>
    </div>
</section>
@endsection