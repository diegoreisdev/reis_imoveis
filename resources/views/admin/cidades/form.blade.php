@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">    
    <form action="{{$action}}" method="POST">
        @csrf
        @isset($cidade)
            @method('PUT')
        @endisset
        
        <div class="input-field">
            <input type="text" name="nome" id="nome" value="{{old('nome', $cidade->nome ?? '')}}" autofocus>
            <label for="nome">Nome</label>
            @error('nome')
                <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>

        <div class="right-align">
            <a href="{{route('admin.cidades.index')}}" class="btn-flat waves-effect">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">
                Salvar
            </button>
        </div>
    </form>
</section>

@endsection