@php
    $top = 18;
    $pages = [
        ['name' => 'Thuis', 'link' => '#home'],
        ['name' => $featuredBook->name, 'link' => '#primary-book'],
        ['name' => $bookPost->name, 'link' => '#book-list'],
        ['name' => $aboutPost->name, 'link' => '#about-me'],
        ['name' => $blogPost->name, 'link' => '#columns'],
        ['name' => $reviewPost->name, 'link' => '#reviews'],
        ['name' => $contactPost->name, 'link' => '#contact'],
    ]
@endphp

<div class="site-navigation">
    @foreach ($pages as $page)
        <a href="{{$page['link']}}"><div class="dot my-5"><span class="nav-info">{{ $page['name'] }}</span><span class="bridge" style="top:{{$top}}px"></span></div></a>
        @php $top = $top + 39; @endphp
    @endforeach
</div>
