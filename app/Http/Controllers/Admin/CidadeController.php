<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::orderBy('nome', 'asc')->get();
        return view('admin.cidades.index', compact('cidades'));
    }

    public function create()
    {
        $title = 'Adicionar Cidade -';
        $action = route('admin.cidades.store');
        return view('admin.cidades.form', compact('action', 'title'));
    }

    public function store(CidadeRequest $request)
    {
        Cidade::create($request->all());
        $request->session()->flash('sucesso', "A cidade $request->nome foi adicionada com sucesso!");
        return Redirect::route('admin.cidades.index');
    }

    public function edit($id)
    {
        $title = 'Atualizar Cidade -';
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.update', $cidade->id);
        return view('admin.cidades.form', compact('action', 'cidade', 'title'));
    }

    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());
        $request->session()->flash('sucesso', "A cidade $cidade->nome foi atualizada com sucesso!");
        return Redirect::route('admin.cidades.index');
    }

    public function destroy(Request $request, $id)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso', "Cidade excluída com sucesso!");
        return Redirect::route('admin.cidades.index');
    }
}
