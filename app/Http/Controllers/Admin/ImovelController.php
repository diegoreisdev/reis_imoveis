<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImovelRequest;
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
    public function index(Request $request)
    {
        $imoveis = Imovel::join('cidades', 'cidades.id', '=', 'imoveis.cidade_id')
                        ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id')
                        ->orderBy('cidades.nome', 'asc')
                        ->orderBy('enderecos.bairro', 'asc')
                        ->orderBy('titulo', 'asc');

        $cidade_id = $request->cidade_id;
        $titulo = $request->titulo;
        //Filtro Cidade
        if ($cidade_id) {
            $imoveis->where('cidades.id', $cidade_id);
        }
        //Filtro Título
        if ($titulo) {
            $imoveis->where('titulo', 'LIKE', "%$titulo%");
        }
        //Pegando os dados retornados a partir da execução da query
        $imoveis = $imoveis->paginate(env('PAGINATE'))->withQueryString();
        $cidades = Cidade::orderBy('nome')->get();
        return view('admin.imoveis.index', compact('imoveis', 'cidades', 'cidade_id', 'titulo'));
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

    public function store(ImovelRequest $request)
    {
        DB::beginTransaction();
        $imovel = Imovel::create($request->all());
        $imovel->endereco()->create($request->all());

        if ($request->has('proximidades')) {
            $imovel->proximidades()->sync($request->proximidades);
        }
        DB::commit();

        $request->session()->flash('sucesso', "O imóvel foi adicionada com sucesso!");
        return Redirect::route('admin.imoveis.index');
    }

    public function show($id)
    {
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);
        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();
        $title = 'Detalhes do imóvel -';
        return view('admin.imoveis.show', compact('imovel', 'title', 'cidades', 'tipos', 'finalidades', 'proximidades'));
    }

    public function edit($id)
    {
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);
        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();
        $title = 'Atualizar imóvel -';
        $action = route('admin.imoveis.update', $imovel->id);
        return view('admin.imoveis.form', compact('imovel', 'title', 'action', 'cidades', 'tipos', 'finalidades', 'proximidades'));
    }

    public function update(ImovelRequest $request, $id)
    {
        $imovel = Imovel::find($id);

        DB::beginTransaction();
        $imovel->update($request->all());
        $imovel->endereco->update($request->all());

        if ($request->has('proximidades')) {
            $imovel->proximidades()->sync($request->proximidades);
        }
        DB::commit();

        $request->session()->flash('sucesso', "Imóvel atualizado com sucesso!");
        return Redirect::route('admin.imoveis.index');
    }

    public function destroy(Request $request, $id)
    {
        $imovel = Imovel::find($id);

        DB::beginTransaction();
        // Remover o endereço
        $imovel->endereco->delete();
        // Remover o imóvel
        $imovel->delete();
        DB::commit();
        $request->session()->flash('sucesso', "Imóvel excluído com sucesso!");
        return Redirect::route('admin.imoveis.index');
    }
}
