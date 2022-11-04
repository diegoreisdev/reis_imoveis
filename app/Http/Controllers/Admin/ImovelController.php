<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Finalidade;
use App\Models\Imovel;
use App\Models\Proximidade;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::with(['cidade', 'endereco'])->get();
        return view('admin.imoveis.index', compact('imoveis'));
    }

    public function create()
    {
        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();
        $title = 'Adicionar imóvel -';
        $action = route('admin.imoveis.store');
        return view('admin.imoveis.form', compact('title', 'action', 'cidades', 'tipos', 'finalidades', 'proximidades'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $imovel = Imovel::create($request->all());
        $imovel->endereco()->create($request->all());

        if($request->has('proximidades')){
            $imovel->proximidades()->sync($request->proximidades);
        }
        DB::commit();

        $request->session()->flash('sucesso', "O imóvel foi adicionada com sucesso!");
        return Redirect::route('admin.imoveis.index');
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
