<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bekijk boeken en columns geschreven door Ruben Korfmaker. Auteur van Ricards requiem, Cantor, Laura en Sinp.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ruben Korfmaker') }}</title>

    <!-- Scripts -->
    <script src="/js/glide/dist/glide.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @production
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-LFWGC3R5HS"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LFWGC3R5HS');
        </script>
    @endproduction

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="/js/glide/dist/css/glide.core.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
        @yield('content')

        <script>
            var slider = document.querySelector('.glide');

            if (slider) {
                var glide = new Glide('.glide', {
                type: 'carousel',
                focusAt: 'center',
                perView: 2.5,
                animationDuration: 300,
                hoverpause: true,
                // peek: {
                //     before: 0,
                //     after: 0
                // },
                breakpoints: {
                    1408: {
                    perView: 2
                    },
                    1023: {
                        perView: 1.7,
                    },
                    750: {
                    perView: 1.2,
                    peek: {
                        before: 50,
                        after: 5
                    },
                    },
                    542: {
                    perView: 1,
                    peek: {
                        before: 0,
                        after: 0
                    },
                    }
                }
                })

                glide.mount()
            }


        </script>
</body>
</html>
