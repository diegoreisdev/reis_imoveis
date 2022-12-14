<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>{{$title ?? '' }} Reis Imóveis</title>
</head>

<body>
    {{-- Menu Topo --}}
    <nav class="orange darken-4">
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo center">Reis Imóveis</a>
            </div>
        </div>
    </nav>

    {{-- Slider --}}
    @yield('slider')

    {{-- Conteúdo Principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            /* Slider */
            var slid = document.querySelectorAll('.slider');            
            M.Slider.init(slid, {
                indicators: false,
                height: 400,
            });
            
            /* Material Box/ Ampliar Imagem */
            var elems = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(elems);
        
        })
    </script>
</body>

</html>