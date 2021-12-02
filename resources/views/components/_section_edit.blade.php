@php
    if (count($data['content']) < 2) {
        $data['content'][2] = $data['content'][1];
    }
    if (count($data['route']) < 2 && !is_null($data['content'][1])) {
        $data['route'][2] = route('post.edit', $data['content'][1]->getKey());
    }
@endphp

<a href="
    @if (is_null($data['content'][1]))
        {{ $data['route'][1] }}
    @else
        {{ $data['route'][2] }}
    @endif
">
    <div class="edit">
        <span class="edit-icon">
            <p>
                <i class="far fa-edit"></i><span class="edit-text">@if (is_null($data['content'][1])) Creëer @else Pas aan @endif</span>
            </p>
        </span>
    </div>
</a>
