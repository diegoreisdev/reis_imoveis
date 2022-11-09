@extends('admin.layouts.principal')

@section('conteudo-principal')
    
    <section class="section">
        <form action="{{$action}}" method="POST">
            @csrf
            
            {{-- Título --}}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="titulo" id="titulo" value="{{old('titulo')}}">
                    <label for="titulo">Título</label>
                    @error('titulo')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
            </div>

            {{-- Cidade --}}
            <div class="row">
                <div class="input-field col s12">
                   <select name="cidade_id" id="cidade_id">
                        <option value="" disabled selected>Selecione uma cidade</option>
                        @foreach ($cidades as $cidade)
                            <option value="{{$cidade->id}}" {{old('cidade_id') == $cidade->id ? 'selected' : ''}}>{{$cidade->nome}}</option>                        
                        @endforeach
                   </select>
                   <label for="cidade_id">Cidade</label>
                    @error('cidade_id')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
            </div>

            {{-- Tipo --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="tipo_id" id="tipo_id">
                         <option value="" disabled selected>Selecione um tipo de imóvel</option>
                         @foreach ($tipos as $tipo)
                             <option value="{{$tipo->id}}" {{old('tipo_id') == $tipo->id ? 'selected' : '' }} >{{$tipo->nome}}</option>                        
                         @endforeach
                    </select>
                    <label for="tipo_id">Tipo</label>
                    @error('tipo_id')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                 </div>
            </div>

             {{-- Finalidade --}}
            <div class="row">                 
                @foreach ($finalidades as $finalidade)
                    <span class="col s2">
                        <label style="margin-right: 30px;">
                            <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap" value="{{$finalidade->id}}" {{old('finalidade_id') == $finalidade->id ? 'checked' : ''}}>
                            <span>{{$finalidade->nome}}</span>
                        </label>
                    </span>                        
                    @endforeach                 
                    @error('finalidade_id')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
            </div>

             {{-- Valor| Dormitórios| Salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="preco" id="preco" value="{{old('preco')}}">
                    <label for="preco">Valor</label>
                    @error('preco')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="dormitorios" id="dormitorios" value="{{old('dormitorios')}}">
                    <label for="dormitorios">Dormitórios</label>
                    @error('dormitorios')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="salas" id="salas" value="{{old('salas')}}">
                    <label for="salas">Salas</label>
                    @error('salas')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
             </div>

              {{-- Terreno| Banheiros| Garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="terreno" id="terreno" value="{{old('terreno')}}">
                    <label for="terreno">Terreno em m²</label>
                    @error('terreno')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="banheiros" id="banheiros" value="{{old('banheiros')}}">
                    <label for="banheiros">Banheiros</label>
                    @error('banheiros')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s4">
                    <input type="number" name="garagens" id="garagens" value="{{old('garagens')}}">
                    <label for="garagens">Vagas na garagem</label>
                    @error('garagens')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
             </div>

             {{-- Descrição --}}
             <div class="row">
                <div class="input-field col s12">
                    <textarea name="descricao" id="descricao" class="materialize-textarea">{{old('descricao')}}</textarea>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
             </div>

             {{-- Endereço --}}
             <div class="row">
                <div class="input-field col s5">
                    <input type="text" name="rua" id="rua" value="{{old('rua')}}">
                    <label for="rua">Rua</label>
                    @error('rua')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s2">
                    <input type="number" name="numero" id="numero" value="{{old('numero')}}">
                    <label for="numero">Número</label>
                    @error('numero')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s2">
                    <input type="text" name="complemento" id="complemento" value="{{old('complemento')}}">
                    <label for="complemento">Complemento</label>
                    @error('complemento')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field col s3">
                    <input type="text" name="bairro" id="bairro" value="{{old('bairro')}}">
                    <label for="bairro">Bairro</label>
                    @error('bairro')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                </div>
             </div>

             {{-- Proximidades --}}
             <div class="row">
                 <div class="input-field col s12">
                    <select name="proximidades[]" id="proximidades" multiple>
                        <option value="" disabled>Selecione os pontos de interesse nas proximidades</option>
                        @foreach ($proximidades as $proximidade)
                            <option value="{{$proximidade->id}}"
                                @if (old('proximidades'))
                                    {{in_array($proximidade->id, old('proximidades')) ? 'selected' : ''}} 
                                @endif   
                            >{{$proximidade->nome}}</option>
                        @endforeach
                    </select>
                    <label for="proximidades">Pontos de interesse nas proximidades</label>
                    @error('proximidades')
                        <span class="red-text text-accent-3">{{$message}}</span>
                    @enderror
                 </div>
             </div>
             
             <div class="right-align">
                <a href="{{route('admin.imoveis.index')}}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>


@endsection