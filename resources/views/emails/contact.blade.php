@extends('layouts.mail')

@section('content')

@php
echo(
    nl2br(
        $body
    )
)
@endphp

    <hr>

    <p>{{ $footer }}</p>
@endsection
