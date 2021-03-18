<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/glide/dist/glide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="/js/glide/dist/css/glide.core.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    
</head>
<body>
        @yield('content')

        <script>
            var slider = document.querySelector('.glide');
            
            if (slider) {
                var glide = new Glide('.glide', {
                type: 'carousel',
                focusAt: 'center',
                perView: 3,
                animationDuration: 300,
                hoverpause: true,
                peek: {
                    before: 30,
                    after: 30
                },
                breakpoints: {
                    800: {
                    perView: 2
                    },
                    620: {
                    perView: 1
                    }
                }
                })
    
                glide.mount()
            }
            
            
        </script>
</body>
</html>
