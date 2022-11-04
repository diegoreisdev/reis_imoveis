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
                            editar - excluir
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