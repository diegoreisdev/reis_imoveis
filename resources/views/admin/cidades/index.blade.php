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
                        <a href="{{route('admin.cidades.edit', $cidade->id)}}">
                            <span>
                                <i class="material-icons blue-text">edit</i>
                            </span>
                        </a>
                        <form class="form-delete" action="{{route('admin.cidades.destroy', $cidade->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="border:0; background:transparent;" type="submit">
                                <span class="span-delete">
                                    <i class="material-icons red-text">delete_forever</i>
                                </span>
                            </button>                    
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="orange-text center-align"><h6>Nenhuma cidade encontrada</h6></td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light cyan pulse orange darken-4" href="{{route('admin.cidades.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>
@endsection