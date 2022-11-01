<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades= ['Aracaju', 'Cícero Dantas'];
        return view('admin.cidades.index', compact('cidades'));
    }

    public function create()
    {
        return view('admin.cidades.form');
    }

    public function store(Request $request)
    {
        //
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
