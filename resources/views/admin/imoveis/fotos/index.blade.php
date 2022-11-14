@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{$imovel->titulo}}</h4>
    <section class="section">
        <div class="flex-container">

            @forelse ($fotos as $foto)
                <div class="flex-item">
                    <span class="btn-close">
                        <form class="form-delete" action="{{route('admin.imoveis.fotos.destroy', [$imovel->id, $foto->id])}}" title="Excluir" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><span class="span-delete"><i class="material-icons red-text btn-delete">delete_forever</i></span></button>                    
                        </form>
                    </span>
                    <img src="{{asset("storage/$foto->url")}}" alt="Foto">

                </div>
            @empty
                <div class="orange-text center-align"><h6>Nenhuma foto cadastrada</h6></div>
            @endforelse

        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light cyan pulse orange darken-4" href="{{route('admin.imoveis.fotos.create', $imovel->id)}}"><i class="large material-icons">add</i></a>
        </div>
    </section>
@endsection