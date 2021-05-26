<?php $bag = (isset($bag)) ? $bag :'default'; ?>

{{-- Success message--}}
@if ($bag == 'default' && session()->has('success'))
<?php $message = (session()->get('success')) ?>

    <div class="notification is-success">
        <ul>
            <li>
                <span>{{ $message }}</span>
            </li>
        </ul>
    </div>
@endif
