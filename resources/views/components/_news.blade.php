<div class="column is-half has-text-black">
    <div class="news-item">
        <div class="news-header py-3">
            <h3 class="subtitle">{{ $newsItem->name }}</h3>
            <hr>
        </div>
        <div class="news-body">
            <div class="is-clearfix ">
                @if ($newsItem->image_path !== null)
                    <img class="is-pulled-left image mr-4" src="{{ asset($newsItem->image_path) }}" alt="">
                @endif
                    {!! nl2br(e($newsItem->description)) !!}
            </div>
        </div>
        <div class="news-footer">
            <hr class="mb-3">
                @if (isset($newsItem->link))
                    <div class="has-text-centered">
                        <a class="tag is-black" href="{{ $newsItem->link }}">Bekijk link</a>
                    </div>
                @endif
                <p class="has-text-centered">Geplaatst op: {{ date('d-m-Y', strtotime($newsItem->created_at)) }}</p>
        </div>
    </div>
</div>

