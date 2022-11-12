@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        <form action="{{route('admin.imoveis.fotos.store', $imovel->id)}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="file-field input-field">
                {{-- Input para selecionar foto --}}
                <div class="btn">
                    <span>Selecionar Foto</span>
                    <input type="file" name="foto">
                </div>
                {{-- Exibe nome da foto --}}
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                </div>
            </div>
                {{-- Cancelar/Salvar --}}
            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">Salvar</button>
            </div>
        </form>
    </section>

@endsection