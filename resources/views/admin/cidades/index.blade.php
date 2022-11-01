@extends('admin.layouts.principal')

@section('conteudo-principal')
<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Cidade</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($cidades as $cidade)
                <tr>
                    <td>{{$cidade}}</td>
                    <td class="right-align">Excluir - Remover</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhuma cidade encontrada</td>
                </tr>
            @endforelse
        </tbody>

    </table>
</section>
@endsection