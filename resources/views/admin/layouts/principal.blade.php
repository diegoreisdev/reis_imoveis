<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- Jquery Mask --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <a href="/" class="brand-logo">Reis Imóveis</a>
                <ul class="right">
                    <li><a href="{{route('admin.cidades.index')}}">Cidades</a></li>
                    <li><a href="{{route('admin.imoveis.index')}}">Imóveis</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteúdo Principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/mask.js')}}"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if (session('sucesso'))
            M.toast({html: "{{session('sucesso')}}"})
        @endif
        
        $(document).ready(function(){
            $('.modal').modal();
            $('select').formSelect();
        });
    </script>
</body>

</html>