<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.cidades.form');
    }

    public function store(Request $request)
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
