@extends('site.layouts.site')

@section('conteudo-principal')
    <h3>Imóveis disponíveis em {{$cidade->nome}}</h3>
    <div class="divider"></div>
    <div class="imovel-imagem">
        @forelse ($imoveis as $imovel)
            <div class="card card-imagem">
                <div class="card-image">
                    @if (count($imovel->fotos) > 0)
                        <img src="{{asset("storage/{$imovel->fotos[0]->url}")}}">
                    @else
                        {{-- <img class="img-card" src="{{asset('images/casa.png')}}" alt="Não existe foto do imóvel"> --}}
                        Não exiete foto
                      
                    @endif
                </div>
                <div class="card-content">
                    <p class="card-title">
                        {{$imovel->titulo}}
                    </p>
                    <p>
                        Finalidade <strong>{{$imovel->finalidade->nome}}</strong>
                    </p>
                    <p>
                        Valor <strong>{{$imovel->preco}}</strong>
                    </p>
                </div>
                <div class="card-action center">
                    <a href="{{route('cidades.imoveis.show', [$cidade->id, $imovel->id])}}">Ver detalhes</a>
                </div>
            </div>
        @empty
            <h6 class="center">Não existem imóveis cadastrados para esse local.</h6>
        @endforelse
    </div>
    <div class="center">
        {{$imoveis->links('shared.pagination')}}
    </div>
@endsection