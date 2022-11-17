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
                        {{-- Abrir Modal Estrutura --}}
                        <a class="modal-trigger form-delete" href="#modal1"><span class="span-delete"><i class="material-icons red-text">delete_forever</i></span></a>
                        {{-- Formnulário --}}
                        <form class="form-delete" action="{{route('admin.cidades.destroy', $cidade->id)}}" method="POST">                            
                            @method('DELETE')
                            @csrf
                           {{-- Modal Estrutura --}}
                            <div id="modal1" class="modal">
                                <div class="modal-content center">
                                    <h4>Tem certeza que deseja excluir a cidade?</h4>                                    
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    <button class="btn red-btn" type="submit">Excluir </button>                    
                                </div>
                            </div>
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