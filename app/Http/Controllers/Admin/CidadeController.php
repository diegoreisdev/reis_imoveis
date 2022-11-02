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
        $cidades = Cidade::all();
        return view('admin.cidades.index', compact('cidades'));
    }

    public function create()
    {
        $action = route('admin.cidades.store');
        return view('admin.cidades.form', compact('action'));
    }

    public function store(CidadeRequest $request)
    {
        Cidade::create($request->all());
        $request->session()->flash('sucesso', "A cidade $request->nome foi adicionada com sucesso!");
        return Redirect::route('admin.cidades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.update', $cidade->id);
        return view('admin.cidades.form', compact('action', 'cidade'));
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
