@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary mx-5">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home', '#reviews') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    {{ $review->name }}
                </span>
                <span class="is-pulled-right tag is-medium is-black">
                    {{ ($review->score === null) ? 'N/A' : $review->score }}
                </span>
            </div>
            <div class="panel-block px-5 py-5">
                <p>
                    @php
                        echo(
                            nl2br(
                                $review->description
                            )
                        );
                    @endphp
                </p>
            </div>
            @if (isset($review->link))
                <div class="panel-block px-5 py-5">
                    <a href="{{ $review->link }}" class="tag is-black">
                        Bekijk de originele review
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

