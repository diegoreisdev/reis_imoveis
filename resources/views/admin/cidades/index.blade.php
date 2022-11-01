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
                    <td>{{$cidade->nome}}</td>
                    <td class="right-align">
                        <span>
                            <i class="material-icons blue-text">edit</i>
                        </span>
                        <form action="{{route('admin.cidades.destroy', $cidade->id)}}" method="POST" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button style="border:0; background:transparent;" type="submit">
                                <span style="cursor: pointer">
                                    <i class="material-icons red-text">delete_forever</i>
                                </span>
                            </button>                    
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhuma cidade encontrada</td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.cidades.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>
@endsection