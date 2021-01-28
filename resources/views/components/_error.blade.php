@php $bag = (isset($bag)) ? $bag : ''; @endphp

@if ($errors->{$bag}->any())
{{-- @dd($errors) --}}
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->{$bag}->all() as $error)
                <li>
                    <span>{{ $error }}</span>

                </li>
            @endforeach
        </ul>
    </div>
@endif