<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'              => 'required|string',
            'descricao'         => 'required|string',
            'quantidade'        => 'required|numeric',
            'valor'             => 'required|numeric',
        ];
    }
}

