<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FotoController extends Controller
{
    public function index($idImovel)
    {
        $imovel = Imovel::find($idImovel);
        $fotos = Foto::where('imovel_id', $idImovel)->get();
        return view('admin.imoveis.fotos.index', compact('imovel', 'fotos'));
    }

    public function create($idImovel)
    {
        $imovel = Imovel::find($idImovel);
        return view('admin.imoveis.fotos.form', compact('imovel'));
    }

    public function store(Request $request, $idImovel)
    {
        //Checar se veio o arquivo na requisição
        if ($request->hasFile('foto')) {
            //Checar se não ouve erro no upload da imagem
            if ($request->foto->isValid()) {
                //Armazenando  o arquivo  no disco público
                $fotoUrl = $request->foto->store("imoveis/$idImovel", 'public');
                //Armazenando o caminho do DB
                $foto = new Foto();
                $foto->url = $fotoUrl;
                $foto->imovel_id = $idImovel;
                $foto->save();
            }
        }

        $request->session()->flash('sucesso', 'Foto incluída com sucesso!');
        return Redirect::route('admin.imoveis.fotos.index', $idImovel);
    }

    public function destroy($id)
    {
        //
    }
}
