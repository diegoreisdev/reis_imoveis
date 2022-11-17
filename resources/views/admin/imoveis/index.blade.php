@extends('admin.layouts.principal')

@section('conteudo-principal')
    {{-- Filtro de Pesquisa --}}
    <section class="section">
        <form action="{{route('admin.imoveis.index')}}" method="GET">
            <div class="row align-wrapper">
                {{-- Cidade --}}
                <div class="input-field col s6">
                    <select name="cidade_id" id="cidade_id">
                        <option value="">Selecione uma cidade</option>
                        @foreach ($cidades as $cidade)
                            <option value="{{$cidade->id}}" {{$cidade->id == $cidade_id ? 'selected' : ''}}>{{$cidade->nome}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Título --}}
                <div class="input-field col s6">
                    <input type="text" name="titulo" id="titulo" value="{{$titulo}}">
                    <label for="titulo">Título</label>
                </div>
            </div>
            {{-- Pesquisar Título --}}
            <div class="row right-align">
                <a href="{{route('admin.imoveis.index')}}" class="btn-flat waves-effect">Exibir todos</a>
                <button type="submit" class="btn waves-effect waves-light">Pesquisar</button>
            </div>
        </form>
    </section>
    <hr>
    {{-- Lista de Imóveis --}}
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($imoveis as $imovel)
                    <tr>
                        <td>{{$imovel->cidade->nome}}</td>
                        <td>{{$imovel->endereco->bairro}}</td>
                        <td>{{$imovel->titulo}}</td>
                        <td class="right-align">
                            {{-- Fotos --}}
                            <a href="{{route('admin.imoveis.fotos.index', $imovel->id)}}" title="Fotos"><span><i class="material-icons green-text">insert_photo</i></span></a>
                            {{-- Ver --}}
                            <a href="{{route('admin.imoveis.show', $imovel->id)}}" title="Ver"><span><i class="material-icons indigo-text">remove_red_eye</i></span></a>
                            {{-- Editar --}}
                            <a href="{{route('admin.imoveis.edit', $imovel->id)}}" title="Editar"><span><i class="material-icons blue-text">edit</i></span></a>
                            {{-- Excluir --}}
                            <form class="form-delete" action="{{route('admin.imoveis.destroy', $imovel->id)}}" title="Excluir" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn-delete" type="submit"><span class="span-delete"><i class="material-icons red-text btn-delete">delete_forever</i></span></button>                    
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="orange-text center-align"><h6>Nenhum imóvel encontrado</h6></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="center">{{$imoveis->links('shared.pagination')}}</div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light cyan pulse orange darken-4" href="{{route('admin.imoveis.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection