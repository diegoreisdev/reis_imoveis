@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        <table class="higt-light">
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
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light cyan pulse orange darken-4" href="{{route('admin.imoveis.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection