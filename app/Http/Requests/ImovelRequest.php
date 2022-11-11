<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rua'           => 'required|min:3',
            'salas'         => 'required|integer',
            'preco'         => 'required|numeric',
            'numero'        => 'required|integer',
            'titulo'        => 'required|min:3|max:100',
            'bairro'        => 'required|min:3|max:20',
            'tipo_id'       => 'required|integer',
            'terreno'       => 'required|integer',
            'garagens'      => 'required|integer',
            'banheiros'     => 'required|integer',
            'descricao'     => 'nullable|string',
            'cidade_id'     => 'required|integer',
            'dormitorios'   => 'required|integer',
            'complemento'   => 'nullable|string',
            'proximidades'  => 'nullable|array',
            'finalidade_id' => 'required',
        ];
    }

    /* Customização dos nomes dos campos para mensagens de erros */
    public function attributes()
    {
        return [
            'preco'         => 'valor',
            'titulo'        => 'título',
            'numero'        => 'número',
            'tipo_id'       => 'tipo',
            'garagens'      => 'vagas na garagem',
            'descricao'     => 'descrição',
            'cidade_id'     => 'cidade',
            'dormitorios'   => 'dormitórios',
            'finalidade_id' => 'finalidade',
        ];
    }

    /* Customização da mensagem de erro para uma regra */
    public function messages()
    {
        return [
            'finalidade_id.required' => 'Por favor, selecione uma opção',
            'required'               => 'Por favor, preencha  o   campo :attribute'
        ];
    }
}
