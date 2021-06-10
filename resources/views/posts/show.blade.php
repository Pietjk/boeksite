@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary mx-5">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home', '#columns') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    {{ $post->name }}
                </span>
            </div>
            <div class="panel-block px-5 py-5">
                <p>
                    @php
                        echo(
                            nl2br(
                                $post->description
                            )
                        );
                    @endphp
                </p>
            </div>
        </div>
    </div>
@endsection

