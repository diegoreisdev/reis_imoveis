@extends('site.layouts.site')

@section('conteudo-principal')

<h4>{{$imovel->titulo}}</h4>

<section class="section">
    {{-- Cidade --}}
    <div class="row">
        <span class="col s12">
            <h5 class="orange-text">Cidade</h5>
            <p>{{$imovel->cidade->nome}}</p>
        </span>        
        {{-- Tipo --}}
        <span class="col s12">
            <h5 class="orange-text">Tipo do imóvel</h5>
            <p>{{$imovel->tipo->nome}}</p>
        </span>
        {{-- Finalidade --}}
        <span class="col s12">
            <h5 class="orange-text">Finalidade</h5>
            <p>{{$imovel->finalidade->nome}}</p>
        </span>
    </div>

    {{-- Valor, Dormitórios e Salas --}}
    <div class="row">
        <span class="col s4">
            <h5 class="orange-text">Valor</h5>
            <p>{{ $imovel->preco }}</p>
        </span>
        <span class="col s4">
            <h5 class="orange-text">Dormitórios</h5>
            <p>{{$imovel->dormitorios}}</p>
        </span>
        <span class="col s4">
            <h5 class="orange-text">Salas</h5>
            <p>{{$imovel->salas}}</p>
        </span>
    </div>

    {{-- Terreno, Banheiros e Garagem --}}
    <div class="row">
        <span class="col s4">
            <h5 class="orange-text">Terreno (m²)</h5>
            <p>{{$imovel->terreno}}</p>
        </span>
        <span class="col s4">
            <h5 class="orange-text">Banheiros</h5>
            <p>{{$imovel->banheiros}}</p>
        </span>
        <span class="col s4">
            <h5 class="orange-text">Garagem</h5>
            <p>{{$imovel->garagens}}</p>
        </span>
    </div>

    {{-- Pontos de interesse nas proximidades --}}
    <div class="row">
        <span class="col s12">
            <h5 class="orange-text">Pontos de interesse nas proximidades</h5>
            <div style="display: flex; flex-wrap:wrap;">
                @foreach ($imovel->proximidades as $proximidade )
                    <span style="margin-right: 13px; font-weight: 600;">{{$proximidade->nome}}</span>
                @endforeach
            </div>
        </span>
    </div>

    {{-- Endereço --}}
    <div class="row">
        <span class="col 12">
            <h5 class="orange-text">Endereço</h5>
            <p>Rua: <em>{{$imovel->endereco->rua}}</em> n° {{$imovel->endereco->numero}},
                @if (!empty($imovel->endereco->complemento)) Complemento:<em> {{$imovel->endereco->complemento}}</em>, @endif Bairro: <em>{{$imovel->endereco->bairro}}</em>
            </p>
        </span>
    </div>
    {{-- Descrção --}}
    <div class="row">
        <span class="col s12">
            <h5 class="orange-text">Descrição</h5>
            <p>{{$imovel->descricao}}</p>
        </span>   
    </div>

    {{-- Imagens do Imóvel --}}
    <h4 class="center orange-text">Imagens do Imóvel</h4>
    <div class="imagem-show">
        @forelse ( $imovel->fotos as $foto )
            <img class="materialboxed" style="margin:5px" width="195" height="130" src="{{asset("storage/{$foto->url}")}}">            
        @empty
            <div class="row center">Não existem fotos para esse imóvel</div>
        @endforelse 
    </div>

    {{-- Voltar --}}
    <div class="right-align">
        <a href="{{url()->previous()}}" class="btn-flat waves-effect">Voltar</a>
    </div>
    
</section>

@endsection