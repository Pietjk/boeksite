@php
    $top = 18;
    $pages = [
        ['name' => 'Thuis', 'link' => '#home'],
        ['name' => $featuredBook->name ?? 'Aanbevolen book', 'link' => '#primary-book'],
        ['name' => $bookPost->name ?? 'Alle boeken', 'link' => '#book-list'],
        ['name' => $aboutPost->name ?? 'Over mij', 'link' => '#about-me'],
        ['name' => $newsPost->name ?? 'Nieuws', 'link' => '#news'],
        ['name' => $blogPost->name ?? 'Columns', 'link' => '#columns'],
        ['name' => $reviewPost->name ?? 'Review', 'link' => '#reviews'],
        ['name' => $contactPost->name ?? 'Contact', 'link' => '#contact'],
    ]
@endphp

<div class="site-navigation">
    @foreach ($pages as $page)
        <a href="{{$page['link']}}"><div class="dot my-5"><span class="nav-info">{{ $page['name'] }}</span><span class="bridge" style="top:{{$top}}px"></span></div></a>
        @php $top = $top + 39; @endphp
    @endforeach
</div>
