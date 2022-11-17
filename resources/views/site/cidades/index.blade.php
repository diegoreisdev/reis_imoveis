@extends('site.layouts.site')

@section('slider')

    <section class="slider">
        <ul class="slides">
            <li>
                 <img src="https://source.unsplash.com/TiVPTYCG_3E">
                 <div class="caption left-align slide-foto">
                    <h2 class="orange-text">Os melhores imóveis</h2>                   
                  </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/tVzyDSV84w8">
                <div class="caption left-align slide-foto">
                    <h2 class="orange-text">Imóveis para alugar</h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/2gDwlIim3Uw">
                <div class="caption left-align slide-foto">
                    <h2 class="orange-text">Imóveis á venda</h2>
                </div>
            </li>
        </ul>
    </section>

@endsection

@section('conteudo-principal')

    <section class="section lighten-4 center">
        <div class="card-site">
            @foreach ($cidades as $cidade)
                <a href="{{route('cidades.imoveis.index', $cidade->id)}}">
                    <div class="card-panel"><i class="material-icons medium green-text text-lighten-3">room</i>
                        <h4 class="black-text">{{$cidade->nome}}</h4>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

@endsection